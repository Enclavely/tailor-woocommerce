<?php

/**
 * Tailor Pricing element class.
 *
 * @since 1.0.0
 *
 * @package Tailor
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Pricing_Element' ) ) {

    /**
     * Tailor Pricing element class.
     *
     * @since 1.0.0
     */
    class Tailor_Pricing_Element extends Tailor_Element {

	    /**
	     * Registers element settings, sections and controls.
	     *
	     * @since 1.0.0
	     *
	     * @access protected
	     */
	    protected function register_controls() {

		    $this->add_section( 'general', array(
			    'title'                 =>  __( 'General', 'tailor-woocommerce' ),
			    'priority'              =>  10,
		    ) );

		    $this->add_section( 'colors', array(
			    'title'                 =>  __( 'Colors', 'tailor-woocommerce'),
			    'priority'              =>  20,
		    ) );

		    $this->add_section( 'attributes', array(
			    'title'                 =>  __( 'Attributes', 'tailor-woocommerce' ),
			    'priority'              =>  30,
		    ) );

		    $priority = 0;

		    $this->add_setting( 'title', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
		    ) );
		    $this->add_control( 'title', array(
			    'label'                 =>  __( 'Title', 'tailor-woocommerce' ),
			    'type'                  =>  'text',
			    'priority'              =>  $priority += 10,
			    'section'               =>  'general',
		    ) );

		    $this->add_setting( 'price', array(
			    'sanitize_callback'     =>  'tailor_sanitize_number',
		    ) );
		    $this->add_control( 'price', array(
			    'label'                 =>  __( 'Price', 'tailor-woocommerce' ),
			    'type'                  =>  'number',
			    'priority'              =>  $priority += 10,
			    'section'               =>  'general',
		    ) );

		    $this->add_setting( 'period', array(
			    'sanitize_callback'     =>  'tailor_sanitize_text',
		    ) );
		    $this->add_control( 'period', array(
			    'label'                 =>  __( 'Period', 'tailor-woocommerce' ),
			    'type'                  =>  'text',
			    'priority'              =>  $priority += 10,
			    'section'               =>  'general',
		    ) );

		    $this->add_setting( 'featured', array(
			    'sanitize_callback'     =>  'tailor_sanitize_number',
		    ) );
		    $this->add_control( 'featured', array(
			    'label'                 =>  __( 'Featured', 'tailor-woocommerce' ),
			    'type'                  =>  'checkbox',
			    'choices'               =>  array(
				    '1'                     =>  __( 'Display as featured?', 'tailor-woocommerce' ),
			    ),
			    'priority'              =>  $priority += 10,
			    'section'               =>  'general',
		    ) );

		    $general_control_types = array(
			    'background_image',
			    'background_repeat',
			    'background_position',
			    'background_size',
		    );
		    $general_control_arguments = array();
		    tailor_control_presets( $this, $general_control_types, $general_control_arguments, $priority );

		    $priority = 0;
		    $color_control_types = array(
			    'color',
			    'link_color',
			    'heading_color',
			    'background_color',
			    'border_color',
		    );
		    $color_control_arguments = array();
		    tailor_control_presets( $this, $color_control_types, $color_control_arguments, $priority );

		    $priority = 0;
		    $attribute_control_types = array(
			    'class',
			    'padding',
			    'margin',
			    'border_style',
			    'border_width',
			    'border_radius',
			    'shadow',
			    'background_image',
			    'background_repeat',
			    'background_position',
			    'background_size',
		    );
		    $attribute_control_arguments = array();
		    tailor_control_presets( $this, $attribute_control_types, $attribute_control_arguments, $priority );
	    }

	    /**
	     * Returns custom CSS rules for the element.
	     *
	     * @since 1.0.0
	     *
	     * @param array $atts
	     *
	     * @return array
	     */
	    public function generate_css( $atts = array() ) {
		    $css_rules = array();
		    $excluded_control_types = array();
		    $css_rules = tailor_css_presets( $css_rules, $atts, $excluded_control_types );

		    return $css_rules;
	    }
    }
}