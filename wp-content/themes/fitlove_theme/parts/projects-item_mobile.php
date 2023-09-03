<a class="content__item" href="<?php echo get_permalink(); ?>">
    <div class="item__image"><?php the_post_thumbnail(); ?></div>
    <div class="item__info">
        <div class="info__block">
            <div class="block__name"><?php the_title(); ?></div>
            <div class="block__more"><?php the_excerpt(); ?></div>
        </div>
    </div>
</a>