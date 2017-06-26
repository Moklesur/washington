<?php
/**
 * Address widget.
 *
 * @package Washington
 */

class Washington_Address_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'washington-address',
			__( 'Washington: Address', 'washington' ),
			array(
				'description' => __( 'Displays Contact Address Details', 'washington' ),
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
					'type'  => 'text',
					'label' => __( 'Sub Title', 'washington' ),
				),
				'address_repeater' => array(
					'type'      => 'repeater',
					'label'     => __( 'Enter Contact Details.', 'washington' ),
					'item_name' => __( 'Details', 'washington' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-washington-address-contact']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'icon' => array(
							'type'  => 'icon',
							'label' => __( 'Select Icon', 'washington' ),
						),
						'icon_size' => array(
							'type'  => 'number',
							'label' => __( 'Icon Font Size', 'washington' ),
							'default' => '18'
						),
						'icon_color' => array(
							'type'  => 'color',
							'label' => __( 'Icon Color', 'washington' ),
							'default' => '#000'
						),
						'contact' => array(
							'type'  => 'text',
							'label' => __( 'Enter Title like Phone Number / Address / E-Mail', 'washington' ),
						),
						'contact_detail' => array(
							'type'  => 'text',
							'label' => __( 'Enter Details for Above Fields', 'washington' ),
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

siteorigin_widget_register( 'washington-address', __FILE__, 'Washington_Address_Widget' );
