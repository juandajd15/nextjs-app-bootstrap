<?php
// Example RSS feeds URLs
$rss_feeds = [
  'https://www.buzzfeed.com/index.xml',
  'https://rss.cnn.com/rss/edition.rss',
];

// Function to fetch and parse RSS feed items
function fetch_rss_items($url, $limit = 5) {
  $items = [];
  $rss = @simplexml_load_file($url);
  if ($rss) {
    $count = 0;
    foreach ($rss->channel->item as $item) {
      if ($count++ >= $limit) break;
      $items[] = [
        'title' => (string) $item->title,
        'link' => (string) $item->link,
        'pubDate' => (string) $item->pubDate,
        'source' => parse_url($url, PHP_URL_HOST),
      ];
    }
  }
  return $items;
}

$all_items = [];
foreach ($rss_feeds as $feed_url) {
  $all_items = array_merge($all_items, fetch_rss_items($feed_url, 3));
}

// Sort items by pubDate descending
usort($all_items, function($a, $b) {
  return strtotime($b['pubDate']) - strtotime($a['pubDate']);
});
?>

<div class="feed-list">
  <?php foreach ($all_items as $item): ?>
    <div class="post">
      <div class="post-logo">
        <?php
        $host = parse_url($item['link'], PHP_URL_HOST);
        if (strpos($host, 'buzzfeed') !== false) {
          echo '<img src="' . get_template_directory_uri() . '/images/buzzfeed-logo.png" alt="BuzzFeed Logo" width="60" height="60">';
        } elseif (strpos($host, 'cnn') !== false) {
          echo '<img src="' . get_template_directory_uri() . '/images/cnn-logo.png" alt="CNN Logo" width="60" height="60">';
        } else {
          echo '<img src="' . get_template_directory_uri() . '/images/default-logo.png" alt="Logo" width="60" height="60">';
        }
        ?>
      </div>
      <div class="post-content">
        <a href="<?php echo esc_url($item['link']); ?>" class="post-title" target="_blank" rel="noopener noreferrer">
          <?php echo esc_html($item['title']); ?>
        </a>
        <div class="post-meta">
          <?php echo date('F j, Y, g:i a', strtotime($item['pubDate'])); ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
