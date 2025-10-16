<?php
/**
 * Vikinger Template Part - User Status
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_members_get
 * 
 * @param array $args {
 *   @type array $user    User data.
 * }
 */

  global $vikinger_settings;

?>

<!-- USER STATUS -->
<div class="user-status">
<?php

  /**
   * Avatar Small
   */
  get_template_part('template-part/avatar/avatar', 'small', [
    'user'      => $args['user'],
    'modifiers' => 'user-status-avatar',
    'linked'    => true,
    'no_border' => true
  ]);

?>
  <!-- USER STATUS TITLE -->
  <div class="user-status-title">
    <a class="bold" href="<?php echo esc_url($args['user']['link']); ?>"><?php echo esc_html($args['user']['name']); ?></a>
  <?php

    do_action('vikinger_member_lists_member_after_fullname', $args['user']);

    $display_membership_tag = vikinger_plugin_pmpro_buddypress_is_active() && vikinger_pmpro_buddypress_membership_level_tag_display_on_profile_is_enabled() && $args['user']['membership'];

    if ($display_membership_tag) {
      /**
       * Membership Level Tag
       */
      get_template_part('template-part/membership/membership-level', 'tag', [
        'name'      => $args['user']['membership']['name'],
        'modifiers' => 'vikinger-pmpro-level-tag_small'
      ]);
    }

    $member_types = array_filter($args['user']['member_types'], function ($member_type) use ($vikinger_settings) {
      return $vikinger_settings['member_types'][$member_type]->show_in_list === '1';
    });

    if (count($member_types) > 0) {
      foreach ($member_types as $member_type) {
        /**
         * User Tag
         */
        get_template_part('template-part/user/user', 'tag', [
          'name'  => $member_type
        ]);
      }
    }

  ?>
  </div>
  <!-- /USER STATUS TITLE -->

  <!-- USER STATUS TEXT -->
  <p class="user-status-text small">
    &#64;<?php echo esc_html($args['user']['mention_name']); ?>
  <?php
    do_action('vikinger_member_lists_member_after_username', $args['user']);
  ?>
  </p>
  <!-- /USER STATUS TEXT -->
</div>
<!-- /USER STATUS -->