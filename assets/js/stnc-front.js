'use strict';
jQuery.noConflict();

jQuery(document).ready(function ($) {
  // init Isotopefdsdf4325435h6h
var $grid = $('.grid').isotope({
 itemSelector: '.element-item',
 // layoutMode: 'fitRows'
});

// bind filter on select change
jQuery('.filters-select').on( 'change', function() {
 var filterValue = this.value;
 $grid.isotope({ filter: filterValue });
});

// bind filter on select change
jQuery('.filters-select-comnpany').on( 'change', function() {
 var filterValue = this.value;
 $grid.isotope({ filter: filterValue });
});

});