<?php get_header(); ?>

<div class="container">
  <aside class="sidebar">
    <?php get_sidebar(); ?>
  </aside>

  <main>
    <section class="search-section">
      <?php get_template_part('template-parts/search-tabs'); ?>
      <?php get_template_part('template-parts/search-results'); ?>
    </section>

    <section class="feed-section">
      <h2>Latest News</h2>
      <?php get_template_part('template-parts/feed-list'); ?>
    </section>

    <section class="user-posts-section">
      <h2>Your Posts</h2>
      <?php get_template_part('template-parts/user-posts'); ?>
    </section>
  </main>
</div>

<?php get_footer(); ?>
