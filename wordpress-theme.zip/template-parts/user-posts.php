<?php
// Query for user's own posts (assuming current logged-in user)
$current_user = wp_get_current_user();
$args = [
  'author' => $current_user->ID,
  'post_status' => 'publish',
  'posts_per_page' => 5,
];
$user_posts = new WP_Query($args);
?>

<div class="user-posts-list">
  <?php if ($user_posts->have_posts()) : ?>
    <?php while ($user_posts->have_posts()) : $user_posts->the_post(); ?>
      <div class="post">
        <div class="post-content">
          <a href="<?php the_permalink(); ?>" class="post-title"><?php the_title(); ?></a>
          <div class="post-meta"><?php the_time('F j, Y'); ?></div>
        </div>
      </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  <?php else : ?>
    <p>You have no posts yet.</p>
  <?php endif; ?>
</div>
