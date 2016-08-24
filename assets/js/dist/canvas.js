(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){

( function( app, ElementAPI, Views ) {

    'use strict';

	ElementAPI.onRender( 'tailor_products', function( atts, model ) {
		var $el = this.$el;
		var options;

		if ( 'carousel' == atts.layout ) {
			options = {
				autoplay : '1' == atts.autoplay,
				arrows : '1' == atts.arrows,
				dots : '1' == atts.dots,
				fade : ( '1' == atts.fade && '1' == atts.items_per_row ),
				infinite: false,
				slidesToShow : parseInt( atts.items_per_row, 10 ) || 2
			};

			this.$el.tailorSimpleCarousel( options ) ;
		}
		else if ( 'grid' == atts.layout && atts.masonry ) {
			$el.tailorMasonry();
		}
    } );

	app.on( 'before:start', function() {
		Views.TailorPricing = require( './components/elements/wrappers/pricing' );
		Views.TailorTestimonial = require( './components/elements/wrappers/testimonial' );
	} );
	
} ) ( window.app, window.Tailor.Api.Element, Tailor.Views || {} );
},{"./components/elements/wrappers/pricing":2,"./components/elements/wrappers/testimonial":3}],2:[function(require,module,exports){

module.exports = Tailor.Views.Wrapper.extend( {

    childViewContainer : '.pricing__content'

} );
},{}],3:[function(require,module,exports){

module.exports = Tailor.Views.Wrapper.extend( {

    childViewContainer : '.testimonial__content'

} );
},{}]},{},[1]);
