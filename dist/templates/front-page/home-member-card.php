<!-- Member Card -->
<?php $href = $display === 'single' ? $link : '#'; ?>

<a 
    <?php if ($display !== 'full') { ?>
        href="<?php echo $href; ?>" 
    <?php } ?>
    class="card" 
    <?php if ($display === 'popup') { ?>
        data-toggle="popup" 
        data-target="popup-<?php echo $slug; ?>" 
        data-classes="open"
    <?php } ?>
>
    <?php if (has_post_thumbnail($member)) { ?>
        <div class="pic">
            <?php getImage(
                $image_id, 
                '', 
                true, 
                array('image-aspect-square', 'image-circle'), 
                array('img', 'img-cover'), 
                array('member-overlay')
            ); ?>
        </div>
    <?php } ?>

    <div class="info">
        <h3 class="name"><?php echo $title; ?></h3>
        <?php if ( !empty($position) ) { ?>
            <p class="position"><?php echo $position; ?></p>
        <?php } ?>
        <?php if ($display === 'full') { ?>
            <?php echo $content; ?>
        <?php } else { ?>
            <p class="read-more-link has-icon-right p2">
                <span>read bio</span>
                <svg class="svg-caret icon-caret icon-caret-right" width="5" height="13" viewBox="0 0 192 512"><path fill="currentColor" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"></path></svg>
            </p>
        <?php } ?>
    </div>
</a>