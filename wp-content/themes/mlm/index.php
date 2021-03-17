<?php get_header(); ?>

	<!-- CONTENT -->
	<!-- #1 Main Block -->
	<!-- #2 Video Block -->
	<!-- #3 What We Can Block -->
	<!-- #4 Info x 3 Block -->
	<!-- #5 TrustPilot Block -->
	<!-- #6 Info + Button Block -->
	<!-- #7 Need Help Block -->
	<!-- #8 Advantages Block -->
	<!-- #9 Consultation Form Block -->
	<!-- #10 Real Results Block -->
	<!-- #11 FAQ Block -->
	<!-- #12 Contact Us Block -->

	<!-- #1 Main Block -->
	<div class="page">
		<div class="page__consultation consultation">
			<div class="consultation__container container">
				<div class="consultation__body">
					<div class="consultation__subtitle">STRUGGLING WITH BUSINESS DEBT?</div>
					<div class="consultation__title">Stop Merchant Cash Lenders From Crippling Your Company’s Cash
						Flow.
					</div>
					<div class="consultation__text">We may be able to reduce your payments by up to 70% with our
						business debt relief program.
					</div>
					<a class="consultation__button btn icon-next-arrow link-popup" href="#consultation">GET A FREE
						CONSULTATION NOW
						<div class="btn__blobs">
							<div></div>
							<div></div>
							<div></div>
						</div>
					</a></div>
			</div>
		</div>
	</div>

	<!-- #2 Video Block -->
	<?php
	$posts = get_posts(array(
	    'numberposts' => 1,
	    'post_type' => 'video',
	));

	foreach ($posts as $post) {
	    setup_postdata($post);
	    ?>

		<div class="page__video video">
			<div class="video__container container"><a class="video__body link-popup"
			                                           data-video="<?= the_field('video_url') ?>"
			                                           href="#video">
					<div class="video__img ibg"><img src="<?= the_field('thumbnail') ?>"></div>
					<div class="video__play play-video">
						<div class="play-video__icon icon-play"></div>
						<div class="play-video__info">
							<div class="play-video__text">Watch video</div>
							<div class="play-video__time"><?= the_field('duration') ?></div>
						</div>
					</div>
				</a></div>
		</div>
		<div class="page__"></div>

	    <?php
	}

	wp_reset_postdata();
	?>

	<!-- #3 What We Can Block -->
	<div class="page__help help">
		<div class="help__container container container_sm">
			<div class="help__header header-title">
				<div class="header-title__subtitle">What we can</div>
				<div class="header-title__title">Let Business Debt Adjusters Help You</div>
			</div>
			<div class="help__body body-help">
				<div class="body-help__item">
					<div class="body-help__icon"><img
								src="<?php bloginfo('template_url'); ?>/assets/img/icons/check-mark.svg"></div>
					<div class="body-help__text">Reduce daily collection calls</div>
				</div>
				<div class="body-help__item">
					<div class="body-help__icon"><img
								src="<?php bloginfo('template_url'); ?>/assets/img/icons/check-mark.svg"></div>
					<div class="body-help__text">Consolidate payments to one company instead of many</div>
				</div>
				<div class="body-help__item">
					<div class="body-help__icon"><img
								src="<?php bloginfo('template_url'); ?>/assets/img/icons/check-mark.svg"></div>
					<div class="body-help__text">Negotiate a lower fixed monthly payment</div>
				</div>
				<div class="body-help__item">
					<div class="body-help__icon"><img
								src="<?php bloginfo('template_url'); ?>/assets/img/icons/check-mark.svg"></div>
					<div class="body-help__text">Secure a traditional bank loan or line of credit</div>
				</div>
				<div class="body-help__item">
					<div class="body-help__icon"><img
								src="<?php bloginfo('template_url'); ?>/assets/img/icons/check-mark.svg"></div>
					<div class="body-help__text">Improve and manage your cash flow</div>
				</div>
				<div class="body-help__item">
					<div class="body-help__icon"><img
								src="<?php bloginfo('template_url'); ?>/assets/img/icons/check-mark.svg"></div>
					<div class="body-help__text">Get your business get out of hardship once and for all</div>
				</div>
			</div>
			<div class="help__footer footer-help">
				<div class="footer-help__text">We provide confidential and customized business debt relief. We’ve
					settled millions of dollars for our clients and we’re ready to fight for your business too.
				</div>
			</div>
		</div>
	</div>

	<!-- #4 Info Block -->
	<div class="page__info info">
		<div class="info__container container">
			<div class="info__row">
				<div class="info__column">
					<div class="info__item"><span class="info__icon info__icon_1"><img
									src="<?php bloginfo('template_url'); ?>/assets/img/icons/info-icon-1.svg"></span>
						<div class="info__count">01</div>
						<div class="info__title">Fast Business Debt Relief</div>
						<div class="info__text">Our services provide instant relief. We work with you and your merchant
							cash lender to lower your payment obligations. Your business will see immediate increases in
							cash flow.
						</div>
					</div>
				</div>
				<div class="info__column info__column_blue">
					<div class="info__item"><span class="info__icon info__icon_2"><img
									src="<?php bloginfo('template_url'); ?>/assets/img/icons/info-icon-2.svg"></span>
						<div class="info__count">02</div>
						<div class="info__title">Expanded Terms</div>
						<div class="info__text">We renegotiate the payment terms and can often arrange for MONTHLY
							payments, instead of burdensome daily drafts.
						</div>
					</div>
				</div>
				<div class="info__column">
					<div class="info__item"><span class="info__icon info__icon_3"><img
									src="<?php bloginfo('template_url'); ?>/assets/img/icons/info-icon-3.svg"></span>
						<div class="info__count">03</div>
						<div class="info__title">Alternative to Bankruptcy</div>
						<div class="info__text">We are the last alternative to bankruptcy for many struggling
							businesses. Let us save your livelihood.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- #5 TrustPilot Block -->
	<div class="page__slider main-slider">
		<div class="main-slider__container container container_sm">
			<div class="main-slider__header header-title">
				<div class="header-title__subtitle">real stories</div>
			</div>
			<div>
