<?php
$blog_id = get_option('page_for_posts');
$blog = get_post($blog_id);
$blog_content = $blog->post_content;
?>
<header class="blog-header">
    <div class="container">
        <h1 class="blog-title">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"><?php echo get_the_title(get_option('page_for_posts')); ?></a>
        </h1>
        <?php if (is_home() && !empty($blog_content)) { ?>
        <div class="page-content blog-content"><?php echo $blog_content; ?></div>
        <?php } ?>
    </div>
</header>