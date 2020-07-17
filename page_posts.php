<?php get_template_part( 'partials/header' ); 
/* Template Name: Posts Page */
?>  

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo the_title() ?></h1>
                <?php get_template_part( 'partials/loop' ); ?>
                <hr />
            </div>
        </div>
    </div>
    <div class="container">
            <!-- query -->
                <?php
                    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                    $query = new WP_Query( array(
                        'category_name' => 'blog',
                        'posts_per_page' => 10,
                        'paged' => $paged
                    ) );
                ?>
            <div class="row eq-height">
                <?php if ( $query->have_posts() ) : ?>

                <!-- Blog Structure-->
                    <div class="col-md-4 post-sidebar">
                    <h6>Posts on this page</h6>
                    <ul>
                        <?php while ( $query->have_posts() ) : $query->the_post(); 
                            $linkTitle  = str_replace(' ', '-', strtolower(get_the_title()));
                            $link       = preg_replace('/[^a-z]+/i', '_', $linkTitle); 
                        ?>
                        <li><a href="#<?php echo $link ?>" title="Read This Post"><?php the_title(); ?></a></li>
                        <?php endwhile; ?>
                    </div>
                    </ul>
                    <div class="col-md-8 post-content">
                        <?php while ( $query->have_posts() ) : $query->the_post(); 
                            $anchorTitle    = str_replace(' ', '-', strtolower(get_the_title()));
                            $anchor         = preg_replace('/[^a-z]+/i', '_', $anchorTitle);    
                            $blogLink       = get_permalink( get_the_ID() );     
                        ?>
                            <div id="<?php echo $anchor ?>">
                                <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                    <a href="<?php the_permalink(); ?>" title="Select the image to read more" style="background-image: url('<?php echo $image[0]; ?>')" class="featured-image-post">&nbsp;</a>
                                <?php endif; ?>                        
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_excerpt(); ?></p>
                                <p><a href="<?php echo $blogLink; ?>" class="btn purple ghost">Read More</a></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <!-- End Blog Structure -->
                <div class="pagination col-md-12">
                    <?php 
                        echo paginate_links( array(
                            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                            'total'        => $query->max_num_pages,
                            'current'      => max( 1, get_query_var( 'paged' ) ),
                            'format'       => '?paged=%#%',
                            'show_all'     => false,
                            'type'         => 'plain',
                            'end_size'     => 2,
                            'mid_size'     => 1,
                            'prev_next'    => true,
                            'prev_text'    => sprintf( '<i></i> %1$s', __( '<', 'text-domain' ) ),
                            'next_text'    => sprintf( '%1$s <i></i>', __( '>', 'text-domain' ) ),
                            'add_args'     => false,
                            'add_fragment' => '',
                        ) );
                    ?>
                </div>


            <?php wp_reset_postdata(); ?>

            <?php else : ?>
                <div class="col-md-8">
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
get_template_part( 'partials/footer' ); 