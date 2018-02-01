/**
 * Main customize js file
 *
 * @package orfeo
 */

( function( $ ) {
    // Pricing Section
    wp.customize(
        'accent_color', function( value ) {
            value.bind(
                function( newval ) {
                    $( '.hestia-pricing .hestia-table-one .card-pricing .category' ).css( 'color',  newval );
                    $( '.hestia-pricing .hestia-table-two .card-pricing' ).css( 'background-color', newval );
                    $( '.hestia-pricing .hestia-table-two .card-pricing .card-title small' ).css( 'color', '#fff' );
                    $( '.hestia-pricing .hestia-table-two .card-pricing .btn ' ).css( 'background-color', 'rgb( 255, 255, 255)' );
                }
            );
        }
    );
} )( jQuery );