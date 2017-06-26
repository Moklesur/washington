<?php
/**
 * Call To Action widget.
 *
 * @package Washington
 */

class Washington_Title_Subtitle_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'washington-title-subtitle',
			__( 'Washington: Title', 'washington' ),
			array(
				'description' => __( 'A simple title and subtitle widget.', 'washington' ),
			),
			array(),
			array(
				'alignment' => array(
					'type' => 'select',
					'label' => __( 'Text Alignment', 'washington' ),
					'default' => 'text-left',
					'options' => array(
						'text-left' => __( 'Left', 'washington' ),
						'text-center' => __( 'Center', 'washington' ),
						'text-right' => __( 'Right', 'washington' ),
					)
				),
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Title', 'washington' ),
				),
				'secondary_title' => array(
					'type'  => 'text',
					'label' => __( 'Secondary Title', 'washington' ),
				),
				'title_content' => array(
					'type'  => 'textarea',
					'label' => __( 'Sub Title', 'washington' ),
				),
			)
		);

	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'washington-title-subtitle', __FILE__, 'Washington_Title_Subtitle_Widget' );
