const Scroller = () => {
  const getCurrentScrollY = () => {
    return window.scrollY;
  };
  
  const updateCurrentScrollY = () => {
    currentScrollY = getCurrentScrollY();
  };
  
  const userScrolledDown = () => {
    return getCurrentScrollY() > currentScrollY;
  };

  const userScrollDownCallbacks = [];
  const userScrollUpCallbacks = [];

  const addUserScrollDownCallback = (callback) => {
    userScrollDownCallbacks.push(callback);
  };

  const addUserScrollUpCallback = (callback) => {
    userScrollUpCallbacks.push(callback);
  };

  const onUserScrollDown = () => {
    for (const scrollDownCallback of userScrollDownCallbacks) {
      if (typeof scrollDownCallback === 'function') {
        scrollDownCallback();
      }
    }
  };

  const onUserScrollUp = () => {
    for (const scrollUpCallback of userScrollUpCallbacks) {
      if (typeof scrollUpCallback === 'function') {
        scrollUpCallback();
      }
    }
  };
  
  let currentScrollY = getCurrentScrollY();
  
  const onScroll = () => {
    if (userScrolledDown()) {
      onUserScrollDown();
    } else {
      onUserScrollUp();
    }
  
    updateCurrentScrollY();
  };

  window.addEventListener('scroll', onScroll);

  return {
    addUserScrollDownCallback,
    addUserScrollUpCallback
  };
};

const scrollerInstance = Scroller();

export { scrollerInstance as default };