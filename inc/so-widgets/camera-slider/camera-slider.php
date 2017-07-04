<?php
/**
 * Camera Slider widget.
 *
 * @package washington
 */

class Washington_CameraSlider_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'washington-camera-slider-widget',
			__( 'Washington: Camera Slider', 'washington' ),
			array(
				'description' => __( 'Camera Slider Widget', 'washington' ),
			),
			array(),

			array(
				'CameraSlider' => array(
					'type'       => 'repeater',
					'label'      => __( 'Camera Slider', 'washington' ),
					'item_name'  => __( 'Item', 'washington' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-washington-camera-slider-']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
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
						'text_position' => array(
							'type' => 'select',
							'label' => __( 'Position', 'washington' ),
							'description' => __('Float Position (like whole content will be show center or left or right)','washington'),
							'default' => 'auto auto auto 0',
							'options' => array(
								'auto auto auto 0' => __( 'Left', 'washington' ),
								'0 auto' => __( 'Center', 'washington' ),
								'auto 0 auto auto' => __( 'Right', 'washington' ),
							)
						),
						'CameraSlider_title' => array(
							'type'  => 'text',
							'label' => __( 'Title', 'washington' ),
						),
						'CameraSlider_title_color' => array(
							'type' => 'color',
							'label' => __( 'Title Color', 'washington' ),
							'default' => '#000'
						),
						'CameraSlider_subtitle' => array(
							'type'  => 'text',
							'label' => __( 'Sub Title', 'washington' ),
						),
						'CameraSlider_subtitle_color' => array(
							'type' => 'color',
							'label' => __( 'Sub Title Color', 'washington' ),
							'default' => '#000'
						),
						'CameraSlider_image' => array(
							'type'     => 'media',
							'library'  => 'image',
							'label'    => __( 'Slide Image', 'washington' ),
							'fallback' => true,
						),
						'CameraSlider_texteditor' => array(
							'type' => 'tinymce',
							'default' => '',
							'rows' => 7,
							'default_editor' => 'html',
							'button_filters' => array(
								'mce_buttons' => array( $this, 'filter_mce_buttons' ),
								'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
								'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
								'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
								'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
							),
						),
						'CameraSlider_button_text' => array(
							'type' => 'text',
							'label' => __('Button Title', 'washington'),
							'default' => ''
						),
						'CameraSlider_button_style' => array(
							'type' => 'select',
							'label' => __( 'Button Style', 'washington' ),
							'default' => 'btn-default',
							'options' => array(
								'btn-default' => __( 'Default', 'washington' ),
								'btn-primary' => __( 'Primary', 'washington' ),
								'btn-success' => __( 'Success', 'washington' ),
							)
						),
						'CameraSlider_button_url' => array(
							'type' => 'link',
							'label' => __('Button URL', 'washington'),
							'default' => ''
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

siteorigin_widget_register( 'washington-camera-slider-widget', __FILE__, 'Washington_CameraSlider_Widget' );
