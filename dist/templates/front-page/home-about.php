<?php
$paragraph = apply_filters('the_content', carbon_get_theme_option('crb_home_intro_paragraph'));
$bigtext = nl2br(carbon_get_theme_option('crb_home_intro_bigtext'));
${'paragraph' . crb_lang_slug()} = apply_filters('the_content', get_option('_crb_home_intro_paragraph' . crb_lang_slug()));
${'bigtext' . crb_lang_slug()} = nl2br(get_option('_crb_home_intro_bigtext' . crb_lang_slug()));
?>

<?php if (!empty(${'paragraph' . crb_lang_slug()}) || !empty(${'bigtext' . crb_lang_slug()})) { ?>
<?php (!empty($paragraph) && !empty(${'bigtext' . crb_lang_slug()})) ? $col = 2 : $col = 1; ?>
<section id="about" class="home-section-w-bg home-about">
    <div class="container">
        <div class="row align-items-baseline">
            <?php if ($col === 2) { ?>
            <div class="col-md-6">
                <?php if (!empty(${'paragraph' . crb_lang_slug()})) { echo ${'paragraph' . crb_lang_slug()}; } ?>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <h1 class="bigtext home-about-bigtext"><?php echo ${'bigtext' . crb_lang_slug()}; ?></h1>
            </div>
            <?php } else { ?>
            <div class="col-12">
                <?php if (!empty(${'paragraph' . crb_lang_slug()})) { echo ${'paragraph' . crb_lang_slug()}; } ?>
                <?php if (!empty(${'bigtext' . crb_lang_slug()})) { ?>
                <h1 class="home-about-bigtext"><?php echo ${'bigtext' . crb_lang_slug()}; ?></h1>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>