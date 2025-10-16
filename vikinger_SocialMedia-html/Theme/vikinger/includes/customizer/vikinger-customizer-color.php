<?php
/**
 * Vikinger Customizer - Colors
 * 
 * @since 1.0.0
 */

function vikinger_customizer_colors($wp_customize) {
  /**
   * Color Options section
   */
  $wp_customize->add_section('vikinger_colors_custom_section', [
    'title'       => esc_html_x('Colors - Custom Preset', '(Customizer) Color Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can change the theme colors of the custom preset with your desired ones.', '(Customizer) Color Options - Description', 'vikinger'),
    'priority'    => 20,
    'panel'       => 'vikinger_customizer'
  ]);

  $color_presets = ['custom'];

  foreach ($color_presets as $color_preset) {
    $theme_colors = vikinger_customizer_theme_colors_get_default($color_preset);

    foreach($theme_colors as $color) {
      $wp_customize->add_setting($color['settings'], [
        'type'              => 'option',
        'default'           => $color['default'],
        'sanitize_callback' => 'sanitize_hex_color',
      ]);

      $wp_customize->add_control(
        new WP_Customize_Color_Control(
          $wp_customize,
          $color['settings'],
          [
            'label'       => $color['label'],
            'description' => $color['description'],
            'section'     => 'vikinger_colors_'. $color_preset . '_section'
          ]
        )
      );
    }
  }
}

add_action('customize_register', 'vikinger_customizer_colors');