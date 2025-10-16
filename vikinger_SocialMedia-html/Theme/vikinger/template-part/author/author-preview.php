<?php
/**
 * Vikinger Template Part - Author Preview
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get
 * 
 * @param array $args {
 *   @type array   $user        User data.
 *   @type string  $modifiers   Optional. Additional class names to add to the HTML wrapper.
 *   @type bool    $linked      Optional. Adds a link to the user profile if set.
 * }
 */

  $modifiers  = isset($args['modifiers']) ? $args['modifiers'] : false;
  $linked     = isset($args['linked']) ? $args['linked'] : false;

  $modifiers_classes  = $modifiers ? $modifiers : '';
  
?>

<!-- AUTHOR PREVIEW -->
<div class="author-preview <?php echo esc_attr($modifiers_classes); ?>">
<?php

  /**
   * Avatar Small
   */
  get_template_part('template-part/avatar/avatar', 'small', [
    'user'      => $args['user'],
    'modifiers' => 'author-preview-avatar',
    'linked'    => $linked,
    'no_border' => true
  ]);

?>

  <!-- AUTHOR PREVIEW INFO -->
  <div class="author-preview-info">
    <!-- AUTHOR PREVIEW TITLE -->
    <p class="author-preview-title">
    <?php
        
      echo esc_html($args['user']['name']);

      do_action('vikinger_wp_posts_member_after_fullname', $args['user']);

    ?>
    </p>
    <!-- /AUTHOR PREVIEW TITLE -->

    <!-- AUTHOR PREVIEW TEXT -->
    <p class="author-preview-text">
    <?php

      echo '&#64;' . esc_html($args['user']['mention_name']);

      do_action('vikinger_wp_posts_member_after_username', $args['user']);

    ?>
    </p>
    <!-- /AUTHOR PREVIEW TEXT -->
  </div>
  <!-- /AUTHOR PREVIEW INFO -->
</div>
<!-- /AUTHOR PREVIEW -->