<!--				<div class="trustpilot-widget" data-locale="en-US" data-template-id="53aa8912dec7e10d38f59f36"-->
<!--				     data-businessunit-id="5c9d46b4a68c2c00019df740" data-style-height="130px" data-style-width="100%"-->
<!--				     data-theme="light" data-stars="4,5" style="position: relative;">-->
<!--					<iframe frameborder="0" scrolling="no" title="Customer reviews powered by Trustpilot" loading="auto"-->
<!--					        src="https://widget.trustpilot.com/trustboxes/53aa8912dec7e10d38f59f36/index.html?templateId=53aa8912dec7e10d38f59f36&amp;businessunitId=5c9d46b4a68c2c00019df740#locale=en-US&amp;styleHeight=130px&amp;styleWidth=100%25&amp;theme=light&amp;stars=4%2C5"-->
<!--					        style="position: relative; height: 130px; width: 100%; border-style: none; display: block; overflow: hidden;"></iframe>-->
<!--				</div>-->
                <?= do_shortcode('[trustindex no-registration=trustpilot]') ?>
			</div>
		</div>
	</div>

	<!-- #6 Info + Button Block -->
	<div class="page__dark-block dark-block">
		<div class="dark-block__container container">
			<div class="dark-block__row">
				<div class="dark-block__column">
					<div class="dark-block__info">
						<div class="dark-block__title">Merchant Cash Advances Can Ruin Your Business</div>
						<div class="dark-block__text"><p>Merchant Advances may seem like a good idea when your
								business is in a cash crunch, but in the long run, it can actually destroy your
								business. Advances typically have high interest rates, outrageous fees, and fixed daily
								payments that starve your business of its much needed cash flow. Oftentimes leaving you
								with no choice, but to take out more cash advances to pay for the first one.</p>
							<p>This is the cash advance trap! Stop stacking your cash advances. Let us help you get
								out of the endless debt cycle before your advances force your business to go
								bankrupt.</p></div>
						<a class="dark-block__button btn icon-next-arrow link-popup" href="#consultation">GET A FREE
							CONSULTATION NOW
							<div class="btn__blobs">
								<div></div>
								<div></div>
								<div></div>
							</div>
						</a></div>
				</div>
				<div class="dark-block__column">
					<div class="dark-block__image"><img
								src="<?php bloginfo('template_url'); ?>/assets/img/picture/dark-block.jpg"></div>
				</div>
			</div>
		</div>
	</div>

	<!-- #7 Need Help Block -->
<?php
$posts = get_posts(array(
    'numberposts' => 1,
    'post_type' => 'contact',
));

