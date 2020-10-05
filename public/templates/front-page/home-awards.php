<?php $awards = get_items('award'); ?>

<?php if (!empty($awards) || !empty($home_awards_title) || !empty($home_awards_paragraph)) { ?>
<section class="home-section home-awards">
    <?php if (!empty($home_awards_title) || !empty($home_awards_paragraph)) { ?>
    <header class="section-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h3 class="section-title"><?php echo $home_awards_title; ?></h3>
                    <div class="section-paragraph">
                        <?php echo $home_awards_paragraph; ?>
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