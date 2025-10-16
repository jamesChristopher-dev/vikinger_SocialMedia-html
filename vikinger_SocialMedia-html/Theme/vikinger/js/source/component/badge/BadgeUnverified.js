import React from 'react';

function BadgeUnverified(props) {
  return (
    <span dangerouslySetInnerHTML={{__html: vikinger_constants.settings.bp_unverified_member_badge}}></span>
  );
}

export { BadgeUnverified as default };