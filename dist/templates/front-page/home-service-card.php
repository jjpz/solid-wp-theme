<!-- Single Service -->
<article <?php post_class('col-lg-6', $ID) ?>>
    <div class="service-card">
        <?php if (!empty($image_id)) { ?>
        <div class="service-left service-image">
            <?php getImage($image_id, '', true, array('image-aspect-square'), array('img', 'img-contain')); ?>
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