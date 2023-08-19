<?php

  /** Option page */
  $prefix = 'stnc_wp_floor_option';
  
  CSF::createOptions( $prefix, array(
    'framework_title' => esc_html__('Options', 'the-stnc-map'),
    'menu_slug'   => 'stnc_building_setting',
    'menu_type'   => 'submenu',
    'theme' => 'dark',
    'show_bar_menu' => false,
    'show_reset_all' => false,
    'show_reset_section' => false,
    'show_in_network' => false,
  ) );

    CSF::createSection($prefix, array(
        'title' => 'Shortcode',
        'fields' => array(
            array(
                'id' => 'is_mail_send',
                'type' => 'switcher',
                'title' => esc_html__('Is mailing enabled for events?', 'the-stnc-map'),
                'default' => true,
            ),

            array(
              'id' => 'mail_subject',
              'type' => 'text',
              'title' => esc_html__('Mail Subject', 'the-stnc-map'),
              'default' => "Erciyes Teknopark Kat Planlari Degisiklik Bildirimi",
          ),


            array(
              'id'        => 'email_adress',
              'type'      => 'repeater',
              'title'     => esc_html__('Email Addresses', 'the-stnc-map'),
              'subtitle' =>  esc_html__('You can increase email addresses by pressing the plus sign.', 'the-stnc-map'),
              'fields'    => array(
            
                array(
                  'id'    => 'mailadress',
                  'type'  => 'text',
                  'title' => 'Email',
                  'validate' => 'csf_validate_email',
                ),
              ),
              'default'   => array(
                array(
                  'mailadress' => 'serhat@erciyesteknopark.com',
     
                ),
            
              )
            ),
        )
    ));
