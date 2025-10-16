import React from 'react';

import Avatar from '../../../avatar/Avatar';

import BadgeVM from '../../../badge/BadgeVM';

import UserStatusLevel from '../../../user-status/user-status-level/UserStatusLevel';
import UserStatusType from '../../../user-status/user-status-type/UserStatusType';

function ActivityFriendHeader(props) {
  const displayVerifiedMemberBadge = vikinger_constants.plugin_active['bp-verified-member'] && vikinger_constants.settings.bp_verified_member_display_badge_in_activity_stream;

  const displayMembershipTag = vikinger_constants.plugin_active['pmpro-buddypress'] && vikinger_constants.settings.pmpro_bp_membership_level_tag_display_on_profile_is_enabled;
  const displayMembershipTagForMember = displayMembershipTag && props.data.author.membership;
  const displayMembershipTagForFriend = displayMembershipTag && props.data.friend.membership;

  return (
    <div className="widget-box-status-header">
      <div className="user-status">
        <div className="user-status-avatar">
          <Avatar size="small"
                  data={props.data.author}
                  noBorder
          />
        </div>
    
        <div className="user-status-title medium">
          <a href={props.data.author.link}>{props.data.author.name}</a>
        {
          displayVerifiedMemberBadge &&
            <BadgeVM verified={props.data.author.verified} />
        }
        {
          displayMembershipTagForMember &&
            <UserStatusLevel  name={props.data.author.membership.name}
                              size="small"
            />
        }
        {
          (props.data.author.member_types.length > 0) && props.data.author.member_types.map((memberType => {
            const memberTypeSettings = vikinger_constants.settings.member_types[memberType];

            if (memberTypeSettings && memberTypeSettings.show_in_list === '1') {
              return (
                <UserStatusType key={memberType} name={memberType} />
              );
            }
          }))
        }
          {` ${vikinger_translation.and}`}
          <a href={props.data.friend.link}>{` ${props.data.friend.name}`}</a>
        {
          displayVerifiedMemberBadge &&
            <BadgeVM verified={props.data.friend.verified} />
        }
        {
          displayMembershipTagForFriend &&
            <UserStatusLevel  name={props.data.friend.membership.name}
                              size="small"
            />
        }
        {
          (props.data.friend.member_types.length > 0) && props.data.friend.member_types.map((memberType => {
            const memberTypeSettings = vikinger_constants.settings.member_types[memberType];

            if (memberTypeSettings && memberTypeSettings.show_in_list === '1') {
              return (
                <UserStatusType key={memberType} name={memberType} />
              );
            }
          }))
        }
          <span dangerouslySetInnerHTML={{__html: ` ${props.data.action}`}}></span>
        </div>

        <p className="user-status-text small">{props.data.timestamp}</p>
      </div>
    </div>
  );
}

export { ActivityFriendHeader as default };