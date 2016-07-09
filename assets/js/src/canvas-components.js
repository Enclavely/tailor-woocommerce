
( function( app, Views ) {

    'use strict';

    app.on( 'before:start', function() {
        Views.TailorPricing = require( './components/elements/wrappers/pricing' );
        Views.TailorTestimonial = require( './components/elements/wrappers/testimonial' );
    } );

} ) ( window.app, window.Tailor.Views || {} );