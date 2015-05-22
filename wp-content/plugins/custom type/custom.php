<?php

class CustomType
{

    public function __construct() {
        add_action('init', function () {
            $this->create_custom_properties();
            $this->create_custom_taxonomies();
            add_action('add_meta_boxes', array($this, 'create_custom_fields'));
            add_action('save_post', array($this, 'custom_fields_update'));
        });
    }

    public function create_custom_properties()
    {
        register_post_type('properties',
            array(
                'labels' => array('name' => 'Properties',
                    'singular_name' => 'Property',
                    'add_new' => 'Add new Property',
                    'not_found' => 'Property not found',

                ),
                'public' => true,
                'menu_position' => 4,
                'menu_icon' => 'dashicons-admin-home',

                'supports' => array('title', 'editor', 'page-attributes'),
                'hierarchical' => true,
                'taxonomies' => array('')
            )
        );
    }

    public function create_custom_taxonomies()
    {
        register_taxonomy('prop_categories', 'properties', array(
                'labels' => array('name' => 'PropCategories',
                    'singular_name' => 'PropCategory',
                    'add_new_item' => 'Add new PropCategory',
                ),

                'public' => true,
                'hierarchical' => true,
            )
        );
    }

    public function create_custom_fields()
    {
        add_meta_box('custom_fields', 'Custom Fields', array('Template','custom_fields_html'), 'properties', 'normal', 'high');
    }

    public  function custom_fields_update($post_id)
    {
//        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return false; // если это автосохранение
//        if (!current_user_can('edit_post', $post_id)) return false; // если юзер не имеет право редактировать запись

        if (!isset($_POST['extra'])) return false;
        if ( ! wp_verify_nonce( $_POST['custom_fields_nonce'], plugin_basename(__FILE__)))return false; // проверка

        $_POST['extra'] = array_map('trim', $_POST['extra']);
        foreach ($_POST['extra'] as $key => $value) {
            if (empty($value)) {
                delete_post_meta($post_id, $key);
                continue;
            }

            update_post_meta($post_id, $key, $value);

        }
        $my = $_FILES;
        $my;
        media_handle_upload('my_image_upload', $post_id);
        return $post_id;
    }
}

new CustomType();