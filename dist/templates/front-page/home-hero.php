<?php
// Mobile Background Image
$bg_image_mobile_id = get_option('_crb_home_cover_background_image_mobile');
if (!empty($bg_image_mobile_id)) {
    $bg_image_mobile_srcset = wp_get_attachment_image_srcset($bg_image_mobile_id, 'full');
    $bg_image_mobile_title = get_the_title($bg_image_mobile_id);
    $bg_image_mobile_alt = get_post_meta( $bg_image_mobile_id, '_wp_attachment_image_alt', true);
}
// Desktop Background Image
$bg_image_desktop_id = get_option('_crb_home_cover_background_image_desktop');
if (!empty($bg_image_desktop_id)) {
    $bg_image_desktop_srcset = wp_get_attachment_image_srcset($bg_image_desktop_id, 'full');
    $bg_image_desktop_title = get_the_title($bg_image_desktop_id);
    $bg_image_desktop_alt = get_post_meta( $bg_image_desktop_id, '_wp_attachment_image_alt', true);
}
// Content
$title_image_desktop_id = get_option('_crb_home_cover_title_image_desktop');
if (!empty($title_image_desktop_id)) {
    $title_image_desktop = wp_get_attachment_image_src($title_image_desktop_id, 'full')[0];
}
$title_image_mobile_id = get_option('_crb_home_cover_title_image_mobile');
if (!empty($title_image_mobile_id)) {
    $title_image_mobile = wp_get_attachment_image_src($title_image_mobile_id, 'full')[0];
}
${'title' . crb_lang_slug()} = nl2br(get_option('_crb_home_cover_title' . crb_lang_slug()));
${'subtitle' . crb_lang_slug()} = nl2br(get_option('_crb_home_cover_subtitle' . crb_lang_slug()));
?>

<section id="intro" class="home-intro offset-height">
    <div class="banner image home-intro-banner">
        <?php if (!empty($bg_image_mobile_id) || !empty($bg_image_desktop_id)) { ?>
        <img class="img img-cover lazy" src="" srcset="" data-desktop="<?php echo $bg_image_desktop_srcset; ?>"
            data-mobile="<?php echo $bg_image_mobile_srcset; ?>" title=""
            data-desktop-title="<?php echo $bg_image_desktop_title; ?>"
            data-mobile-title="<?php echo $bg_image_mobile_title; ?>" alt=""
            data-desktop-alt="<?php echo $bg_image_desktop_alt; ?>" data-mobile-alt="<?php echo $bg_image_mobile_alt; ?>">
        <div class="lazy-overlay on"></div>
        <?php } ?>
        <div class="home-intro-content">
            <?php if (!empty($title_image_desktop_id)) { ?>
            <div class="home-intro-image">
                <img src="<?php echo $title_image_desktop; ?>" />
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