<?php
$ID = get_the_ID();
$title = get_the_title();
$link = get_the_permalink($ID);
$image_id = get_post_thumbnail_id();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-6 '); ?>>

    <a href="<?php echo $link; ?>" class="card" >

        <?php if (has_post_thumbnail()) { ?>
        <div class="pic">
            <?php getImage(
                $image_id, 
                '', 
                true, 
                array('image-aspect-square'), 
                array('img', 'img-contain')
            ); ?>
        </div>
        <?php } ?>

        <div class="info">
            <h2 class="name"><?php echo $title; ?></h2>
            <p class="link link-more link-icon-right font-smaller">
                <span>read more</span>
                <svg class="svg-caret icon-caret icon-caret-right" width="5" height="13" viewBox="0 0 192 512"><path fill="currentColor" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"></path></svg>
            </p>
        </div>

    </a>

</article>