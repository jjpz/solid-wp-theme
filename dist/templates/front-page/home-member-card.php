<!-- Team Member Card -->
<a href="#" class="member-card" data-toggle="popup" data-target="team-popup-<?php echo $slug; ?>" data-classes="open">
    <?php if ( !empty($image_id) ) { ?>
    <div class="member-pic">
        <?php getImage($image_id, '', true, array('image-aspect-square', 'image-circle'), array('img', 'img-cover'), array('member-overlay')) ?>
    </div>
    <?php } ?>
    <div class="member-info">
        <div class="member-name">
            <h3><?php echo $name; ?></h3>
        </div>
        <?php if ( !empty($title) ) { ?>
        <div class="member-title">
            <p><?php echo $title; ?></p>
        </div>
        <?php } ?>
        <div class="member-read-bio">
            <p class="p2">read bio</p>
            <span class="icon-caret icon-caret-right">
                <svg class="svg-caret" width="5" height="13" viewBox="0 0 192 512">
                    <path fill="currentColor"
                        d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z">
                    </path>
                </svg>
            </span>
        </div>
    </div>
</a>