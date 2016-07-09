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

		return  '<div ' . trim( "{$id} class=\"{$class}\"" ) . '>' .
					'<div class="testimonial__content">' . do_shortcode( $content ) . '</div>' .
		            $attribution .
		        '</div>';
	}

	add_shortcode( 'tailor_testimonial', 'tailor_shortcode_testimonial' );
}