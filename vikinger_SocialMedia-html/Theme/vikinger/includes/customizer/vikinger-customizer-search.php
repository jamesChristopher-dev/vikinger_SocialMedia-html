<?php
/**
 * Vikinger Customizer - Search
 * 
 * @since 1.3.6
 */

function vikinger_customizer_search($wp_customize) {
  /**
   * Search section
   */
  $wp_customize->add_section('vikinger_search', [
    'title'       => esc_html_x('Search', '(Customizer) Search - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can change search options.', '(Customizer) Search - Description', 'vikinger'),
    'priority'    => 35,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Search Blog Enabled
   */
  $wp_customize->add_setting('vikinger_search_setting_blog_enabled', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_bool',
    'default'           => true
  ]);

  $wp_customize->add_control('vikinger_search_setting_blog_enabled', [
    'label'       => esc_html_x('Show blog posts in search', '(Customizer) Search Option - Show blog posts in search - Title', 'vikinger'),
    'description' => esc_html_x('If enabled, blog posts are displayed on search.', '(Customizer) Search Option - Show blog posts in search - Description', 'vikinger'),
    'type'        => 'checkbox',
    'section'     => 'vikinger_search'
  ]);

  /**
   * Search Members Enabled
   */
  $wp_customize->add_setting('vikinger_search_setting_members_enabled', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_bool',
    'default'           => true
  ]);

  $wp_customize->add_control('vikinger_search_setting_members_enabled', [
    'label'       => esc_html_x('Show members in search', '(Customizer) Search Option - Show members in search - Title', 'vikinger'),
    'description' => esc_html_x('If enabled, members are displayed on search.', '(Customizer) Search Option - Show members in search - Description', 'vikinger'),
    'type'        => 'checkbox',
    'section'     => 'vikinger_search'
  ]);

  /**
   * Search Groups Enabled
   */
  $wp_customize->add_setting('vikinger_search_setting_groups_enabled', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_bool',
    'default'           => true
  ]);

  $wp_customize->add_control('vikinger_search_setting_groups_enabled', [
    'label'       => esc_html_x('Show groups in search', '(Customizer) Search Option - Show groups in search - Title', 'vikinger'),
    'description' => esc_html_x('If enabled, groups are displayed on search.', '(Customizer) Search Option - Show groups in search - Description', 'vikinger'),
    'type'        => 'checkbox',
    'section'     => 'vikinger_search'
  ]);

  /**
   * Post Type to Display in Search
   */
  $wp_customize->add_setting('vikinger_blog_setting_post_types_to_display_in_search', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_text_comma_separated',
    'default'           => vikinger_blog_post_types_default_get()
  ]);

  $wp_customize->add_control('vikinger_blog_setting_post_types_to_display_in_search', [
    'label'       => esc_html_x('Post Types - Display in Search', '(Customizer) Post Types Option - Display in Search - Title', 'vikinger'),
    'description' => sprintf(
      esc_html_x('You can enter the post types allowed for display in the site search. Enter each post type you want to display separated by a comma (,)%s%sFor example, to display WooCommerce products along with regular posts, enter "post,product" or "product" to only display products.%s', '(Customizer) Post Types Option - Display in Search - Description', 'vikinger'),
      '<br><br>',
      '<strong>',
      '</strong>'
    ),
    'type'        => 'text',
    'section'     => 'vikinger_search'
  ]);
}

add_action('customize_register', 'vikinger_customizer_search');