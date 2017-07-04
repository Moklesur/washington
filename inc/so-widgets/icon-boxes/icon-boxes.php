<?php
/**
 * Icon Boxes Widget.
 *
 * @package Washington
 */

class Washington_icon_boxes_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'washington-icon-boxes-widget',
			__( 'Washington Icon Boxes', 'washington' ),
			array(
				'description' => __( 'Washington Icon Boxes Widget', 'washington' ),
			),
			array(),
			array(
				'alignment' => array(
					'type' => 'select',
					'label' => __( 'Text Alignment', 'washington' ),
					'default' => 'text-left',
					'options' => array(
						'text-left' => __( 'Text Left', 'washington' ),
						'text-center' => __( 'Text Center', 'washington' ),
						'text-right' => __( 'Text Right', 'washington' ),
					)
				),
				'icon_boxes' => array(
					'type'       => 'repeater',
					'label'      => __( 'Icon Boxes', 'washington' ),
					'item_name'  => __( 'Icons', 'washington' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-washington-icon-Boxes']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'icon' => array(
							'type' => 'icon',
							'label' => __('Select an icon', 'washington'),
						),
						'icon_color' => array(
							'type' => 'color',
							'label' => __( 'Icon Color', 'washington' ),
							'default' => '#fff'
						),
						'title' => array(
							'type'  => 'text',
							'label' => __( 'Heading', 'washington' ),
						),
						'texteditor' => array(
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
						'button_text' => array(
							'type' => 'text',
							'label' => __('Button Title', 'washington'),
							'default' => ''
						),
						'button_style' => array(
							'type' => 'select',
							'label' => __( 'Button Style', 'washington' ),
							'default' => 'btn-primary',
							'options' => array(
								'btn-default' => __( 'Default', 'washington' ),
								'btn-primary' => __( 'Primary', 'washington' ),
								'btn-success' => __( 'Success', 'washington' ),
							)
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
					'label'   => __( 'Teams Per Row', 'washington' ),
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

siteorigin_widget_register( 'washington-icon-boxes-widget', __FILE__, 'Washington_icon_boxes_Widget' );