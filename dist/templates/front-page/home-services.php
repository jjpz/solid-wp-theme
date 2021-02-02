<?php
${'title' . crb_lang_slug()} = get_option('_crb_home_services_title' . crb_lang_slug());
${'paragraph' . crb_lang_slug()} = apply_filters('the_content', get_option('_crb_home_services_paragraph' . crb_lang_slug()));
$services = getItems($query, 'service');
?>

<?php if (!empty($services) || !empty(${'title' . crb_lang_slug()}) || !empty(${'paragraph' . crb_lang_slug()})) { ?>
<section id="services" class="home-section home-services">
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

    <?php if (!empty($services)) { ?>
    <section class="section-body">
        <div class="services">
            <div class="container">
                <div class="row">
                    <?php foreach ($services as $service) { ?>
                    <?php require 'home-service.php'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</section>
<?php } ?>