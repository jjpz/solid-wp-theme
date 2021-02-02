<?php
${'title' . crb_lang_slug()} = get_option('_crb_home_team_title' . crb_lang_slug());
${'paragraph' . crb_lang_slug()} = apply_filters('the_content', get_option('_crb_home_team_paragraph' . crb_lang_slug()));
$team = getItems($query, 'member');
?>

<?php if (!empty($team) || !empty(${'title' . crb_lang_slug()}) || !empty(${'paragraph' . crb_lang_slug()})) { ?>
<section id="team" class="home-section-w-bg home-team">
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

    <?php if (!empty($team)) { ?>
    <?php //echo '<pre>'; print_r($team); echo '</pre>'; ?>
    <section class="section-body">
        <div class="services">
            <div class="container">
                <div class="row justify-content-center">
                    <?php foreach ($team as $key => $member) { ?>
                    <?php require 'home-team-member.php'; ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <?php } ?>
</section>
<?php } ?>