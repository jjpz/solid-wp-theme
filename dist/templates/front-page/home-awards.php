<?php
${'title' . crb_lang_slug()} = get_option('_crb_home_awards_title' . crb_lang_slug());
${'paragraph' . crb_lang_slug()} = apply_filters('the_content', get_option('_crb_home_awards_paragraph' . crb_lang_slug()));
$awards = getItems($query, 'award');
?>

<?php if (!empty($awards) || !empty(${'title' . crb_lang_slug()}) || !empty(${'paragraph' . crb_lang_slug()})) { ?>
<section id="awards" class="home-section home-awards">
    <?php if (!empty(${'title' . crb_lang_slug()}) || !empty(${'paragraph' . crb_lang_slug()})) { ?>
    <header class="section-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <?php if (!empty(${'title' . crb_lang_slug()})) { ?>
                    <h3 class="h3 section-title"><?php echo ${'title' . crb_lang_slug()}; ?></h3>
                    <?php } ?>
                    <?php if (!empty(${'paragraph' . crb_lang_slug()})) { ?>
                    <div class="section-paragraph">
                        <?php echo ${'paragraph' . crb_lang_slug()}; ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </header>
    <?php } ?>

    <?php if (!empty($awards)) { ?>
    <section class="section-body">
        <div class="awards">
            <div class="container">
                <div class="row justify-content-center">
                    <?php foreach ($awards as $award) { ?>
                    <?php require 'home-award.php'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</section>
<?php } ?>