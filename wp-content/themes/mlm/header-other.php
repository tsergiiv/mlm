<!doctype html>
<html <?php language_attributes(); ?>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('title'); ?></title>
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon"/>
    <?php wp_head(); ?>
</head>

<body>
<div class="wrapper">
    <header class="header">
        <div class="header__container container">
            <a class="header__logo" href="<?= get_bloginfo("url"); ?>">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg">
                <span>Business Dept Adjuster</span>
            </a>
            <nav class="header__menu menu menu__pages">
                <div class="menu__body">
                    <ul class="menu__list">
                        <li><a class="menu__link _goto-block" href="<?= get_bloginfo("url"); ?>"><span>01</span>About Us</a></li>
                        <li><a class="menu__link _goto-block" href="<?= get_bloginfo("url"); ?>"><span>02</span>Benefits</a></li>
                        <li><a class="menu__link _goto-block" href="<?= get_bloginfo("url"); ?>"><span>03</span>Real results</a></li>
                        <li><a class="menu__link _goto-block" href="<?= get_bloginfo("url"); ?>"><span>04</span>FAQs</a></li>
                        <li><a class="menu__link _goto-block" href="<?= get_bloginfo("url"); ?>"><span>05</span>Contact Us</a></li>
                    </ul>
                </div>
            </nav>
            <div class="header__action action-header">
                <?php wp_nav_menu([
                    'menu'         => 'Social Networks',
                    'menu_class'   => 'action-header__list',
                    'add_li_class' => 'action-header__link'
                ]); ?>
            </div>
            <div class="icon-menu">
                <div class="icon-menu__body"><span></span><span></span><span></span></div>
            </div>
        </div>
    </header>
