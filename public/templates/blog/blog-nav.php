<?php
$posts = get_posts(array(
	'post_type' => 'post',
	'post_status' => array('publish', 'private'),
	'numberposts' => '3'
));
$categories = get_categories('post');
?>

<aside id="sidebar" class="blog-nav">

    <?php if (isset($categories) && !empty($categories)) { ?>
    <div class="side-nav right-nav category-nav">
        <span class="side-nav-toggle">
            <a href="#" class="side-nav-toggle-btn">
                <span>Categories</span>
                <span class="arrow-small-down">&rsaquo;</span>
            </a>
        </span>
        <h6 class="side-nav-menu-title">Categories</h6>
        <ul class="side-nav-menu">
            <?php foreach ($categories as $category) { ?>
            <li class="side-nav-item cat-nav-item">
                <a class="cat-nav-title"
                    href="<?php echo esc_url(get_term_link($category->term_id)); ?>"><?php echo $category->name; ?></a>
            </li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>

    <?php if (isset($posts) && !empty($posts)) { ?>
    <div class="side-nav right-nav post-nav">
        <h6 class="side-nav-menu-title">Latest Review Articles</h6>
        <ul class="side-nav-menu">
            <?php
            foreach ($posts as $post) {
            $ID = $post->ID;
            $title = get_the_title($ID);
            $link = esc_url(get_the_permalink($ID));
            $cats = get_the_category($ID);
            if (isset($cats) && !empty($cats)) {
                $cat = $cats[0];
                $cat_name = $cat->name;
            }
            ?>
            <li class="side-nav-item">
                <div class="post-nav-cat"><?php echo $cat_name; ?></div>
                <a class="post-nav-title" href="<?php echo $link; ?>"><?php echo $title; ?></a>
            </li>
            <?php } ?>
            <li class="side-nav-item post-nav-item">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="see-all-link">See
                    All</a>
            </li>
        </ul>
    </div>
    <?php } ?>

</aside>