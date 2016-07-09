<?php

/**
 * Product entry template.
 *
 * @package Tailor WooCommerce
 * @subpackage Templates
 * @since 1.0.0
 *
 * @var array $meta
 * @var string $image_size The image size.
 * @var string $aspect_ratio The image aspect ratio.
 * @var bool $stretch True if the image should be stretched to fit the aspect ratio.
 * @var bool $lightbox True if a lightbox should be used.
 */

defined( 'ABSPATH' ) or die();

$post = get_post(); ?>

<article id="product-<?php esc_attr_e( $post->ID ); ?>" class="<?php esc_attr_e( implode( ' ', get_post_class( 'entry product' ) ) ); ?>">

	<?php
	if ( in_array( 'thumbnail', $meta ) ) {
		tailor_partial( 'meta', 'thumbnail', array(
            'image_size'        =>  $image_size,
            'aspect_ratio'      =>  $aspect_ratio,
            'stretch'           =>  $stretch,
            'lightbox'          =>  $lightbox,
        ) );
	} ?>

	<h3 class="entry__title">
		<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
	</h3>

	<?php
	if ( in_array( 'price', $meta ) ) {
		tailor_partial( 'meta', 'price' );
	} ?>

</article>
