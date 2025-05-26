document.addEventListener("DOMContentLoaded", () => {
  // Mobile menu toggle (if needed)
  const mobileMenuToggle = document.querySelector(".mobile-menu-toggle")
  const mainNav = document.querySelector(".main-nav")

  if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener("click", () => {
      mainNav.classList.toggle("active")
    })
  }

  // Smooth scrolling for anchor links
  const anchorLinks = document.querySelectorAll('a[href^="#"]')
  anchorLinks.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault()
      const target = document.querySelector(this.getAttribute("href"))
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        })
      }
    })
  })

  // Property search form enhancements
  const searchForm = document.querySelector(".property-search")
  if (searchForm) {
    searchForm.addEventListener("submit", function (e) {
      // Add loading state
      const submitBtn = this.querySelector(".search-btn")
      const originalText = submitBtn.textContent
      submitBtn.textContent = "Searching..."
      submitBtn.disabled = true

      // Re-enable after a short delay (form will submit)
      setTimeout(() => {
        submitBtn.textContent = originalText
        submitBtn.disabled = false
      }, 2000)
    })
  }

  // Property card hover effects
  const propertyCards = document.querySelectorAll(".property-card")
  propertyCards.forEach((card) => {
    card.addEventListener("mouseenter", function () {
      this.style.transform = "translateY(-5px)"
    })

    card.addEventListener("mouseleave", function () {
      this.style.transform = "translateY(0)"
    })
  })

  // Contact form handling (if contact forms are added)
  const contactForms = document.querySelectorAll(".contact-form")
  contactForms.forEach((form) => {
    form.addEventListener("submit", function (e) {
      e.preventDefault()

      // Basic form validation
      const requiredFields = this.querySelectorAll("[required]")
      let isValid = true

      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          isValid = false
          field.style.borderColor = "#ef4444"
        } else {
          field.style.borderColor = "#e5e7eb"
        }
      })

      if (isValid) {
        // Show success message
        const successMessage = document.createElement("div")
        successMessage.textContent = "Thank you! We will contact you soon."
        successMessage.style.cssText =
          "background: #10b981; color: white; padding: 1rem; border-radius: 5px; margin-top: 1rem;"
        this.appendChild(successMessage)

        // Reset form
        this.reset()

        // Remove success message after 5 seconds
        setTimeout(() => {
          successMessage.remove()
        }, 5000)
      }
    })
  })
})
