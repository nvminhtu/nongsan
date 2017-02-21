<?php 
/**
 * Registers a custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function prefix_register_post_type()
{
	register_post_type(
		'san-pham',
		array(
			'labels'        => array(
				'name'               => __('Sản phẩm', 'text_domain'),
				'singular_name'      => __('Sản phẩm', 'text_domain'),
				'menu_name'          => __('Sản phẩm', 'text_domain'),
				'name_admin_bar'     => __('Sản phẩm', 'text_domain'),
				'all_items'          => __('Tất cả', 'text_domain'),
				'add_new'            => _x('Thêm mới', 'san-pham', 'text_domain'),
				'add_new_item'       => __('Thêm Mới Sản phẩm', 'text_domain'),
				'edit_item'          => __('Chỉnh sửa Sản phẩm', 'text_domain'),
				'new_item'           => __('Mới Sản phẩm', 'text_domain'),
				'view_item'          => __('View Sản phẩm', 'text_domain'),
				'search_items'       => __('Search Sản phẩm', 'text_domain'),
				'not_found'          => __('No Sản phẩm found.', 'text_domain'),
				'not_found_in_trash' => __('No Sản phẩm found in Trash.', 'text_domain'),
				'parent_item_colon'  => __('Parent Items:', 'text_domain'),
			),
			'public'        => true,
			'menu_position' => 5,
			'supports'      => array(
				'title',
				'editor',
				'thumbnail',
				'excerpt',
				'custom-fields',
			),
			'taxonomies'    => array(
				'danh-muc',
				'post_tag'
			),
			'has_archive'   => true,
			'rewrite'       => array(
				'slug' => 'san-pham',
			),
		)
	);
}

add_action('init', 'prefix_register_post_type');

/**
 * Registers a custom taxonomy.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function prefix_register_taxonomy()
{
	register_taxonomy(
		'danh-muc',
		array(
			'san-pham',
		),
		array(
			'labels'            => array(
				'name'              => _x('Danh mục', 'san-pham', 'text_domain'),
				'singular_name'     => _x('Danh mục', 'san-pham', 'text_domain'),
				'menu_name'         => __('Danh mục', 'text_domain'),
				'all_items'         => __('All Danh mục', 'text_domain'),
				'edit_item'         => __('Chỉnh sửa Danh mục', 'text_domain'),
				'view_item'         => __('View Danh mục', 'text_domain'),
				'update_item'       => __('Cập nhật Danh mục', 'text_domain'),
				'add_new_item'      => __('Thêm mới Danh mục', 'text_domain'),
				'new_item_name'     => __('Mới Danh mục Name', 'text_domain'),
				'parent_item'       => __('Parent Danh mục', 'text_domain'),
				'parent_item_colon' => __('Parent Danh mục:', 'text_domain'),
				'search_items'      => __('Search Danh mục', 'text_domain'),
			),
			'show_admin_column' => true,
			'hierarchical'      => true,
			'query_var' => true,
			'rewrite'           => array(
				'slug' => 'san-pham/danh-muc',
			),
		)
	);
}

add_action('init', 'prefix_register_taxonomy', 0);


function prefix_flush_rewrite_rules()
{
	flush_rewrite_rules();
}

add_action('after_switch_theme', 'prefix_flush_rewrite_rules');


function add_my_post_types_to_query( $query ) {
	if ( is_home() && $query->is_main_query() )
		$query->set( 'post_type', array( 'post', 'san-pham' ) );
	return $query;
}
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );