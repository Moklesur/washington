<?php
/**
 * Fact widget.
 *
 * @package washington
 */

class Washington_Fact_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'washington-fact-widget',
			__( 'Washington Fact', 'washington' ),
			array(
				'description' => __( 'Show your visitors some facts about your company.', 'washington' ),
			),
			array(),

			array(
				'title' => array(
					'type'  => 'text',
					'label' => __( 'Title', 'washington' ),
				),
				'description' => array(
					'type'  => 'text',
					'label' => __( 'Sort Description', 'washington' ),
					'default' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'washington')
				),
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

				'fact' => array(
					'type'       => 'repeater',
					'label'      => __( 'Fact', 'washington' ),
					'item_name'  => __( 'Item', 'washington' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-washington-fact-']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'icon' => array(
							'type' => 'icon',
							'label' => __('Select an icon', 'washington'),
						),
						'icon_size' => array(
							'type' => 'number',
							'label' => __( 'Icon Size', 'washington' ),
							'default' => '35'
						),
						'icon_color' => array(
							'type' => 'color',
							'label' => __( 'Icon Color', 'washington' ),
							'default' => '#8e43e7'
						),
						'title' => array(
							'type'  => 'text',
							'label' => __( 'Title', 'washington' ),
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
					),
				),
			)

		);
	}

	function get_template_name( $instance ) {
		return 'default';
	}
}

siteorigin_widget_register( 'washington-fact-widget', __FILE__, 'Washington_Fact_Widget' );
