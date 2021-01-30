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