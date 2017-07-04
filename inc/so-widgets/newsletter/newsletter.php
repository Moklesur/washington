<?php
/**
 * Newsletter widget.
 *
 * @package washington
 */

class Washington_newsletter_Widget extends SiteOrigin_Widget {

    function __construct() {

        parent::__construct(
            'washington-newsletter-widget',
            __( 'Washington Newsletter', 'washington' ),
            array(
                'description' => __( 'Newsletter Widget', 'washington' ),
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
                    'label' => __( 'Heading', 'washington' ),
                    'default' => 'Follow Us'
                ),
                'text' => array(
                    'type'  => 'textarea',
                    'label' => __( 'Paragraph', 'washington' ),
                    'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                ),
                'action_url' => array(
                    'type'  => 'textarea',
                    'label' => __( 'Action URL', 'washington' ),
                    'default' => '',
                    'description' => __( 'Newsletter for Mailchimp https://mailchimp.com/', 'washington' ),
                ),
            )

        );
    }

    function get_template_name( $instance ) {
        return 'default';
    }
}

siteorigin_widget_register( 'washington-newsletter-widget', __FILE__, 'Washington_newsletter_Widget' );
