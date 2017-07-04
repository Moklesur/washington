<?php
/**
 * Washington Theme Customizer
 *
 * @package Washington
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function washington_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'colors' )->priority = '60';
	$wp_customize->get_section( 'title_tagline' )->title = __('Header', 'washington');

	/*--------------------------------------------------------------
	# Divider
	--------------------------------------------------------------*/
	class washington_divider extends WP_Customize_Control {
		public $type = 'divider';
		public $label = '';
		public function render_content() { ?>
			<h3 style="margin-top:15px; margin-bottom:10px;background:#1bbc9b;padding:9px 5px;color:#fff;text-transform:uppercase; text-align: center;letter-spacing: 2px;"><?php echo esc_html( $this->label ); ?></h3>
			<?php
		}
	}

	/*--------------------------------------------------------------
	# General
	--------------------------------------------------------------*/
	$wp_customize->add_section(
		'washington_general',
		array(
			'title'         => __('General', 'washington'),
			'priority'      => 8,
		)
	);
	## Layout ##
	$wp_customize->add_setting(
		'layout',
		array(
			'default' => __('1170','washington'),
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'layout',
		array(
			'label'         => __( 'Layout Setting', 'washington' ),
			'section'       => 'washington_general',
			'type'          => 'number',
			'description'   => __('Site Width (container 1170)', 'washington'),
			'priority'      => 10,
			'input_attrs' => array(
				'min'   => 300,
				'max'   => 1920,
				'step'  => 1,
			),
		)
	);
	## Margin - Top  ##
	$wp_customize->add_setting(
		'margin_top',
		array(
			'default' => __('60','washington'),
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'margin_top',
		array(
			'label'         => __( 'Top Margin', 'washington' ),
			'section'       => 'washington_general',
			'type'          => 'number',
			'description'   => __('Top Margin for the page wrapper (the space between the header) ', 'washington'),
			'priority'      => 10,
			'input_attrs' => array(
				'min'   => 0,
				'max'   => 200,
				'step'  => 1,
			),
		)
	);
	## Margin - Bottom  ##
	$wp_customize->add_setting(
		'margin_bottom',
		array(
			'default' => __('60','washington'),
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'margin_bottom',
		array(
			'label'         => __( 'Bottom Margin', 'washington' ),
			'section'       => 'washington_general',
			'type'          => 'number',
			'description'   => __('Bottom Margin for the page wrapper (the space between the Footer) ', 'washington'),
			'priority'      => 10,
			'input_attrs' => array(
				'min'   => 0,
				'max'   => 200,
				'step'  => 1,
			),
		)
	);
	/*--------------------------------------------------------------
	# Header
	--------------------------------------------------------------*/
	## Divider ##
	$wp_customize->add_setting('washington_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new washington_divider( $wp_customize, 'logo', array(
			'label' => __('Logo', 'washington'),
			'priority'      => 5,
			'section' => 'title_tagline',
			'settings' => 'washington_options[divider]'
		) )
	);
	$wp_customize->add_setting( 'bottom_header_search', array(
		'default'           => '',
		'sanitize_callback' => 'washington_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'bottom_header_search', array(
		'label' => __( 'Enable Search', 'washington' ),
		'type' => 'checkbox',
		'section' => 'title_tagline',
		'priority'      => 40,
		'settings' => 'bottom_header_search'
	) );
	$wp_customize->add_control( new washington_divider( $wp_customize, 'favicon', array(
			'label' => __('favicon', 'washington'),
			'priority'      => 40,
			'section' => 'title_tagline',
			'settings' => 'washington_options[divider]'
		) )
	);
	/*--------------------------------------------------------------
	# Typography
	--------------------------------------------------------------*/
	$wp_customize->add_section(
		'typography',
		array(
			'title'         => __('Typography', 'washington'),
			'priority'      => 60,
			'description' => __('Google Fonts can be found here: https://fonts.google.com ( Just enter fonts name like Lato )', 'washington'),
		)
	);
	## Divider ##
	$wp_customize->add_setting('washington_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new washington_divider( $wp_customize, 'body_fonts', array(
			'label' => __('Body Fonts', 'washington'),
			'priority'      => 10,
			'section' => 'typography',
			'settings' => 'washington_options[divider]'
		) )
	);
	## Body Fonts ##
	$wp_customize->add_setting(
		'body_font_name',
		array(
			'default' => 'Lato:400',
			'sanitize_callback' => 'washington_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'body_font_name',
		array(
			'label' => __( 'Font Name', 'washington' ),
			'section' => 'typography',
			'type' => 'text',
			'priority' => 10
		)
	);
	$wp_customize->add_setting(
		'body_font_family',
		array(
			'default' => '\'Lato\', sans-serif',
			'sanitize_callback' => 'washington_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'body_font_family',
		array(
			'label' => __( 'Font Family', 'washington' ),
			'section' => 'typography',
			'type' => 'text',
			'priority' => 10
		)
	);
	## Divider ##
	$wp_customize->add_setting('washington_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new washington_divider( $wp_customize, 'header_fonts', array(
			'label' => __('Heading Fonts', 'washington'),
			'priority'      => 10,
			'section' => 'typography',
			'settings' => 'washington_options[divider]'
		) )
	);
	## Header ##
	$wp_customize->add_setting(
		'heading_font_name',
		array(
			'default' => 'Lato:900',
			'sanitize_callback' => 'washington_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'heading_font_name',
		array(
			'label' => __( 'Font Name', 'washington' ),
			'section' => 'typography',
			'type' => 'text',
			'priority' => 10
		)
	);
	$wp_customize->add_setting(
		'heading_font_family',
		array(
			'default' => '\'Lato\', sans-serif',
			'sanitize_callback' => 'washington_sanitize_text',
		)
	);
	$wp_customize->add_control(
		'heading_font_family',
		array(
			'label' => __( 'Font Family', 'washington' ),
			'section' => 'typography',
			'type' => 'text',
			'priority' => 10
		)
	);
	/*--------------------------------------------------------------
	# Color
	--------------------------------------------------------------*/
	## Divider ##
	$wp_customize->add_setting('washington_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new washington_divider( $wp_customize, 'general_color', array(
			'label' => __('General Color', 'washington'),
			'priority'      => 5,
			'section' => 'colors',
			'settings' => 'washington_options[divider]'
		) )
	);
	## Body Text Color ##
	$wp_customize->add_setting(
		'body_text_color',
		array(
			'default'           => '#a1b1bc',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'body_text_color',
			array(
				'label'         => __('Body Text Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	## Link Color ##
	$wp_customize->add_setting(
		'link_color',
		array(
			'default'           => '#a1b1bc',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
				'label'         => __('Link Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	## Link Hover Color ##
	$wp_customize->add_setting(
		'link_hover_color',
		array(
			'default'           => '#1bbc9b',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_hover_color',
			array(
				'label'         => __('Link Hover Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	## Heading Color ##
	$wp_customize->add_setting(
		'heading_color',
		array(
			'default'           => '#2c3e50',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'heading_color',
			array(
				'label'         => __('Heading Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	## Divider ##
	$wp_customize->add_setting('washington_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new washington_divider( $wp_customize, 'button_color', array(
			'label' => __('Button Color', 'washington'),
			'priority'      => 10,
			'section' => 'colors',
			'settings' => 'washington_options[divider]'
		) )
	);
	## Default Button Color ##
	$wp_customize->add_setting(
		'default_text_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_text_color',
			array(
				'label'         => __('Default Text Color', 'washington'),
				'description' => __('## Select Default Button Color ##', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'default_bg_color',
		array(
			'default'           => '#2c3e50',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_bg_color',
			array(
				'label'         => __('Default BG Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'default_border_color',
		array(
			'default'           => '#2c3e50',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_border_color',
			array(
				'label'         => __('Default Border Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'default_hover_text_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_hover_text_color',
			array(
				'label'         => __('Default Hover Text Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'default_hover_bg_color',
		array(
			'default'           => '#ed1b2e',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_hover_bg_color',
			array(
				'label'         => __('Default Hover BG Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'default_hover_border_color',
		array(
			'default'           => '#ed1b2e',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'default_hover_border_color',
			array(
				'label'         => __('Default Hover Border Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	## Primary Button Color ##
	$wp_customize->add_setting(
		'primary_text_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_text_color',
			array(
				'label'         => __('Primary Text Color', 'washington'),
				'description' => __('## Select Primary Button Color ##', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'primary_bg_color',
		array(
			'default'           => '#1bbc9b',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_bg_color',
			array(
				'label'         => __('Primary BG Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'primary_border_color',
		array(
			'default'           => '#1bbc9b',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_border_color',
			array(
				'label'         => __('Primary Border Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'primary_hover_text_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_hover_text_color',
			array(
				'label'         => __('Primary Hover Text Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'primary_hover_bg_color',
		array(
			'default'           => '#003b64',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_hover_bg_color',
			array(
				'label'         => __('Primary Hover BG Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'primary_hover_border_color',
		array(
			'default'           => '#003b64',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'primary_hover_border_color',
			array(
				'label'         => __('Primary Hover Border Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	## Success Button Color ##
	$wp_customize->add_setting(
		'success_text_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'success_text_color',
			array(
				'label'         => __('Success Text Color', 'washington'),
				'description' => __('## Select Success Button Color ##', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'success_bg_color',
		array(
			'default'           => '#003b64',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'success_bg_color',
			array(
				'label'         => __('Success BG Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'success_border_color',
		array(
			'default'           => '#ed1b2e',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'success_border_color',
			array(
				'label'         => __('Success Border Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'success_hover_text_color',
		array(
			'default'           => '#fff',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'success_hover_text_color',
			array(
				'label'         => __('Success Hover Text Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'success_hover_bg_color',
		array(
			'default'           => '#ed1b2e',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'success_hover_bg_color',
			array(
				'label'         => __('Success Hover BG Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	$wp_customize->add_setting(
		'success_hover_border_color',
		array(
			'default'           => '#0033a1',
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'success_hover_border_color',
			array(
				'label'         => __('Success Hover Border Color', 'washington'),
				'section'       => 'colors',
				'priority' => 10
			)
		)
	);
	/*--------------------------------------------------------------
	# Social
	--------------------------------------------------------------*/
	$wp_customize->add_section(
		'social_settings',
		array(
			'title'         => __('Social Media', 'washington'),
			'priority'      => 70
		)
	);
	## Divider ##
	$wp_customize->add_setting('washington_options[divider]', array(
			'type'              => 'divider_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);
	$wp_customize->add_control( new washington_divider( $wp_customize, 'social_media', array(
			'label' => __('Header', 'washington'),
			'priority'      => 10,
			'section' => 'social_settings',
			'settings' => 'washington_options[divider]'
		) )
	);
	## Enable Social ##
	$wp_customize->add_setting( 'enable_social_settings', array(
		'default'           => '',
		'sanitize_callback' => 'washington_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'enable_social_settings', array(
		'label' => __( 'Enable Social Media', 'washington' ),
		'type' => 'checkbox',
		'section' => 'social_settings',
	) );
	## Header Social ##
	$wp_customize->add_setting( 'header_fb', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_fb', array(
		'label' => __( 'Facebook', 'washington' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_fb'
	) );
	$wp_customize->add_setting( 'header_tw', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_tw', array(
		'label' => __( 'Twitter', 'washington' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_tw'
	) );
	$wp_customize->add_setting( 'header_li', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_li', array(
		'label' => __( 'Linkedin', 'washington' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_li'
	) );
	$wp_customize->add_setting( 'header_pint', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_pint', array(
		'label' => __( 'Pinterest', 'washington' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_pint'
	) );
	$wp_customize->add_setting( 'header_ins', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_ins', array(
		'label' => __( 'Instagram', 'washington' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_ins'
	) );
	$wp_customize->add_setting( 'header_dri', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_dri', array(
		'label' => __( 'Dribbble', 'washington' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_dri'
	) );
	$wp_customize->add_setting( 'header_plus', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_plus', array(
		'label' => __( 'Plus Google', 'washington' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_plus'
	) );
	$wp_customize->add_setting( 'header_you', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'header_you', array(
		'label' => __( 'YouTube', 'washington' ),
		'type' => 'text',
		'section' => 'social_settings',
		'settings' => 'header_you'
	) );

	/*--------------------------------------------------------------
	# Blog
	--------------------------------------------------------------*/
	$wp_customize->add_section(
		'blog_settings',
		array(
			'title'         => __('Blog', 'washington'),
			'priority'      => 80
		)
	);
	## Blog Excerpt ##
	$wp_customize->add_setting(
		'blog_excerpt',
		array(
			'default' => __('60','washington'),
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'blog_excerpt',
		array(
			'label'         => __( 'Excerpt length', 'washington' ),
			'type'          => 'number',
			'description'   => __('Set your excerpt length. Default: 60 words', 'washington'),
			'section'       => 'blog_settings',
			'priority'      => 10,
		)
	);
}
add_action( 'customize_register', 'washington_customize_register' );

/**
 * Sanitize
 * @param $input
 * @return string
 */
function washington_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

function washington_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function washington_customize_preview_js() {
	wp_enqueue_script( 'washington_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'washington_customize_preview_js' );
