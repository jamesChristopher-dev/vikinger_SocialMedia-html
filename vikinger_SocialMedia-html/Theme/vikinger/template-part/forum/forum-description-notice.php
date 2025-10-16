<?php
/**
 * Vikinger Template Part - Forum Description Notice
 * 
 * @package Vikinger
 * @since 1.3.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 * @see vikinger_bbpress_forum_last_activity_description_get
 * 
 * @param array $args {
 *   @type array   $last_activity_description_data        Last activity description data.
 * }
 */
?>

<!-- BBP TEMPLATE NOTICE -->
<div class="bbp-template-notice info">
  <ul>
    <li class="bbp-forum-description">
    <?php

      echo wp_kses($args['last_activity_description_data']['text'], ['a' => ['href' => [], 'title' => []]]);

      if (array_key_exists('author', $args['last_activity_description_data'])) :

    ?>
      <!-- BBP FORUM DESCRIPTION AUTHOR -->
      <div class="bbp-forum-description-author">
    <?php

        /**
         * Avatar Micro
         */
        get_template_part('template-part/avatar/avatar', 'micro', [
          'user'      => $args['last_activity_description_data']['author'],
          'linked'    => true,
          'no_border' => true,
          'modifiers' => 'bbp-forum-description-author-avatar'
        ]);

    ?>
        <!-- BBP FORUM DESCRIPTION AUTHOR TITLE -->
        <a href="<?php echo esc_url($args['last_activity_description_data']['author']['link']); ?>" class="bbp-forum-description-author-title">
        <?php

          echo esc_html($args['last_activity_description_data']['author']['name']);

          do_action('vikinger_forum_topics_member_after_username', $args['last_activity_description_data']['author']);

        ?>
        </a>
        <!-- /BBP FORUM DESCRIPTION AUTHOR TITLE -->
      </div>
      <!-- /BBP FORUM DESCRIPTION AUTHOR -->
    <?php
    
      endif;

    ?>
    </li>
  </ul>
</div>
<!-- /BBP TEMPLATE NOTICE -->