import React from 'react';

import Avatar from '../avatar/Avatar';
import AvatarSmallerList from '../avatar/AvatarSmallerList';

import TagSticker from '../tag/TagSticker';

import UserStatusTypeList from '../user-status/user-status-type/UserStatusTypeList';

import JoinGroupButton from '../button/action-button/action-button-group/JoinGroupButton';
import LeaveGroupButton from '../button/action-button/action-button-group/LeaveGroupButton';
import RequestGroupMembershipButton from '../button/action-button/action-button-group/RequestGroupMembershipButton';
import RemoveGroupMembershipButton from '../button/action-button/action-button-group/RemoveGroupMembershipButton';

import groupUtils from'../utils/group';

import { groupPermissions } from '../utils/membership';

function GroupPreviewBig(props) {
  const groupable = groupUtils(props.loggedUser, props.data);

  const memberCountText = props.data.total_member_count === 1 ? vikinger_translation.member : vikinger_translation.members;
  const postCountText = props.data.post_count === 1 ? vikinger_translation.post : vikinger_translation.posts;

  const groupTypes = props.data.group_types.filter(groupType => vikinger_constants.settings.group_types[groupType].show_in_list === '1');
  
  return (
    <div className="user-preview">
      <div className="user-preview-top">
        <div className="user-preview-cover" style={{background: `url(${props.data.cover_image_url}) center center / cover no-repeat`}}></div>

        <div className="user-preview-info">
          <TagSticker icon={props.data.status} />

          <div className="user-short-description">
            <Avatar size="medium"
                    modifiers="user-short-description-avatar"
                    data={props.data}
            />
      
            <p className="user-short-description-title"><a href={props.data.link}>{props.data.name}</a></p>
          {
            (groupTypes.length > 0) &&
              <UserStatusTypeList
                tags={groupTypes}
              />
          }
          </div>
        </div>
      </div>

      <div className="user-preview-bottom">
        <div className="user-preview-info">
          <div className="user-stats">
            <div className="user-stat">
              <p className="user-stat-title">{props.data.total_member_count}</p>
              <p className="user-stat-text">{memberCountText}</p>
            </div>

            <div className="user-stat">
              <p className="user-stat-title">{props.data.post_count}</p>
              <p className="user-stat-text">{postCountText}</p>
            </div>
          </div>

          <AvatarSmallerList data={props.data.members} count={props.data.total_member_count} limit={6} link={props.data.members_link} />

          <div className="user-preview-actions">
          {
            props.loggedUser &&
              <React.Fragment>
              {
                groupable.isBannedFromGroup() &&
                  <TagSticker modifiers="button-tag tertiary"
                            text={vikinger_translation.banned}
                            icon="ban"
                            iconModifiers="white"
                  />
              }
              {
                !groupable.isBannedFromGroup() &&
                  <React.Fragment>
                  {
                    groupPermissions.joinGroup && groupable.isGroupPublic() && !groupable.isGroupMember() &&
                      <JoinGroupButton  modifiers="secondary full"
                                        text={vikinger_translation.join_group}
                                        icon="join-group"
                                        loggedUser={props.loggedUser}
                                        group={props.data}
                                        onActionComplete={props.onActionComplete}
                      />
                  }

                  {
                    groupable.isGroupMember() && !groupable.isGroupAdmin() &&
                      <LeaveGroupButton modifiers="tertiary full"
                                        text={vikinger_translation.leave_group}
                                        icon="leave-group"
                                        loggedUser={props.loggedUser}
                                        group={props.data}
                                        onActionComplete={props.onActionComplete}
                      />
                  }

                  {
                    groupPermissions.joinGroup && groupable.isGroupPrivate() && !groupable.isGroupMember() && !groupable.groupMembershipRequestSent() &&
                      <RequestGroupMembershipButton modifiers="secondary full"
                                                    text={vikinger_translation.send_join_request}
                                                    icon="join-group"
                                                    loggedUser={props.loggedUser}
                                                    group={props.data}
                                                    onActionComplete={props.onActionComplete}
                      />
                  }

                  {
                    groupable.isGroupPrivate() && !groupable.isGroupMember() && groupable.groupMembershipRequestSent() &&
                      <RemoveGroupMembershipButton  modifiers="tertiary full"
                                                    text={vikinger_translation.cancel_join_request}
                                                    icon="leave-group"
                                                    loggedUser={props.loggedUser}
                                                    group={props.data}
                                                    onActionComplete={props.onActionComplete}
                      />
                  }
                  </React.Fragment>
              }
              </React.Fragment>
          }
          </div>
        </div>
      </div>
    </div>
  );
}

export { GroupPreviewBig as default };