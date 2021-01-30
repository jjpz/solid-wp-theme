<!-- Single Service Card -->
<article <?php post_class('col-lg-6', $ID) ?>>
    <div class="service-card">
        <?php if (!empty($image_id)) { ?>
        <div class="service-left">
            <div class="image image-aspect-square service-image">
                <?php if (isset(pathinfo($src)['extension']) && pathinfo($src)['extension'] === 'svg') { ?>
                <img class="img img-contain lazy" src="<?php echo $src; ?>" title="<?php echo $image_title; ?>"
                    alt="<?php echo $image_alt; ?>">
                <?php } else { ?>
                <img class="img img-contain lazy" src="" srcset="" data-srcset="<?php echo $srcset; ?>"
                    title="<?php echo $image_title; ?>" alt="<?php echo $image_alt; ?>">
                <?php } ?>
                <div class="lazy-overlay on"></div>
            </div>
        </div>
        <?php } ?>
        <div class="service-right <?php echo $class; ?>">
            <div class="service-title">
                <h2><?php echo $title; ?></h2>
            </div>
            <div class="service-content">
                <?php echo $content; ?>
            </div>
        </div>
    </div>
</article>