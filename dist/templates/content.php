<?php if (get_post_type() === 'post') { ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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
    ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class('container v-max') ?>>

        <div class="card" >
            <?php if (has_post_thumbnail()) { ?>
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
                <h2 class="name"><?php echo $name; ?></h2>
                <?php if ( !empty($title) ) { ?>
                    <p class="position"><?php echo $title; ?></p>
                <?php } ?>
                <?php the_content(); ?>
            </div>
        </div>

    </article>

<?php } ?>