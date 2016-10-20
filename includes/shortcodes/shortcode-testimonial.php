<?php

if ( ! function_exists( 'tailor_shortcode_testimonial' ) ) {

	/**
	 * Defines the shortcode rendering function for the Testimonial element.
	 *
	 * @since 1.0.0
	 *
	 * @param array $atts
	 * @param string $content
	 * @param string $tag
	 * @return string
	 */
	function tailor_shortcode_testimonial( $atts, $content = null, $tag ) {

		/**
		 * Filter the default shortcode attributes.
		 *
		 * @since 1.2.0
		 *
		 * @param array
		 */
		$default_atts = apply_filters( 'tailor_shortcode_default_atts_' . $tag, array() );
		$atts = shortcode_atts( $default_atts, $atts, $tag );
		$html_atts = array(
			'id'            =>  empty( $atts['id'] ) ? null : $atts['id'],
			'class'         =>  explode( ' ', "tailor-element testimonial {$atts['class']}" ),
			'data'          =>  array(),
		);

		$author = ! empty( $atts['author'] ) ? '<p class="testimonial__author">' . esc_attr( $atts['author'] ) . '</p>' : '';
		$citation = ! empty( $atts['citation'] ) ? '<cite class="testimonial__citation">' . esc_attr( $atts['citation'] ) . '</cite>' : '';
		if ( ! empty( $atts['author'] ) || ! empty( $atts['citation'] ) ) {
			$attribution = "<div class=\"testimonial__attribution\">{$author}{$citation}</div>";
		}
		else {
			$attribution = '';
		}

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

		$outer_html = "<div {$html_atts}>%s</div>";
		$inner_html = '<div class="testimonial__content">%s</div>' .
		              $attribution;
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

	add_shortcode( 'tailor_testimonial', 'tailor_shortcode_testimonial' );
}