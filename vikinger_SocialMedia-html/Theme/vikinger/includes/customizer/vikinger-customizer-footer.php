<?php
/**
 * Vikinger Customizer - Footer
 * 
 * @since 1.0.0
 */

function vikinger_customizer_footer($wp_customize) {
  /**
   * Footer Promo section
   */
  $wp_customize->add_section('vikinger_footer', [
    'title'       => esc_html_x('Footer', '(Customizer) Footer Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can choose what\'s displayed on the left and bottom parts of the footer of the site. Please refer to the "Menus" section of this customizer if you want to edit the footer links.', '(Customizer) Footer Options - Description', 'vikinger'),
    'priority'    => 45,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Footer Display
   */
  $wp_customize->add_setting('vikinger_footer_setting_display', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'display'
  ]);

  $wp_customize->add_control('vikinger_footer_setting_display', [
    'label'       => esc_html_x('Display / Hide', '(Customizer) Footer Option - Display / Hide - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to display or hide the footer.', '(Customizer) Footer Option - Display / Hide - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'display' => esc_html__('Display', 'vikinger'),
      'hide'    => esc_html__('Hide', 'vikinger')
    ],
    'section'     => 'vikinger_footer'
  ]);

  /**
   * Navigation - Mobile Status
   */
  $wp_customize->add_setting('vikinger_footer_setting_navigation_mobile_status', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'none'
  ]);

  $wp_customize->add_control('vikinger_footer_setting_navigation_mobile_status', [
    'label'       => esc_html_x('Navigation - Mobile Status', '(Customizer) Footer Option - Navigation - Mobile Status - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to display or hide the footer navigation on mobile resolutions.', '(Customizer) Footer Option - Navigation - Mobile Status - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'flex' => esc_html__('Display', 'vikinger'),
      'none' => esc_html__('Hide', 'vikinger')
    ],
    'section'     => 'vikinger_footer'
  ]);

  /**
   * Footer Top Logo
   */
  $wp_customize->add_setting('vikinger_footer_setting_promo_logo', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(
    new WP_Customize_Media_Control(
      $wp_customize,
      'vikinger_footer_setting_promo_logo',
      [
        'label'     => esc_html_x('Footer Top - Logo', '(Customizer) Footer Option - Logo - Title', 'vikinger'),
        'mime_type' => 'image',
        'section'   => 'vikinger_footer'
      ]
    )
  );

  /**
   * Footer Top Text
   */
  $wp_customize->add_setting('vikinger_footer_setting_promo_text', [
    'sanitize_callback' => 'sanitize_text_field'
  ]);

  $wp_customize->add_control('vikinger_footer_setting_promo_text', [
    'label'     => esc_html_x('Footer Top - Text', '(Customizer) Footer Option - Text - Title', 'vikinger'),
    'type'      => 'textarea',
    'section'   => 'vikinger_footer'
  ]);


  /**
   * Social Network Links
   */
  $footer_social_networks = [
    'facebook',
    'twitter',
    'instagram',
    'youtube',
    'twitch',
    'linkedin',
    'pinterest',
    'tiktok',
    'github',
    'reddit',
    'dribbble',
    'discord',
    'spotify'
  ];

  foreach ($footer_social_networks as $social_network) {
    /**
     * Social Network Link
     */
    $wp_customize->add_setting('vikinger_footer_setting_social_links[' . $social_network . ']', [
      'sanitize_callback' => 'esc_url_raw'
    ]);

    $wp_customize->add_control('vikinger_footer_setting_social_links[' . $social_network . ']', [
      'label'     => esc_html_x('Footer Top - ' . ucfirst($social_network) . ' Link', '(Customizer) Footer Option - ' . ucfirst($social_network) . ' Link - Title', 'vikinger'),
      'type'      => 'text',
      'section'   => 'vikinger_footer'
    ]);
  }

  /**
   * Footer Bottom - Left Text
   */
  $wp_customize->add_setting('vikinger_footer_setting_bottom_left_text', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_text'
  ]);

  $wp_customize->add_control('vikinger_footer_control_bottom_left_text', [
    'label'     => esc_html_x('Footer Bottom - Left Text', '(Customizer) Footer Option - Footer Bottom Left Text - Title', 'vikinger'),
    'type'      => 'text',
    'section'   => 'vikinger_footer',
    'settings'  => 'vikinger_footer_setting_bottom_left_text'
  ]);

  /**
   * Footer Bottom - Right Text
   */
  $wp_customize->add_setting('vikinger_footer_setting_bottom_right_text', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_text'
  ]);

  $wp_customize->add_control('vikinger_footer_control_bottom_right_text', [
    'label'     => esc_html_x('Footer Bottom - Right Text','(Customizer) Footer Option - Footer Bottom Right Text - Title', 'vikinger'),
    'type'      => 'text',
    'section'   => 'vikinger_footer',
    'settings'  => 'vikinger_footer_setting_bottom_right_text'
  ]);
}

add_action('customize_register', 'vikinger_customizer_footer');