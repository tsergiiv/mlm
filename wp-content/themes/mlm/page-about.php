<?= get_header(); ?>

        <div class="container">
            <div class="invest-title">
                <h1>Про компанию</h1>
                <div class="invest-description">
                    Мы международная сеть отелей, созданная группой компаний «UneedHostels»
                </div>
            </div>
            <div class="invest-cols flex">
                <div class="invest-col">
                    <div class="invest-col__title bebas-bold">
                        Надежность
                    </div>
                    <div class="invest-col__description">
                        Часть капитала, размещенная в коммерческой недвижимости, позволяет сохранять его в ситуациях,
                        когда другие классы активов дешевеют.
                    </div>
                </div>
                <div class="invest-col">
                    <div class="invest-col__title bebas-bold">
                        Доступность
                    </div>
                    <div class="invest-col__description">
                        Облигаций — недвижимость приносит регулярный прогнозируемый доход, и акций — недвижимость дает
                        прибыль при росте ее стоимости.
                    </div>
                </div>
                <div class="invest-col">
                    <div class="invest-col__title bebas-bold">
                        Честность
                    </div>
                    <div class="invest-col__description">
                        Инвестиции в качественную коммерческую недвижимость предоставляют значительный уровень защиты
                        инвестированного капитала
                    </div>
                </div>
                <div class="invest-col">
                    <div class="invest-col__title bebas-bold">
                        Современность
                    </div>
                    <div class="invest-col__description">
                        Регулярная индексация арендных ставок на инфляцию - обычная деловая практика в сегменте
                        коммерческой недвижимости.
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- INVEST SECTION END -->
    <!-- ABOUT SECTION -->
    <section class="about-section" data-section-name="about-section">
        <div class="section-title border-bot-default">
            <div class="container">
                <h2 class="bebas-bold">Про нас</h2>
            </div>
        </div>
        <div class="container">
            <div id="about-carousel" class="owl-carousel">
                <div class="about-carousel__item flex" data-dot="<button>2019</button>">
                    <div class="about-item__img first-map">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map.png">
                    </div>
                </div>
                <div class="about-carousel__item flex" data-dot="<button>2020</button>">
                    <div class="about-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map.png">
                        <img class="map-sm" alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map-1.png">
                        <div class="countries">
                            <div class="country ukraine-1"></div>
                        </div>
                    </div>
                </div>
                <div class="about-carousel__item flex" data-dot="<button>2021</button>">
                    <div class="about-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map.png">
                        <img class="map-sm" alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map-2.png">
                        <div class="countries">
                            <div class="country ukraine-1 c-static"></div>
                            <div class="country ukraine-2"></div>
                            <div class="country ukraine-3"></div>
                        </div>
                    </div>
                </div>
                <div class="about-carousel__item flex" data-dot="<button>2022</button>">
                    <div class="about-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map.png">
                        <img class="map-sm" alt="" src="<?php bloginfo('template_url'); ?>/assets/img/map-3.png">
                        <div class="countries">
                            <div class="country ukraine-1 c-static"></div>
                            <div class="country ukraine-2 c-static"></div>
                            <div class="country ukraine-3 c-static"></div>
                            <div class="country europe-1"></div>
                            <div class="country europe-2"></div>
                            <div class="country europe-3"></div>
                            <div class="country europe-4"></div>
                            <div class="country europe-5"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-item__description">
                <div class="about-item__text">
                    Мы занимаемся инвестированием в Киевские отели и управлением ими.
                    Мы тщательно анализируем объект перед тем, как вложить в него деньги и предложить вам инвестирование
                    в него.
                    Мы проверяем информацию о доходах и расходах хостела, степень его востребованности, качество
                    оказываемых услуг.
                </div>
                <div class="about-item__cols flex">
                    <div class="about-item__col">
                        <span class="bebas-bold">6</span>
                        Хостелов в Украине
                    </div>
                    <div class="about-item__col">
                        <span class="bebas-bold">12</span>
                        Хостелов в Европе
                    </div>
                    <div class="col-divider"></div>
                    <div class="about-item__col">
                        <span class="bebas-bold">11 178</span>
                        Пользоваталей на платформе
                    </div>
                    <div class="about-item__col">
                        <span class="bebas-bold">100+</span>
                        Сотрудников в штате
                    </div>
                </div>
            </div>
        </div>
        <div class="section-botrow border-top-default flex">
            <div class="container">
                <div class="owl-custom-nav flex">
                    <div class="about-prev flex"><img alt="prev" src="<?php bloginfo('template_url'); ?>/assets/img/slider-arrow.svg"></div>
                    <div class="about-next flex">
                        <div>
                            <img alt="next" src="<?php bloginfo('template_url'); ?>/assets/img/slider-arrow.svg">
                            <div class="btn-corner corner-1"></div>
                            <div class="btn-corner corner-2"></div>
                            <div class="btn-corner corner-3"></div>
                            <div class="btn-corner corner-4"></div>
                        </div>
                    </div>
                </div>
                <a href="/{{ app['lang'] }}/#" target="_blank" class="link-arrow arrow-dark flex">
                    <span>Подробнее о компании</span>
                    <span>О компании</span>
                    <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/link-arrow.svg">
                </a>
            </div>
        </div>
    </section>
    <!-- ABOUT SECTION END -->
    <!-- HOSTELS SECTION -->
    <section class="hostels-section" data-section-name="hostels-section">
        <div class="section-title border-bot-default">
            <div class="container">
                <h2 class="bebas-bold">Наши отели</h2>
                <span class="ml-auto flex">UNEED Friendly Hostel</span>
            </div>
        </div>
        <div class="container">
            <div id="hostels-carousel" class="owl-carousel">
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-1.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Комната отдыха
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-2.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Общий 8-ми местный номер
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-3.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Общий 6-ти местный номер
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-4.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Общий 6-ти местный номер
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-1.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Комната отдыха
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-2.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Общий 8-ми местный номер
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-3.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Общий 6-ти местный номер
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-4.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Общий 6-ти местный номер
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-1.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Комната отдыха
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-2.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Общий 8-ми местный номер
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-3.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Общий 6-ти местный номер
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-4.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Общий 6-ти местный номер
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-1.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Комната отдыха
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-2.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Общий 8-ми местный номер
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-3.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Общий 6-ти местный номер
                    </div>
                </div>
                <div class="hostels-carousel__item flex">
                    <div class="hostels-item__img">
                        <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/hostels-4.jpg">
                    </div>
                    <div class="hostels-item__title bebas-normal">
                        Общий 6-ти местный номер
                    </div>
                </div>
            </div>
        </div>
        <div class="section-botrow border-top-default flex">
            <div class="container">
                <div class="owl-custom-nav dark-nav flex">
                    <div class="hostels-prev flex">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.76389 5.44784L12.4306 3.13685C12.4769 3.09341 12.5 3.04134 12.5 2.98053C12.5 2.92403 12.4769 2.87416 12.4306 2.8308L9.76386 0.552427C9.6897 0.495996 9.60875 0.485121 9.52077 0.5198C9.43282 0.554548 9.38884 0.617454 9.38884 0.708587V2.16676L0.721977 2.16676C0.657204 2.16676 0.603934 2.18625 0.562317 2.22536C0.520797 2.26441 0.5 2.31426 0.5 2.37509V3.62491C0.5 3.68576 0.520797 3.7357 0.562317 3.77455C0.603959 3.81356 0.657204 3.83321 0.721977 3.83321L9.38884 3.83321V5.29139C9.38884 5.37817 9.43284 5.44103 9.52077 5.48004C9.60885 5.51492 9.6898 5.50402 9.76389 5.44784Z"
                                  fill="#fff"/>
                        </svg>
                    </div>
                    <div class="hostels-next flex">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.76389 5.44784L12.4306 3.13685C12.4769 3.09341 12.5 3.04134 12.5 2.98053C12.5 2.92403 12.4769 2.87416 12.4306 2.8308L9.76386 0.552427C9.6897 0.495996 9.60875 0.485121 9.52077 0.5198C9.43282 0.554548 9.38884 0.617454 9.38884 0.708587V2.16676L0.721977 2.16676C0.657204 2.16676 0.603934 2.18625 0.562317 2.22536C0.520797 2.26441 0.5 2.31426 0.5 2.37509V3.62491C0.5 3.68576 0.520797 3.7357 0.562317 3.77455C0.603959 3.81356 0.657204 3.83321 0.721977 3.83321L9.38884 3.83321V5.29139C9.38884 5.37817 9.43284 5.44103 9.52077 5.48004C9.60885 5.51492 9.6898 5.50402 9.76389 5.44784Z"
                                  fill="#fff"/>
                        </svg>
                        <div class="btn-corner corner-1"></div>
                        <div class="btn-corner corner-2"></div>
                        <div class="btn-corner corner-3"></div>
                        <div class="btn-corner corner-4"></div>
                    </div>
                </div>
                <div class="slider-counter"></div>
            </div>
        </div>
    </section>
    <!-- HOSTELS SECTION END -->
    <!-- LEADER SECTION -->
    <section class="leader-section" data-section-name="leader-section">
        <div class="section-title border-bot-default">
            <div class="container">
                <h2 class="bebas-bold">Наш идейный вдохновитель</h2>
            </div>
        </div>
        <div class="container">
            <div class="leader-section__left">
                <div class="leader-left__img">
                    <img alt="Артак Сантосян" src="<?php bloginfo('template_url'); ?>/assets/img/leader.jpg">
                    <div class="leader-left__name bebas-bold">
                        Артак Сантосян
                    </div>
                </div>
            </div>
            <div class="leader-section__right ml-auto">
                <div class="leader-right__title flex">
                    <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/quotes.png">
                    <div class="bebas-normal">
                        Основатель Uneed partners
                    </div>
                </div>
                <div class="leader-right__description">
                    Станьте полноправным владельцем доли в бизнесе и участвуйте в распределении чистой прибыли с первого
                    месяца работы отеля без необходимости участвовать в операционном управлении.
                </div>
                <div class="leader-right__cols flex">
                    <a target="_blank" href="#" class="leader-right__col flex">
                        <img alt="Linkedin" src="<?php bloginfo('template_url'); ?>/assets/img/linkedin.png">
                        <div class="link-arrow flex w-100">
                            <span>Linkedin</span>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20" cy="20" r="20" fill="#fff"/>
                                <path d="M14.9843 26.0062L23.946 17.0444L24.0933 23.6959L25.8702 23.7352L25.6557 14.0503L15.9707 13.8357L16.0101 15.6126L22.6615 15.76L13.6998 24.7217L14.9843 26.0062Z"
                                      fill="#353F4B"/>
                            </svg>
                        </div>
                    </a>
                    <a target="_blank" href="#" class="leader-right__col flex">
                        <img alt="Facebook" src="<?php bloginfo('template_url'); ?>/assets/img/facebook.png">
                        <div class="link-arrow flex w-100">
                            <span>Facebook</span>
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="20" cy="20" r="20" fill="#fff"/>
                                <path d="M14.9843 26.0062L23.946 17.0444L24.0933 23.6959L25.8702 23.7352L25.6557 14.0503L15.9707 13.8357L16.0101 15.6126L22.6615 15.76L13.6998 24.7217L14.9843 26.0062Z"
                                      fill="#353F4B"/>
                            </svg>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="section-botrow border-top-default border-bot-default flex">
            <div class="container">
                <div class="video-btn video-btn__blue">
                    <div class="video-btn__icon"></div>
                    <span>Смотреть видео про нас</span>
                </div>
                <a href="/{{ app['lang'] }}/#" target="_blank" class="link-arrow flex">
                    <span>Подробнее о компании</span> <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/link-arrow.svg">
                </a>
            </div>
        </div>
    </section>
    <!-- LEADER SECTION END -->
    <!-- VIDEO SECTION -->
    <section class="video-section" data-section-name="video-section">
        <div class="section-title border-bot-default">
            <div class="container">
                <h2 class="bebas-bold">Как мы работаем</h2>
                <div class="video-section__lenght flex ml-auto">
                    Длительность - 04:43
                </div>
            </div>
        </div>
        <div class="container">
            <div class="video-section__description">
                Я и моя команда фанаты менеджмента, а это позволяет добиваться отличных финансовых результатов,
                обеспечивать рост сети и хорошую окупаемость инвестиций.
            </div>
            <div class="video-section__all ml-auto">
                <div class="video-section__frame ml-auto">
                    <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/videocover.jpg">
                </div>
                <div class="video-btn">
                    <div class="video-btn__icon"></div>
                </div>
            </div>
        </div>
        <div class="section-botrow border-top-default flex">
            <div class="container">
                <a href="/{{ app['lang'] }}/#" target="_blank" class="link-arrow arrow-dark flex ml-auto">
                    <span>Подробнее о компании</span> <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/link-arrow.svg">
                </a>
            </div>
        </div>
    </section>
    <!-- VIDEO SECTION END -->
    <!-- REVIEWS SECTION -->
    <section class="reviews-section" data-section-name="reviews-section">
        <div class="section-title border-top-default border-bot-default">
            <div class="container">
                <h2 class="bebas-bold">Отзывы инвесторов</h2>
            </div>
        </div>
        <div class="container">
            <div id="reviews-carousel" class="owl-carousel">
                <div class="reviews-carousel__item flex">
                    <div class="reviews-section__left">
                        <div class="reviews-left__title flex">
                            <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/quotes.png">
                            <div class="bebas-normal">
                                Инвестор
                            </div>
                        </div>
                        <div class="reviews-left__description">
                            Вложения в коммерческую недвижимость не так популярны, как инвестиции в жилую недвижимость.
                            Из-за сложности приобретения, управления. Инвестирование в коммерческую недвижимость – это
                            целый бизнес.
                            Вложения в жилую недвижимость многими воспринимается как сохранение средств а не
                            непосредственно инвестиция.
                        </div>
                        <div class="reviews-left__cols flex">
                            <a target="_blank" href="#" class="reviews-left__col flex">
                                <img alt="Linkedin" src="<?php bloginfo('template_url'); ?>/assets/img/linkedin.png">
                                <div class="link-arrow flex w-100">
                                    <span>Linkedin</span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="20" fill="#fff"/>
                                        <path d="M14.9843 26.0062L23.946 17.0444L24.0933 23.6959L25.8702 23.7352L25.6557 14.0503L15.9707 13.8357L16.0101 15.6126L22.6615 15.76L13.6998 24.7217L14.9843 26.0062Z"
                                              fill="#353F4B"/>
                                    </svg>
                                </div>
                            </a>
                            <a target="_blank" href="#" class="reviews-left__col flex">
                                <img alt="Facebook" src="<?php bloginfo('template_url'); ?>/assets/img/facebook.png">
                                <div class="link-arrow flex w-100">
                                    <span>Facebook</span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="20" fill="#fff"/>
                                        <path d="M14.9843 26.0062L23.946 17.0444L24.0933 23.6959L25.8702 23.7352L25.6557 14.0503L15.9707 13.8357L16.0101 15.6126L22.6615 15.76L13.6998 24.7217L14.9843 26.0062Z"
                                              fill="#353F4B"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="reviews-section__right ml-auto">
                        <div class="reviews-right__img">
                            <img alt="Иван Ольховский" src="<?php bloginfo('template_url'); ?>/assets/img/investor-slide.png">
                            <div class="reviews-right__name bebas-bold">Иван Ольховский</div>
                        </div>
                    </div>
                </div>
                <div class="reviews-carousel__item flex">
                    <div class="reviews-section__left">
                        <div class="reviews-left__title flex">
                            <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/quotes.png">
                            <div class="bebas-normal">
                                Investor
                            </div>
                        </div>
                        <div class="reviews-left__description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        <div class="reviews-left__cols flex">
                            <a target="_blank" href="#" class="reviews-left__col flex">
                                <img alt="Linkedin" src="<?php bloginfo('template_url'); ?>/assets/img/linkedin.png">
                                <div class="link-arrow flex w-100">
                                    <span>Linkedin</span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="20" fill="#fff"/>
                                        <path d="M14.9843 26.0062L23.946 17.0444L24.0933 23.6959L25.8702 23.7352L25.6557 14.0503L15.9707 13.8357L16.0101 15.6126L22.6615 15.76L13.6998 24.7217L14.9843 26.0062Z"
                                              fill="#353F4B"/>
                                    </svg>
                                </div>
                            </a>
                            <a target="_blank" href="#" class="reviews-left__col flex">
                                <img alt="Facebook" src="<?php bloginfo('template_url'); ?>/assets/img/facebook.png">
                                <div class="link-arrow flex w-100">
                                    <span>Facebook</span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="20" fill="#fff"/>
                                        <path d="M14.9843 26.0062L23.946 17.0444L24.0933 23.6959L25.8702 23.7352L25.6557 14.0503L15.9707 13.8357L16.0101 15.6126L22.6615 15.76L13.6998 24.7217L14.9843 26.0062Z"
                                              fill="#353F4B"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="reviews-section__right ml-auto">
                        <div class="reviews-right__img">
                            <img alt="Иван Ольховский" src="<?php bloginfo('template_url'); ?>/assets/img/investor-slide.png">
                            <div class="reviews-right__name bebas-bold">Иван Ольховский</div>
                        </div>
                    </div>
                </div>
                <div class="reviews-carousel__item flex">
                    <div class="reviews-section__left">
                        <div class="reviews-left__title flex">
                            <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/quotes.png">
                            <div class="bebas-normal">
                                Инвестор
                            </div>
                        </div>
                        <div class="reviews-left__description">
                            Вложения в коммерческую недвижимость не так популярны, как инвестиции в жилую недвижимость.
                            Из-за сложности приобретения, управления. Инвестирование в коммерческую недвижимость – это
                            целый бизнес.
                            Вложения в жилую недвижимость многими воспринимается как сохранение средств а не
                            непосредственно инвестиция.
                        </div>
                        <div class="reviews-left__cols flex">
                            <a target="_blank" href="#" class="reviews-left__col flex">
                                <img alt="Linkedin" src="<?php bloginfo('template_url'); ?>/assets/img/linkedin.png">
                                <div class="link-arrow flex w-100">
                                    <span>Linkedin</span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="20" fill="#fff"/>
                                        <path d="M14.9843 26.0062L23.946 17.0444L24.0933 23.6959L25.8702 23.7352L25.6557 14.0503L15.9707 13.8357L16.0101 15.6126L22.6615 15.76L13.6998 24.7217L14.9843 26.0062Z"
                                              fill="#353F4B"/>
                                    </svg>
                                </div>
                            </a>
                            <a target="_blank" href="#" class="reviews-left__col flex">
                                <img alt="Facebook" src="<?php bloginfo('template_url'); ?>/assets/img/facebook.png">
                                <div class="link-arrow flex w-100">
                                    <span>Facebook</span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="20" fill="#fff"/>
                                        <path d="M14.9843 26.0062L23.946 17.0444L24.0933 23.6959L25.8702 23.7352L25.6557 14.0503L15.9707 13.8357L16.0101 15.6126L22.6615 15.76L13.6998 24.7217L14.9843 26.0062Z"
                                              fill="#353F4B"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="reviews-section__right ml-auto">
                        <div class="reviews-right__img">
                            <img alt="Иван Ольховский" src="<?php bloginfo('template_url'); ?>/assets/img/investor-slide.png">
                            <div class="reviews-right__name bebas-bold">Иван Ольховский</div>
                        </div>
                    </div>
                </div>
                <div class="reviews-carousel__item flex">
                    <div class="reviews-section__left">
                        <div class="reviews-left__title flex">
                            <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/quotes.png">
                            <div class="bebas-normal">
                                Investor
                            </div>
                        </div>
                        <div class="reviews-left__description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                        <div class="reviews-left__cols flex">
                            <a target="_blank" href="#" class="reviews-left__col flex">
                                <img alt="Linkedin" src="<?php bloginfo('template_url'); ?>/assets/img/linkedin.png">
                                <div class="link-arrow flex w-100">
                                    <span>Linkedin</span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="20" fill="#fff"/>
                                        <path d="M14.9843 26.0062L23.946 17.0444L24.0933 23.6959L25.8702 23.7352L25.6557 14.0503L15.9707 13.8357L16.0101 15.6126L22.6615 15.76L13.6998 24.7217L14.9843 26.0062Z"
                                              fill="#353F4B"/>
                                    </svg>
                                </div>
                            </a>
                            <a target="_blank" href="#" class="reviews-left__col flex">
                                <img alt="Facebook" src="<?php bloginfo('template_url'); ?>/assets/img/facebook.png">
                                <div class="link-arrow flex w-100">
                                    <span>Facebook</span>
                                    <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="20" cy="20" r="20" fill="#fff"/>
                                        <path d="M14.9843 26.0062L23.946 17.0444L24.0933 23.6959L25.8702 23.7352L25.6557 14.0503L15.9707 13.8357L16.0101 15.6126L22.6615 15.76L13.6998 24.7217L14.9843 26.0062Z"
                                              fill="#353F4B"/>
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="reviews-section__right ml-auto">
                        <div class="reviews-right__img">
                            <img alt="Иван Ольховский" src="<?php bloginfo('template_url'); ?>/assets/img/investor-slide.png">
                            <div class="reviews-right__name bebas-bold">Иван Ольховский</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-botrow border-top-default flex">
            <div class="container">
                <div class="owl-custom-nav dark-nav flex">
                    <div class="reviews-prev flex">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.76389 5.44784L12.4306 3.13685C12.4769 3.09341 12.5 3.04134 12.5 2.98053C12.5 2.92403 12.4769 2.87416 12.4306 2.8308L9.76386 0.552427C9.6897 0.495996 9.60875 0.485121 9.52077 0.5198C9.43282 0.554548 9.38884 0.617454 9.38884 0.708587V2.16676L0.721977 2.16676C0.657204 2.16676 0.603934 2.18625 0.562317 2.22536C0.520797 2.26441 0.5 2.31426 0.5 2.37509V3.62491C0.5 3.68576 0.520797 3.7357 0.562317 3.77455C0.603959 3.81356 0.657204 3.83321 0.721977 3.83321L9.38884 3.83321V5.29139C9.38884 5.37817 9.43284 5.44103 9.52077 5.48004C9.60885 5.51492 9.6898 5.50402 9.76389 5.44784Z"
                                  fill="#fff"></path>
                        </svg>
                    </div>
                    <div class="reviews-next flex">
                        <svg width="13" height="6" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.76389 5.44784L12.4306 3.13685C12.4769 3.09341 12.5 3.04134 12.5 2.98053C12.5 2.92403 12.4769 2.87416 12.4306 2.8308L9.76386 0.552427C9.6897 0.495996 9.60875 0.485121 9.52077 0.5198C9.43282 0.554548 9.38884 0.617454 9.38884 0.708587V2.16676L0.721977 2.16676C0.657204 2.16676 0.603934 2.18625 0.562317 2.22536C0.520797 2.26441 0.5 2.31426 0.5 2.37509V3.62491C0.5 3.68576 0.520797 3.7357 0.562317 3.77455C0.603959 3.81356 0.657204 3.83321 0.721977 3.83321L9.38884 3.83321V5.29139C9.38884 5.37817 9.43284 5.44103 9.52077 5.48004C9.60885 5.51492 9.6898 5.50402 9.76389 5.44784Z"
                                  fill="#fff"></path>
                        </svg>
                        <div class="btn-corner corner-1"></div>
                        <div class="btn-corner corner-2"></div>
                        <div class="btn-corner corner-3"></div>
                        <div class="btn-corner corner-4"></div>
                    </div>
                </div>
                <a href="/{{ app['lang'] }}/#" target="_blank" class="link-arrow flex">
                    <span>Подробнее о компании</span> <img alt="" src="<?php bloginfo('template_url'); ?>/assets/img/link-arrow.svg">
                </a>
            </div>
        </div>
    </section>
    <!-- REVIEWS SECTION END -->

<?= get_footer(); ?>
