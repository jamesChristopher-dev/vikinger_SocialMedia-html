<?php
/**
 * Vikinger Customizer - Page Header
 * 
 * @since 1.0.0
 */

function vikinger_customizer_pageheader($wp_customize) {
  /**
   * Page Header section
   */
  $wp_customize->add_section('vikinger_pageheader', [
    'title'       => esc_html_x('Page Headers', '(Customizer) Page Headers Options - Title', 'vikinger'),
    'description' => esc_html_x('From here, you can customize the background image and left side icons used in the page headers of the theme.', '(Customizer) Page Headers Options - Description', 'vikinger'),
    'priority'    => 28,
    'panel'       => 'vikinger_customizer'
  ]);

  /**
   * Page Header Display
   */
  $wp_customize->add_setting('vikinger_pageheader_setting_display', [
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => 'display'
  ]);

  $wp_customize->add_control('vikinger_pageheader_setting_display', [
    'label'       => esc_html_x('Display / Hide', '(Customizer) Page Header Option - Display / Hide - Title', 'vikinger'),
    'description' => esc_html_x('You can choose to display or hide page headers.', '(Customizer) Page Header Option - Display / Hide - Description', 'vikinger'),
    'type'        => 'radio',
    'choices'     => [
      'display' => esc_html__('Display', 'vikinger'),
      'hide'    => esc_html__('Hide', 'vikinger'),
    ],
    'section'     => 'vikinger_pageheader'
  ]);

  /**
   * Page Header Background Image
   */
  $wp_customize->add_setting('vikinger_pageheader_setting_background_image', [
    'sanitize_callback' => 'absint'
  ]);

  $wp_customize->add_control(
    new WP_Customize_Media_Control(
      $wp_customize,
      'vikinger_pageheader_setting_background_image',
      [
        'label'       => esc_html_x('Page Header - Background Image', '(Customizer) Page Header Background Image - Title', 'vikinger'),
        'description' => esc_html_x('Background image used for all page headers.', '(Customizer) Page Header Background Image - Description', 'vikinger'),
        'mime_type'   => 'image',
        'section'     => 'vikinger_pageheader'
      ]
    )
  );

  $page_headers = [
    'blog' => [
      'image'       => [
        'label'       => esc_html_x('Blog Page Header - Icon', '(Customizer) Blog Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the blog page header.', '(Customizer) Blog Page Header Icon - Description', 'vikinger'),
      ],
      'title'       => [
        'label'       => esc_html_x('Blog Page Header - Title', '(Customizer) Blog Page Header Title - Title', 'vikinger'),
        'description' => esc_html_x('Title of the blog page header.', '(Customizer) Blog Page Header Title - Description', 'vikinger'),
        'default'     => esc_html_x('Blog Posts', 'Blog Page - Title', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('Blog Page Header - Description', '(Customizer) Blog Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the blog page header.', '(Customizer) Blog Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Read about news, announcements and more!', 'Blog Page - Description', 'vikinger')
      ]
    ],
    'archive' => [
      'image'       => [
        'label'       => esc_html_x('Archive Page Header - Icon', '(Customizer) Archive Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the archive page header.', '(Customizer) Archive Page Header Icon - Description', 'vikinger')
      ],
      'title'       => [
        'label'       => esc_html_x('Archive Page Header - Title', '(Customizer) Archive Page Header Title - Title', 'vikinger'),
        'description' => esc_html_x('Title of the archive page header.', '(Customizer) Archive Page Header Title - Description', 'vikinger'),
        'default'     => esc_html_x('Archive', 'Archive Page - Title', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('Archive Page Header - Description', '(Customizer) Archive Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the archive page header.', '(Customizer) Archive Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Check what was happening in the past!', 'Archive Page - Description', 'vikinger')
      ]
    ],
    'search' => [
      'image'       => [
        'label'       => esc_html_x('Search Page Header - Icon', '(Customizer) Search Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the search page header.', '(Customizer) Search Page Header Icon - Description', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('Search Page Header - Description', '(Customizer) Search Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the search page header.', '(Customizer) Search Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Browse your search results', 'Search Page - Description', 'vikinger')
      ]
    ],
    'activity' => [
      'image'       => [
        'label'       => esc_html_x('Activity Page Header - Icon', '(Customizer) Activity Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the activity page header.', '(Customizer) Activity Page Header Icon - Description', 'vikinger')
      ],
      'title'       => [
        'label'       => esc_html_x('Activity Page Header - Title', '(Customizer) Activity Page Header Title - Title', 'vikinger'),
        'description' => esc_html_x('Title of the activity page header.', '(Customizer) Activity Page Header Title - Description', 'vikinger'),
        'default'     => esc_html_x('Newsfeed', 'Activity Page - Title', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('Activity Page Header - Description', '(Customizer) Activity Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the activity page header.', '(Customizer) Activity Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Check what your friends have been up to!', 'Activity Page - Description', 'vikinger')
      ]
    ],
    'member' => [
      'image'       => [
        'label'       => esc_html_x('Member Page Header - Icon', '(Customizer) Member Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the members page header.', '(Customizer) Member Page Header Icon - Description', 'vikinger')
      ],
      'title'       => [
        'label'       => esc_html_x('Member Page Header - Title', '(Customizer) Member Page Header Title - Title', 'vikinger'),
        'description' => esc_html_x('Title of the members page header.', '(Customizer) Member Page Header Title - Description', 'vikinger'),
        'default'     => esc_html_x('Members', 'Members Page - Title', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('Member Page Header - Description', '(Customizer) Member Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the members page header.', '(Customizer) Member Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Browse all the members of the community!', 'Members Page - Description', 'vikinger')
      ]
    ],
    'group' => [
      'image'       => [
        'label'       => esc_html_x('Group Page Header - Icon', '(Customizer) Group Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the groups page header.', '(Customizer) Group Page Header Icon - Description', 'vikinger')
      ],
      'title'       => [
        'label'       => esc_html_x('Group Page Header - Title', '(Customizer) Group Page Header Title - Title', 'vikinger'),
        'description' => esc_html_x('Title of the groups page header.', '(Customizer) Group Page Header Title - Description', 'vikinger'),
        'default'     => esc_html_x('Groups', 'Groups Page - Title', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('Group Page Header - Description', '(Customizer) Group Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the groups page header.', '(Customizer) Group Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Browse all the groups of the community!', 'Groups Page - Description', 'vikinger')
      ]
    ],
    'settings' => [
      'image'       => [
        'label'       => esc_html_x('Settings Page Header - Icon', '(Customizer) Settings Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the settings page header.', '(Customizer) Settings Page Header Icon - Description', 'vikinger')
      ],
      'title'       => [
        'label'       => esc_html_x('Settings Page Header - Title', '(Customizer) Settings Page Header Title - Title', 'vikinger'),
        'description' => esc_html_x('Title of the settings page header.', '(Customizer) Settings Page Header Title - Description', 'vikinger'),
        'default'     => esc_html_x('Account Hub', 'Settings Page - Title', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('Settings Page Header - Description', '(Customizer) Settings Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the settings page header.', '(Customizer) Settings Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Profile info, notifications, friends, groups, messages and much more!', 'Settings Page - Description', 'vikinger')
      ]
    ],
    'point' => [
      'image'       => [
        'label'       => esc_html_x('Point Page Header - Icon', '(Customizer) Point Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the points page header.', '(Customizer) Point Page Header Icon - Description', 'vikinger')
      ],
      'title'       => [
        'label'       => esc_html_x('Point Page Header - Title', '(Customizer) Point Page Header Title - Title', 'vikinger'),
        'description' => esc_html_x('Title of the points page header.', '(Customizer) Point Page Header Title - Description', 'vikinger'),
        'default'     => esc_html_x('Credits', 'Credits Page - Title', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('Point Page Header - Description', '(Customizer) Point Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the points page header.', '(Customizer) Point Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Browse all the credits of the community!', 'Credits Page - Description', 'vikinger')
      ]
    ],
    'badge' => [
      'image'       => [
        'label'       => esc_html_x('Badge Page Header - Icon', '(Customizer) Badge Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the badges page header.', '(Customizer) Badge Page Header Icon - Description', 'vikinger')
      ],
      'title'       => [
        'label'       => esc_html_x('Badge Page Header - Title', '(Customizer) Badge Page Header Title - Title', 'vikinger'),
        'description' => esc_html_x('Title of the badges page header.', '(Customizer) Badge Page Header Title - Description', 'vikinger'),
        'default'     => esc_html_x('Badges', 'Badges Page - Title', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('Badge Page Header - Description', '(Customizer) Badge Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the badges page header.', '(Customizer) Badge Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Browse all the badges of the community!', 'Badges Page - Description', 'vikinger')
      ]
    ],
    'quest' => [
      'image'       => [
        'label'       => esc_html_x('Quest Page Header - Icon', '(Customizer) Quest Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the quests page header.', '(Customizer) Quest Page Header Icon - Description', 'vikinger')
      ],
      'title'       => [
        'label'       => esc_html_x('Quest Page Header - Title', '(Customizer) Quest Page Header Title - Title', 'vikinger'),
        'description' => esc_html_x('Title of the quests page header.', '(Customizer) Quest Page Header Title - Description', 'vikinger'),
        'default'     => esc_html_x('Quests', 'Quests Page - Title', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('Quest Page Header - Description', '(Customizer) Quest Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the quests page header.', '(Customizer) Quest Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Browse all the quests of the community!', 'Quests Page - Description', 'vikinger')
      ]
    ],
    'rank' => [
      'image'       => [
        'label'       => esc_html_x('Rank Page Header - Icon', '(Customizer) Rank Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the ranks page header.', '(Customizer) Rank Page Header Icon - Description', 'vikinger')
      ],
      'title'       => [
        'label'       => esc_html_x('Rank Page Header - Title', '(Customizer) Rank Page Header Title - Title', 'vikinger'),
        'description' => esc_html_x('Title of the ranks page header.', '(Customizer) Rank Page Header Title - Description', 'vikinger'),
        'default'     => esc_html_x('Ranks', 'Ranks Page - Title', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('Rank Page Header - Description', '(Customizer) Rank Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the ranks page header.', '(Customizer) Rank Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Browse all the ranks of the community!', 'Ranks Page - Description', 'vikinger')
      ]
    ],
    'forum' => [
      'image'       => [
        'label'       => esc_html_x('Forum Page Header - Icon', '(Customizer) Forum Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the forum page header.', '(Customizer) Forum Page Header Icon - Description', 'vikinger')
      ],
      'title'       => [
        'label'       => esc_html_x('Forum Page Header - Title', '(Customizer) Forum Page Header Title - Title', 'vikinger'),
        'description' => esc_html_x('Title of the forum page header.', '(Customizer) Forum Page Header Title - Description', 'vikinger'),
        'default'     => esc_html_x('Forums', 'Forum Page - Title', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('Forum Page Header - Description', '(Customizer) Forum Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the forum page header.', '(Customizer) Forum Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Talk about anything you want!', 'Forum Page - Description', 'vikinger')
      ]
    ],
    'woocommerce' => [
      'image'       => [
        'label'       => esc_html_x('WooCommerce Page Header - Icon', '(Customizer) WooCommerce Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the woocommerce page headers.', '(Customizer) WooCommerce Page Header Icon - Description', 'vikinger')
      ],
      'title'       => [
        'label'       => esc_html_x('WooCommerce Page Header - Title', '(Customizer) WooCommerce Page Header Title - Title', 'vikinger'),
        'description' => esc_html_x('Title of the woocommerce page headers.', '(Customizer) WooCommerce Page Header Title - Description', 'vikinger'),
        'default'     => esc_html_x('Vikinger Shop', 'WooCommerce Page - Title', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('WooCommerce Page Header - Description', '(Customizer) WooCommerce Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the woocommerce page headers.', '(Customizer) WooCommerce Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Merchandise, clothing, coffee mugs and more!', 'WooCommerce Page - Description', 'vikinger')
      ]
    ],
    'pmpro' => [
      'image'       => [
        'label'       => esc_html_x('Paid Memberships Pro Page Header - Icon', '(Customizer) PMPro Page Header Icon - Title', 'vikinger'),
        'description' => esc_html_x('Left side icon of the paid memberships pro page headers.', '(Customizer) PMPro Page Header Icon - Description', 'vikinger'),
      ],
      'title'       => [
        'label'       => esc_html_x('Paid Memberships Pro Page Header - Title', '(Customizer) PMPro Page Header Title - Title', 'vikinger'),
        'description' => esc_html_x('Title of the paid memberships pro page headers.', '(Customizer) PMPro Page Header Title - Description', 'vikinger'),
        'default'     => esc_html_x('Memberships', 'Paid Memberships Pro Page - Title', 'vikinger')
      ],
      'description' => [
        'label'       => esc_html_x('Paid Memberships Pro Page Header - Description', '(Customizer) PMPro Page Header Description - Title', 'vikinger'),
        'description' => esc_html_x('Description of the paid memberships pro page headers.', '(Customizer) PMPro Page Header Description - Description', 'vikinger'),
        'default'     => esc_html_x('Check out our membership options and perks!', 'PMPro Page - Description', 'vikinger')
      ]
    ]
  ];

  foreach ($page_headers as $page_header_id => $page_header_data) {
    foreach ($page_header_data as $setting_type => $setting_data) {
      if ($setting_type == 'image') {
        $setting_name = 'vikinger_pageheader_' . $page_header_id . '_setting_image';
        /**
         * Page Header - Image
         */
        $wp_customize->add_setting($setting_name, [
          'sanitize_callback' => 'absint'
        ]);

        $wp_customize->add_control(
          new WP_Customize_Media_Control(
            $wp_customize,
            $setting_name,
            [
              'label'       => $setting_data['label'],
              'description' => $setting_data['description'],
              'mime_type'   => 'image',
              'section'     => 'vikinger_pageheader'
            ]
          )
        );
      } else if ($setting_type == 'title') {
        $setting_name = 'vikinger_pageheader_' . $page_header_id . '_setting_title';
        /**
         * Page Header - Title
         */
        $wp_customize->add_setting($setting_name, [
          'sanitize_callback' => 'sanitize_text_field',
          'default'           => $setting_data['default']
        ]);

        $wp_customize->add_control($setting_name, [
          'label'       => $setting_data['label'],
          'description' => $setting_data['description'],
          'type'        => 'text',
          'section'     => 'vikinger_pageheader'
        ]);
      } else if ($setting_type == 'description') {
        $setting_name = 'vikinger_pageheader_' . $page_header_id . '_setting_description';
        /**
         * Page Header - Description
         */
        $wp_customize->add_setting($setting_name, [
          'sanitize_callback' => 'sanitize_text_field',
          'default'           => $setting_data['default']
        ]);
      
        $wp_customize->add_control($setting_name, [
          'label'       => $setting_data['label'],
          'description' => $setting_data['description'],
          'type'        => 'textarea',
          'section'     => 'vikinger_pageheader'
        ]);
      }
    }
  }
}

add_action('customize_register', 'vikinger_customizer_pageheader');