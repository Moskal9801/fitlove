<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta content='true' name='HandheldFriendly'/>
    <meta content='width' name='MobileOptimized'/>
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <script>
        let prefersDarkTheme = localStorage.getItem('prefersDarkTheme');

        if (prefersDarkTheme === null) {
            localStorage.setItem('prefersDarkTheme', window.matchMedia('(prefers-color-scheme: dark)').matches);
        }

        function applyTheme() {
            let prefersDarkTheme = localStorage.getItem('prefersDarkTheme');
            if (prefersDarkTheme === 'true') {
                let linkElement = document.createElement('link');
                linkElement.rel = 'stylesheet';
                linkElement.id = 'dark-theme-css';
                linkElement.href = window.location.origin + '/wp-content/themes/fitlove_theme/assets/themes/dark-theme.scss';
                linkElement.type = 'text/css';
                document.head.appendChild(linkElement);

                document.addEventListener('DOMContentLoaded', function () {
                    var darkThemeElements = document.querySelectorAll('.dark-theme');
                    darkThemeElements.forEach(function (darkElement) {
                        darkElement.classList.add('active');
                    });
                });
            } else {
                let linkElement = document.createElement('link');
                linkElement.rel = 'stylesheet';
                linkElement.id = 'light-theme-css';
                linkElement.href = window.location.origin + '/wp-content/themes/fitlove_theme/assets/themes/light-theme.scss';
                linkElement.type = 'text/css';
                document.head.appendChild(linkElement);

                document.addEventListener('DOMContentLoaded', function () {
                    var lightThemeElements = document.querySelectorAll('.light-theme');
                    lightThemeElements.forEach(function (lightElement) {
                        lightElement.classList.add('active');
                    });
                });
            }
        }

        applyTheme();

        document.addEventListener('DOMContentLoaded', function () {
            var lightThemeElements = document.querySelectorAll('.light-theme');
            lightThemeElements.forEach(function (element) {
                element.addEventListener('click', function () {
                    localStorage.setItem('prefersDarkTheme', 'false');
                    var darkThemeElements = document.querySelectorAll('.dark-theme');
                    darkThemeElements.forEach(function (darkElement) {
                        darkElement.classList.remove('active');
                    });
                    var lightThemeElements = document.querySelectorAll('.light-theme');
                    lightThemeElements.forEach(function (lightElement) {
                        lightElement.classList.add('active');
                    });
                    var darkThemeElement = document.getElementById('dark-theme-css');
                    if (darkThemeElement) {
                        document.head.removeChild(darkThemeElement);
                    }
                    applyTheme();
                });
            });

            var darkThemeElements = document.querySelectorAll('.dark-theme');
            darkThemeElements.forEach(function (element) {
                element.addEventListener('click', function () {
                    localStorage.setItem('prefersDarkTheme', 'true');
                    var lightThemeElements = document.querySelectorAll('.light-theme');
                    lightThemeElements.forEach(function (lightElement) {
                        lightElement.classList.remove('active');
                    });
                    var darkThemeElements = document.querySelectorAll('.dark-theme');
                    darkThemeElements.forEach(function (darkElement) {
                        darkElement.classList.add('active');
                    });
                    var lightThemeElement = document.getElementById('light-theme-css');
                    if (lightThemeElement) {
                        document.head.removeChild(lightThemeElement);
                    }
                    applyTheme();
                });
            });
        });
    </script>
