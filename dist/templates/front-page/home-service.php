<?php if (!empty($args)) { ?>
    <section class="section-body">
        <div class="services">
            <div class="container">
                <div class="row">
                    <?php foreach ($args as $service) { ?>
                        <?php
                        $ID = $service->ID;
                        $title = $service->post_title;
                        $content = apply_filters('the_content', $service->post_content);
                        $image_id = get_post_thumbnail_id($ID);
                        (empty($image_id)) ? $class = 'full-width' : $class = '';
                        ?>
                        <?php require 'home-service-card.php'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>