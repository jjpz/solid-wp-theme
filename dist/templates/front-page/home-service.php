<?php 
$posts = $args['posts'];
$display = $args['display'];
$display_class = $display === 'full' ? 'v-max' : 'v-min';
$link_class = $display === 'popup' ? 'v-pop' : 'v-ref';

foreach ($posts as $key => $service) {
$ID = $service->ID;
$title = $service->post_title;
$content = apply_filters('the_content', $service->post_content);
$slug = $service->post_name;
$link = get_the_permalink($ID);
$image_id = get_post_thumbnail_id($ID);
$post_type = $service->post_type;
$prev_key = $key-1;
$next_key = $key+1;
$classes = ['home-service', 'col-lg-6', 'v-'.$post_type];
?>

<article id="post-<?php echo $ID; ?>" <?php post_class($classes, $ID) ?>>
    <?php require 'home-service-card.php';
    if ($display === 'popup') { require 'home-service-popup.php'; } ?>
</article>

<?php } ?>