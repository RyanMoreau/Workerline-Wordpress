<?php
/**
    * The header for our theme
    * This is the template that displays all of the <head> section and everything up until <div id="content">
    * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="margin-bottom-10">
    <div class="container header-navigation">
        <div class="header-logo col-md-2">
            <a class="logo-wrapper" href="/" title="Return Home">
                <img src="/wp-content/uploads/2020/07/logo.png" src="Unifor Logo"/>
            </a>
        </div>
        <div class="header-navigation-burger col-md-10 col-md-hidden">
        <svg class="inline-svg js-menu" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        width="320px" height="220.5px" viewBox="0 0 32 22.5" enable-background="new 0 0 32 22.5" xml:space="preserve">
        <title>Mobile Menu</title>
            <g class="svg-menu-toggle">
                <path class="bar" d="M20.945,8.75c0,0.69-0.5,1.25-1.117,1.25H3.141c-0.617,0-1.118-0.56-1.118-1.25l0,0
                c0-0.69,0.5-1.25,1.118-1.25h16.688C20.445,7.5,20.945,8.06,20.945,8.75L20.945,8.75z">
                </path>
                <path class="bar" d="M20.923,15c0,0.689-0.501,1.25-1.118,1.25H3.118C2.5,16.25,2,15.689,2,15l0,0c0-0.689,0.5-1.25,1.118-1.25 h16.687C20.422,13.75,20.923,14.311,20.923,15L20.923,15z">
                </path>
                <path class="bar" d="M20.969,21.25c0,0.689-0.5,1.25-1.117,1.25H3.164c-0.617,0-1.118-0.561-1.118-1.25l0,0
                c0-0.689,0.5-1.25,1.118-1.25h16.688C20.469,20,20.969,20.561,20.969,21.25L20.969,21.25z">
                </path>
                <!-- needs to be here as a 'hit area' -->
                <rect width="50" height="50" fill="none">
                </rect>
            </g>
        </svg>
        </div>
        <div class="header-navigation-list col-md-10">
            <?php
            wp_nav_menu( array(
                'menu'           => 'Header',
                'theme_location' => 'header',
                'fallback_cb'    => true,
                'container'      => 'nav',
            ) );
            ?>
        </div>
    </div>
</header>
