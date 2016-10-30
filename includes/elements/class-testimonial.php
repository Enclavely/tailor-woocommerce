<?php

/**
 * Tailor Testimonial element class.
 *
 * @since 1.0.0
 *
 * @package Tailor
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}

if ( class_exists( 'Tailor_Element' ) && ! class_exists( 'Tailor_Testimonial_Element' ) ) {

    /**
     * Tailor Testimonial element class.
     *
     * @since 1.0.0
     */
    class Tailor_Testimonial_Element extends Tailor_Element {

        /**
         * Registers element settings, sections and controls.
         *
         * @since 1.0.0
         *
         * @access protected
         */
        protected function register_controls() {

	        $this->add_section( 'general', array(
		        'title'                 =>  __( 'General', 'tailor-woocommerce'  ),
		        'priority'              =>  10,
	        ) );

	        $this->add_section( 'colors', array(
		        'title'                 =>  __( 'Colors', 'tailor-woocommerce'  ),
		        'priority'              =>  20,
	        ) );

	        $this->add_section( 'attributes', array(
		        'title'                 =>  __( 'Attributes', 'tailor-woocommerce'  ),
		        'priority'              =>  30,
	        ) );

	        $priority = 0;

	        $this->add_setting( 'author', array(
		        'sanitize_callback'     =>  'tailor_sanitize_text',
	        ) );
	        $this->add_control( 'author', array(
		        'label'                 =>  __( 'Author', 'tailor-woocommerce'  ),
		        'type'                  =>  'text',
		        'priority'              =>  $priority += 10,
		        'section'               =>  'general',
	        ) );

	        $this->add_setting( 'citation', array(
		        'sanitize_callback'     =>  'tailor_sanitize_text',
	        ) );
	        $this->add_control( 'citation', array(
		        'label'                 =>  __( 'Citation', 'tailor-woocommerce'  ),
		        'type'                  =>  'text',
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
	        $priority = tailor_control_presets( $this, $color_control_types, $color_control_arguments, $priority );

	        $this->add_setting( 'quote_mark_color', array(
		        'sanitize_callback'     =>  'tailor_sanitize_color',
	        ) );
	        $this->add_control( 'quote_mark_color', array(
		        'label'                 =>  __( 'Quotation mark color', 'tailor-woocommerce'  ),
		        'type'                  =>  'colorpicker',
		        'priority'              =>  $priority += 10,
		        'section'               =>  'colors',
	        ) );

	        $priority = 0;
	        $attribute_control_types = array(
		        'class',
		        'padding',
		        'padding_tablet',
		        'padding_mobile',
		        'margin',
		        'margin_tablet',
		        'margin_mobile',
		        'border_style',
		        'border_width',
		        'border_width_tablet',
		        'border_width_mobile',
		        'border_radius',
		        'shadow',
		        'background_image',
		        'background_repeat',
		        'background_position',
		        'background_size',
		        'background_attachment',
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

		    if ( ! empty( $atts['quote_mark_color'] ) ) {
			    $css_rules[] = array(
				    'selectors'         =>  array( '.testimonial__content .tailor-element:first-child p:first-child::before' ),
				    'declarations'      =>  array(
					    'color'             =>  esc_attr( $atts['quote_mark_color'] ),
				    ),
			    );
		    }

		    return $css_rules;
	    }
    }
}