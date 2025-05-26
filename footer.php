<footer class="site-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>About <?php bloginfo('name'); ?></h3>
                <p>We are a leading real estate agency dedicated to helping you find your perfect home. With years of experience and a commitment to excellence, we make your property dreams come true.</p>
            </div>
            
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li><a href="<?php echo home_url('/properties'); ?>">Properties</a></li>
                    <li><a href="<?php echo home_url('/about'); ?>">About Us</a></li>
                    <li><a href="<?php echo home_url('/contact'); ?>">Contact</a></li>
                    <li><a href="<?php echo home_url('/blog'); ?>">Blog</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Property Types</h3>
                <ul>
                    <li><a href="<?php echo home_url('/properties?type=house'); ?>">Houses</a></li>
                    <li><a href="<?php echo home_url('/properties?type=apartment'); ?>">Apartments</a></li>
                    <li><a href="<?php echo home_url('/properties?type=condo'); ?>">Condos</a></li>
                    <li><a href="<?php echo home_url('/properties?type=commercial'); ?>">Commercial</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Contact Info</h3>
                <ul>
                    <li>📞 (555) 123-4567</li>
                    <li>✉️ info@realestatepro.com</li>
                    <li>📍 123 Main Street, City, State 12345</li>
                </ul>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
