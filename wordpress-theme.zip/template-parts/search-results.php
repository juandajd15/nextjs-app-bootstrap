<?php
$search_type = isset($_GET['search_type']) ? $_GET['search_type'] : 'web';

// Google CSE Search URLs for different types (replace cx with your CSE ID)
$cse_cx = 'YOUR_GOOGLE_CSE_ID';
$search_url = "https://cse.google.com/cse?cx={$cse_cx}&q=";
$search_types_urls = [
  'web' => $search_url,
  'videos' => $search_url . "&searchType=video",
  'torrents' => $search_url . "&q=torrents",
  'subtitles' => $search_url . "&q=subtitles",
];

$iframe_src = isset($search_types_urls[$search_type]) ? $search_types_urls[$search_type] : $search_types_urls['web'];
?>

<div class="search-results">
  <iframe src="<?php echo esc_url($iframe_src); ?>" width="100%" height="400" frameborder="0"></iframe>
</div>
