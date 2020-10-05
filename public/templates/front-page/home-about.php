<?php if (!empty($home_about_paragraph) || !empty($home_about_bigtext)) { ?>
<?php (!empty($home_about_paragraph) && !empty($home_about_bigtext)) ? $col = 2 : $col = 1; ?>
<section class="home-section-w-bg home-about">
    <div class="container">
        <div class="row">
            <?php if ($col === 2) { ?>
            <div class="col-md-6">
                <?php if (!empty($home_about_paragraph)) { echo $home_about_paragraph; } ?>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <h1><?php echo $home_about_bigtext; ?></h1>
            </div>
            <?php } else { ?>
            <div class="col-12">
                <?php if (!empty($home_about_paragraph)) { echo $home_about_paragraph; } ?>
                <?php if (!empty($home_about_bigtext)) { ?>
                <h1><?php echo $home_about_bigtext; ?></h1>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>