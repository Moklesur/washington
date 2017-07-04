<?php
/**
 * Portfolio widget.
 *
 * @package washington
 */

class Washington_Portfolio_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'washington-portfolio-widget',
			__( 'Washington Portfolio', 'washington' ),
			array(
				'description' => __( 'Displays Portfolio Widget', 'washington' ),
			),
			array(),
			array(
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Title', 'washington' ),
				),
				'heading_alignment' => array(
					'type' => 'select',
					'label' => __( 'Text Alignment', 'washington' ),
					'default' => 'text-left',
					'options' => array(
						'text-left' => __( 'Text Left', 'washington' ),
						'text-center' => __( 'Text Center', 'washington' ),
						'text-right' => __( 'Text Right', 'washington' ),
					)
				),
				'portfolio' => array(
					'type'       => 'repeater',
					'label'      => __( 'Portfolio', 'washington' ),
					'item_name'  => __( 'Item', 'washington' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-washington-portfolio-']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'profile_picture' => array(
							'type'     => 'media',
							'library'  => 'image',
							'label'    => __( 'Image', 'washington' ),
							'fallback' => true,
						),
						'button_url' => array(
							'type' => 'link',
							'label' => __('Button URL', 'washington'),
							'default' => ''
						),
					),
				),
				'per_row' => array(
					'type'    => 'select',
					'label'   => __( 'per row', 'washington' ),
					'default' => 4,
					'options' => array(
						'12' => 1,
						'6' => 2,
						'4' => 3,
						'3' => 4,
					),
				),
			)
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'washington-portfolio-widget', __FILE__, 'Washington_Portfolio_Widget' );
