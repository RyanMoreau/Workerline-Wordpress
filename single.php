<?php
    get_template_part( 'partials/header' ); 
?>  

<div class="container">
    <div class="row">
        <div class="col-md-12">
        <?php
            while ( have_posts() ) : the_post();?>
                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <a href="<?php the_permalink(); ?>" title="Select the image to read more" style="background-image: url('<?php echo $image[0]; ?>')" class="featured-image-post">&nbsp;</a>
                <?php endif; ?>                        
                <h1><?php echo the_title(); ?></h1>
                <p class="subheader"><?php echo get_the_date(); ?></p>
                <div>
                    <?php echo the_content(); ?>
                </div>
                <hr />
                <?php        
                // Previous/next post navigation.
                the_post_navigation( array(
                    'next_text' => '<span class="btn orange filled">%title ></span>',
                    'prev_text' => '<span class="btn orange filled">< %title</span>',
                ) );

            endwhile;
            ?>
        </div>
    </div>
</div>
<?php
get_template_part( 'partials/footer' ); 