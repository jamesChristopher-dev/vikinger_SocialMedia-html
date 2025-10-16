import scrollerInstance from '../global/scroller';

if (vikinger_constants.settings.header_behaviour === 'hide') {
  const header = document.querySelector('.header');

  const navigationWidgets = document.querySelectorAll('.navigation-widget-desktop');

  if (header) {
    const hideHeader = () => {
      header.classList.add('header--hidden');

      for (const navigationWidget of navigationWidgets) {
        navigationWidget.classList.add('navigation-widget--offset');
      }
    };

    const showHeader = () => {
      header.classList.remove('header--hidden');

      for (const navigationWidget of navigationWidgets) {
        navigationWidget.classList.remove('navigation-widget--offset');
      }
    };

    scrollerInstance.addUserScrollDownCallback(hideHeader);
    scrollerInstance.addUserScrollUpCallback(showHeader);
  }
}
