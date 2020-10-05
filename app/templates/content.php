<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <header class="entry-header">
            <?php
            if (is_singular()) {
                the_title('<h1 class="entry-title">', '</h1>');
            } else {
                the_title('<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>');
            }
            ?>
            <?php if (get_post_type() === 'post') { ?>
            <div class="entry-meta">
                <?php
				solid_posted_on();
				solid_posted_by();
				?>
            </div>
            <?php } ?>
        </header>
        <section class="entry-content">
            <?php
            if (is_home()) {
                the_excerpt();
            } else {
                the_content();
            }
            ?>
        </section>
        <hr class="entry-divider">
    </div>
</article>