<?php $team = get_items('member'); ?>

<?php if (!empty($team) || !empty($home_team_title) || !empty($home_team_paragraph)) { ?>
<section class="home-section-w-bg home-team">
    <?php if (!empty($home_team_title) || !empty($home_team_paragraph)) { ?>
    <header class="section-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h3 class="section-title"><?php echo $home_team_title; ?></h3>
                    <div class="section-paragraph">
                        <?php echo $home_team_paragraph; ?>
                    </div>
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
                <div class="row">
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