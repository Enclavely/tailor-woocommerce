<?php

/**
 * Product price meta template.
 *
 * @package Tailor WooCommerce
 * @subpackage Templates
 * @since 1.0.0
 */

defined( 'ABSPATH' ) or die();

global $product ?>

<div class="entry__price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">

	<p><?php echo $product->get_price_html(); ?></p>

	<meta itemprop="price" content="<?php echo esc_attr( $product->get_price() ); ?>" />
	<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
	<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
</div>