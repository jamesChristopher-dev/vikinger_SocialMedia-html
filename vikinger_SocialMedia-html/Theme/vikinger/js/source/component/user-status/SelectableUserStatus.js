import React from 'react';

import Avatar from '../avatar/Avatar';

import Checkbox from '../form/Checkbox';

import BadgeVM from '../badge/BadgeVM';

function SelectableUserStatus(props) {
  const displayVerifiedMemberBadge = vikinger_constants.plugin_active['bp-verified-member'];

  return (
    <div className="user-status user-status-selectable">
      <Checkbox active={props.selected} toggleActive={props.toggleSelectableActive} />

      <Avatar size="small"
              modifiers="user-status-avatar"
              data={props.data}
              noBorder
              noLink
      />
        
      <p className="user-status-title">
        <span className="bold">{props.data.name}</span>
        {
          displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_fullname &&
            <BadgeVM verified={props.data.verified} />
        }
      </p>
      <p className="user-status-text small">&#64;{props.data.mention_name}
      {
        displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_username &&
          <BadgeVM verified={props.data.verified} />
      }
      </p>
    </div>
  );
}

export { SelectableUserStatus as default };