<!doctype html>
<html <?php language_attributes(); ?>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo get_bloginfo('name'); ?></title>
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon">
    <?php wp_head(); ?>
</head>

<body>
    <div class="wrapper">
	    <header>
		    <div class="left-header"><a href="<?php echo get_option('main_domain'); ?>"><img alt="logo" class="logo" src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg"></a>
			    <div id="nav-items">
				    <a class="nav-item waves-effect waves-light" href="<?php echo get_option('main_domain'); ?>/designIdeas">
					    <span class="sidebar-title">Design ideas</span>
				    </a>
				    <a class="nav-item waves-effect waves-light" href="<?php echo get_option('main_domain'); ?>/designersAndArch">
					    <span class="sidebar-title">Designers & Arch</span>
				    </a>
				    <a class="nav-item waves-effect waves-light" href="<?php echo get_option('main_domain'); ?>/shop">
					    <span class="sidebar-title">Shopping</span>
				    </a>
			    </div>
		    </div>
		    <div class="right-header">
			    <div class="action-header__column"><a class="action-header__link signin" href="#">Sign in</a></div>
			    <div class="action-header__column"><a class="action-header__link signup" href="#">Sign up</a></div>
		    </div>
	    </header>