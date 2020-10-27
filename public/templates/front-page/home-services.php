<?php $services = get_items('service'); ?>

<?php if (!empty($services) || !empty(${'home_services_title' . crb_lang_slug()}) || !empty(${'home_services_paragraph' . crb_lang_slug()})) { ?>
<section id="services" class="home-section home-services">
    <?php if (!empty(${'home_services_title' . crb_lang_slug()}) || !empty(${'home_services_paragraph' . crb_lang_slug()})) { ?>
    <header class="section-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h3 class="h3 section-title"><?php echo ${'home_services_title' . crb_lang_slug()}; ?></h3>
                    <div class="section-paragraph">
                        <?php echo ${'home_services_paragraph' . crb_lang_slug()}; ?>
                    </div>
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