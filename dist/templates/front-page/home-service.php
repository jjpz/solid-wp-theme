<?php foreach ($args as $service) { ?>
    <?php
    $ID = $service->ID;
    $title = $service->post_title;
    $content = apply_filters('the_content', $service->post_content);
    $image_id = get_post_thumbnail_id($ID);
    (empty($image_id)) ? $class = 'full-width' : $class = '';
    ?>
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
<?php } ?>