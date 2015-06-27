<?php

// http://support.advancedcustomfields.com/forums/topic/options-page-doesnt-work-after-update/
if (function_exists('acf_add_options_sub_page')) {
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page(); // necessary for v.5 :-/
    }
    acf_add_options_sub_page( 'Global Options' );
    //acf_add_options_sub_page( 'Wordpress Options' );
    //acf_add_options_sub_page( 'Settings' );
}

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_global-options',
        'title' => 'Global Options',
        'fields' => array (
            array (
                'key' => 'field_558e96a3c4c61',
                'label' => 'Company Logo',
                'name' => 'global_company_logo',
                'type' => 'image',
                'instructions' => 'Add your company logo.',
                'save_format' => 'object',
                'preview_size' => 'thumbnail',
                'library' => 'all',
            ),
            array (
                'key' => 'field_558ea80332a1d',
                'label' => 'Hide Blog Title',
                'name' => 'global_hide_blog_title',
                'type' => 'true_false',
                'instructions' => 'Hide the default website title. Use this if your logo includes the name of this website.',
                'message' => 'Hide blog title.',
                'default_value' => 0,
            ),
            array (
                'key' => 'field_558f00eac294f',
                'label' => 'Hide Blog Description',
                'name' => 'global_hide_blog_description',
                'type' => 'true_false',
                'instructions' => 'Hide the	website description. This usually displays as the strap line under the title.',
                'message' => '',
                'default_value' => 0,
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-global-options',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'default',
            'hide_on_screen' => array (
            ),
        ),
        'menu_order' => 0,
    ));
}
