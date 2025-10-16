import React from 'react';

import Avatar from '../avatar/Avatar';

import BadgeVM from '../badge/BadgeVM';

function UserPreviewAuthor(props) {
  const displayVerifiedMemberBadge = !props.hideVerified && vikinger_constants.plugin_active['bp-verified-member'];

  return (
    <div className="user-preview-author">
      <Avatar size="micro"
              modifiers="user-preview-author-image"
              data={props.data}
              noBorder
      />

      <p className="user-preview-author-title">{props.title || vikinger_translation.invited_by}</p>
      <p className="user-preview-author-text">
        <a href={props.data.link}>{props.data.name}</a>
        {
          displayVerifiedMemberBadge &&
            <BadgeVM verified={props.data.verified} />
        }
      </p>
    </div>
  );
}

export { UserPreviewAuthor as default };