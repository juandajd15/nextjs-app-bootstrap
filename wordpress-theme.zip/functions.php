<?php
function naver_style_theme_setup() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
  register_nav_menus(array(
    'primary' => __('Primary Menu', 'naver-style-theme'),
  ));
}
add_action('after_setup_theme', 'naver_style_theme_setup');

function naver_style_theme_scripts() {
  wp_enqueue_style('naver-style-theme-style', get_stylesheet_uri());
  wp_enqueue_script('naver-style-theme-script', get_template_directory_uri() . '/js/theme.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'naver_style_theme_scripts');
?>
