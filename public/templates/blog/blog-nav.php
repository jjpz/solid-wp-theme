<?php
$_posts = get_posts(array(
    'post_type' => 'post',
    'post_status' => array('publish', 'private'),
    'numberposts' => '3'
));
$categories = get_categories('post');
?>
<aside id="sidebar" class="col-lg-3 offset-lg-1 order-lg-2 blog-nav">
    <?php if (isset($categories) && !empty($categories)) { ?>
    <div class="side-nav right-nav category-nav">
        <a href="#" class="side-nav-toggle toggle-trigger" data-toggle="toggle">
            <span>Categories</span>
            <svg class="arrow-down-small" width="5" height="10" viewBox="0 0 5 15">
                <g>
                    <polygon style="fill:currentColor;"
                        points="0.942,14.977 0.056,14.512 3.809,7.355 0.061,0.503 0.938,0.023 4.944,7.345 	" />
                </g>
            </svg>
        </a>
        <h6 class="side-nav-menu-title">Categories</h6>
        <ul id="toggle" class="side-nav-menu toggle-target">
            <?php foreach ($categories as $category) { ?>
            <li class="side-nav-item cat-nav-item">
                <a class="cat-nav-title"
                    href="<?php echo esc_url(get_term_link($category->term_id)); ?>"><?php echo $category->name; ?></a>
            </li>
            <?php } ?>
        </ul>
    </div>
    <?php } ?>

    <?php if (isset($_posts) && !empty($_posts)) { ?>
    <div class="side-nav right-nav post-nav">
        <h6 class="side-nav-menu-title">Latest Review Articles</h6>
        <ul class="side-nav-menu">
            <?php
            foreach ($_posts as $_post) {
                $ID = $_post->ID;
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
            <?php wp_reset_postdata(); ?>
            <li class="side-nav-item post-nav-item">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="see-all-link">See
                    All</a>
            </li>
        </ul>
    </div>
    <?php } ?>
</aside>