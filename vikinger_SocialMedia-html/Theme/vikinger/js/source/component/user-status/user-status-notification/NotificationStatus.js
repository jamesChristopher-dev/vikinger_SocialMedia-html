import React from 'react';

import Avatar from '../../avatar/Avatar';

import Checkbox from '../../form/Checkbox';

import IconSVG from '../../icon/IconSVG';

import BadgeVM from '../../badge/BadgeVM';

import UserStatusLevel from '../user-status-level/UserStatusLevel';
import UserStatusType from '../user-status-type/UserStatusType';

import { getNotificationComponentIcon } from '../../utils/notification';

function NotificationStatus(props) {
  const statusIcon = getNotificationComponentIcon(props.data.component);

  const displayVerifiedMemberBadge = vikinger_constants.plugin_active['bp-verified-member'] && props.data.user;

  const displayMembershipTag = vikinger_constants.plugin_active['pmpro-buddypress'] && vikinger_constants.settings.pmpro_bp_membership_level_tag_display_on_profile_is_enabled && props.data.user && props.data.user.membership;

  return (
    <div className={`user-status notification ${!props.data.user && !props.data.group ? 'no-padding-left' : ''}`}>
    {
      props.data.user &&
        <Avatar size="small"
                modifiers="user-status-avatar"
                data={props.data.user}
                noBorder
        />
    }
      
    {
      !props.data.user && props.data.group &&
        <Avatar size="small"
                modifiers="user-status-avatar"
                data={props.data.group}
                noBorder
        />
    }
        
      <div className="user-status-title">
      {
        props.data.user &&
          <React.Fragment>
            <a className="bold" href={props.data.user.link}>{props.data.user.name}</a>
          {
            displayVerifiedMemberBadge &&
              <BadgeVM verified={props.data.user.verified} />
          }
          {
            displayMembershipTag &&
              <UserStatusLevel
                name={props.data.user.membership.name}
                size="small"
              />
          }
          {
            props.data.user && (props.data.user.member_types.length > 0) && props.data.user.member_types.map((memberType => {
              if (vikinger_constants.settings.member_types[memberType].show_in_list === '1') {
                return (
                  <UserStatusType key={memberType} name={memberType} />
                );
              }
            }))
          }
          </React.Fragment>
      }
        <span dangerouslySetInnerHTML={{__html: ` ${props.data.description}`}}></span>
      </div>
      <p className="user-status-timestamp">{props.data.timestamp}</p>

      <IconSVG  icon={statusIcon}
                modifiers="user-status-icon"
      />

      {
        props.selectable &&
          <Checkbox active={props.selected}
                    modifiers="small"
                    toggleActive={props.toggleSelectableActive}
          />
      }
    </div>
  );
}

export { NotificationStatus as default };