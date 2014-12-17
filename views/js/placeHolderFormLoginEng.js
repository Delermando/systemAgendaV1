$(document).ready(function () {
    function loginLabel() {
        $("#email").attr("placeholder", function () {
            return "e-mail";
        });
        $("#senha").attr("placeholder", function () {
            return "password";
        });

        $('[placeholder]').focus(function () {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
                input.removeClass('placeholder');
            }
        }).blur(function () {
            var input = $(this);
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.addClass('placeholder');
                // input.val(input.attr('placeholder'));
            }
        }).blur();

    }
    loginLabel();
});


