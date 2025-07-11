<?php
$search_types = ['web' => 'Web', 'videos' => 'Videos', 'torrents' => 'Torrents', 'subtitles' => 'Subtitles'];
$current_type = isset($_GET['search_type']) ? $_GET['search_type'] : 'web';
?>
<div class="search-tabs">
  <?php foreach ($search_types as $key => $label): ?>
    <button class="<?php echo ($current_type === $key) ? 'active' : ''; ?>" onclick="location.href='?search_type=<?php echo $key; ?>'">
      <?php echo esc_html($label); ?>
    </button>
  <?php endforeach; ?>
</div>
