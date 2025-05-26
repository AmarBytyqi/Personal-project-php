<?php get_header(); ?>

<main class="main-content">
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Find Your Dream Home</h1>
            <p>Discover the perfect property from our extensive collection of homes, apartments, and commercial spaces.</p>
            
            <!-- Property Search Form -->
            <form class="property-search" method="GET" action="<?php echo home_url('/properties'); ?>">
                <div class="search-field">
                    <label for="location">Location</label>
                    <input type="text" id="location" name="location" placeholder="Enter city or area">
                </div>
                <div class="search-field">
                    <label for="property-type">Property Type</label>
                    <select id="property-type" name="property_type">
                        <option value="">All Types</option>
                        <option value="house">House</option>
                        <option value="apartment">Apartment</option>
                        <option value="condo">Condo</option>
                        <option value="commercial">Commercial</option>
                    </select>
                </div>
                <div class="search-field">
                    <label for="min-price">Min Price</label>
                    <select id="min-price" name="min_price">
                        <option value="">No Min</option>
                        <option value="100000">$100,000</option>
                        <option value="200000">$200,000</option>
                        <option value="300000">$300,000</option>
                        <option value="500000">$500,000</option>
                    </select>
                </div>
                <div class="search-field">
                    <label for="max-price">Max Price</label>
                    <select id="max-price" name="max_price">
                        <option value="">No Max</option>
                        <option value="300000">$300,000</option>
                        <option value="500000">$500,000</option>
                        <option value="750000">$750,000</option>
                        <option value="1000000">$1,000,000+</option>
                    </select>
                </div>
                <div class="search-field">
                    <label>&nbsp;</label>
                    <button type="submit" class="search-btn">Search Properties</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Featured Properties Section -->
    <section class="properties-section">
        <div class="container">
            <h2 class="section-title">Featured Properties</h2>
            <div class="properties-grid">
                <?php
                // Query for featured properties
                $featured_properties = new WP_Query(array(
                    'post_type' => 'property',
                    'posts_per_page' => 6,
                    'meta_query' => array(
                        array(
                            'key' => 'featured',
                            'value' => 'yes',
                            'compare' => '='
                        )
                    )
                ));

                if ($featured_properties->have_posts()) :
                    while ($featured_properties->have_posts()) : $featured_properties->the_post();
                        get_template_part('template-parts/property-card');
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Fallback content if no featured properties
                    for ($i = 1; $i <= 6; $i++) :
                ?>
                    <div class="property-card">
                        <img src="/placeholder.svg?height=250&width=400" alt="Property <?php echo $i; ?>" class="property-image">
                        <div class="property-content">
                            <div class="property-price">$<?php echo number_format(rand(250000, 850000)); ?></div>
                            <h3 class="property-title">Beautiful Family Home <?php echo $i; ?></h3>
                            <p class="property-location">📍 Downtown Area, City</p>
                            <div class="property-features">
                                <span class="feature">🛏️ <?php echo rand(2, 5); ?> Beds</span>
                                <span class="feature">🚿 <?php echo rand(1, 3); ?> Baths</span>
                                <span class="feature">📐 <?php echo rand(1200, 3500); ?> sqft</span>
                            </div>
                            <a href="#" class="property-link">View Details</a>
                        </div>
                    </div>
                <?php
                    endfor;
                endif;
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
