<?php
$bg_image_id_mobile = get_option('_crb_home_cover_background_image_mobile');
$bg_image_id_desktop = get_option('_crb_home_cover_background_image_desktop');
$title_image_id_mobile = get_option('_crb_home_cover_title_image_mobile');
$title_image_id_desktop = get_option('_crb_home_cover_title_image_desktop');
$title_image_class = '';
if (!empty($title_image_id_mobile) && !empty($title_image_id_desktop)) {
    $title_image_class = 'responsive';
}
${'title' . crb_lang_slug()} = nl2br(get_option('_crb_home_cover_title' . crb_lang_slug()));
${'subtitle' . crb_lang_slug()} = nl2br(get_option('_crb_home_cover_subtitle' . crb_lang_slug()));
?>

<section id="intro" class="home-intro offset-height">
    <div class="hero home-intro-banner">
        <?php getImage($bg_image_id_desktop, $bg_image_id_mobile, array(), array('img', 'img-cover'), true); ?>
        <div class="home-intro-content">
            <?php if (!empty($title_image_id_mobile) || !empty($title_image_id_desktop)) { ?>
            <div class="home-intro-image <?php echo $title_image_class; ?>">
            <?php getImage($title_image_id_desktop, $title_image_id_mobile); ?>
            </div>
            <?php } else { ?>
            <div class="container">
                <?php if (!empty(${'title' . crb_lang_slug()})) { ?>
                <h1 class="home-intro-title">
                    <?php echo ${'title' . crb_lang_slug()}; ?>
                </h1>
                <?php } ?>
                <?php if (!empty(${'subtitle' . crb_lang_slug()})) { ?>
                <h3 class="h3 home-intro-subtitle"><?php echo ${'subtitle' . crb_lang_slug()}; ?></h3>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>