<?php

namespace AryWPYoastToAPI;

class AryWPYoastToAPI {

  public function __construct(){
    add_action('rest_api_init', array($this, 'setup_yoast_data' ));
  }

  function setup_yoast_data(){
    $postTypes = ['post', 'page'];
    $customPostTypes = get_post_types([
			'public'   => true,
			'_builtin' => false
    ]);

    $postKeys = array_merge($postTypes, $customPostTypes);

    foreach($postKeys as $_key){
      register_rest_field($_key, 'seo_meta', [
        'get_callback'  => array($this, 'encode_yoast'),
        'schema'        => null
      ]);
    }

  }

  function encode_yoast($p, $field, $request){
    $title = '';
    $description = '';

    if(function_exists('YoastSEO')){
      $title          = YoastSEO()->meta->for_post($p['id'])->title;
      $description    = YoastSEO()->meta->for_post($p['id'])->description;
    }

    return [
      'title'         => $title,
      'description'   => $description
    ];
  }

}