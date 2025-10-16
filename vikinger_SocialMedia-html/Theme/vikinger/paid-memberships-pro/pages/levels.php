<?php
/**
 * Template: Levels
 * Version: 3.1
 * 
 * The template for displaying membership levels.
 * 
 * @package Vikinger
 * @since 1.8.0
 * @version 1.9.19
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

	global $wpdb, $pmpro_msg, $pmpro_msgt, $current_user, $pmpro_currency_symbol;

	$pmpro_levels = pmpro_sort_levels_by_order( pmpro_getAllLevels(false, true) );
	$pmpro_levels = apply_filters( 'pmpro_levels_array', $pmpro_levels );

	$level_groups  = pmpro_get_level_groups_in_order();
	
	$pmpro_currency_position = pmpro_getCurrencyPosition();
?>

<?php if ($pmpro_msg) : ?>
<!-- PMPRO MESSAGE -->
<div class="<?php echo esc_attr( pmpro_get_element_class( 'pmpro_message ' . $pmpro_msgt, $pmpro_msgt ) ); ?>"><?php echo wp_kses_post( $pmpro_msg ); ?></div>
<!-- /PMPRO MESSAGE -->
<?php endif; ?>

<?php

foreach ( $level_groups as $level_group ) {
	$levels_in_group = pmpro_get_level_ids_for_group( $level_group->id );

	// The pmpro_levels_array filter is sometimes used to hide levels from the levels page.
	// Let's make sure that every level in the group should still be displayed.
	$levels_to_show_for_group = array();
	foreach ( $pmpro_levels as $level ) {
		if ( in_array( $level->id, $levels_in_group ) ) {
			$levels_to_show_for_group[] = $level;
		}
	}

	if ( empty( $levels_to_show_for_group ) ) {
		continue;
	}

	if ( count( $level_groups ) > 1  ) {
		?>
		<h2 class="membership-group-details_title"><?php echo esc_html( $level_group->name ); ?></h2>
		<?php
		if ( ! empty( $level_group->allow_multiple_selections ) ) {
			?>
			<p class="membership-group-details_text"><?php esc_html_e( 'You may select multiple levels from this group.', 'paid-memberships-pro' ); ?></p>
			<?php
		} else {
			?>
			<p class="membership-group-details_text"><?php esc_html_e( 'You may select only one level from this group.', 'paid-memberships-pro' ); ?></p>
			<?php
		}
	}
	
?>
<!-- GRID -->
<div class="grid grid-4-4-4 grid-stretched centered-on-mobile">
<?php

	$count = 0;

	foreach($levels_to_show_for_group as $level) {
		$user_level = pmpro_getSpecificMembershipLevelForUser( $current_user->ID, $level->id );
		$has_level = ! empty( $user_level );

		$cost_text = pmpro_getLevelCost($level, true, true); 
		$expiration_text = pmpro_getLevelExpiration($level);
		$period_text = '';

		if (!empty($cost_text) && !empty($expiration_text)) {
			$period_text = $cost_text . "<br>" . $expiration_text;
		} else if (!empty($cost_text)) {
			$period_text = $cost_text;
		} else if (!empty($expiration_text)) {
			$period_text = $expiration_text;
		}

		$action_text = '';
		$action_link = pmpro_url("checkout", "?level=" . $level->id, "https");
		$action_type = 'button';

		if (!$has_level) {
			$action_text = esc_html__('Select', 'vikinger');
		} else {
			if (pmpro_isLevelExpiringSoon($user_level) && $level->allow_signups) {
				$action_text = esc_html__('Renew', 'vikinger');
			} else {
				$action_type = 'notice';
				$action_text = esc_html__('Your Level', 'vikinger');
			}
		}

		/**
		 * Membership Preview
		 */
		get_template_part('template-part/membership/membership', 'preview', [
			'currency'					=> $pmpro_currency_symbol,
			'currency_position'	=> $pmpro_currency_position,
			'price'							=> $level->initial_payment,
			'name'							=> $level->name,
			'period'						=> $period_text,
			'description'				=> $level->description,
			'action_text'				=> $action_text,
			'action_type'				=> $action_type,
			'action_link'				=> $action_link
		]);

	}
?>
</div>
<!-- /GRID -->
<?php

}

?>