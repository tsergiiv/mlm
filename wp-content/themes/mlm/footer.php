	</div>
	<div class="popup popup_video">
		<div class="popup__body">
			<div class="header-popup">
				<div class="header-popup__title">Presentation</div>
				<div class="popup__close">
					<div class="icon-close"></div>
				</div>
			</div>
			<div class="popup__content popup__content_video">
				<div class="popup__video _video"></div>
			</div>
		</div>
	</div>
	<div class="popup popup_consultation popup_popup-consultation">
		<div class="popup__body">
			<div class="popup__content">
				<div class="popup__close">
					<div class="icon-close"></div>
				</div>
				<form class="popup__form form">
					<input type="text" name="action" value="<?= admin_url('admin-ajax.php?action=send_mail') ?>" hidden>
					<div class="form__header header-form">
						<div class="header-form__title">Get A Free Consultation</div>
						<div class="header-form__text">Fill out this simple form and get an absolutely free
							consultation
						</div>
					</div>
					<div class="form__body">
						<div class="form__column"><label class="form__label">
								<div class="form__text">First name</div>
								<input class="form__input input" id="consult_first_name" placeholder="Enter here">
								<div class="form__border"></div>
							</label><label class="form__label">
								<div class="form__text">Email</div>
								<input class="form__input input" type="email" id="consult_email" placeholder="Enter here">
								<div class="form__border"></div>
							</label><label class="form__label">
								<div class="form__text">Business name</div>
								<input class="form__input input" id="consult_business_name" placeholder="Enter here">
								<div class="form__border"></div>
							</label>
							<div class="form__label select">
								<div class="select__text">Number of creditors</div>
								<input readonly class="select__button" autocomplete="chrome-off" id="consult_creditors" placeholder="Choose">
								<div class="form__border icon-next-arrow"></div>
								<div class="select__option">
									<div class="select__search search"><input class="search__input">
										<div class="form__border"></div>
									</div>
									<div class="select__choose">
										<div class="select__item" data-place="1">1</div>
										<div class="select__item" data-place="2">2</div>
										<div class="select__item" data-place="3">3</div>
										<div class="select__item" data-place="4">4</div>
										<div class="select__item" data-place="5">5</div>
										<div class="select__item" data-place="6">6</div>
										<div class="select__item" data-place="7">7</div>
										<div class="select__item" data-place="8">8</div>
										<div class="select__item" data-place="9">9</div>
										<div class="select__item" data-place="10">10</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form__column"><label class="form__label">
								<div class="form__text">Last name</div>
								<input class="form__input input" id="consult_last_name" placeholder="Enter here">
								<div class="form__border"></div>
							</label><label class="form__label">
								<div class="form__text">Phone number</div>
								<input class="form__input input" id="consult_phone_number" placeholder="Enter here" type="number">
								<div class="form__border"></div>
							</label>
							<div class="form__label select">
								<div class="select__text">State</div>
								<input readonly class="select__button" autocomplete="chrome-off" id="consult_state" placeholder="Choose">
								<div class="form__border icon-next-arrow"></div>
								<div class="select__option">
									<div class="select__search search"><input autocomplete="chrome-off" class="search__input">
										<div class="form__border"></div>
									</div>
									<div class="select__choose">
										<div class="select__item" data-place="Alabama">Alabama</div>
										<div class="select__item" data-place="Alaska">Alaska</div>
										<div class="select__item" data-place="Arizona">Arizona</div>
										<div class="select__item" data-place="Arkanasas">Arkanasas</div>
										<div class="select__item" data-place="California">California</div>
										<div class="select__item" data-place="Colorado">Colorado</div>
										<div class="select__item" data-place="Connecticut">Connecticut</div>
										<div class="select__item" data-place="Delaware">Delaware</div>
										<div class="select__item" data-place="District Of Columbia">District Of
											Columbia
										</div>
										<div class="select__item" data-place="Florida">Florida</div>
										<div class="select__item" data-place="Georgia">Georgia</div>
										<div class="select__item" data-place="Hawaii">Hawaii</div>
										<div class="select__item" data-place="Idaho">Idaho</div>
										<div class="select__item" data-place="Illinois">Illinois</div>
										<div class="select__item" data-place="Iowa">Iowa</div>
										<div class="select__item" data-place="Kansas">Kansas</div>
										<div class="select__item" data-place="Kentucky">Kentucky</div>
										<div class="select__item" data-place="Louisiana">Louisiana</div>
										<div class="select__item" data-place="Maine">Maine</div>
										<div class="select__item" data-place="Maryland">Maryland</div>
										<div class="select__item" data-place="Massachusetts">Massachusetts</div>
										<div class="select__item" data-place="Michigan">Michigan</div>
										<div class="select__item" data-place="Minnesota">Minnesota</div>
										<div class="select__item" data-place="Mississippi">Mississippi</div>
										<div class="select__item" data-place="Missouri">Missouri</div>
										<div class="select__item" data-place="Montana">Montana</div>
										<div class="select__item" data-place="Nebraska">Nebraska</div>
										<div class="select__item" data-place="Nevada">Nevada</div>
										<div class="select__item" data-place="New Hampshire">New Hampshire</div>
										<div class="select__item" data-place="New Jersey">New Jersey</div>
										<div class="select__item" data-place="New Mexico">New Mexico</div>
										<div class="select__item" data-place="New York">New York</div>
										<div class="select__item" data-place="North Carolina">North Carolina</div>
										<div class="select__item" data-place="North Dakota">North Dakota</div>
										<div class="select__item" data-place="Ohio">Ohio</div>
										<div class="select__item" data-place="Oklahoma">Oklahoma</div>
										<div class="select__item" data-place="Oregon">Oregon</div>
										<div class="select__item" data-place="Pennsylvania">Pennsylvania</div>
										<div class="select__item" data-place="Rhode Island">Rhode Island</div>
										<div class="select__item" data-place="South Carolina">South Carolina</div>
										<div class="select__item" data-place="South Dakota">South Dakota</div>
										<div class="select__item" data-place="Tennessee">Tennessee</div>
										<div class="select__item" data-place="Texas">Texas</div>
										<div class="select__item" data-place="Utah">Utah</div>
										<div class="select__item" data-place="Vermont">Vermont</div>
										<div class="select__item" data-place="Virginia">Virginia</div>
										<div class="select__item" data-place="Washington">Washington</div>
										<div class="select__item" data-place="West Virginia">West Virginia</div>
										<div class="select__item" data-place="Wisconsin">Wisconsin</div>
										<div class="select__item" data-place="Wyoming">Wyoming</div>
									</div>
								</div>
							</div>
							<div class="form__label select">
								<div class="select__text">How much do you owe?</div>
								<input readonly class="select__button" autocomplete="chrome-off" id="consult_owe" placeholder="Choose">
								<div class="form__border icon-next-arrow"></div>
								<div class="select__option">
									<div class="select__search search"><input class="search__input">
										<div class="form__border"></div>
									</div>
									<div class="select__choose">
										<div class="select__item" data-min="0" data-max="9999" data-place="$0 - $9,999">$0 - $9,999</div>
										<div class="select__item" data-min="10000" data-max="19999" data-place="$10,000 - $19,999">$10,000 - $19,999</div>
										<div class="select__item" data-min="20000" data-max="29999" data-place="$20,000 - $29,999">$20,000 - $29,999</div>
										<div class="select__item" data-min="30000" data-max="39999" data-place="$30,000 - $39,999">$30,000 - $39,999</div>
										<div class="select__item" data-min="40000" data-max="49999" data-place="$40,000 - $49,999">$40,000 - $49,999</div>
										<div class="select__item" data-min="50000" data-max="59999" data-place="$50,000 - $59,999">$50,000 - $59,999</div>
										<div class="select__item" data-min="60000" data-max="69999" data-place="$60,000 - $69,999">$60,000 - $69,999</div>
										<div class="select__item" data-min="70000" data-max="79999" data-place="$70,000 - $79,999">$70,000 - $79,999</div>
										<div class="select__item" data-min="80000" data-max="89999" data-place="$80,000 - $89,999">$80,000 - $89,999</div>
										<div class="select__item" data-min="90000" data-max="99999" data-place="$90,000 - $99,999">$90,000 - $99,999</div>
										<div class="select__item" data-min="100000" data-place="More Than $100,000">More Than $100,000
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form__footer">
						<button class="form__button" id="popup-consult-btn" disabled>Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="popup popup_ask">
		<div class="popup__body">
			<div class="popup__content">
				<div class="popup__close">
					<div class="icon-close"></div>
				</div>
				<form action="#" class="popup__form form" method="POST">
					<div class="form__header header-form">
						<div class="header-form__title">Ask a question</div>
						<div class="header-form__text">How can we help you?</div>
						<div class="header-form__text">Please choose area you need help with and ask your question</div>
					</div>
					<div class="form__body">
						<div class="form__column"><label class="form__label">
								<div class="form__text">First name</div>
								<input class="form__input input" id="question_first_name" placeholder="Enter here">
								<div class="form__border"></div>
							</label><label class="form__label">
								<div class="form__text">Email</div>
								<input class="form__input input" type="email" id="question_email" placeholder="Enter here">
								<div class="form__border"></div>
							</label>
							<div class="form__label select">
								<div class="select__text">How much do you owe?</div>
								<input readonly class="select__button" id="question_category" placeholder="Choose">
								<div class="form__border icon-next-arrow"></div>
								<div class="select__option">
									<div class="select__choose">
										<div class="select__item" data-place="Price">Price</div>
										<div class="select__item" data-place="Services">Services</div>
										<div class="select__item" data-place="Other">Other</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form__column"><label class="form__label">
								<div class="form__text">Last name</div>
								<input class="form__input input" id="question_last_name" placeholder="Enter here">
								<div class="form__border"></div>
							</label><label class="form__label">
								<div class="form__text">Phone number</div>
								<input class="form__input input" id="question_phone_number" placeholder="Enter here" type="number">
								<div class="form__border"></div>
							</label><label class="form__label">
								<div class="form__text">Message</div>
								<textarea class="form__input input" id="question_message" cols="30" placeholder="What me do?"
								          rows="10"></textarea>
								<div class="form__border"></div>
							</label></div>
					</div>
					<div class="form__footer">
						<button class="form__button" id="question-btn" disabled="disabled">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="popup popup_thank">
		<div class="popup__body">
			<div class="popup__content">
				<div class="popup__close">
					<div class="icon-close"></div>
				</div>
				<div class="popup__thank thank-popup">
					<div class="header-form">
						<div class="header-form__title">Thank you for your request</div>
						<div class="header-form__text">We will contact you shorty.</div>
					</div>
					<div class="thank-popup__body">
						<div class="thank-popup__icon">
							<div class="icon-message-check-mark"></div>
						</div>
					</div>
					<div class="form__footer">
						<button class="btn__close reload-btn">Ok</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="popup popup_thank-request">
		<div class="popup__body">
			<div class="popup__content">
				<div class="popup__close">
					<div class="icon-close"></div>
				</div>
				<div class="popup__thank thank-popup">
					<div class="header-form">
						<div class="header-form__title">Thank you for your request</div>
						<div class="header-form__text">A representative will be in contact with you shortly to answer
							any of your questions
						</div>
					</div>
					<div class="thank-popup__body">
						<div class="thank-popup__icon">
							<div class="icon-message-check-mark"></div>
						</div>
					</div>
					<div class="form__footer">
						<button class="btn__close reload-btn">Ok</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="popup popup_slider">
		<div class="popup__body">
			<div class="header-popup">
				<div class="popup__close">
					<div class="icon-close"></div>
				</div>
			</div>
			<div class="popup__content sliders-popup">
				<div class="sliders-popup__body">
                    <?php
                    $posts = get_posts( array(
                        'numberposts' => 4,
                        'orderby'     => 'date',
                        'order'       => 'ASC',
                        'post_type'   => 'results',
                    ) );

                    foreach( $posts as $post ){
                        setup_postdata($post);
                        // формат вывода the_title() ...
                        $debt = get_field('total_debt');
                        $paid = get_field('paid');
                        $saved = round((1 - $paid / $debt) * 100);
                        ?>

	                    <div class="sliders-popup__slide slide-popup">
		                    <div class="slide-popup__header">Total Debt $<?= number_format($debt,0,".",",") ?> Paid $<?= number_format($paid,0,".",",") ?></div>
		                    <div class="slide-popup__body"><img src="<?= the_field('image') ?>"></div>
		                    <div class="slide-popup__footer">
			                    <div class="slide-popup__saved">Saved</div>
			                    <div class="slide-popup__procent"><?= $saved ?>%</div>
		                    </div>
	                    </div>

                        <?php
                    }

                    wp_reset_postdata();
                    ?>
				</div>
				<div class="sliders-popup__navigation navigation-popup-sliders">
					<div class="navigation-popup-sliders__count"><span
								class="navigation-popup-sliders__current current"></span>
						<div class="navigation-popup-sliders__dots dots"></div>
						<span class="navigation-popup-sliders__total total"></span></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Copyright Block -->
    <?php
    $posts = get_posts( array(
        'numberposts' => 1,
        'post_type'   => 'copyright',
    ) );

    foreach( $posts as $post ){
        setup_postdata($post);
        // формат вывода the_title() ...
        ?>

	    <footer class="footer">
		    <div class="footer__container container">
			    <div class="footer__item">
				    <div class="footer__logo"><img src="<?php bloginfo('template_url'); ?>/assets/img/logo-footer.svg"><span>Business Dept Adjuster</span></div>
				    <div class="footer__copy"><?= the_content() ?></div>
			    </div>
			    <div class="footer__item">
				    <ul class="menu-footer">
					    <li><a class="menu-footer__link" href="<?= get_bloginfo("url"); ?>/privacy-policy">Privacy Policy</a></li>
					    <li><a class="menu-footer__link" href="<?= get_bloginfo("url"); ?>/cookies-policy">Cookies Policy</a></li>
					    <li><a class="menu-footer__link" href="<?= get_bloginfo("url"); ?>/terms-and-conditions">Terms and Conditions</a></li>
				    </ul>
			    </div>
		    </div>
	    </footer>

        <?php
    }

    wp_reset_postdata();
    ?>

	<script type="text/javascript">
        let templateUrl = '<?= get_bloginfo("template_url"); ?>';
        // console.log(templateUrl);

        let url = '<?= get_bloginfo("url"); ?>';
        // console.log(url);
    </script>

    <?php wp_footer(); ?>

</body>
</html>
