(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){

( function( app, Views ) {

    'use strict';

    app.on( 'before:start', function() {
        Views.TailorPricing = require( './components/elements/wrappers/pricing' );
        Views.TailorTestimonial = require( './components/elements/wrappers/testimonial' );
    } );

} ) ( window.app, window.Tailor.Views || {} );
},{"./components/elements/wrappers/pricing":2,"./components/elements/wrappers/testimonial":3}],2:[function(require,module,exports){

module.exports = Tailor.Views.Wrapper.extend( {

    childViewContainer : '.pricing__content'

} );
},{}],3:[function(require,module,exports){

module.exports = Tailor.Views.Wrapper.extend( {

    childViewContainer : '.testimonial__content'

} );
},{}]},{},[1]);
