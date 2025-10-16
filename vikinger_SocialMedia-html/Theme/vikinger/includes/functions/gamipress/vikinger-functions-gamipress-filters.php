<?php
/**
 * Functions - GamiPress - Filters
 * 
 * @package Vikinger
 * 
 * @since 1.9.10
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_gamipress_points_amount_display_filter')) {
  /**
   * Filters GamiPress point amount display.
   * 
   * @since 1.9.10
   */
  function vikinger_gamipress_points_amount_display_filter($point_amount, $point_type_id) {
    return gamipress_format_amount($point_amount, $point_type_id);
  }
}

add_filter('vikinger_points_amount_display', 'vikinger_gamipress_points_amount_display_filter', 10, 2);