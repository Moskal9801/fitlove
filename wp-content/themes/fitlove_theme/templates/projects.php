<?php
/* Template name: Наши проекты */
get_header();
?>

<?php
$counter  = 1;

if (!wp_is_mobile()) {
    $maxPosts = 6;
} else {
    $maxPosts = 4;
}

$post_type = 'post';
?>

    <section class="projects-page__contents">
        <div class="container">
            <div class="contents__title">
                <div class="title__name">НАШИ<br>ПРОЕКТЫ</div>
                <div class="title__info"><?php the_field( 'banner-text' ); ?></div>
            </div>
            <div class="contents__contents">
                <div class="contents__content">
                    <?php $args = array(
                        'post_type'      => $post_type,
                        'post_status'    => 'publish',
                        'posts_per_page' => $maxPosts,
                        'order'        => 'DESC',
                    );

                    $query = new WP_Query( $args );

                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() && (($counter % $maxPosts) !== 0) ) {
                            $query->the_post();

                            $params = [
                                'reviews_id' => get_the_ID()
                            ];
                            if (!wp_is_mobile()) {
                                get_template_part('parts/projects', 'item_desktop', $params);
                            } else {
                                get_template_part('parts/projects', 'item_mobile', $params);
                            }
                            $counter++;
                        }
                    } wp_reset_postdata(); ?>
                </div>
                <?php $query = array (
                    'post_type'      => $post_type,
                    'post_status'    => 'publish',
                    'post_per_page' => $maxPosts,
                );
                $posts = new WP_Query( $query );
                $allPostsCounter = 0;
                while ( $posts->have_posts() ) {
                    $posts->the_post();
                    $allPostsCounter++;
                }
                $maxPosts--;
                $maxPages = ceil( $allPostsCounter / $maxPosts );
                if ( $maxPages > 1 ) { ?>
                    <a href="#" class="contents__more"
                       id="more-projects"
                       data-current-page="1"
                       data-query='<?= json_encode( $posts->query_vars ); ?>'
                       data-max-pages="<?= $maxPages; ?>">Загрузить еще
                    </a>
                <?php } wp_reset_postdata(); ?>
            </div>
        </div>
    </section>

<?php
get_footer();
?>
