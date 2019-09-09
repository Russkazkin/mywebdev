$(document).ready(function () {
    $("form#lang-form").on('change', function () {
        let form = $(this);
        // submit form
        $.ajax({
            url: form.attr("action"),
            type: "post",
            data: form.serialize(),
            success: function (response) {
                // reload the page after selecting a language
                location.reload();
            },
            error: function () {
                console.log("Ajax: internal server error");
            }
        });
        return false;
    });
    $('.lang-switch input:checked').parent().addClass('checked');
});