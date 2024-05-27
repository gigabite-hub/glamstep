'use strict';

(function ($) {

    $(document).ready(function () {

        console.log('ready');
        var currentURL = window.location.href;
        console.log(currentURL);
        $('.variations_form.cart .value select').hide();


        $('.variation-value').on('click', function () {
            // Get the value of the clicked variation
            var selectedValue = $(this).text();
        
            // Remove "active" class from all variation values
            $('.variation-value').removeClass('active');
        
            // Add "active" class to the clicked variation value
            $(this).addClass('active');
        
            // Find the options in both dropdowns with the same value
            var $optionSize = $('#pa_size option').filter(function () {
                return $(this).val() === selectedValue;
            });
        
            var $optionColor = $('#pa_color option').filter(function () {
                return $(this).val() === selectedValue;
            });
        
            // If the option is found in the size dropdown, select it
            if ($optionSize.length) {
                $('#pa_size').val($optionSize.val());
            }
        
            // If the option is found in the color dropdown, select it
            if ($optionColor.length) {
                $('#pa_color').val($optionColor.val());
            }
        
            // Trigger change event for both dropdowns to update their UI
            $('#pa_size').change();
            $('#pa_color').change();
        
            // Hide the dropdown menus
        });
        
        
        

    });

}(jQuery));
