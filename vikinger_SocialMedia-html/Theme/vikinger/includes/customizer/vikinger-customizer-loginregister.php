<?php
/**
 * Vikinger Customizer - Login Register
 * 
 * @since 1.0.0
 */

function vikinger_customizer_loginregister($wp_customize) {
  /**
   * Login Register Page section
   */
  $wp_customize->add_section('vikinger_loginregister', [
    'title'       => esc_html_x('Login / Register Page', '(Customizer) Login - Register Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize the login and register page options.', '(Customizer) Login - Register Options - Description', 'vikinger'),
    'priority'    => 50,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Login Page Logo
   */
  $wp_customize->add_setting('vikinger_loginregister_setting_login_logo', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(
    new WP_Customize_Media_Control(
      $wp_customize,
      'vikinger_loginregister_setting_login_logo',
      [
        'label'       => esc_html_x('Logo', '(Customizer) Logo - Title', 'vikinger'),
        'description' => esc_html_x('The logo that displays above the form of the page.', '(Customizer) Logo - Description', 'vikinger'),
        'mime_type'   => 'image',
        'section'     => 'vikinger_loginregister'
      ]
    )
  );

  /**
   * Login Page Background
   */
  $wp_customize->add_setting('vikinger_loginregister_setting_login_background', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(
    new WP_Customize_Media_Control(
      $wp_customize,
      'vikinger_loginregister_setting_login_background',
      [
        'label'       => esc_html_x('Background', '(Customizer) Background - Title', 'vikinger'),
        'description' => esc_html_x('The background image of the page.', '(Customizer) Background - Description', 'vikinger'),
        'mime_type'   => 'image',
        'section'     => 'vikinger_loginregister'
      ]
    )
  );

  /**
   * Login Page Pre Title
   */
  $wp_customize->add_setting('vikinger_loginregister_setting_login_pretitle', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Welcome to', 'Pre Title', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_loginregister_setting_login_pretitle', [
    'label'       => esc_html_x('Pre Title', '(Customizer) Pre Title - Title', 'vikinger'),
    'description' => esc_html_x('The text that displays before the title of the page.', '(Customizer) Pre Title - Description', 'vikinger'),
    'type'        => 'text',
    'section'     => 'vikinger_loginregister'
  ]);

  /**
   * Login Page Title
   */
  $wp_customize->add_setting('vikinger_loginregister_setting_login_title', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => esc_html_x('Vikinger', 'Title', 'vikinger')
  ]);

  $wp_customize->add_control('vikinger_loginregister_setting_login_title', [
    'label'       => esc_html_x('Title', '(Customizer) Title - Title', 'vikinger'),
    'description' => esc_html_x('The title of the page.', '(Customizer) Title - Description', 'vikinger'),
    'type'        => 'text',
    'section'     => 'vikinger_loginregister'
  ]);

  /**
   * Login Page Text
   */
  $wp_customize->add_setting('vikinger_loginregister_setting_login_text', [
    'sanitize_callback' => 'vikinger_customizer_sanitize_text',
    'default'           => sprintf(
      esc_html__('%sThe next generation WordPress+Buddypress social community!%s Connect with your friends with full profiles, reactions, groups, badges, quests, ranks, credits and %smuch more to come!%s', 'vikinger'),
      '<span class="bold">',
      '</span>',
      '<span class="bold">',
      '</span>'
    )
  ]);

  $wp_customize->add_control('vikinger_loginregister_setting_login_text', [
    'label'       => esc_html_x('Text', '(Customizer) Title - Text', 'vikinger'),
    'description' => esc_html_x('The text of the page.', '(Customizer) Text - Description', 'vikinger'),
    'type'        => 'textarea',
    'section'     => 'vikinger_loginregister'
  ]);
}

add_action('customize_register', 'vikinger_customizer_loginregister');