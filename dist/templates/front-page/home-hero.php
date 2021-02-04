<?php
// Mobile Background Image
$bg_image_id_mobile = get_option('_crb_home_cover_background_image_mobile');
if (!empty($bg_image_id_mobile)) {
    $bg_image_src_mobile = wp_get_attachment_image_src($bg_image_id_mobile, 'full')[0];
    $bg_image_srcset_mobile = wp_get_attachment_image_srcset($bg_image_id_mobile, 'full');
    $bg_image_type_mobile = pathinfo($bg_image_src_mobile)['extension'];
    $bg_image_alt_mobile = get_post_meta($bg_image_id_mobile, '_wp_attachment_image_alt', true);
}
// Desktop Background Image
$bg_image_id_desktop = get_option('_crb_home_cover_background_image_desktop');
if (!empty($bg_image_id_desktop)) {
    $bg_image_src_desktop = wp_get_attachment_image_src($bg_image_id_desktop, 'full')[0];
    $bg_image_srcset_desktop = wp_get_attachment_image_srcset($bg_image_id_desktop, 'full');
    $bg_image_type_desktop = pathinfo($bg_image_src_desktop)['extension'];
    //$bg_image_title_desktop = get_the_title($bg_image_id_desktop);
    $bg_image_alt_desktop = get_post_meta( $bg_image_id_desktop, '_wp_attachment_image_alt', true);
}
// Content
$title_image_mobile_id = get_option('_crb_home_cover_title_image_mobile');
if (!empty($title_image_mobile_id)) {
    $title_image_mobile = wp_get_attachment_image_src($title_image_mobile_id, 'full')[0];
    $title_image_mobile_alt = get_post_meta( $title_image_mobile_id, '_wp_attachment_image_alt', true);
}
$title_image_desktop_id = get_option('_crb_home_cover_title_image_desktop');
if (!empty($title_image_desktop_id)) {
    $title_image_desktop = wp_get_attachment_image_src($title_image_desktop_id, 'full')[0];
    $title_image_desktop_alt = get_post_meta( $title_image_desktop_id, '_wp_attachment_image_alt', true);
}
$title_image_class = '';
if (!empty($title_image_mobile_id) && !empty($title_image_desktop_id)) {
    $title_image_class = 'responsive';
}
${'title' . crb_lang_slug()} = nl2br(get_option('_crb_home_cover_title' . crb_lang_slug()));
${'subtitle' . crb_lang_slug()} = nl2br(get_option('_crb_home_cover_subtitle' . crb_lang_slug()));
?>

<section id="intro" class="home-intro offset-height">
    <div class="banner image home-intro-banner">
        <?php if (!empty($bg_image_id_mobile) || !empty($bg_image_id_desktop)) { ?>
        <img 
            class="img img-cover lazy" 
            src="" 
            srcset="" 
            alt="" 
            data-src="<?php echo $bg_image_src_desktop; ?>" 
            data-srcset="<?php echo $bg_image_srcset_desktop; ?>" 
            data-alt="<?php echo $bg_image_alt_desktop; ?>" 
            data-type="<?php echo $bg_image_type_desktop; ?>" 
            data-mobile-src="<?php echo $bg_image_src_mobile; ?>" 
            data-mobile-srcset="<?php echo $bg_image_srcset_mobile; ?>" 
            data-mobile-alt="<?php echo $bg_image_alt_mobile; ?>" 
            data-mobile-type="<?php echo $bg_image_type_mobile; ?>" 
        />
        <div class="lazy-overlay on"></div>
        <?php } ?>
        <div class="home-intro-content">
            <?php if (!empty($title_image_mobile_id) || !empty($title_image_desktop_id)) { ?>
            <div class="home-intro-image <?php echo $title_image_class; ?>">
                <?php if (!empty($title_image_mobile_id)) { ?>
                <img class="mobile" src="<?php echo $title_image_mobile; ?>" alt="<?php echo $title_image_mobile_alt; ?>">
                <?php } ?>
                <?php if (!empty($title_image_desktop_id)) { ?>
                <img class="desktop" src="<?php echo $title_image_desktop; ?>" alt="<?php echo $title_image_desktop_alt; ?>">
                <?php } ?>
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