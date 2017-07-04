<?php
/**
 * Testimonial widget.
 *
 * @package washington
 */

class Washington_Testimonial_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'washington-testimonial-widget',
			__( 'Washington Testimonial', 'washington' ),
			array(
				'description' => __( 'Testimonial Widget', 'washington' ),
			),
			array(),
			array(
				'alignment' => array(
					'type' => 'select',
					'label' => __( 'Text Alignment', 'washington' ),
					'default' => 'text-center',
					'options' => array(
						'text-left' => __( 'Text Left', 'washington' ),
						'text-center' => __( 'Text Center', 'washington' ),
						'text-right' => __( 'Text Right', 'washington' ),
					)
				),
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Title', 'washington' ),
				),

				'testimonial' => array(
					'type'       => 'repeater',
					'label'      => __( 'Testimonial', 'washington' ),
					'item_name'  => __( 'Item', 'washington' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-washington-testimonial-']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'name' => array(
							'type'  => 'text',
							'label' => __( 'Name', 'washington' ),
						),
						'texteditor' => array(
							'type' => 'tinymce',
							'label' => __( 'Description', 'washington' ),
							'default' => '',
							'rows' => 5,
							'default_editor' => 'html',
							'button_filters' => array(
								'mce_buttons' => array( $this, 'filter_mce_buttons' ),
								'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
								'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
								'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
								'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
							),
						),
						'profile_picture' => array(
							'type'     => 'media',
							'library'  => 'image',
							'label'    => __( 'Image', 'washington' ),
							'fallback' => true,
						),
					),
				),
			)
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'washington-testimonial-widget', __FILE__, 'Washington_Testimonial_Widget' );
