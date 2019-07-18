/*
 * Main JS
 * Theme Name   : Theme Name
 * Author       : MD. Abu Ahsan Basir
 * Description  : Theme Description
 * Version      : 1.0
 */


(function($) {
    "use strict";

    /*
     * ----------------------------------------------------------------------------------------
     *  Document Ready
     * ----------------------------------------------------------------------------------------
     */

    jQuery(document).ready(function($) {
        // Scroll
        $('.slider').smooth({
            top : 80
        });
        $('.navbar-nav').smooth({
            top : 80
        });
    });

    /*
     * ----------------------------------------------------------------------------------------
     *  Document Onload
     * ----------------------------------------------------------------------------------------
     */

    $(window).on('load', function(event) {
    });


}(jQuery));
