<?php

class Orbis_Lists_Plugin extends Orbis_Plugin {
	public function __construct( $file ) {
		parent::__construct( $file );

		$this->set_name( 'orbis_lists' );
		$this->set_db_version( '1.0.0' );

		add_action( 'init', array( $this, 'init' ) );
		add_action( 'p2p_init', array( $this, 'p2p_init' ) );
	}

	public function loaded() {
		$this->load_textdomain( 'orbis_lists', '/languages/' );
	}

	public function init() {
		register_post_type( 'orbis_list', array(
			'label'       => __( 'Lists', 'orbis_lists' ),
			'labels'      => array(
				'name'                  => __( 'Lists', 'orbis_lists' ),
				'singular_name'         => __( 'List', 'orbis_lists' ),
				'add_new'               => __( 'Add New', 'orbis_lists' ),
				'add_new_item'          => __( 'Add New List', 'orbis_lists' ),
				'edit_item'             => __( 'Edit List', 'orbis_lists' ),
				'new_item'              => __( 'New List', 'orbis_lists' ),
				'all_items'             => __( 'All Lists', 'orbis_lists' ),
				'view_item'             => __( 'View List', 'orbis_lists' ),
				'search_items'          => __( 'Search Lists', 'orbis_lists' ),
				'not_found'             => __( 'No lists found.', 'orbis_lists' ),
				'not_found_in_trash'    => __( 'No lists found in Trash.', 'orbis_lists' ),
				'menu_name'             => __( 'Lists', 'orbis_lists' ),
				'filter_items_list'     => __( 'Filter lists list', 'orbis_lists' ),
				'items_list_navigation' => __( 'Lists list navigation', 'orbis_lists' ),
				'items_list'            => __( 'Lists list', 'orbis_lists' ),
			),
			'public'      => true,
			'menu_icon'   => 'dashicons-clipboard',
			'supports'    => array(
				'title',
				'editor',
				'author',
				'thumbnail',
				'custom-fields',
				'comments',
				'revisions',
			),
			'has_archive' => true,
			'rewrite'     => array(
				'slug' => _x( 'lists', 'slug', 'orbis_lists' ),
			),
		) );
	}

	public function p2p_init() {
		p2p_register_connection_type( array(
			'name'         => 'orbis_persons_to_lists',
			'from'         => 'orbis_person',
			'to'           => 'orbis_list',
			'title'        => array(
				'from' => __( 'Persons', 'orbis_lists' ),
				'to'   => __( 'Lists', 'orbis_lists' )
			),
			'from_labels'  => array(
				'singular_name' => __( 'Person', 'orbis_lists' ),
				'search_items'  => __( 'Search person', 'orbis_lists' ),
				'not_found'     => __( 'No persons found.', 'orbis_lists' ),
				'create'        => __( 'Add Person', 'orbis_lists' ),
			),
			'to_labels'    => array(
				'singular_name' => __( 'List', 'orbis_lists' ),
				'search_items'  => __( 'Search lists', 'orbis_lists' ),
				'not_found'     => __( 'No lists found.', 'orbis_lists' ),
				'create'        => __( 'Add to List', 'orbis_lists' ),
			),
			'admin_column' => 'any',
			'admin_box'    => array(
    			'show'    => 'any',
    			'context' => 'advanced'
    		),
			'fields'       => array(
				'active' => array(
					'title'  => __( 'Active', 'orbis_lists' ),
					'type'   => 'select',
					'values' => array(
						'yes'   => __( 'Yes', 'orbis_lists' ),
						'no'    => __( 'No', 'orbis_lists' ),
						'maybe' => __( 'Maybe', 'orbis_lists' ),
					),
				),
				'note'   => array(
					'title'  => __( 'Note', 'orbis_lists' ),
					'type'   => 'text',
				),
			),
		) );
	}
}
