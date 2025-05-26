<div class="property-card">
    <?php if (has_post_thumbnail()) : ?>
        <img src="<?php the_post_thumbnail_url('property-thumbnail'); ?>" alt="<?php the_title(); ?>" class="property-image">
    <?php else : ?>
        <img src="/placeholder.svg?height=250&width=400" alt="<?php the_title(); ?>" class="property-image">
    <?php endif; ?>
    
    <div class="property-content">
        <?php $price = get_post_meta(get_the_ID(), 'price', true); ?>
        <?php if ($price) : ?>
            <div class="property-price"><?php echo format_price($price); ?></div>
        <?php endif; ?>
        
        <h3 class="property-title"><?php the_title(); ?></h3>
        
        <?php $location = get_post_meta(get_the_ID(), 'location', true); ?>
        <?php if ($location) : ?>
            <p class="property-location">📍 <?php echo esc_html($location); ?></p>
        <?php endif; ?>
        
        <div class="property-features">
            <?php $bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true); ?>
            <?php if ($bedrooms) : ?>
                <span class="feature">🛏️ <?php echo esc_html($bedrooms); ?> Beds</span>
            <?php endif; ?>
            
            <?php $bathrooms = get_post_meta(get_the_ID(), 'bathrooms', true); ?>
            <?php if ($bathrooms) : ?>
                <span class="feature">🚿 <?php echo esc_html($bathrooms); ?> Baths</span>
            <?php endif; ?>
            
            <?php $square_feet = get_post_meta(get_the_ID(), 'square_feet', true); ?>
            <?php if ($square_feet) : ?>
                <span class="feature">📐 <?php echo number_format($square_feet); ?> sqft</span>
            <?php endif; ?>
        </div>
        
        <a href="<?php the_permalink(); ?>" class="property-link">View Details</a>
    </div>
</div>
