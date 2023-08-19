<?php

  /** Option page */
  $prefix = 'stnc_wp_floor_option';
  
  CSF::createOptions( $prefix, array(
    'framework_title' => __('Options', 'the-stnc-map'),
    'menu_slug'   => 'stnc_building_setting',
    'menu_type'   => 'submenu',
    'theme' => 'dark',
    'show_bar_menu' => false,
    // 'show_reset_all' => false,
    // 'show_reset_section' => false,
    'show_in_network' => false,
  ) );

    CSF::createSection($prefix, array(
        'title' => 'Shortcode',
        'fields' => array(
            array(
                'id' => 'is_mail_send',
                'type' => 'switcher',
                'title' => __('Is mailing enabled for events?', 'the-stnc-map'),
                'default' => true,
           
            ),

       
//repeteatr
            array(
              'id'        => 'email_adress',
              'type'      => 'repeater',
              'title'     => __('Email Addresses', 'the-stnc-map'),
              'subtitle' =>  __('You can increase email addresses by pressing the plus sign.', 'the-stnc-map'),
              'fields'    => array(
            
                array(
                  'id'    => 'mail-1',
                  'type'  => 'text',
                  'title' => 'Text',
                ),
            
                array(
                  'id'    => 'mail-2',
                  'type'  => 'text',
                  'title' => 'Text',
                ),

                array(
                  'id'    => 'mail-3',
                  'type'  => 'text',
                  'title' => 'Text',
                ),

                array(
                  'id'    => 'mail-4',
                  'type'  => 'text',
                  'title' => 'Text',
                ),
            
              ),
              'default'   => array(
                array(
                  'mail-1' => 'Text 1 default value',
                  'mail-2' => 'Text 2 default value',
                  'mail-3' => 'Text 3 default value',
                  'mail-4' => 'Text 4 default value',
              
                ),
              
              )
            ),


        )
    ));
