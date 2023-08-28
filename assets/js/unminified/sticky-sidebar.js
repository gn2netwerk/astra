/**
 * File sticky-sidebar.js.
 *
 * Feature: Sticky Sidebar
 * Description: Calculates offset for sticky sidebar positioning.
 * @package Astra
 * @since x.x.x
 */
(function () {
    'use strict';
    window.astraStickySidebar = {

        /**
         * Get the top offset from header for sticky sidebar.
         */
        getOffset: function () {

            let offset = 0;
            if ( window.innerWidth >= 992 ) {
                if ( astra_sticky_sidebar.header_above_stick ) {
                    offset += Math.floor( parseInt( astra_sticky_sidebar.header_above_height.desktop ) );
                }
                if ( astra_sticky_sidebar.header_main_stick ) {
                    offset += Math.floor( parseInt( astra_sticky_sidebar.header_height.desktop ) );
                }
                if ( astra_sticky_sidebar.header_below_stick ) {
                    offset += Math.floor( parseInt( astra_sticky_sidebar.header_below_height.desktop ) );
                }
				if ( document.body.classList.contains( 'admin-bar' ) ) {
					offset += 32;
				}
                return offset;
            }

        },

		/**
		 * Initiate the sticky sidebar.
		 */
		activateStickySidebar: function() {
			
			if ( ! document.body.classList.contains( 'ast-sticky-sidebar' ) ) {
				return;
			}
			const sidebar = document.querySelector( '#secondary .sidebar-main' );
			if ( sidebar && astra_sticky_sidebar.sticky_sidebar_on ) { 
                const offset  = window.astraStickySidebar.getOffset();
				sidebar.style.top = Math.floor( offset + 20 ) + 'px';
                sidebar.style.maxHeight = 'calc( 100vh - ' + Math.floor( offset + 20 ) + 'px )';
			}

		},

        init: function () {

            // Kick off the sticky sidebar activation.
            window.astraStickySidebar.activateStickySidebar();

        }

    }
	if ( 'loading' === document.readyState ) {

		// The DOM has not yet been loaded.
		document.addEventListener( 'DOMContentLoaded', window.astraStickySidebar.init );

	} else {

		// The DOM has already been loaded.
		window.astraStickySidebar.init();

	}

})();