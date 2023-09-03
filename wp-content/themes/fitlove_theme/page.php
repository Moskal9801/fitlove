<?php
get_header();
?>

    <section class="default-page__contents">
        <div class="default-container">
            <div class="contents__title"><?php the_title(); ?></div>
            <div class="contents__content"><?php the_content(); ?></div>
        </div>
    </section>

<?php
get_footer();
?>
