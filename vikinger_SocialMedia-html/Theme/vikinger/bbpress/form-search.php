<?php

/**
 * Search 
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

$search_only_bar = (bbp_get_forum_id() === 0) || bbp_is_forum_category();
$can_search = bbp_allow_search();
$can_create_discussion = is_user_logged_in() && !$search_only_bar;
$can_subscribe = bbp_is_subscriptions_active();

$bar_has_action = !($search_only_bar && !$can_search) && ($can_search || $can_create_discussion || $can_subscribe);

if ($bar_has_action) :

?>

<!-- SECTION FILTERS BAR -->
<div class="section-filters-bar v2 vikinger-forum-search-bar">
  <!-- SECTION FILTERS BAR ACTIONS -->
  <div class="section-filters-bar-actions full">
  <?php if ($can_search) : ?>
    <!-- BBP SEARCH FORM -->
    <div class="bbp-search-form form">
      <form role="search" method="get" id="bbp-search-form">
        <!-- FORM ROW -->
        <div class="form-row">
          <label class="screen-reader-text hidden" for="bbp_search"><?php esc_html_e( 'Search for:', 'vikinger' ); ?></label>
          <input type="hidden" name="action" value="bbp-search-request" />

          <!-- FORM ITEM -->
          <div class="form-item">
            <!-- FORM INPUT -->
            <div class="form-input small with-button">
              <label for="bbp_search"><?php esc_html_e('Search Forums', 'vikinger'); ?></label>
              <input type="text" value="<?php bbp_search_terms(); ?>" name="bbp_search" id="bbp_search" />
              <button class="button primary" type="submit" id="bbp_search_submit">
              <?php

                /**
                 * Icon SVG
                 */
                get_template_part('template-part/icon/icon', 'svg', [
                  'icon'  => 'magnifying-glass'
                ]);

              ?>
              </button>
            </div>
            <!-- /FORM INPUT -->
          </div>
          <!-- /FORM ITEM -->
        </div>
        <!-- /FORM ROW -->
      </form>
    </div>
    <!-- /BBP SEARCH FORM -->
  <?php endif; ?>

  <?php if ($can_create_discussion) : ?>
    <!-- BUTTON -->
    <a href="#new-topic-0" class="button secondary vikinger-create-discussion-button"><?php esc_html_e('+ Create Discussion', 'vikinger'); ?></a>
    <!-- /BUTTON -->
  <?php endif; ?>

  <?php bbp_forum_subscription_link(); ?>
  </div>
  <!-- /SECTION FILTERS BAR ACTIONS -->
</div>
<!-- /SECTION FILTERS BAR -->

<?php

endif;

?>