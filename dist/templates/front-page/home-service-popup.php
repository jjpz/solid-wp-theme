<!-- Service Popup -->
<div id="popup-<?php echo $slug; ?>" class="popup">
    <div class="popup-background" data-toggle="popup" data-target="popup-<?php echo $slug; ?>" data-classes="open">
    </div>
    <div class="popup-wrapper">
        <div class="popup-container">
            <a href="#" id="popup-close" class="popup-close team-close" data-toggle="popup"
                data-target="popup-<?php echo $slug; ?>" data-classes="open"></a>
            <!-- <div class="popup-inner"> -->
                <div class="popup-row">
                    <?php if ( !empty($image_id) ) { ?>
                    <div class="popup-col-left">
                    <div class="popup-image">
                        <!-- <div class="team-popup-pic"> -->
                            <!-- <div class="team-popup-image"> -->
                                <?php getImage(
                                    $image_id, 
                                    '', 
                                    true, 
                                    array('image-aspect-square'), 
                                    array('img', 'img-cover'), 
                                    array('member-overlay')
                                ); ?>
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    </div>
                    <?php } ?>
                    <?php // (!empty($image_id)) ? $class = 'col-sm-8 popup-col popup-content' : $class = 'col-sm-12 popup-col popup-content'; ?>
                    <?php (!empty($image_id)) ? $class = 'popup-col-right' : $class = 'popup-col-right full-width'; ?>
                    <div class="<?php echo $class; ?>">
                    <div class="popup-content">
                        <!-- <div class="team-popup-content"> -->
                            <!-- <div class="team-popup-name"> -->
                                <h3 class="h3-alt popup-title"><?php echo $title; ?></h3>
                            <!-- </div> -->
                            <!-- <?php if ( !empty($title) ) { ?>
                            <div class="team-popup-title">
                                <p><?php echo $title; ?></p>
                            </div>
                            <?php } ?> -->
                            <!-- <div class="team-popup-bio"> -->
                                <?php echo $content; ?>
                            <!-- </div> -->
                        <!-- </div> -->
                    </div>
                    </div>
                </div>
                <!-- <div class="popup-row"> -->
                    <!-- <div class="col-12 popup-col"> -->
                        <div class="popup-nav">
                            <?php if (array_key_exists($prev_key, $posts)) { ?>
                            <?php $prev = $posts[$prev_key]; ?>
                            <a class="popup-prev link-icon-left font-smaller" href="#" data-target="popup-<?php echo $slug; ?>">
                                <!-- <span class="icon-caret icon-caret-left"> -->
                                    <svg class="svg-caret icon-caret icon-caret-left" width="5" height="13" viewBox="0 0 192 512"><path fill="currentColor" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"></path></svg>
                                <!-- </span> -->
                                <!-- <p class="p2 team-nav-title"> -->
                                    <?php echo $prev->post_title; ?>
                                <!-- </p> -->
                            </a>
                            <?php } else { ?>
                            <a class="popup-prev-empty"></a>
                            <?php } ?>
                            <?php if (array_key_exists($next_key, $posts)) { ?>
                            <?php $next = $posts[$next_key]; ?>
                            <a class="popup-next link-icon-right font-smaller" href="#" data-target="popup-<?php echo $slug; ?>">
                                <!-- <p class="p2 team-nav-title"> -->
                                    <?php echo $next->post_title; ?>
                                <!-- </p> -->
                                <!-- <span class="icon-caret icon-caret-right"> -->
                                    <svg class="svg-caret icon-caret icon-caret-right" width="5" height="13" viewBox="0 0 192 512"><path fill="currentColor" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"></path></svg>
                                <!-- </span> -->
                            </a>
                            <?php } else { ?>
                            <a class="popup-next-empty"></a>
                            <?php } ?>
                        </div>
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</div>