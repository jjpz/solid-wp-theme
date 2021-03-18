<?php $post_class = 'single-' . get_post_type(); ?>
<?php if (get_post_type() === 'post') { ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class($post_class); ?>>
        <div class="container">
            <header class="entry-header">
                <?php
                if (is_singular()) {
                    the_title('<h1 class="entry-title">', '</h1>');
                } else {
                    the_title( '<h2 class="entry-title"><a class="entry-link" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                } ?>
            </header>
            <section class="entry-content">
                <?php
                if (is_singular()) {
                    the_content();
                } else {
                    the_excerpt();
                }
                ?>
            </section>
            <hr class="entry-divider">
        </div>
    </article>

<?php } else { ?>

    <?php
    $ID = get_the_ID();
    $name = get_the_title();
    $title = get_post_meta($ID, '_crb_team_title', true);
    $link = get_the_permalink($ID);
    $image_id = get_post_thumbnail_id();
    $archive_link = get_post_type_archive_link(get_post_type());
    $label = get_post_type_object(get_post_type())->label;

    if (get_post_type() === 'service') {
        $divClasses = array('image-aspect-square');
    }

    if (get_post_type() === 'member') {
        $divClasses = array('image-aspect-square', 'image-circle');
    }
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class($post_class . ' container v-max') ?>>

        <div class="card" >
            <?php if (has_post_thumbnail()) { ?>
                <div class="pic">
                    <?php getImage(
                        $image_id, 
                        '', 
                        true, 
                        $divClasses, 
                        array('img', 'img-cover'), 
                        array('member-overlay')
                    ); ?>
                </div>
            <?php } ?>

            <div class="info">
                <h1 class="name single-cpt-name"><?php echo $name; ?></h1>
                <?php if ( !empty($title) ) { ?>
                    <p class="position"><?php echo $title; ?></p>
                <?php } ?>
                <?php the_content(); ?>
            </div>
        </div>

        <div class="archive-link">
            <a href="<?php echo $archive_link; ?>" class="link link-more link-icon-left font-smaller">
                <svg class="svg-caret icon-caret icon-caret-left" width="5" height="13" viewBox="0 0 192 512"><path fill="currentColor" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"></path></svg>
                <span><?php echo $label; ?></span>
            </a>
        </div>

    </article>

<?php } ?>