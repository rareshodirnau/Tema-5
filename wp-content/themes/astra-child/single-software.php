<?php get_header(); ?>

<?php if (have_posts()) {
        while (have_posts()) {
        the_post(); 
?>
        <div class="wpr-post">
                <?php
                echo '<h1 class="wpr-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h1>';
                ?>
            <div class="wpr-desc">
                <div class="wpr-bio">
                    <p>Description: <?php echo the_content(); ?></p>
                    <p>License validity: <?php echo get_field('license_validity'); ?> Days</p>
                    <p><?php echo get_field('price'); ?> EUR</p>
                </div>
            </div>
        </div>    
<?php
    }
} ?>


<?php get_footer(); ?>