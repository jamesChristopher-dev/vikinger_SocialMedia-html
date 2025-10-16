import React from 'react';

function BadgeItemMore(props) {
  return (
    <a className="badge-item badge-item-more" href={props.more_link}>
      <img src={`${vikinger_constants.settings.badge_view_more_image_url}`} alt="View more badges" />
      <p className="badge-item-text">+{props.more_count}</p>
    </a>
  );
}

export { BadgeItemMore as default };