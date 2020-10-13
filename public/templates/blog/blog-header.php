<?php
$blog_id = get_option('page_for_posts');
$blog = get_post($blog_id);
$blog_content = $blog->post_content;
?>
<header class="page-header blog-header">
    <h1 class="page-title blog-title"><?php echo get_the_title(get_option('page_for_posts')); ?></h1>
    <?php if (is_home() && !empty($blog_content)) { ?>
    <div class="page-content blog-content"><?php echo $blog_content; ?></div>
    <?php } ?>
</header>