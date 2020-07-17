<?php get_template_part( 'partials/header' );  
/* Template Name: Advocates Archive. */
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
                        'post_type' => 'advocate',
                        'posts_per_page' => 1,
                        'paged' => $paged,
                    ) );
                ?>
            <div class="row eq-height">
                <?php if ( $query->have_posts() ) : ?>

                <div class="col-md-4 post-sidebar">
                <h6>Listed Advocates</h6>
                <ul>
                    <?php while ( $query->have_posts() ) : $query->the_post(); 
                        $linkTitle = str_replace(' ', '-', strtolower(get_the_title()));
                        $listHeading   = get_post_meta( get_the_ID(), 'advocate_name', true);
                    ?>

                    <li><a href="#<?php echo $linkTitle ?>" title="Read This Post"><?php echo $listHeading; ?></a></li>
                    <?php endwhile; ?>
                </div>
                </ul>
                <div class="col-md-8 post-content">
                    <?php while ( $query->have_posts() ) : $query->the_post(); 
                        $screenshot           = get_post_meta( get_the_ID(), 'advocate_screenshot.guid', true);
                        $advocateName         = get_post_meta( get_the_ID(), 'advocate_name', true);
                        $advocateLocation     = get_post_meta( get_the_ID(), 'advocate_location', true);
                        $advocateDescription  = get_post_meta( get_the_ID(), 'advocate_description', true);
                        $advocateLink         = get_post_meta( get_the_ID(), 'advocate_description', true);
                        $anchorTitle          = str_replace(' ', '-', strtolower($advocateName));
                        $anchor               = preg_replace('/[^a-z]+/i', '_', $anchorTitle);   
                    ?>
                        <div id="<?php echo $anchor ?>">
                            <div class="advoctate-right">
                                <h5><?php echo $advocateName ?></h5>
                                <p class="subheader"><?php echo $advocateLocation ?></p>
                                <div class="advoctate-left" style="background-image:url(<?php echo $screenshot; ?>)"></div>
                                <p><?php echo $advocateDescription; ?></p>
                                <p><a href="<?php echo $advocateLink; ?>" class="btn orange filled" title="Visit <?php echo $advocateName; ?>">Visit</a></p>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

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