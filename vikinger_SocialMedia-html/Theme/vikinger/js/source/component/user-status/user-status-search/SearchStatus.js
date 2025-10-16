import React, { useRef } from 'react';

import Avatar from '../../avatar/Avatar';

import IconSVG from '../../icon/IconSVG';

import BadgeVM from '../../badge/BadgeVM';

import UserStatusLevel from '../user-status-level/UserStatusLevel';
import UserStatusType from '../user-status-type/UserStatusType';

import { getSearchStatusTypeData } from '../../utils/search';

import postUtils from '../../utils/post';

function SearchStatus(props) {
  const [statusTitle, statusText, statusIcon] = getSearchStatusTypeData(props.type, props.data);

  const postCoverStyle = useRef(props.data.cover_url_thumb ? { background: `url(${props.data.cover_url_thumb}) center center / cover no-repeat` } : {});
  const postFormatIcon = postUtils.getPostFormatIcon(props.data.format);

  const displayVerifiedMemberBadge =  vikinger_constants.plugin_active['bp-verified-member'] && (props.type === 'user');
  const displayVerifiedMemberBadgeInUsername = displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_username;
  const displayVerifiedMemberBadgeInFullname = displayVerifiedMemberBadge && vikinger_constants.settings.bp_verified_member_display_badge_in_profile_fullname;

  const displayMembershipTag = vikinger_constants.plugin_active['pmpro-buddypress'] && vikinger_constants.settings.pmpro_bp_membership_level_tag_display_on_profile_is_enabled && props.data.membership;

  return (
    <div className="user-status notification">
    {
      (props.type === 'user' || props.type === 'group') &&
        <Avatar size="small"
                modifiers="user-status-avatar"
                data={props.data}
                noBorder
                noLink
        />
    }
    {
      props.type === 'post' &&
        <React.Fragment>
        {
          props.data.cover_url &&
            <div className="user-status-avatar picture small round" style={postCoverStyle.current}></div>
        }
        {
          !props.data.cover_url &&
            <div className="post-format-tag">
              <IconSVG  icon={postFormatIcon}
                        modifiers="post-format-tag-icon"          
              />
            </div>
        }
        </React.Fragment>
    }
        
      <div className="user-status-title">
        <span className="bold">{statusTitle}</span>
      {
        displayVerifiedMemberBadgeInFullname &&
          <BadgeVM verified={props.data.verified} />
      }
      {
        displayMembershipTag &&
          <UserStatusLevel
            name={props.data.membership.name}
            size="small"
          />
      }
      {
        (props.type === 'user') && (props.data.member_types.length > 0) && props.data.member_types.map((memberType => {
          const memberTypeSettings = vikinger_constants.settings.member_types[memberType];

          if (memberTypeSettings && memberTypeSettings.show_in_list === '1') {
            return (
              <UserStatusType key={memberType} name={memberType} />
            );
          }
        }))
      }
      </div>
      <p className="user-status-text">{statusText}
      {
        displayVerifiedMemberBadgeInUsername &&
          <BadgeVM verified={props.data.verified} />
      }
      </p>

      <IconSVG  icon={statusIcon}
                modifiers='user-status-icon'
      />
    </div>
  );
}

export { SearchStatus as default };