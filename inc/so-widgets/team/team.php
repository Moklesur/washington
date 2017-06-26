<?php
/**
 * Team widget.
 *
 * @package Washington
 */

class Washington_Team_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'washington-team',
			__( 'Washington: Team', 'washington' ),
			array(
				'description' => __( 'Displays Team Member', 'washington' ),
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
				'sub_title' => array(
					'type' => 'text',
					'label' => __( 'Sub Title', 'washington' ),
				),
				'members' => array(
					'type'       => 'repeater',
					'label'      => __( 'Members', 'washington' ),
					'item_name'  => __( 'Member', 'washington' ),
					'item_label' => array(
						'selector'     => "[id*='prefix-washington-members-team']",
						'update_event' => 'change',
						'value_method' => 'val',
					),
					'fields' => array(
						'full_name' => array(
							'type'  => 'text',
							'label' => __( 'Full Name', 'washington' ),
						),
						'bio' => array(
							'type'  => 'textarea',
							'label' => __( 'Bio', 'washington' ),
						),
						'position' => array(
							'type'  => 'text',
							'label' => __( 'Position', 'washington' ),
						),
						'profile_picture' => array(
							'type'     => 'media',
							'library'  => 'image',
							'label'    => __( 'Image', 'washington' ),
							'fallback' => true,
						),
						'fb' => array(
							'type'  => 'link',
							'label' => __( 'Facebook URL', 'washington' ),
						),
						'tw' => array(
							'type'  => 'link',
							'label' => __( 'Twitter URL', 'washington' ),
						),
						'li' => array(
							'type'  => 'link',
							'label' => __( 'Linkedin URL', 'washington' ),
						),
						'ins' => array(
							'type'  => 'link',
							'label' => __( 'Instagram URL', 'washington' ),
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

siteorigin_widget_register( 'washington-team', __FILE__, 'Washington_Team_Widget' );
