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

        $atts = shortcode_atts( array(
            'id'                =>  '',
            'class'             =>  '',
            'author'            =>  '',
            'citation'          =>  '',
        ), $atts, $tag );

		$id = ( '' !== $atts['id'] ) ? 'id="' . esc_attr( $atts['id'] ) . '"' : '';
		$class = trim( 'tailor-element testimonial ' . esc_attr( $atts['class'] ) );

		$author = ! empty( $atts['author'] ) ? '<p class="testimonial__author">' . esc_attr( $atts['author'] ) . '</p>' : '';
		$citation = ! empty( $atts['citation'] ) ? '<cite class="testimonial__citation">' . esc_attr( $atts['citation'] ) . '</cite>' : '';

		if ( ( ! empty( $atts['author'] ) || ! empty( $atts['citation'] ) ) ) {
			$attribution = "<div class=\"testimonial__attribution\">{$author}{$citation}</div>";
		}
		else {
			$attribution = '';
		}

		$outer_html = '<div ' . trim( "{$id} class=\"{$class}\"" ) . '>%s</div>';

		$inner_html = '<div class="testimonial__content">' . do_shortcode( $content ) . '</div>' .
		              $attribution;

		/**
		 * Filter the HTML for the element.
		 *
		 * @since 1.1.1
		 *
		 * @param string $outer_html
		 * @param string $inner_html
		 * @param array $atts
		 */
		$html = apply_filters( 'tailor_shortcode_testimonial_html', sprintf( $outer_html, $inner_html ), $outer_html, $inner_html, $atts );

		return $html;
	}

	add_shortcode( 'tailor_testimonial', 'tailor_shortcode_testimonial' );
}