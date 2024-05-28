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

        $('.pa_color .variation-value').on('click', function () {
            // Remove 'active' class from all .pa_color elements
            $('.pa_color .variation-value').removeClass('active');
            // Add 'active' class to the clicked element
            $(this).addClass('active');
        });

        $('.pa_size .variation-value').on('click', function () {
            // Remove 'active' class from all .pa_size elements
            $('.pa_size .variation-value').removeClass('active');
            // Add 'active' class to the clicked element
            $(this).addClass('active');
        });

        $(".reset_variations").on('click', function () {
            $('.pa_color .variation-value').removeClass('active');
            $('.pa_size .variation-value').removeClass('active');
        });

    });

}(jQuery));
