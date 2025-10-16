import React, { useState, useRef, useEffect } from 'react';

import IconSVG from '../icon/IconSVG';

import GridOptions from '../grid/GridOptions';

import { createFormInput } from '../../utils/plugins';

const groupTypes = Object.values(vikinger_constants.settings.group_types).filter(groupType => groupType.has_directory === '1');

function GroupFilterBar(props) {
  const [type, setType] = useState('alphabetical');
  const [search, setSearch] = useState(props.searchTerm || '');
  const [groupType, setGroupType] = useState(props.groupType || 'all');

  const searchInputRef = useRef(null);

  useEffect(() => {
    if (!props.searchTerm) {
      createFormInput([searchInputRef.current]);
    }
  }, []);

  useEffect(() => {
    const filters = {type, search, group_type: groupType};

    if (groupType === 'all') {
      filters.group_type = '';
    }

    props.applyFilters(filters);
  }, [type, groupType]);

  const handleSubmit = (e) => {
    e.preventDefault();

    const filters = {type, search, group_type: groupType};

    if (groupType === 'all') {
      filters.group_type = '';
    }

    props.applyFilters(filters);
  };

  return (
    <div className="section-filters-bar v2">
      <div className="section-filters-bar-actions full">
        <form className="form" onSubmit={handleSubmit}>
          <div className="form-row split">
          {
            !props.searchTerm &&
              <div className="form-item">
                <div ref={searchInputRef} className="form-input small with-button">
                  <label htmlFor="group-name">{vikinger_translation.search_groups}</label>
                  <input type="text" id="group-name" name="search" onChange={(e) => {setSearch(e.target.value);}} />

                  <button type="submit" className={`button ${props.themeColor}`}>
                    <IconSVG icon="magnifying-glass" />
                  </button>
                </div>
              </div>
          }

            <div className="form-item">
              <div className="form-select">
                <label htmlFor="group-order-by">{vikinger_translation.order_by}</label>
                <select id="group-order-by" name="type" value={type} onChange={(e) => {setType(e.target.value);}}>
                  <option value="alphabetical">{vikinger_translation.alphabetical}</option>
                  <option value="newest">{vikinger_translation.newest_groups}</option>
                  <option value="active">{vikinger_translation.recently_active}</option>
                </select>
                <IconSVG  icon="small-arrow"
                          modifiers="form-select-icon"
                />
              </div>
            </div>
          {
            !props.groupType && (groupTypes.length > 0) &&
              <div className="form-item">
                <div className="form-select">
                  <label htmlFor="group-order-by">{vikinger_translation.group_type}</label>
                  <select id="group-order-by" name="group_type" value={groupType.name} onChange={(e) => { setGroupType(e.target.value); }}>
                    <option value="all">{vikinger_translation.all}</option>
                  {
                    groupTypes.map((groupType) => {
                      return (
                        <option key={groupType.name} value={groupType.name}>{groupType.labels.name}</option>
                      );
                    })
                  }
                  </select>
                  <IconSVG
                    icon="small-arrow"
                    modifiers="form-select-icon"
                  />
                </div>
              </div>
          }
          </div>
        </form>
      </div>

      <div className="section-filters-bar-actions">
        <GridOptions  gridTypes={['big', 'small', 'list']}
                      activeGrid={props.gridType}
                      onGridOptionClick={props.setGrid}
        />
      </div>
    </div>
  );
}

export { GroupFilterBar as default };