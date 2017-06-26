<?php
/**
 * Call To Action widget.
 *
 * @package washington
 */

class Washington_Cta_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'washington-cta',
			__( 'washington: Call To Action', 'washington' ),
			array(
				'description' => __( 'Simple Call to action widget', 'washington' ),
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
					'type' => 'text',
					'label' => __( 'Title', 'washington' ),
				),
				'sub_title' => array(
					'type' => 'text',
					'label' => __( 'Subtitle', 'washington' ),
				),
				'button' => array(
					'type' => 'widget',
					'class' => 'SiteOrigin_Widget_Button_Widget',
					'label' => __( 'Button', 'washington' ),
				),
			),
			plugin_dir_path( __FILE__ )
		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}

	function modify_child_widget_form( $child_widget_form, $child_widget ) {
		// Remove alignment option in Button.
		unset( $child_widget_form['design']['fields']['align'] );
		return $child_widget_form;
	}

	/**
	 * Initialize the CTA widget
	 */
	function initialize() {
		// This widget requires the button widget.
		if ( ! class_exists( 'SiteOrigin_Widget_Button_Widget' ) ) {
			SiteOrigin_Widgets_Bundle::single()->include_widget( 'button' );
		}
	}
}

siteorigin_widget_register( 'washington-cta', __FILE__, 'Washington_Cta_Widget' );
