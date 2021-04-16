<?php
$posts = $args['posts'];
$display = $args['display'];

if (!empty($display)) {
    $display_class = $display === 'full' ? 'v-max' : 'v-min';
    $link_class = $display === 'popup' ? 'v-pop' : 'v-ref';
} else {
    $display_class = 'v-max';
    $link_class = '';
}

foreach ($posts as $key => $member) {
$ID = $member->ID;
$title = $member->post_title;
$content = apply_filters('the_content', $member->post_content);
$position = get_post_meta($ID, '_crb_team_title', true);
$slug = $member->post_name;
$link = get_the_permalink($ID);
$image_id = get_post_thumbnail_id($ID);
$post_type = $member->post_type;
$prev_key = $key-1;
$next_key = $key+1;
$col = (empty($display) || $display === 'full') ? 'col-12' : 'col-md-4';
$classes = [$col, 'v-'.$post_type, $display_class, $link_class];
?>

<article id="post-<?php echo $ID; ?>" <?php post_class($classes, $ID) ?>>
    <?php
    require 'home-member-card.php';
    if ($display === 'popup') {
        require 'home-member-popup.php';
    }
    ?>
</article>

<?php } ?>