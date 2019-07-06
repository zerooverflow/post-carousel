<div id="<?php echo $carousel_ID ; ?>" class="post-carousel owl-carousel owl-theme <?php echo $classes; ?>">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <div class="item item-<?php echo $the_query->current_post; ?>">
            <?php 
            if (has_post_thumbnail()) { the_post_thumbnail(); }
             the_title();
             the_excerpt(); 
            ?>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
</div>
