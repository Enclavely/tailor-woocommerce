<?php

if ( ! function_exists( 'tailor_shortcode_pricing' ) ) {

    /**
     * Defines the shortcode rendering function for the Pricing element.
     *
     * @since 1.0.0
     *
     * @param array $atts
     * @param string $content
     * @param string $tag
     * @return string
     */
    function tailor_shortcode_pricing( $atts, $content = null, $tag ) {

	    /**
	     * Filter the default shortcode attributes.
	     *
	     * @since 1.2.0
	     *
	     * @param array
	     */
	    $default_atts = apply_filters( 'tailor_shortcode_default_atts_' . $tag, array() );
	    $atts = shortcode_atts( $default_atts, $atts, $tag );
	    
	    $class = explode( ' ', "tailor-element pricing {$atts['class']}" );
	    if ( '1' == $atts['featured'] ) {
		    $class[] = 'pricing--featured';
	    }
	    
	    $html_atts = array(
		    'id'            =>  empty( $atts['id'] ) ? null : $atts['id'],
		    'class'         =>  $class,
		    'data'          =>  array(),
	    );

	    /**
	     * Filter the HTML attributes for the element.
	     *
	     * @since 1.2.0
	     *
	     * @param array $html_attributes
	     * @param array $atts
	     * @param string $tag
	     */
	    $html_atts = apply_filters( 'tailor_shortcode_html_attributes', $html_atts, $atts, $tag );
	    $html_atts['class'] = implode( ' ', (array) $html_atts['class'] );
	    $html_atts = tailor_get_attributes( $html_atts );

	    $title = ( ! empty( $atts['title'] ) ) ? '<h3 class="pricing__title">' . esc_attr( $atts['title'] ) . '</h3>' : '';
	    $price = '';
	    if ( ! empty( $atts['price'] ) ) {
		    $currency = ( ! empty( $atts['currency'] ) ) ? '<span class="pricing__currency">' . esc_attr( $atts['currency'] ) . '</span>' : '';
		    $period = ( ! empty( $atts['period'] ) ) ? '<span class="pricing__period">/ ' . esc_attr( $atts['period'] ) . '</span>' : '';
		    $price = '<div class="pricing__price">' .
		                $currency .
		                esc_attr( $atts['price'] ) .
		                $period .
		             '</div>';
	    }

	    $outer_html = "<div {$html_atts}>%s</div>";
	    $inner_html = $title .
	                  $price .
	                  '<div class="pricing__content">%s</div>';
	    $content = do_shortcode( $content );
	    $html = sprintf( $outer_html, sprintf( $inner_html, $content ) );

	    /**
	     * Filter the HTML for the element.
	     *
	     * @since 1.2.0
	     *
	     * @param string $html
	     * @param string $outer_html
	     * @param string $inner_html
	     * @param string $html_atts
	     * @param array $atts
	     * @param string $content
	     * @param string $tag
	     */
	    $html = apply_filters( 'tailor_shortcode_html', $html, $outer_html, $inner_html, $html_atts, $atts, $content, $tag );

	    return $html;
    }

    add_shortcode( 'tailor_pricing', 'tailor_shortcode_pricing' );
}