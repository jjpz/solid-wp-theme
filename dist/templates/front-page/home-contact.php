<?php
${'bigtext' . crb_lang_slug()} = nl2br(get_option('_crb_home_contact_bigtext' . crb_lang_slug()));
${'paragraph' . crb_lang_slug()} = apply_filters('the_content', get_option('_crb_home_contact_paragraph' . crb_lang_slug()));
${'contact_type' . crb_lang_slug()} = get_option('_crb_home_contact_type' . crb_lang_slug());
${'form' . crb_lang_slug()} = get_option('_crb_contactform_shortcode' . crb_lang_slug());
${'text' . crb_lang_slug()} = get_option('_crb_home_contact_text_link' . crb_lang_slug());
${'voice' . crb_lang_slug()} = get_option('_crb_home_contact_voice_link' . crb_lang_slug());
${'email' . crb_lang_slug()} = get_option('_crb_home_contact_email_link' . crb_lang_slug());
$file = get_stylesheet_directory_uri() . '/assets/images/contact.svg';
if (file_exists($file)) {
    $icon = file_get_contents(get_stylesheet_directory_uri() . '/assets/images/contact.svg');
}
?>

<?php
if (${'contact_type' . crb_lang_slug()} === 'none') {
    if (
        !empty(${'bigtext' . crb_lang_slug()}) && 
        !empty(${'paragraph' . crb_lang_slug()})
    ) {
        $col_class = 'col-md-6';
        $text_align = '';
    } else {
        $text_align = 'text-center';
        if (!empty(${'bigtext' . crb_lang_slug()})) {
            $col_class = 'col-12';
        } else {
            $col_class = 'col-lg-6 offset-lg-3';
        }
    }
} else {
    if (!empty(${'bigtext' . crb_lang_slug()})) {
        $col_class = 'col-md-6';
        $text_align = '';
    } else {
        $col_class = 'col-lg-6 offset-lg-3';
    }
}
?>
<?php
if (
    (${'contact_type' . crb_lang_slug()} && 
    ${'contact_type' . crb_lang_slug()} !== 'none') || 
    !empty(${'bigtext' . crb_lang_slug()}) || 
    !empty(${'paragraph' . crb_lang_slug()})
) {
?>
<section id="contact" class="home-section-pt home-contact">
    <div class="container">
        <div class="row align-items-baseline">
            <?php if (!empty(${'bigtext' . crb_lang_slug()})) { ?>
            <div class="<?php echo $col_class; ?>">
                <h1 class="bigtext home-contact-bigtext <?php echo $text_align; ?>"><?php echo ${'bigtext' . crb_lang_slug()}; ?></h1>
            </div>
            <?php } ?>
            <?php if (
                !empty(${'paragraph' . crb_lang_slug()}) || 
                !empty(${'form' . crb_lang_slug()}) || 
                !empty(${'text' . crb_lang_slug()}) || 
                !empty(${'voice' . crb_lang_slug()}) || 
                !empty(${'email' . crb_lang_slug()})
            ) { ?>
            <div class="<?php echo $col_class; ?>">
                <div class="contact-form <?php echo $text_align; ?>">
                    <?php if (!empty(${'paragraph' . crb_lang_slug()})) {
                        echo ${'paragraph' . crb_lang_slug()};
                    } ?>
                    <?php if (!empty(${'form' . crb_lang_slug()})) {
                        echo do_shortcode(${'form' . crb_lang_slug()});
                    } ?>
                    <?php if (
                        !empty(${'text' . crb_lang_slug()}) || 
                        !empty(${'voice' . crb_lang_slug()}) || 
                        !empty(${'email' . crb_lang_slug()})
                    ) { ?>
                    <div class="buttons">
                    <?php if (!empty(${'text' . crb_lang_slug()})) { ?>
                        <a class="button" href="sms:<?php echo ${'text' . crb_lang_slug()}; ?>" target="_blank">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comments" class="svg-inline--fa fa-comments fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path></svg>
                        </a>
                    <?php } ?>
                    <?php if (!empty(${'voice' . crb_lang_slug()})) { ?>
                        <a class="button" href="tel:<?php echo ${'voice' . crb_lang_slug()}; ?>" target="_blank">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>
                        </a>
                    <?php } ?>
                    <?php if (!empty(${'email' . crb_lang_slug()})) { ?>
                        <a class="button" href="mailto:<?php echo ${'email' . crb_lang_slug()}; ?>" target="_blank">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" class="svg-inline--fa fa-envelope fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"></path></svg>
                        </a>
                    <?php } ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="icon-contact">
            <?php echo $icon; ?>
        </div>
    </div>
</section>
<?php } ?>