<!-- Member Popup -->
<div id="team-popup-<?php echo $slug; ?>" class="popup team-popup">
    <div class="popup-background" data-toggle="popup" data-target="team-popup-<?php echo $slug; ?>" data-classes="open">
    </div>
    <div class="popup-container">
        <div class="popup-content">
            <a href="#" id="popup-close" class="popup-close team-close" data-toggle="popup"
                data-target="team-popup-<?php echo $slug; ?>" data-classes="open"></a>
            <div class="popup-inner">
                <div class="popup-row">
                    <?php if ( !empty($image_id) ) { ?>
                    <div class="col-sm-4 popup-col">
                        <div class="team-popup-pic">
                            <div class="team-popup-image">
                                <?php getImage($image_id, '', true, array('image-aspect-square', 'image-circle'), array('img', 'img-cover'), array('member-overlay')); ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php (!empty($image_id)) ? $class = 'col-sm-8 popup-col' : $class = 'col-sm-12 popup-col'; ?>
                    <div class="<?php echo $class; ?>">
                        <div class="team-popup-content">
                            <div class="team-popup-name">
                                <h3><?php echo $name; ?></h3>
                            </div>
                            <?php if ( !empty($title) ) { ?>
                            <div class="team-popup-title">
                                <p><?php echo $title; ?></p>
                            </div>
                            <?php } ?>
                            <div class="team-popup-bio">
                                <?php echo $content; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="popup-row">
                    <div class="col-12 popup-col">
                        <div class="team-nav">
                            <?php if (array_key_exists($prev_key, $args)) { ?>
                            <?php $prev = $args[$prev_key]; ?>
                            <a class="team-prev" href="#" data-target="team-popup-<?php echo $slug; ?>">
                                <span class="icon-caret icon-caret-left">
                                    <svg class="svg-caret" width="5" height="13" viewBox="0 0 192 512">
                                        <path fill="currentColor"
                                            d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z">
                                        </path>
                                    </svg>
                                </span>
                                <p class="p2 team-nav-title">
                                    <?php echo $prev->post_title; ?></p>
                            </a>
                            <?php } else { ?>
                            <a class="team-prev-empty"></a>
                            <?php } ?>
                            <?php if (array_key_exists($next_key, $args)) { ?>
                            <?php $next = $args[$next_key]; ?>
                            <a class="team-next" href="#" data-target="team-popup-<?php echo $slug; ?>">
                                <p class="p2 team-nav-title">
                                    <?php echo $next->post_title; ?></p>
                                <span class="icon-caret icon-caret-right">
                                    <svg class="svg-caret" width="5" height="13" viewBox="0 0 192 512">
                                        <path fill="currentColor"
                                            d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z">
                                        </path>
                                    </svg>
                                </span>
                            </a>
                            <?php } else { ?>
                            <a class="team-next-empty"></a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>