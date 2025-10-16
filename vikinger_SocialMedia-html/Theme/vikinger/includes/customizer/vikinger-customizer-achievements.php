<?php
/**
 * Vikinger Customizer - Achievements
 * 
 * @since 1.9.9.4
 */

function vikinger_customizer_achievements($wp_customize) {
  /**
   * Achievement section
   */
  $wp_customize->add_section('vikinger_achievements', [
    'title'       => esc_html_x('Achievements', '(Customizer) Achievements Option - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize achievement related options.', '(Customizer) Achievements Option - Description', 'vikinger'),
    'priority'    => 292,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Badges - View More Image
   */
  $wp_customize->add_setting('vikinger_achievements_setting_badges_view_more_image', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(
    new WP_Customize_Media_Control(
      $wp_customize,
      'vikinger_achievements_setting_badges_view_more_image',
      [
        'label'       => esc_html_x('Badges - View More Image', '(Customizer) Badges View More Image - Label', 'vikinger'),
        'description' => esc_html_x('Image that displays at the end of badge list previews, used to link to all badges the user has.', '(Customizer) Badges View More Image - Description', 'vikinger'),
        'section'     => 'vikinger_achievements',
        'mime_type'   => 'image'
      ]
    )
  );

  /**
   * Quests - View More Image
   */
  $wp_customize->add_setting('vikinger_achievements_setting_quests_locked_image', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(
    new WP_Customize_Media_Control(
      $wp_customize,
      'vikinger_achievements_setting_quests_locked_image',
      [
        'label'       => esc_html_x('Quests - Locked Image', '(Customizer) Quests Locked Image - Label', 'vikinger'),
        'description' => esc_html_x('Image that displays on a locked quest.', '(Customizer) Quests Locked Image - Description', 'vikinger'),
        'section'     => 'vikinger_achievements',
        'mime_type'   => 'image'
      ]
    )
  );
}

add_action('customize_register', 'vikinger_customizer_achievements');