</head>
<body>

    <?php if (is_front_page()) { ?>
        <div class="home-page">
    <?php } else if (is_page('about')) { ?>
        <div class="about-page">
    <?php } else if (is_page('projects')) { ?>
        <div class="projects-page">
    <?php } else if (is_404()) { ?>
        <div class="error-page">
    <?php } else { ?>
        <div class="default-page">
    <?php } ?>

            <header class="main-header">
                <div class="main-header__container container desktop">
                    <a class="container__logo" href="/">
                        <svg width="85" height="45" viewBox="0 0 85 45" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path class="logo-up"
                                  d="M0.0262256 18.8372V0H17.3614V3.1657H3.19953V7.84884H14.6077V10.9884H3.19953V18.8372H0.0262256Z"
                                  fill="#2F89FF"/>
                            <path class="logo-up" d="M18.7161 18.8372V0H21.837V18.8372H18.7161Z"
                                  fill="#2F89FF"/>
                            <path class="logo-up"
                                  d="M31.74 18.8372V3.1657H23.8723V0H42.7548V3.1657H34.8871V18.8372H31.74Z"
                                  fill="#2F89FF"/>
                            <path class="logo-bottom" d="M0 45V26.1366H3.14708V41.8343H18.8825V45H0Z"
                                  fill="#00CA62"/>
                            <path class="logo-bottom"
                                  d="M23.8994 45C23.2525 45 22.658 44.843 22.116 44.5291C21.574 44.2151 21.1457 43.7878 20.831 43.2471C20.5162 42.7064 20.3589 42.1134 20.3589 41.468V29.6948C20.3589 29.0494 20.5162 28.4564 20.831 27.9157C21.1457 27.375 21.574 26.9477 22.116 26.6337C22.658 26.3198 23.2525 26.1628 23.8994 26.1628H35.7009C36.3478 26.1628 36.9335 26.3198 37.458 26.6337C38 26.9477 38.4284 27.375 38.7431 27.9157C39.0753 28.4564 39.2414 29.0494 39.2414 29.6948V41.468C39.2414 42.1134 39.0753 42.7064 38.7431 43.2471C38.4284 43.7878 38 44.2151 37.458 44.5291C36.9335 44.843 36.3478 45 35.7009 45H23.8994ZM23.978 41.8343H35.596C35.7184 41.8343 35.8233 41.7907 35.9107 41.7035C36.0156 41.6163 36.0681 41.5029 36.0681 41.3634V29.7994C36.0681 29.6599 36.0156 29.5465 35.9107 29.4593C35.8233 29.3721 35.7184 29.3285 35.596 29.3285H23.978C23.8556 29.3285 23.742 29.3721 23.6371 29.4593C23.5497 29.5465 23.506 29.6599 23.506 29.7994V41.3634C23.506 41.5029 23.5497 41.6163 23.6371 41.7035C23.742 41.7907 23.8556 41.8343 23.978 41.8343Z"
                                  fill="#00CA62"/>
                            <path class="logo-bottom"
                                  d="M51.6953 45L40.7592 26.1628H44.4308L53.1639 41.311L61.9233 26.1628H65.5686L54.6325 45H51.6953Z"
                                  fill="#00CA62"/>
                            <path class="logo-bottom"
                                  d="M67.6648 45V26.1628H85V29.3285H70.8382V34.0116H82.2463V37.1512H70.8382V41.8343H85V45H67.6648Z"
                                  fill="#00CA62"/>
                        </svg>
                    </a>
                    <div class="container__menu">
                        <?php wp_nav_menu('menu=2'); ?>
                    </div>
                    <div class="container__more">
                        <div class="more__theme">
                            <a class="theme__light light-theme" href="#">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 2V4M12 20V22M4 12H2M6.31412 6.31412L4.8999 4.8999M17.6859 6.31412L19.1001 4.8999M6.31412 17.69L4.8999 19.1042M17.6859 17.69L19.1001 19.1042M22 12H20M17 12C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12Z"
                                          stroke="white" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </a>
                            <a class="theme__dark dark-theme" href="#">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.9548 12.9566C20.5779 15.3719 17.9791 17.0003 15 17.0003C10.5817 17.0003 7 13.4186 7 9.00033C7 6.02096 8.62867 3.42199 11.0443 2.04517C5.96975 2.52631 2 6.79961 2 12.0001C2 17.5229 6.47715 22.0001 12 22.0001C17.2002 22.0001 21.4733 18.0308 21.9548 12.9566Z"
                                          stroke="black" stroke-width="2" stroke-linecap="round"
                                          stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                        <a class="more__telegram" href="<?php the_field( 'contacts-telegram', 'option' ); ?>">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="20" fill="#27A6E5"/>
                                <path d="M28 12.6022L24.9946 28.2923C24.9946 28.2923 24.5741 29.3801 23.4189 28.8584L16.4846 23.3526L16.4524 23.3364C17.3891 22.4654 24.6524 15.7027 24.9698 15.3961C25.4613 14.9214 25.1562 14.6387 24.5856 14.9974L13.8568 22.053L9.71764 20.6108C9.71764 20.6108 9.06626 20.3708 9.00359 19.8491C8.9401 19.3265 9.73908 19.0439 9.73908 19.0439L26.6131 12.1889C26.6131 12.1889 28 11.5579 28 12.6022Z" fill="#FEFEFE"/>
                            </svg>
                        </a>
                        <a class="more__wa" href="https://wa.me/<?php echo clearPhone(get_field( 'contacts-phone', 'option' )); ?>">
                            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="40" rx="20" fill="#48C95F"/>
                                <path d="M27.9268 12.0625C25.9512 10.0937 23.3171 9 20.5366 9C14.7561 9 10.0732 13.6667 10.0732 19.4271C10.0732 21.25 10.5854 23.0729 11.4634 24.6042L10 30L15.561 28.5417C17.0976 29.3438 18.7805 29.7812 20.5366 29.7812C26.3171 29.7812 31 25.1146 31 19.3542C30.9268 16.6563 29.9024 14.0312 27.9268 12.0625ZM25.5854 23.1458C25.3659 23.7292 24.3415 24.3125 23.8293 24.3854C23.3902 24.4583 22.8049 24.4583 22.2195 24.3125C21.8537 24.1667 21.3415 24.0208 20.7561 23.7292C18.122 22.6354 16.439 20.0104 16.2927 19.7917C16.1463 19.6458 15.1951 18.4062 15.1951 17.0937C15.1951 15.7812 15.8537 15.1979 16.0732 14.9062C16.2927 14.6146 16.5854 14.6146 16.8049 14.6146C16.9512 14.6146 17.1707 14.6146 17.3171 14.6146C17.4634 14.6146 17.6829 14.5417 17.9024 15.0521C18.122 15.5625 18.6341 16.875 18.7073 16.9479C18.7805 17.0938 18.7805 17.2396 18.7073 17.3854C18.6341 17.5312 18.561 17.6771 18.4146 17.8229C18.2683 17.9687 18.1219 18.1875 18.0488 18.2604C17.9024 18.4062 17.7561 18.5521 17.9024 18.7708C18.0488 19.0625 18.561 19.8646 19.3659 20.5937C20.3902 21.4687 21.1951 21.7604 21.4878 21.9063C21.7805 22.0521 21.9268 21.9792 22.0732 21.8333C22.2195 21.6875 22.7317 21.1042 22.878 20.8125C23.0244 20.5208 23.2439 20.5938 23.4634 20.6667C23.6829 20.7396 25 21.3958 25.2195 21.5417C25.5122 21.6875 25.6585 21.7604 25.7317 21.8333C25.8049 22.0521 25.8049 22.5625 25.5854 23.1458Z" fill="white"/>
                            </svg>
                        </a>
                        <a class="more__phone"
                           href="tel:<?php echo clearPhone(get_field('contacts-phone', 'option')) ?>"><?php the_field('contacts-phone', 'option'); ?></a>
                    </div>
                </div>
                <div class="main-header__container container mobile">
                    <a class="container__logo" href="/">
                        <svg width="63" height="33" viewBox="0 0 63 33" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.0194378 13.814V0H12.8678V2.32151H2.37142V5.75581H10.8269V8.05814H2.37142V13.814H0.0194378Z"
                                  fill="#2F89FF"/>
                            <path d="M13.8719 13.814V0H16.185V13.814H13.8719Z" fill="#2F89FF"/>
                            <path d="M23.5249 13.814V2.32151H17.6936V0H31.6888V2.32151H25.8575V13.814H23.5249Z"
                                  fill="#2F89FF"/>
                            <path d="M0 33V19.1669H2.33254V30.6785H13.9952V33H0Z" fill="#00CA62"/>
                            <path d="M17.7136 33C17.2342 33 16.7936 32.8849 16.3919 32.6547C15.9901 32.4244 15.6727 32.111 15.4394 31.7145C15.2062 31.318 15.0895 30.8831 15.0895 30.4099V21.7762C15.0895 21.3029 15.2062 20.868 15.4394 20.4715C15.6727 20.075 15.9901 19.7616 16.3919 19.5314C16.7936 19.3012 17.2342 19.186 17.7136 19.186H26.4607C26.9401 19.186 27.3742 19.3012 27.763 19.5314C28.1647 19.7616 28.4822 20.075 28.7155 20.4715C28.9617 20.868 29.0848 21.3029 29.0848 21.7762V30.4099C29.0848 30.8831 28.9617 31.318 28.7155 31.7145C28.4822 32.111 28.1647 32.4244 27.763 32.6547C27.3742 32.8849 26.9401 33 26.4607 33H17.7136ZM17.772 30.6785H26.3829C26.4736 30.6785 26.5514 30.6465 26.6162 30.5826C26.6939 30.5186 26.7328 30.4355 26.7328 30.3331V21.8529C26.7328 21.7506 26.6939 21.6674 26.6162 21.6035C26.5514 21.5395 26.4736 21.5076 26.3829 21.5076H17.772C17.6812 21.5076 17.597 21.5395 17.5193 21.6035C17.4545 21.6674 17.4221 21.7506 17.4221 21.8529V30.3331C17.4221 30.4355 17.4545 30.5186 17.5193 30.5826C17.597 30.6465 17.6812 30.6785 17.772 30.6785Z"
                                  fill="#00CA62"/>
                            <path d="M38.3153 33L30.2097 19.186H32.931L39.4038 30.2948L45.8961 19.186H48.5979L40.4924 33H38.3153Z"
                                  fill="#00CA62"/>
                            <path d="M50.1516 33V19.186H63V21.5076H52.5036V24.9419H60.959V27.2442H52.5036V30.6785H63V33H50.1516Z"
                                  fill="#00CA62"/>
                        </svg>
                    </a>
                    <div class="container__more">
                        <a class="more__phone"
                           href="tel:<?php echo clearPhone(get_field('contacts-phone', 'option')) ?>">
                            <svg width="50" height="50" viewBox="0 0 50 50" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <circle cx="25" cy="25" r="25" fill="#00CA62"/>
                                <path d="M20.4753 21.0665C21.3453 22.8786 22.5313 24.5769 24.0333 26.0788C25.5353 27.5808 27.2336 28.7668 29.0456 29.6368C29.2015 29.7116 29.2794 29.749 29.378 29.7778C29.7284 29.8799 30.1588 29.8066 30.4556 29.5941C30.5391 29.5343 30.6105 29.4628 30.7534 29.3199C31.1904 28.8829 31.4089 28.6644 31.6286 28.5215C32.4573 27.9828 33.5255 27.9828 34.3541 28.5215C34.5738 28.6644 34.7923 28.8829 35.2293 29.3199L35.4729 29.5635C36.1372 30.2278 36.4694 30.56 36.6498 30.9167C37.0086 31.6261 37.0086 32.464 36.6498 33.1734C36.4694 33.5301 36.1372 33.8623 35.4729 34.5266L35.2759 34.7236C34.6138 35.3857 34.2828 35.7167 33.8328 35.9695C33.3334 36.25 32.5578 36.4517 31.985 36.45C31.4688 36.4485 31.1161 36.3484 30.4105 36.1481C26.6188 35.0719 23.0408 33.0413 20.0558 30.0563C17.0708 27.0713 15.0403 23.4934 13.964 19.7016C13.7638 18.9961 13.6637 18.6433 13.6621 18.1271C13.6604 17.5543 13.8621 16.7787 14.1426 16.2793C14.3955 15.8293 14.7265 15.4983 15.3885 14.8363L15.5855 14.6392C16.2498 13.9749 16.582 13.6428 16.9387 13.4623C17.6482 13.1035 18.486 13.1035 19.1955 13.4623C19.5522 13.6428 19.8843 13.9749 20.5486 14.6392L20.7922 14.8828C21.2292 15.3198 21.4477 15.5383 21.5906 15.758C22.1293 16.5867 22.1293 17.6549 21.5906 18.4835C21.4477 18.7032 21.2292 18.9217 20.7922 19.3587C20.6493 19.5016 20.5779 19.5731 20.5181 19.6566C20.3056 19.9534 20.2322 20.3837 20.3343 20.7341C20.3631 20.8327 20.4005 20.9107 20.4753 21.0665Z"
                                      stroke="white" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a class="more__menu" id="openMenu" href="#">
                            <div class="menu__hamburger" id="hamburger-icon">
                                <span class="line line-1"></span>
                                <span class="line line-2"></span>
                                <span class="line line-3"></span>
                            </div>
                        </a>
                    </div>
                </div>
            </header>

            <div class="main-background" id="background"></div>

            <div class="main-menu" id="menu">
                <div class="main-menu__container menu-container">
                    <div class="container__menu">
                        <?php wp_nav_menu('menu=2'); ?>
                    </div>
                    <div class="container__theme">
                        <a class="theme__light light-theme" href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 2V4M12 20V22M4 12H2M6.31412 6.31412L4.8999 4.8999M17.6859 6.31412L19.1001 4.8999M6.31412 17.69L4.8999 19.1042M17.6859 17.69L19.1001 19.1042M22 12H20M17 12C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12Z"
                                      stroke="white" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </a>
                        <a class="theme__dark dark-theme" href="#">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.9548 12.9566C20.5779 15.3719 17.9791 17.0003 15 17.0003C10.5817 17.0003 7 13.4186 7 9.00033C7 6.02096 8.62867 3.42199 11.0443 2.04517C5.96975 2.52631 2 6.79961 2 12.0001C2 17.5229 6.47715 22.0001 12 22.0001C17.2002 22.0001 21.4733 18.0308 21.9548 12.9566Z"
                                      stroke="black" stroke-width="2" stroke-linecap="round"
                                      stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    <div class="container__phone">
                        <p>Свяжитесь с нами</p>
                        <a href="tel:<?php echo clearPhone(get_field('contacts-phone', 'option')) ?>"><?php the_field('contacts-phone', 'option'); ?></a>
                        <a href="mailto:<?php the_field( 'contacts-mail', 'option' ); ?>"><?php the_field( 'contacts-mail', 'option' ); ?></a>
                        <div class="phone__socials">
                            <a class="more__telegram" href="<?php the_field( 'contacts-telegram', 'option' ); ?>">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="40" height="40" rx="20" fill="#27A6E5"/>
                                    <path d="M28 12.6022L24.9946 28.2923C24.9946 28.2923 24.5741 29.3801 23.4189 28.8584L16.4846 23.3526L16.4524 23.3364C17.3891 22.4654 24.6524 15.7027 24.9698 15.3961C25.4613 14.9214 25.1562 14.6387 24.5856 14.9974L13.8568 22.053L9.71764 20.6108C9.71764 20.6108 9.06626 20.3708 9.00359 19.8491C8.9401 19.3265 9.73908 19.0439 9.73908 19.0439L26.6131 12.1889C26.6131 12.1889 28 11.5579 28 12.6022Z" fill="#FEFEFE"/>
                                </svg>
                            </a>
                            <a class="more__wa" href="https://wa.me/<?php echo clearPhone(get_field( 'contacts-phone', 'option' )); ?>">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="40" height="40" rx="20" fill="#48C95F"/>
                                    <path d="M27.9268 12.0625C25.9512 10.0937 23.3171 9 20.5366 9C14.7561 9 10.0732 13.6667 10.0732 19.4271C10.0732 21.25 10.5854 23.0729 11.4634 24.6042L10 30L15.561 28.5417C17.0976 29.3438 18.7805 29.7812 20.5366 29.7812C26.3171 29.7812 31 25.1146 31 19.3542C30.9268 16.6563 29.9024 14.0312 27.9268 12.0625ZM25.5854 23.1458C25.3659 23.7292 24.3415 24.3125 23.8293 24.3854C23.3902 24.4583 22.8049 24.4583 22.2195 24.3125C21.8537 24.1667 21.3415 24.0208 20.7561 23.7292C18.122 22.6354 16.439 20.0104 16.2927 19.7917C16.1463 19.6458 15.1951 18.4062 15.1951 17.0937C15.1951 15.7812 15.8537 15.1979 16.0732 14.9062C16.2927 14.6146 16.5854 14.6146 16.8049 14.6146C16.9512 14.6146 17.1707 14.6146 17.3171 14.6146C17.4634 14.6146 17.6829 14.5417 17.9024 15.0521C18.122 15.5625 18.6341 16.875 18.7073 16.9479C18.7805 17.0938 18.7805 17.2396 18.7073 17.3854C18.6341 17.5312 18.561 17.6771 18.4146 17.8229C18.2683 17.9687 18.1219 18.1875 18.0488 18.2604C17.9024 18.4062 17.7561 18.5521 17.9024 18.7708C18.0488 19.0625 18.561 19.8646 19.3659 20.5937C20.3902 21.4687 21.1951 21.7604 21.4878 21.9063C21.7805 22.0521 21.9268 21.9792 22.0732 21.8333C22.2195 21.6875 22.7317 21.1042 22.878 20.8125C23.0244 20.5208 23.2439 20.5938 23.4634 20.6667C23.6829 20.7396 25 21.3958 25.2195 21.5417C25.5122 21.6875 25.6585 21.7604 25.7317 21.8333C25.8049 22.0521 25.8049 22.5625 25.5854 23.1458Z" fill="white"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>