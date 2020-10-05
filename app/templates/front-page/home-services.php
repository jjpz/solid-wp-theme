<?php $services = get_items('service'); ?>

<?php if (!empty($services) || !empty($home_services_title) || !empty($home_services_paragraph)) { ?>
<section class="home-section home-services">
    <?php if (!empty($home_services_title) || !empty($home_services_paragraph)) { ?>
    <header class="section-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h3 class="section-title"><?php echo $home_services_title; ?></h3>
                    <div class="section-paragraph">
                        <?php echo $home_services_paragraph; ?>
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