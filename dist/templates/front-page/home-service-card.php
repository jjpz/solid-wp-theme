<!-- Single Service -->
<article <?php post_class('col-lg-6', $ID) ?>>
    <div class="service-card">
        <?php if (!empty($image_id)) { ?>
        <div class="service-left">
            <div class="image image-aspect-square service-image">

                <img 
                    class="img img-contain lazy" 
                    src="" 
                    srcset="" 
                    data-src="<?php echo $src; ?>"
                    data-srcset="<?php echo $srcset; ?>" 
                    data-type="<?php echo $type; ?>" 
                    alt="<?php echo $image_alt; ?>" 
                />

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