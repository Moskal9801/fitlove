<?php
/* Template name: Главная */
get_header();
?>

    <section class="home-page__banner">
        <div class="container">
            <div class="banner__info">
                <div data-sal="slide-up" data-sal-duration="1000" class="info__company-title">Автономная некоммерческая организация</div>
                <h1 data-sal="slide-up" data-sal-duration="1250" data-sal-delay="550" class="info__company-name">Фестиваль<br>ФитЛав</h1>
                <div data-sal="slide-up" data-sal-duration="1250" data-sal-delay="1100" class="info__company-about"><?php the_field( 'banner-text' ); ?></div>
            </div>
            <div class="banner__image">
                <img data-sal="zoom-in" data-sal-duration="500" data-sal-delay="1750" class="image__broccoli" src="/wp-content/themes/fitlove_theme/assets/images/broccoli.png">
                <img data-sal="zoom-in" data-sal-duration="500" data-sal-delay="1250" class="image__dumbbells" src="/wp-content/themes/fitlove_theme/assets/images/dumbbells.png">
                <img data-sal="zoom-in" data-sal-duration="1250" class="image__main" src="<?php the_field( 'banner-image' ); ?>">
            </div>
        </div>
    </section>

    <section class="home-page__about">
        <div class="container">
            <div class="about__image" data-sal="slide-up" data-sal-duration="1250" data-sal-delay="550">
                <img src="<?php the_field( 'about-image' ); ?>">
            </div>
            <div class="about__info" data-sal="slide-up" data-sal-duration="1250" data-sal-delay="1100">
                <div class="info__title">О НАС</div>
                <div class="info__text"><?php the_field( 'about-text' ); ?></div>
                <a class="info__button" href="/about/">Подробнее</a>
            </div>
            <div class="about__heart" data-sal="slide-left" data-sal-duration="1000">
                <svg width="585" height="426" viewBox="0 0 585 426" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M77.519 292.137L292.253 506.762L77.519 292.137Z" fill="#AC1EE9"/>
                    <path d="M540.038 44.4762C480.75 -14.7825 384.593 -14.7825 325.305 44.4762L292.252 77.512L506.986 292.137L540.038 259.102C599.327 199.843 599.327 103.735 540.038 44.4762Z" fill="#AC1EE9"/>
                    <path d="M259.243 44.4762C199.911 -14.8254 103.798 -14.8254 44.4664 44.4762C-14.8221 103.735 -14.8221 199.843 44.4664 259.101L77.5189 292.137L292.252 77.4691L259.2 44.4333L259.243 44.4762Z" fill="#AC1EE9"/>
                    <path d="M507.029 292.137L292.252 506.762L507.029 292.137Z" fill="#AC1EE9"/>
                    <path d="M292.265 77.5314L77.5249 292.163L292.265 506.794L507.004 292.163L292.265 77.5314Z" fill="#AC1EE9"/>
                </svg>
            </div>
        </div>
    </section>

    <section class="home-page__projects">
        <div class="container">
            <div class="projects__title" data-sal="slide-up" data-sal-duration="1000">
                <div class="title__name">НАШИ<br>ПРОЕКТЫ</div>
                <div class="title__info"><?php the_field( 'projects-text' ); ?></div>
            </div>
            <div class="projects__projects">
                <div class="projects__contents">
                    <?php $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'order'        => 'DESC',
                    );
                    $query = new WP_Query( $args );
                    if ( $query->have_posts() ) :
                        $delay = 0;
                        while ( $query->have_posts() ) : $query->the_post(); ?>
                            <a class="contents__content" href="<?php echo get_permalink(); ?>" data-sal="slide-up" data-sal-duration="1000" data-sal-delay="<?php echo $delay; ?>">
                                <div class="content__image"><?php the_post_thumbnail(); ?></div>
                                <div class="content__info">
                                    <div class="info__title"><?php the_title(); ?></div>
                                    <div class="info__more"><?php the_excerpt(); ?></div>
                                </div>
                            </a>
                            <?php $delay = $delay + 500; ?>
                        <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>
                </div>
                <a class="projects__button" href="/projects/">Смотреть все проекты</a>
            </div>
        </div>
    </section>

<?php
get_footer();
?>
