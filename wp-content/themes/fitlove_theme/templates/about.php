<?php
/* Template name: О нас */
get_header();
?>

    <section class="about-page__banner">
        <div class="container">
            <div class="banner__info">
                <div class="info__title">О НАС</div>
                <div class="info__content">
                    <div class="content__name"><?php the_field( 'banner-title' ); ?></div>
                    <div class="content__text"><?php the_field( 'banner-text' ); ?></div>
                    <a class="content__button" href="/projects/">Наши проекты</a>
                </div>
            </div>
            <div class="banner__image">
                <svg width="360" height="437" viewBox="0 0 360 437" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M196.705 101.89L196.678 101.884C165.577 95.2488 132.922 124.719 123.741 167.709L85.7777 345.457C76.5962 388.447 94.3651 428.676 125.466 435.311L125.493 435.317C156.593 441.953 189.248 412.482 198.43 369.493L236.393 191.745C245.574 148.755 227.805 108.526 196.705 101.89Z" fill="#2F89FF"/>
                    <path d="M324.014 109.443C323.519 64.3589 286.928 27.933 241.869 27.933C231.973 27.933 222.488 29.6977 213.691 32.8964C198.708 12.9324 174.873 0 148.014 0C103.89 0 67.9038 34.8817 65.9244 78.6425C28.3161 86.1979 0 119.508 0 159.436C0 204.961 36.7835 241.856 82.1718 241.856C100.069 241.856 116.619 236.093 130.117 226.359C142.186 233.363 156.206 237.389 171.161 237.389C186.117 237.389 199.78 233.446 211.766 226.607C226.749 246.875 250.749 260 277.828 260C323.216 260 360 223.105 360 177.58C360 149.233 345.732 124.251 324.014 109.416V109.443Z" fill="#00CA62"/>
                </svg>
                <img src="<?php the_field( 'banner-image' ); ?>">
            </div>
            <div class="banner__more">
                <div class="more__name"><?php the_field( 'banner-title' ); ?></div>
                <div class="more__text"><?php the_field( 'banner-text' ); ?></div>
            </div>
        </div>
    </section>

    <section class="default-page__contents">
        <div class="default-container">
            <div class="contents__content"><?php the_content(); ?></div>
        </div>
    </section>

<?php
get_footer();
?>
