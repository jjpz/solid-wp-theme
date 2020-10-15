<?php $awards = get_items('award'); ?>

<?php if (!empty($awards) || !empty(${'home_awards_title' . crb_lang_slug()}) || !empty(${'home_awards_paragraph' . crb_lang_slug()})) { ?>
<section class="home-section home-awards">
    <?php if (!empty(${'home_awards_title' . crb_lang_slug()}) || !empty(${'home_awards_paragraph' . crb_lang_slug()})) { ?>
    <header class="section-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h3 class="h3 section-title"><?php echo ${'home_awards_title' . crb_lang_slug()}; ?></h3>
                    <div class="section-paragraph">
                        <?php echo ${'home_awards_paragraph' . crb_lang_slug()}; ?>
                    </div>
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