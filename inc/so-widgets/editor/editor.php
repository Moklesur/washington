<?php
/**
 * Editor Widget.
 *
 * @package Washington
 */

class Washington_Editor_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'washington-editor-widget',
			__( 'Washington Editor', 'washington' ),
			array(
				'description' => __( 'Washington Editor Widget', 'washington' ),
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
				'icon' => array(
					'type' => 'icon',
					'label' => __('Select an icon', 'washington'),
				),
				'icon_size' => array(
					'type' => 'number',
					'label' => __( 'Icon Size', 'washington' ),
					'default' => '24'
				),
				'icon_color' => array(
					'type' => 'color',
					'label' => __( 'Icon Color', 'washington' ),
					'default' => '#000'
				),
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Heading', 'washington' ),
				),
				'sub_title' => array(
					'type' => 'text',
					'label' => __( 'Sub Heading', 'washington' ),
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
					'default' => 'btn-default',
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
			)

		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'washington-editor-widget', __FILE__, 'Washington_Editor_Widget' );
