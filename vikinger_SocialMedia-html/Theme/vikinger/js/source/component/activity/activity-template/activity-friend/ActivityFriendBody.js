import React from 'react';

import Avatar from '../../../avatar/Avatar';

import BadgeVM from '../../../badge/BadgeVM';

import UserStatusLevel from '../../../user-status/user-status-level/UserStatusLevel';
import UserStatusTypeList from '../../../user-status/user-status-type/UserStatusTypeList';

import ButtonLink from '../../../button/ButtonLink';

import friendUtils from '../../../utils/friend';

import { messagePermissions } from '../../../utils/membership';

function ActivityFriendBody(props) {
  let friendable;

  if (props.user) {
    friendable = friendUtils(props.user, props.data.friend.id);
  }

  const displayVerified = vikinger_constants.plugin_active['bp-verified-member'] && vikinger_constants.settings.bp_verified_member_display_badge_in_activity_stream;
  const displayVerifiedMemberFriendBadgeInUsername = displayVerified && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_username;
  const displayVerifiedMemberFriendBadgeInFullname = displayVerified && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_fullname;

  const displayMembershipTag = vikinger_constants.plugin_active['pmpro-buddypress'] && vikinger_constants.settings.pmpro_bp_membership_level_tag_display_on_profile_is_enabled && props.data.friend.membership;

  const memberTypes = props.data.friend.member_types.length > 0 ? props.data.friend.member_types.filter((memberType => {
    const memberTypeSettings = vikinger_constants.settings.member_types[memberType];

    return memberTypeSettings && memberTypeSettings.show_in_list === '1';
  })) : false;

  const messagesLink = `${props.user.messages_link}?user_id=${props.data.friend.id}`;

  return (
    <div className="widget-box-status-content">
      {/* USER PREVIEW WIDGET */}
      <div className="user-preview-widget">
        <a href={props.data.friend.link}>
          <div className="user-preview-widget-cover" style={{background: `url('${props.data.friend.cover_url}') center center / cover no-repeat`}}></div>
        </a>

        <div className="user-short-description small">
          <Avatar modifiers="user-short-description-avatar"
                  data={props.data.friend}
          />
    
          <p className="user-short-description-title">
            <a href={props.data.friend.link}>{props.data.friend.name}</a>
          {
            displayVerifiedMemberFriendBadgeInFullname &&
              <BadgeVM verified={props.data.friend.verified} />
          }
          </p>
        {
          displayMembershipTag &&
            <UserStatusLevel  name={props.data.friend.membership.name}
                              size="small"
            />
        }
        {
          memberTypes &&
            <UserStatusTypeList tags={memberTypes} />
        }
          <p className="user-short-description-text">
            <a href={props.data.friend.link}>&#64;{props.data.friend.mention_name}</a>
          {
            displayVerifiedMemberFriendBadgeInUsername &&
              <BadgeVM verified={props.data.friend.verified} />
          }
          </p>
        </div>

        {/* USER PREVIEW WIDGET FOOTER */}
        <div className="user-preview-widget-footer">
          {/* USER PREVIEW WIDGET FOOTER ACTION */}
          <div className="user-preview-widget-footer-action"></div>
          {/* USER PREVIEW WIDGET FOOTER ACTION */}

          {/* USER PREVIEW WIDGET FOOTER ACTION */}
          <div className="user-preview-widget-footer-action">
          {
            messagePermissions.createMessage && props.user && (props.user.id !== props.data.friend.id) && vikinger_constants.plugin_active.buddypress_messages &&
              <React.Fragment>
              {
                ((vikinger_constants.plugin_active['bp-better-messages'] && vikinger_constants.settings.better_messages_friend_only_mode && friendable.isFriend()) || (vikinger_constants.plugin_active['bp-better-messages'] && !vikinger_constants.settings.better_messages_friend_only_mode) ||
                (!vikinger_constants.plugin_active['bp-better-messages'] && friendable.isFriend())) &&
                  <ButtonLink modifiers="primary"
                              title={vikinger_translation.send_message}
                              icon="messages"
                              link={messagesLink}
                  />
              }
              </React.Fragment>
          }
          </div>
          {/* USER PREVIEW WIDGET FOOTER ACTION */}
        </div>
        {/* USER PREVIEW WIDGET FOOTER */}
      </div>
      {/* USER PREVIEW WIDGET */}
    </div>
  );
}

export { ActivityFriendBody as default };