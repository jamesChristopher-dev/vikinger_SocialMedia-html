<?php
/**
 * Vikinger Template - Singular
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  get_header();

  if (have_posts()) {
    the_post();

    $post_type = get_post_type();

    $gp_post_types = [];

    if (vikinger_plugin_gamipress_is_active()) {
      $gp_post_types = vikinger_gamipress_post_types_get();
    }

    // if a GamiPress post type, show different template
    if (in_array($post_type, $gp_post_types)) {
      $logged_user_has_membership_access = true;
  
      if (vikinger_plugin_pmpro_is_active()) {
        $post_access_data = vikinger_pmpro_post_access_data_get();
        $logged_user_has_membership_access = $post_access_data['accessible'];
      }

      if ($logged_user_has_membership_access) {
        // check if achievement unlock is submitted
        $achievement_unlock_submitted = isset($_POST['achievement_unlock']);

        // if achievement unlock submitted
        if ($achievement_unlock_submitted) {
          $achievement_unlock_id = absint($_POST['achievement_unlock_id']);
          $achievement_unlocked = vikinger_gamipress_unlock_logged_user_achievement_with_points($achievement_unlock_id);

          // Redirect to same page to avoid form resubmission
          $redirect_url = esc_url(home_url($wp->request));
          wp_safe_redirect($redirect_url);
          exit;
        }
      }

      $post = get_post();

      $gp_type = vikinger_gamipress_type_get($post_type);
        
?>

  <!-- CONTENT GRID -->
  <div class="content-grid">
    <!-- GRID -->
    <div class="grid grid-6-6 centered">
<?php

      $user_points = vikinger_gamipress_get_logged_user_points();

      if ($gp_type === 'achievement') {
        $post_data = vikinger_gamipress_get_achievements(['post__in'  => [$post->ID]], get_current_user_id())[0];
      } else if ($gp_type === 'rank') {
        $post_data = vikinger_gamipress_get_ranks(['post__in' => [$post->ID]], get_current_user_id())[0];
      }

      $achievement_args = [
        'achievement'               => $post_data,
        'user_points'               => $user_points,
        'achievement_complete_info' => true,
        'achievement_type'          => $post_type,
        'achievement_image_wrap'    => $post_type === 'quest'
      ];

      /**
       * Achievement Item Box
       */
      get_template_part('template-part/achievement/achievement', 'item-box', $achievement_args);

?>
    </div>
    <!-- /GRID -->
  </div>
  <!-- /CONTENT GRID -->
<?php
    } else {

      $post_data = vikinger_post_get_loop_data();

      /**
       * Post Open V1, V2 or V3
       */
      get_template_part('template-part/post/post-open', $post_data['type'], [
        'post' =>  $post_data
      ]);
    }
  }

  get_footer();

?>