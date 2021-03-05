<!-- Service Card -->
<?php $href = $display === 'single' ? $link : '#'; ?>

<div class="card">

    <?php if (has_post_thumbnail($service)) { ?>
    <div class="pic">
        <?php getImage(
            $image_id, 
            '', 
            true, 
            array('image-aspect-square'), 
            array('img', 'img-contain')
        ); ?>
    </div>
    <?php } ?>

    <div class="info">
        <h2 class="name"><?php echo $title; ?></h2>
        <?php if ($display === 'full') { ?>
            <?php echo $content; ?>
        <?php } else { ?>
            <a 
                <?php if ($display !== 'full') { ?>
                    href="<?php echo $href; ?>" 
                <?php } ?>
                class="read-more-link p2" 
                <?php if ($display === 'popup') { ?>
                    data-toggle="popup" 
                    data-target="popup-<?php echo $slug; ?>" 
                    data-classes="open"
                <?php } ?>
            >
                <span>read more</span>
                <svg class="svg-caret icon-caret icon-caret-right" width="5" height="13" viewBox="0 0 192 512"><path fill="currentColor" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"></path></svg>
            </a>
        <?php } ?>
    </div>

</div>