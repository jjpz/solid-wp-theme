<?php
$categories = get_the_category(get_the_ID());
if ( isset($categories) && !empty($categories) ) {
	$category = $categories[0];
	$cat_name = $category->name;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if (!empty($category)) { ?>
        <h4 class="entry-category"><?php echo $cat_name; ?></h4>
        <?php } ?>
        <?php
        if (is_singular()) {
            the_title('<h2 class="entry-title">', '</h2>');
        } else {
        ?>
        <h2 class="entry-title">
            <a class="entry-link" href="<?php echo esc_url(get_the_permalink()); ?>" rel="bookmark">
                <span><?php echo get_the_title(); ?></span>
                <!--<svg class="svg-arrow-right" width="5" height="15" viewBox="0 0 5 15">
                    <g>
                        <polygon style="fill:currentColor;"
                            points="0.942,14.977 0.056,14.512 3.809,7.355 0.061,0.503 0.938,0.023 4.944,7.345 	" />
                    </g>
                </svg>-->
            </a>
        </h2>
        <?php } ?>
        <?php if (get_post_type() === 'post') { ?>
        <div class="entry-meta">
            <p class="p2">
            <?php
            solid_posted_on();
            solid_posted_by();
            ?>
            </p>
        </div>
        <?php } ?>
    </header>
    <section class="entry-content">
        <?php
            if (is_home() || is_category()) {
                the_excerpt();
            } else {
                the_content();
            }
            ?>
    </section>
    <hr class="entry-divider">
</article>

<?php if (is_singular('post')) { ?>
<div class="blog-home-link">
    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="see-all-link">All Articles</a>
</div>
<?php } ?>