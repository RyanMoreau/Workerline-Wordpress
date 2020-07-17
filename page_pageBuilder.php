<?php /* Template Name: Pagebuilder */
get_template_part( 'partials/header' ); ?>

<main>
    <div class="container pb-content">
        <h1><?php echo get_the_title() ?></h1>
        <?php get_template_part( 'partials/loop' ); ?>
    </div>
</main>

<?php get_template_part( 'partials/footer' ); 