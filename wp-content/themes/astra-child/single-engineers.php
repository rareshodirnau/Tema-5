<?php get_header(); ?>

<?php if (have_posts()) {
        while (have_posts()) {
        the_post(); 
?>
        <div class="wpr-post">

            <!-- ACF profile image field --> 
            <!-- <?php
            $image = get_field('profile_image');
            if (!empty($image)): ?>
                        <img class="wpr-image" src="<?php echo esc_url(
                            $image['url']
                        ); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            <?php endif;?> -->

            <!-- Engineer Post Thumbnail --> 
            <?php
                    if (has_post_thumbnail()) {
                    $image_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                    echo '<img src="' . $image_src[0] . '" alt=""  />';
                    }
            ?>
            <div class="wpr-desc">
                <?php
                echo '<h1 class="wpr-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h1>';
                ?>
                <div class="wpr-bio">
                    <p>Bio: <?php echo the_content(); ?></p>
                    <?php
                        $birthDate = get_field('date_of_birth');
                        $birthDate = explode("/", $birthDate);
                        $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                            ? ((date("Y") - $birthDate[2]))
                            : (date("Y") - $birthDate[2])); ?>
                    <?php echo '<p>Age: ' . $age .  '</p>'; ?>
                    <?php
                    $featured_posts = get_field('software');
                    if( $featured_posts ): ?>
                        <ul>
                        <?php foreach( $featured_posts as $post ): 
                            setup_postdata($post); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                        <?php 
                        wp_reset_postdata(); 
                        ?>
                        <?php endif; ?>
                </div>
            </div>
        </div>    
<?php
    }
} ?>


<?php get_footer(); ?>
