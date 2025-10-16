<?php
/**
 * Vikinger Customizer - Header
 * 
 * @since 1.9.9.8
 */

function vikinger_customizer_header($wp_customize) {
  /**
   * Header section
   */
  $wp_customize->add_section('vikinger_header', [
    'title'       => esc_html_x('Header', '(Customizer) Header - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can change header options.', '(Customizer) Header - Description', 'vikinger'),
    'priority'    => 25,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Header Behaviour
   */
  $wp_customize->add_setting('vikinger_header_behaviour', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'hide'
  ]);

  $wp_customize->add_control('vikinger_header_behaviour', [
    'label'       => esc_html_x('Header Behaviour', '(Customizer) Header Option - Header Behaviour - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to change how the header reacts to page scroll.', '(Customizer) Header Option - Header Behaviour - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'hide'    => esc_html__('Hide', 'vikinger'),
      'sticky'  => esc_html__('Sticky', 'vikinger')
    ],
    'section'     => 'vikinger_header'
  ]);

  /**
   * Search Status
   */
  $wp_customize->add_setting('vikinger_search_setting_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'display'
  ]);

  $wp_customize->add_control('vikinger_search_setting_status', [
    'label'       => esc_html_x('Search - Display / Hide', '(Customizer) Header Option - Search Display / Hide - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to display or hide the search input on the header.', '(Customizer) Header Option - Search Display / Hide - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'display' => esc_html__('Display', 'vikinger'),
      'hide'    => esc_html__('Hide', 'vikinger')
    ],
    'section'     => 'vikinger_header'
  ]);

  /**
   * Cart Status
   */
  $wp_customize->add_setting('vikinger_cart_preview_setting_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'display'
  ]);

  $wp_customize->add_control('vikinger_cart_preview_setting_status', [
    'label'       => esc_html_x('Cart - Display / Hide', '(Customizer) Header Option - Cart Display / Hide - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to display or hide the cart on the header.', '(Customizer) Header Option - Cart Display / Hide - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'display' => esc_html__('Display', 'vikinger'),
      'hide'    => esc_html__('Hide', 'vikinger')
    ],
    'section'     => 'vikinger_header'
  ]);
}

add_action('customize_register', 'vikinger_customizer_header');