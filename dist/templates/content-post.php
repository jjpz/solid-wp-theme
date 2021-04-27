<?php
$categories = get_the_category(get_the_ID());
if ( isset($categories) && !empty($categories) ) {
	$category = $categories[0];
	$cat_name = $category->name;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (!is_singular('post')) { ?>
    <a class="entry-link" href="<?php echo esc_url(get_the_permalink()); ?>" rel="bookmark">
    <?php } ?>
        <header class="entry-header">
            <?php if (!empty($category)) { ?>
            <p class="entry-category font-smaller"><?php echo $cat_name; ?></p>
            <?php } ?>
            <?php
            if (is_singular()) {
                the_title('<h1 class="entry-title">', '</h1>');
            } else {
            ?>
            <h2 class="entry-title">
                
                <?php echo get_the_title(); ?>
                
            </h2>
            <?php } ?>
            <?php if (get_post_type() === 'post') { ?>
            <p class="entry-meta font-smaller">
                <?php
                solid_posted_on();
                solid_posted_by();
                ?>
            </p>
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
    <?php if (!is_singular('post')) { ?>
    </a>
    <?php } ?>
    <hr class="entry-divider">
</article>

<?php if (is_singular('post')) { ?>
<div class="blog-home-link">
    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="link-all font-smaller">All Articles</a>
</div>
<?php } ?>