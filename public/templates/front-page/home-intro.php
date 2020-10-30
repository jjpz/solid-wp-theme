<?php
global $wpdb;
$alloptions = $wpdb->get_results( "SELECT option_name, option_value FROM $wpdb->options WHERE autoload = 'no'" );
$options = array();
foreach ($alloptions as $o) {
    $options[$o->option_name] = $o->option_value;
}
foreach ($options as $key => $value) {
    if (substr($key, -3) === '_ja') {
        print_r($value);
    }
}
?>
<section id="intro" class="home-intro offset-height">
    <div class="banner image home-intro-banner">
        <?php if (!empty($mobile_banner_id) || !empty($desktop_banner_id)) { ?>
        <img class="img img-cover lazy" src="" srcset="" data-desktop="<?php echo $desktop_banner_srcset; ?>"
            data-mobile="<?php echo $mobile_banner_srcset; ?>" title=""
            data-desktop-title="<?php echo $desktop_banner_title; ?>"
            data-mobile-title="<?php echo $mobile_banner_title; ?>" alt=""
            data-desktop-alt="<?php echo $desktop_banner_alt; ?>" data-mobile-alt="<?php echo $mobile_banner_alt; ?>">
        <div class="lazy-overlay on"></div>
        <?php } ?>
        <div class="home-intro-content">
            <div class="container">
                <?php if (isset(${'home_intro_title' . crb_lang_slug()}) && !empty(${'home_intro_title' . crb_lang_slug()})) { ?>
                <h1 class="home-intro-title">
                    <?php echo ${'home_intro_title' . crb_lang_slug()}; ?>
                </h1>
                <?php } ?>
                <?php if (isset(${'home_intro_subtitle' . crb_lang_slug()}) && !empty(${'home_intro_subtitle' . crb_lang_slug()})) { ?>
                <h3 class="h3 home-intro-subtitle"><?php echo ${'home_intro_subtitle' . crb_lang_slug()}; ?></h3>
                <?php } ?>
            </div>
        </div>
    </div>
</section>