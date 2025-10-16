<?php
/**
 * Functions - BP Better Messages - Actions
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * @version 1.9.9.5
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

 if (!function_exists('vikinger_bp_better_messages_catch_new_thread')) {
  /**
   * Catching Vikinger New Message
   */
  function vikinger_bp_better_messages_catch_new_thread() {
    if (!isset($_GET['user_id'])) {
      return false;
    } else {
      $user_id = intval($_GET['user_id']);
      $user = get_userdata($user_id);
      if (!$user) return false;

      /**
       * Reproducing logic if fast thread mode is enabled
       */
      $is_fast_thread_enabled = BP_Better_Messages()->settings['fastStart'] == '1';

      if( $is_fast_thread_enabled ) {
        if (BP_Better_Messages()->settings['singleThreadMode'] == '1') {
          $threads = BP_Better_Messages()->functions->find_existing_threads(get_current_user_id(), $user->ID);

          if (count($threads) > 0) {
            $thread_id = $threads[0];
            wp_redirect(Better_Messages()->functions->get_user_thread_url( $thread_id, get_current_user_id() ));
            exit;
          }
        }

        $pm_thread = BP_Better_Messages()->functions->get_pm_thread_id($user->ID);

        if( $pm_thread['result'] === 'thread_found' || $pm_thread['result'] === 'thread_created' ){
            $thread_id = $pm_thread['thread_id'];
            wp_redirect(Better_Messages()->functions->get_user_thread_url( $thread_id, get_current_user_id() ));
            exit;
        }

        return null;
      }

      $url = Better_Messages()->functions->create_conversation_link( $user->ID, '', '', false, true );
      wp_redirect( $url );
      exit;
    }
  }
}

add_action('bp_better_messages_before_generation', 'vikinger_bp_better_messages_catch_new_thread');

if (!function_exists('vikinger_bp_better_messages_catch_thread_id')) {
  /**
   * Catching Vikinger Thread
   */
  function vikinger_bp_better_messages_catch_thread_id() {
    if (!isset($_GET['message_id'])) {
      return false;
    } else {
      $thread_id = intval($_GET['message_id']);
      wp_redirect(Better_Messages()->functions->get_user_thread_url( $thread_id, get_current_user_id() ));
      exit;
    }
  }
}

add_action('bp_better_messages_before_generation', 'vikinger_bp_better_messages_catch_thread_id');

?>