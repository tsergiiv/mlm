<!doctype html>
<html <?php language_attributes(); ?>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('title'); ?></title>
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon"/>
    <?php wp_head(); ?>
</head>

<body class="pre">
<main id="scroll">
	<section class="top-section
		<?= is_page('Packages') ? 'packages-section' : '' ?>
		<?= is_page('Package') ? 'package-section' : '' ?>
		<?= is_page('About') ? 'invest-section' : '' ?>
		" data-section-name="<?= is_page('About') ? 'invest-section' : 'top-section' ?>">
		<header>
			<div class="container">
				<div class="logo">
					<?php if (!is_home()): ?><a href="<?= get_bloginfo("url"); ?>"><?php endif; ?>
						<img alt="UNEED PARTNERS GROUP" src="<?php bloginfo('template_url'); ?>/assets/img/logo.svg">
                    <?php if (!is_home()): ?></a><?php endif; ?>
				</div>
				<div class="nav-menu">
					<ul>
						<li>
							<a href="<?= get_bloginfo("url"); ?>/packages" class="link-default">Пакеты</a>
						</li>
						<li>
							<a href="<?= get_bloginfo("url"); ?>/about" class="link-default">Про компанию</a>
						</li>
						<li>
							<a href="<?= get_bloginfo("url"); ?>/contact-us" class="link-default">Контакты</a>
						</li>
						<li>
							<a href="<?= get_bloginfo("url"); ?>/blog" class="link-default">Блог</a>
						</li>
					</ul>
					<a href="<?= get_bloginfo("url"); ?>/packages" target="_blank" class="link-arrow flex">
						<span>Заказать пакет</span> <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/link-arrow.svg">
					</a>
					<div class="nav-botrow">
						<div class="phone">
							<span>Номер для консультации</span>
							<a href="tel:380939412123" class="bebas-bold">380939412123</a>
						</div>
						<div class="flex">
							<ul>
								<li>
									<a href="#" class="link-default">Instagram</a>
								</li>
								<li>
									<a href="#" class="link-default">Linkedin</a>
								</li>
								<li>
									<a href="#" class="link-default">Facebook</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="header-sign flex">
					<div class="account-empty">
						<a href="<?= get_option("site_url"); ?>/registration" class="link-default flex">
							<img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/profile.svg">
							Регистрация
						</a>
						<a href="<?= get_option("site_url"); ?>" class="btn-default">
							Войти
						</a>
					</div>
					<div class="account-logged d-none">
						<div class="text-right ml-auto">
							<div class="name">
								Oliver Smith
							</div>
							<div class="status">
								Партнёр
							</div>
						</div>
						<div class="avatar">
							<div class="form">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/default-avatar.png" alt="avatar" id="avatar">
							</div>
						</div>
					</div>
					<div class="nav-btn">
						<div></div>
					</div>
				</div>
			</div>
		</header>
