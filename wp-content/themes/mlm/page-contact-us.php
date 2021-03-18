<?= get_header(); ?>

        <div class="container">
            <div class="top-bg">
                <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/contacts-map.png">
            </div>
            <div class="top-title">
                <h1>
                    Наши контакты
                </h1>
                <span>
                        Если у вас есть жалобы или предложения, свяжитесь с нами и ваши пожелания будут учтены
                    </span>
            </div>
            <div class="top-contacts flex">
                <div class="phone">
                    <span>Номер для консультации</span>
                    <a href="tel:380939412123" class="bebas-bold">380939412123</a>
                </div>
                <div class="email">
                    <span>Email</span>
                    <a href="mailto:Uneed@partners.com" class="bebas-bold">Uneed@partners.com</a>
                </div>
            </div>
            <ul class="top-social">
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
    </section>
    <!-- FORM SECTION -->
    <section class="form-section" data-section-name="form-section">
        <div class="section-title border-bot-default">
            <div class="container">
                <h2 class="bebas-bold">Связаться с нами</h2>
            </div>
        </div>
        <div class="container">
            <div id="map">
                <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/address-map.svg">
            </div>
            <div class="contact-form">
                <div class="contact-form__title">
                    Чтобы связаться с нами, пожалуйста заполните форму ниже
                </div>
                <form id="contact-form" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <label>Тема вопроса</label>
                        <input type="text" name="action" value="add" hidden="">
                        <div class="select-default dropdown-control pointer d-flex align-items-center">
                            <span class="check-hide">Что вас интересует</span>
                            <div class="dropdown d-flex">
                                <div id="contact-dropdown">
                                    <div class="form-group">
                                        <input class="write-to" type="radio" id="contact-theme-1" name="contact-theme-1"
                                               placeholder="Проблема с оплатой" hidden="" required="">
                                        <label class="user-label d-flex align-items-center pointer"
                                               for="contact-theme-1">
                                                <span class="message-author">
                                                    Регистрация
                                                </span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input class="write-to" type="radio" id="contact-theme-2" name="contact-theme-2"
                                               placeholder="Проблема с зачислением бонуса" hidden="" required="">
                                        <label class="user-label d-flex align-items-center pointer"
                                               for="contact-theme-2">
                                                <span class="message-author">
                                                    Цены
                                                </span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input class="write-to" type="radio" id="contact-theme-3" name="contact-theme-3"
                                               placeholder="Проблема с отображением в структуре" hidden="" required="">
                                        <label class="user-label d-flex align-items-center pointer"
                                               for="contact-theme-3">
                                                <span class="message-author">
                                                    Инвестиция
                                                </span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input class="write-to" type="radio" id="contact-theme-4" name="contact-theme-4"
                                               value="" hidden="" required="">
                                        <label class="user-label other-theme d-flex align-items-center pointer"
                                               for="contact-theme-4">
                                                <span class="message-author">
                                                    Предложения
                                                </span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <input class="write-to" type="radio" id="contact-theme-5" name="contact-theme-5"
                                               value="" hidden="" required="">
                                        <label class="user-label other-theme d-flex align-items-center pointer"
                                               for="contact-theme-5">
                                                <span class="message-author">
                                                    Жалоба
                                                </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">
                            Эл. почта
                        </label>
                        <input class="input-default" type="text" id="email" name="email"
                               placeholder="Введите ваш электронный адрес" required="">
                    </div>
                    <div class="form-group">
                        <label for="contact-message">
                            Сообщение
                        </label>
                        <input class="input-default" type="text" id="contact-message" name="contact-message"
                               placeholder="Текст сообщения" required="">
                    </div>
                    <button type="button" class="modal-open btn-default btn-blue">Отправить</button>
                </form>
            </div>
        </div>
        <div class="section-botrow border-top-default flex">
            <div class="container">
                <div class="video-btn video-btn__blue">
                    <div class="video-btn__icon"></div>
                    <span>Смотреть видео про нас</span>
                </div>
                <a href="/{{ app['lang'] }}/#" target="_blank" class="link-arrow arrow-dark flex ml-auto">
                    <span>Подробнее о компании</span> <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/link-arrow.svg">
                </a>
            </div>
        </div>
    </section>

    <div class="modal" id="successModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header m-auto p-0 flex-column text-center">
                    <div class="reset-icon d-flex justify-content-center align-items-center"></div>
                    <h5 class="modal-title ls-1 w-100">Спасибо за отклик</h5>
                    <p class="ls-2">Мы свяжемся с вами в ближайшее время и дадим ответы на все ваши вопросы</p>
                    <button type="button" class="modal-close close">
                        <span aria-hidden="true"><img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/close.svg"></span>
                    </button>
                </div>
                <div class="modal-body m-auto p-0">
                    <div class="btn-group d-flex justify-content-between">
                        <button type="button" class="modal-close mw-100 btn-default btn-blue lg-font ls-2">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop"></div>
    </div>

<?= get_footer('contact'); ?>
