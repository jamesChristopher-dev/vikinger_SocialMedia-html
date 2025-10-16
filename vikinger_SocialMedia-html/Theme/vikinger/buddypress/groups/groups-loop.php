<?php
/**
 * Vikinger Template - BuddyPress Groups Loop
 * 
 * Displays the groups loop
 * 
 * @package Vikinger
 * @since 1.0.0
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

  $groups_grid_type = vikinger_logged_user_grid_type_get('group');

  $group_type = bp_get_current_group_directory_type();

?>

<!-- GROUP FILTERABLE LIST -->
<div id="group-filterable-list" class="filterable-list" data-grid-type="<?php echo esc_attr($groups_grid_type); ?>" data-group-type="<?php echo esc_attr($group_type); ?>"></div>
<!-- /GROUP FILTERABLE LIST -->