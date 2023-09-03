<div class="content__item">
    <div class="item__image"><?php the_post_thumbnail(); ?></div>
    <div class="item__info">
        <div class="info__block">
            <a class="block__name" href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
            <div class="block__more"><?php the_excerpt(); ?></div>
        </div>
        <a class="info__more" href="<?php echo get_permalink(); ?>">Подробнее</a>
    </div>
</div>