const getGroups = (profileData, prefix) => {
  const groupRegex = new RegExp(`${prefix}_`, 'igm'),
        profileDataGroup = profileData.group,
        groups = [];

  for (const group in profileDataGroup) {
    // ignore group if prefix doesn't match
    if (!groupRegex.test(group)) {
      continue;
    }

    const groupName = group.replace(groupRegex, ''),
          fields = profileDataGroup[group];

    // if group has at least one field, add it
    if (fields.length > 0) {
      groups.push({
        id: fields[0].group_id,
        name: groupName,
        fullname: group,
        fields: fields
      });
    }
  }

  return groups;
};

export { getGroups };