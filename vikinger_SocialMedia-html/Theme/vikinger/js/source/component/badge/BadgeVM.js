import React from 'react';

import BadgeVerified from './BadgeVerified';
import BadgeUnverified from './BadgeUnverified';

function BadgeVM(props) {
  const displayVerifiedMemberBadge = props.verified;
  const displayUnverifiedMemberBadge = vikinger_constants.settings.bp_verified_member_display_unverified_badge && !props.verified;

  return (
    <React.Fragment>
    {
      displayVerifiedMemberBadge &&
        <BadgeVerified />
    }
    {
      displayUnverifiedMemberBadge &&
        <BadgeUnverified />
    }
    </React.Fragment>
  );
}

export { BadgeVM as default };