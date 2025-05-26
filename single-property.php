<?php get_header(); ?>

<main class="main-content" style="padding-top: 100px;">
    <?php while (have_posts()) : the_post(); ?>
        <div class="container">
            <div style="max-width: 800px; margin: 0 auto; padding: 2rem 0;">
                
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('property-large'); ?>" alt="<?php the_title(); ?>" style="width: 100%; height: 400px; object-fit: cover; border-radius: 10px; margin-bottom: 2rem;">
                <?php endif; ?>
                
                <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem; margin-bottom: 2rem;">
                    <div>
                        <h1 style="font-size: 2.5rem; margin-bottom: 1rem; color: #333;"><?php the_title(); ?></h1>
                        
                        <?php $location = get_post_meta(get_the_ID(), 'location', true); ?>
                        <?php if ($location) : ?>
                            <p style="color: #6b7280; font-size: 1.1rem; margin-bottom: 1rem;">📍 <?php echo esc_html($location); ?></p>
                        <?php endif; ?>
                        
                        <div style="display: flex; gap: 2rem; margin-bottom: 2rem;">
                            <?php $bedrooms = get_post_meta(get_the_ID(), 'bedrooms', true); ?>
                            <?php if ($bedrooms) : ?>
                                <div style="text-align: center;">
                                    <div style="font-size: 1.5rem;">🛏️</div>
                                    <div style="font-weight: 600;"><?php echo esc_html($bedrooms); ?></div>
                                    <div style="color: #6b7280; font-size: 0.9rem;">Bedrooms</div>
                                </div>
                            <?php endif; ?>
                            
                            <?php $bathrooms = get_post_meta(get_the_ID(), 'bathrooms', true); ?>
                            <?php if ($bathrooms) : ?>
                                <div style="text-align: center;">
                                    <div style="font-size: 1.5rem;">🚿</div>
                                    <div style="font-weight: 600;"><?php echo esc_html($bathrooms); ?></div>
                                    <div style="color: #6b7280; font-size: 0.9rem;">Bathrooms</div>
                                </div>
                            <?php endif; ?>
                            
                            <?php $square_feet = get_post_meta(get_the_ID(), 'square_feet', true); ?>
                            <?php if ($square_feet) : ?>
                                <div style="text-align: center;">
                                    <div style="font-size: 1.5rem;">📐</div>
                                    <div style="font-weight: 600;"><?php echo number_format($square_feet); ?></div>
                                    <div style="color: #6b7280; font-size: 0.9rem;">Sq Ft</div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div style="background: #f9fafb; padding: 2rem; border-radius: 10px;">
                        <?php $price = get_post_meta(get_the_ID(), 'price', true); ?>
                        <?php if ($price) : ?>
                            <div style="font-size: 2rem; font-weight: 700; color: #2563eb; margin-bottom: 1rem;">
                                <?php echo format_price($price); ?>
                            </div>
                        <?php endif; ?>
                        
                        <button style="width: 100%; background: #2563eb; color: white; border: none; padding: 1rem; border-radius: 5px; font-weight: 600; margin-bottom: 1rem; cursor: pointer;">
                            Contact Agent
                        </button>
                        
                        <button style="width: 100%; background: white; color: #2563eb; border: 2px solid #2563eb; padding: 1rem; border-radius: 5px; font-weight: 600; cursor: pointer;">
                            Schedule Tour
                        </button>
                    </div>
                </div>
                
                <div style="background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                    <h2 style="font-size: 1.5rem; margin-bottom: 1rem; color: #333;">Description</h2>
                    <div style="line-height: 1.6; color: #555;">
                        <?php the_content(); ?>
                    </div>
                </div>
                
            </div>
        </div>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
