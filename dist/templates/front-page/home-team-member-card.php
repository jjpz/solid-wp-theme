<!-- Team Member Card -->
<a href="#" class="member-card" data-toggle="popup" data-target="team-popup-<?php echo $slug; ?>" data-classes="open">
    <?php if ( !empty($src) ) { ?>
    <div class="member-pic">
        <div class="image image-aspect-square image-circle member-image">
            <?php if (!empty($image_id)) { ?>
            <img 
                class="img img-cover lazy" 
                src="" 
                srcset="" 
                data-src="<?php echo $src; ?>"
                data-srcset="<?php echo $srcset; ?>" 
                data-type="<?php echo $type; ?>" 
                alt="<?php echo $image_alt; ?>" 
            />
            <?php } ?>
            <div class="lazy-overlay member-overlay on"></div>
        </div>
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