<?php get_template_part( 'partials/header' );  
/* Template Name: Tutorials Archive. */
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
                        'post_type' => 'tutorial',
                        'posts_per_page' => 2,
                        'paged' => $paged,
                    ) );
                ?>
            <div class="row eq-height">
                <?php if ( $query->have_posts() ) : ?>

                <div class="col-md-4 post-sidebar">
                <h6>Videos on this page</h6>
                <ul>
                    <?php while ( $query->have_posts() ) : $query->the_post(); 
                        $linkTitle = str_replace(' ', '-', strtolower(get_the_title()));
                        $link = preg_replace('/[^a-z]+/i', '_', $linkTitle); 
                        $listHeading   = get_post_meta( get_the_ID(), 'sub_heading', true);
                    ?>

                    <li><a href="#<?php echo $link ?>" title="Read This Post"><?php echo $listHeading; ?></a></li>
                    <?php endwhile; ?>
                </div>
                </ul>
                <div class="col-md-8 post-content">
                    <?php while ( $query->have_posts() ) : $query->the_post(); 
                        $subheading   = get_post_meta( get_the_ID(), 'sub_heading', true);
                        $youTube      = get_post_meta( get_the_ID(), 'youtube_link', true);
                        $postText     = get_post_meta( get_the_ID(), 'your_text', true);
                        $anchorTitle  = str_replace(' ', '-', strtolower($subheading));
                        $anchor       = preg_replace('/[^a-z]+/i', '_', $anchorTitle);    

                    ?>
                        <div id="<?php echo $anchor ?>">
                            <h3 class="subheader"><?php echo $subheading ?></h3>
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $youTube ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <p><?php echo $postText ?></p>
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