foreach ($posts as $post) {
    setup_postdata($post);
    ?>

	<div class="page__help help">
		<div class="help__container container container_sm">
			<div class="help__header header-title">
				<div class="header-title__subtitle">Need help?</div>
				<div class="header-title__title">If Your Business Is Experiencing Any Of These Things, Call Business
					Debt Adjusters Today! <a href="tel:<?= the_field('phone_number') ?>">Toll
						Free <?= the_field('phone_number') ?></a></div>
			</div>
			<div class="help__body body-help">
				<div class="body-help__item">
					<div class="body-help__icon icon-question"></div>
					<div class="body-help__text">Daily collection calls?</div>
				</div>
				<div class="body-help__item">
					<div class="body-help__icon icon-question"></div>
					<div class="body-help__text">Falling behind on equipment lease payments?</div>
				</div>
				<div class="body-help__item">
					<div class="body-help__icon icon-question"></div>
					<div class="body-help__text">Falling behind on a mortgage or car payments?</div>
				</div>
				<div class="body-help__item">
					<div class="body-help__icon icon-question"></div>
					<div class="body-help__text">Using personal assets to secure an advance for your business?</div>
				</div>
				<div class="body-help__item">
					<div class="body-help__icon icon-question"></div>
					<div class="body-help__text">Failure to meet crucial payroll obligations?</div>
				</div>
				<div class="body-help__item">
					<div class="body-help__icon icon-question"></div>
					<div class="body-help__text">Personal and or business bank accounts in the red?</div>
				</div>
			</div>
		</div>
	</div>

    <?php
}
?>

	<!-- #8 Advantages Block -->
	<div class="page__advantages advantages">
		<div class="advantages__container container container_sm">
			<div class="header-title">
				<div class="header-title__subtitle">advantages</div>
				<div class="header-title__title">Benefits Of Our Business Debt Relief Program</div>
			</div>
		</div>
		<div class="advantages__info info">
			<div class="info__container container">
				<div class="info__row">
					<div class="info__column">
						<div class="info__item"><span class="info__icon info__icon_1"><img
										src="<?php bloginfo('template_url'); ?>/assets/img/icons/info-icon-4.svg"></span>
							<div class="info__count">01</div>
							<div class="info__title">Fewer Collection Calls</div>
							<div class="info__text">Hiding from the endless phone calls doesn’t work. We immediately let
								your lenders know we are representing you. All further contact is addressed to us,
								eliminating constant harassment from collectors and giving you much needed peace of
								mind.
							</div>
						</div>
					</div>
					<div class="info__column info__column_blue">
						<div class="info__item"><span class="info__icon info__icon_2"><img
										src="<?php bloginfo('template_url'); ?>/assets/img/icons/info-icon-5.svg"></span>
							<div class="info__count">02</div>
							<div class="info__title">Custom-Tailored Programs</div>
							<div class="info__text">We know that every company has a unique financial situation.
								Therefore, successful business debt settlements require customized programs. We have
								experience with the nation’s largest lenders. We execute the best strategies to create
								reduced payment plans or settle your debts for a reduced principal balance.
							</div>
						</div>
					</div>
					<div class="info__column">
						<div class="info__item"><span class="info__icon info__icon_3"><img
										src="<?php bloginfo('template_url'); ?>/assets/img/icons/info-icon-6.svg"></span>
							<div class="info__count">03</div>
							<div class="info__title">Reduced Flexible Payments</div>
							<div class="info__text">Cash flow is the lifeblood of your business. We can often settle for
								half of what you owe now, and extend your payments terms, saving you thousands of
								dollars. Of course, we can’t predict the exact amount we can reduce your business debt,
								but take a look at some of our real results below.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- #9 Consultation Form Block -->
	<div class="page__dark-block dark-block dark-block_form">
		<div class="dark-block__container container">
			<div class="dark-block__row">
				<div class="dark-block__column">
					<div class="dark-block__info">
						<div class="dark-block__title">Don’t Let Merchant Cash Lenders Threaten Your Livelihood.
						</div>
					</div>
				</div>
				<div class="dark-block__column">
					<form class="dark-block__form form">
						<div class="form__header header-form">
							<div class="header-form__title">Get A Free Consultation Now</div>
						</div>
						<div class="form__body">
							<div class="form__column"><label class="form__label">
									<div class="form__text">Full name</div>
									<input class="form__input input" id="landing_full_name" placeholder="Enter here">
									<div class="form__border"></div>
								</label><label class="form__label">
									<div class="form__text">Phone number</div>
									<input class="form__input input" id="landing_phone_number" placeholder="Enter here"
									       type="number">
									<div class="form__border"></div>
								</label></div>
							<div class="form__column"><label class="form__label">
									<div class="form__text">Email</div>
									<input class="form__input input" type="email" id="landing_email"
									       placeholder="Enter here">
									<div class="form__border"></div>
								</label><label class="form__label">
									<div class="form__text">Message</div>
									<textarea class="form__input input" id="landing_message" cols="30"
									          placeholder="What me do?"
									          rows="10"></textarea>
									<div class="form__border"></div>
								</label></div>
						</div>
						<div class="form__footer">
							<button class="form__button" id="landing-consult-btn" disabled="disabled">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- #10 Real Results Block -->
	<div class="page__results results-block">
		<div class="results-block__container container container_sm">
			<div class="header-title">
				<div class="header-title__subtitle">REAL RESULTS</div>
				<div class="header-title__title">Real Debt Settlement Stories</div>
			</div>
			<div class="results-block__row">
                <?php
                $posts = get_posts(array(
                    'numberposts' => 4,
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'post_type' => 'results',
                ));

                $n = 1;
                foreach ($posts as $post) {
                    setup_postdata($post);
                    // формат вывода the_title() ...
                    $debt = get_field('total_debt');
                    $paid = get_field('paid');
                    $saved = round((1 - $paid / $debt) * 100);
                    ?>

					<a class="results-block__column link-popup" data-slide="<?= $n ?>" href="#slider">
						<div class="results-block__column-wrapper <?php if ($n++ % 2 == 1): ?>results-block__column-wrapper_blue<?php endif; ?>">
							<div class="results-block__header">
								<div class="results-block__title icon-next-arrow">Documented</div>
							</div>
							<div class="results-block__body">
								<div class="results-block__total">Total Debt
									$<?= number_format($debt, 0, ".", ",") ?></div>
								<div class="results-block__paid">Paid $<?= number_format($paid, 0, ".", ",") ?></div>
							</div>
							<div class="results-block__footer">
								<div class="results-block__saved">Saved</div>
								<div class="results-block__percent"><?= $saved ?>%</div>
							</div>
						</div>
					</a>

                    <?php
                }

                wp_reset_postdata();
                ?>
			</div>
		</div>
	</div>

	<!-- #11 FAQ Block -->
	<div class="page__asked-questions asked-questions">
		<div class="asked-questions__container container container_sm">
			<div class="header-title">
				<div class="header-title__subtitle">LEARN MORE</div>
				<div class="header-title__title">Frequently Asked Questions</div>
			</div>
			<div class="asked-questions__content spollers one">
                <?php
                $posts = get_posts(array(
                    'numberposts' => 6,
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'post_type' => 'questions',
                ));

                $active = true;
                foreach ($posts as $post) {
                    setup_postdata($post);
                    ?>

					<div class="asked-questions__item">
						<div class="asked-questions__title spoller <?php echo $active ? 'active' : '' ?>"><?= the_field('question') ?>
							<span></span></div>
						<div class="asked-questions__body">
							<div class="asked-questions__text">
                                <?= the_field('answer') ?>
							</div>
							<a class="asked-questions__button link-popup icon-next-arrow btn" href="#ask">Ask question
								<div class="btn__blobs">
									<div></div>
									<div></div>
									<div></div>
								</div>
							</a></div>
					</div>

                    <?php
                    $active = false;
                }

                wp_reset_postdata();
                ?>
			</div>
		</div>
	</div>

	<!-- #12 Contact Us Block -->
