<?php
${'bigtext' . crb_lang_slug()} = nl2br(get_option('_crb_home_intro_bigtext' . crb_lang_slug()));
${'paragraph' . crb_lang_slug()} = apply_filters('the_content', get_option('_crb_home_intro_paragraph' . crb_lang_slug()));
?>

<?php if (!empty(${'paragraph' . crb_lang_slug()}) || !empty(${'bigtext' . crb_lang_slug()})) { ?>
<?php
if (
    !empty(${'paragraph' . crb_lang_slug()}) && 
    !empty(${'bigtext' . crb_lang_slug()})
) {
    $col = 2;
    $class = 'two-cols';
    $col_class = 'col-md-6';
    $text_align = '';
} else {
    $col = 1;
    $class = 'one-col';
    $col_class = 'col-12';
    $text_align = 'text-center';
}
?>
<section id="intro" class="home-section-w-bg home-intro <?php echo $class; ?>">
    <div class="container">
        <div class="row align-items-baseline">
            <?php if (!empty(${'paragraph' . crb_lang_slug()})) { ?>
            <div class="<?php echo $col_class; ?> home-intro-paragraph">
                <?php echo ${'paragraph' . crb_lang_slug()}; ?>
            </div>
            <?php } ?>
            <?php if ($col === 2) { ?>
            <div class="col-md-6"></div>
            <div class="col-md-6"></div>
            <?php } ?>
            <?php if (!empty(${'bigtext' . crb_lang_slug()})) { ?>
            <div class="<?php echo $col_class; ?>">
                <h1 class="bigtext home-intro-bigtext <?php echo $text_align; ?>"><?php echo ${'bigtext' . crb_lang_slug()}; ?></h1>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>