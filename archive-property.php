<?php get_header(); ?>

<main class="main-content" style="padding-top: 100px;">
    <div class="container">
        <div style="text-align: center; padding: 2rem 0;">
            <h1 style="font-size: 2.5rem; margin-bottom: 1rem;">All Properties</h1>
            <p style="color: #6b7280; font-size: 1.1rem;">Browse our complete collection of available properties</p>
        </div>
        
        <div class="properties-grid" style="padding-bottom: 3rem;">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/property-card'); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <p style="text-align: center; grid-column: 1 / -1; padding: 2rem;">No properties found.</p>
            <?php endif; ?>
        </div>
        
        <?php
        // Pagination
        the_posts_pagination(array(
            'mid_size' => 2,
            'prev_text' => __('← Previous'),
            'next_text' => __('Next →'),
        ));
        ?>
    </div>
</main>

<?php get_footer(); ?>