<?php
$posts = get_posts(array(
    'numberposts' => 1,
    'post_type' => 'contact',
));

foreach ($posts as $post) {
    setup_postdata($post);
    // формат вывода the_title() ...
    ?>

	<div class="page__contact contact-block">
		<div class="contact-block__container container container_sm">
			<div class="contact-block__title">Contact Us</div>
			<div class="contact-block__row">
				<div class="contact-block__column">
					<div class="map-contact"
					     style="background:url(<?= the_field('map') ?>) no-repeat center center;background-size:cover"></div>
				</div>
				<div class="contact-block__column">
					<div class="info-contact">
						<div class="info-contact__item">
							<div class="info-contact__title">E-mail:</div>
							<div class="info-contact__info"><?= the_field('email') ?></div>
						</div>
						<div class="info-contact__item">
							<div class="info-contact__title">Phone number:</div>
							<a class="info-contact__info"
							   href="tel:<?= the_field('phone_number') ?>"><?= the_field('phone_number') ?></a></div>
						<div class="info-contact__item">
							<div class="info-contact__title">Fax:</div>
							<div class="info-contact__info"><?= the_field('fax') ?></div>
						</div>
						<div class="info-contact__item">
							<div class="info-contact__title">Address:</div>
							<div class="info-contact__info"><?= the_field('address') ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

    <?php
}

wp_reset_postdata();
?>

<?php get_footer(); ?>