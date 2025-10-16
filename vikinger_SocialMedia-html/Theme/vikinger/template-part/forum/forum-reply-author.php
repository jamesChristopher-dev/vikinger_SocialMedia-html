<?php
/**
 * Vikinger Template Part - Forum Reply Author
 * 
 * @package Vikinger
 * @since 1.3.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_bbpress_reply_author_get, vikinger_bbpress_author_role_get
 * 
 * @param array $args {
 *   @type array $author        Author data.
 * }
 */

?>

<!-- FORUM REPLY AUTHOR -->
<div class="vikinger-forum-reply-author">
<?php

  /**
   * Avatar
   */
  get_template_part('template-part/avatar/avatar', null, [
    'user'      => $args['author'],
    'linked'    => true,
    'no_border' => true,
    'modifiers' => 'vikinger-forum-reply-author-avatar'
  ]);

?>
  <!-- VIKINGER FORUM REPLY AUTHOR TITLE -->
  <p class="vikinger-forum-reply-author-title">
    <a href="<?php echo esc_url($args['author']['link']); ?>">
    <?php

      echo esc_html($args['author']['name']);

      do_action('vikinger_forum_replies_member_after_fullname', $args['author']);

    ?>
    </a>
  </p>
  <!-- /VIKINGER FORUM REPLY AUTHOR TITLE -->

  <!-- VIKINGER FORUM REPLY AUTHOR TEXT -->
  <p class="vikinger-forum-reply-author-text">
    <a href="<?php echo esc_url($args['author']['link']); ?>">
    <?php

      echo '&#64;' . esc_html($args['author']['mention_name']);

      do_action('vikinger_forum_replies_member_after_username', $args['author']);

    ?>
    </a>
  </p>
  <!-- /VIKINGER FORUM REPLY AUTHOR TEXT -->

  <!-- VIKINGER FORUM REPLY AUTHOR ROLE -->
  <p class="vikinger-forum-reply-author-role"><?php echo esc_html($args['author']['role']); ?></p>
  <!-- /VIKINGER FORUM REPLY AUTHOR ROLE -->
</div>
<!-- /FORUM REPLY AUTHOR -->