import { createDropdown } from '../utils/plugins';

import scrollerInstance from '../global/scroller';

/**
 * HEADER SETTINGS
 */
const dropdowns = createDropdown({
  trigger: '.header-settings-dropdown-trigger',
  container: '.header-settings-dropdown',
  offset: {
    top: 64,
    right: 6
  },
  animation: {
    type: 'translate-top'
  }
});

if (dropdowns && (typeof dropdowns.hideDropdowns === 'function')) {
  if (vikinger_constants.settings.header_behaviour === 'hide') {
    scrollerInstance.addUserScrollDownCallback(dropdowns.hideDropdowns);
  }
}