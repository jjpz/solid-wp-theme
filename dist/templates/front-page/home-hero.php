<?php
$bg_image_id_mobile = get_option('_crb_home_cover_background_image_mobile');
$bg_image_id_desktop = get_option('_crb_home_cover_background_image_desktop');
$title_image_id_mobile = get_option('_crb_home_cover_title_image_mobile');
$title_image_id_desktop = get_option('_crb_home_cover_title_image_desktop');
${'title' . crb_lang_slug()} = nl2br(get_option('_crb_home_cover_title' . crb_lang_slug()));
${'subtitle' . crb_lang_slug()} = nl2br(get_option('_crb_home_cover_subtitle' . crb_lang_slug()));
?>

<section id="cover" class="hero home-hero offset-height">
    <div class="home-hero-banner">
        <?php if (!empty($bg_image_id_desktop) || !empty($bg_image_id_mobile)) {
            getImage($bg_image_id_desktop, $bg_image_id_mobile, 'true', array(), array('img', 'img-cover'));
        } ?>
        <div class="home-hero-content">
            <?php if (!empty($title_image_id_mobile) || !empty($title_image_id_desktop)) { ?>
            <div class="home-hero-image">
            <?php getImage($title_image_id_desktop, $title_image_id_mobile); ?>
            </div>
            <?php } else { ?>
            <div class="container">
                <h1 class="home-hero-title">
                <?php if (!empty(${'title' . crb_lang_slug()})) { ?>
                    <?php echo ${'title' . crb_lang_slug()}; ?>
                <?php } else { ?>
                    <?php echo get_bloginfo('name'); ?>
                <?php } ?>
                </h1>
                <?php if (!empty(${'subtitle' . crb_lang_slug()})) { ?>
                <h3 class="home-hero-subtitle"><?php echo ${'subtitle' . crb_lang_slug()}; ?></h3>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>