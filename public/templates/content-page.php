<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container">
        <header class="page-header">
            <?php the_title('<h1 class="page-title">', '</h1>'); ?>
        </header>
        <section class="page-content">
            <?php the_content(); ?>
        </section>
    </div>
</article>