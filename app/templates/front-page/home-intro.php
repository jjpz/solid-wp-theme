<section class="home-intro offset-height">
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
                <h1 class="home-intro-title">
                    <?php echo (!empty($home_intro_title)) ? $home_intro_title : $site_title; ?>
                </h1>
                <h3 class="home-intro-subtitle">
                    <span>
                        <?php echo (!empty($home_intro_subtitle)) ? $home_intro_subtitle : $site_tagline; ?>
                    </span>
                </h3>
            </div>
        </div>
    </div>
</section>