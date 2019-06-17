(function (window, $) {
    'use strict';

    $(function () {
        $.fn.datepicker.defaults.language = 'ru';

        $('textarea.max-textarea').maxlength({
            alwaysShow: true
        });

        // $('#accordion').accordion({
        //     heightStyle: 'content'
        // });

        $('select[multiple]').multiSelect();
    });

} (window, jQuery));
