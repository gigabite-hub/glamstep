'use strict';

(function ($) {

    $(document).ready(function () {

        console.log('ready');
        var currentURL = window.location.href;
        console.log(currentURL);

        $('.variation-value').on('click', function () {
            // Get the value of the clicked variation
            var selectedValue = $(this).text();

            console.log("Selected Value: " + selectedValue);

            // Find the option in the dropdowns with the same value
            var $optionSize = $('#pa_size option').filter(function () {
                console.log("Option Size Value: " + $(this).val());
                return $(this).val() === selectedValue; // Compare against value instead of text
            });

            var $optionColor = $('#pa_color option').filter(function () {
                console.log("Option Color Value: " + $(this).val());
                return $(this).val() === selectedValue; // Compare against value instead of text
            });

            // If the option is found, select it and trigger change event for both dropdowns
            if ($optionSize.length) {
                $('#pa_size').val($optionSize.val()).change();
            }

            if ($optionColor.length) {
                $('#pa_color').val($optionColor.val()).change();
            }
        });

    });

}(jQuery));
