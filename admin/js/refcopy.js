
(function ($) {

    $.fn.relCopy = function (options) {
        var settings = jQuery.extend({
            excludeSelector: ".exclude",
            emptySelector: ".empty",
            copyClass: "copy",
            limit: 0, // 0 = unlimited
            append: '',
            appendTo: '',
            clearInputs: true,
            withDataAndEvents: true,
            onLimitExceeded: null,
            onCopy: null,
        }, options);

        settings.limit = parseInt(settings.limit);

        // loop each element
        this.each(function () {

            // set click action
            $(this).click(function () {
                var that = this;
                var rel = $(that).attr('rel'); // rel in jquery selector format				
                var counter = $(rel).length;

                // stop limit
                if (settings.limit != 0 && counter >= settings.limit) {
                    if (typeof settings.onLimitExceeded === 'function') {
                        settings.onLimitExceeded.call(that);
                    }
                    return false;
                };

                var master = $(rel + ':first');
                var parent = $(master).parent();
                var clone = $(master).clone(settings.withDataAndEvents).addClass(settings.copyClass + counter);

                //Remove Elements with excludeSelector
                if (settings.excludeSelector) {
                    $(clone).find(settings.excludeSelector).remove();
                };

                // Add axtra append
                if (settings.appendTo && $(clone).find(settings.appendTo).length) {
                    $(clone).find(settings.appendTo).append(settings.append);
                } else {
                    $(clone).append(settings.append);
                }

                //Empty Elements with emptySelector
                if (settings.emptySelector) {
                    $(clone).find(settings.emptySelector).empty();
                };

                // Increment Clone IDs
                if ($(clone).attr('id')) {
                    var newid = $(clone).attr('id').replace(/\d+$/, '') + (counter + 1);
                    $(clone).attr('id', newid);
                };

                // Increment Clone Children IDs
                $(clone).find('[id]').each(function () {
                    var newid = $(this).attr('id').replace(/\d+$/, '') + (counter + 1);
                    $(this).attr('id', newid);
                });

                //Clear Inputs/Textarea
                if (settings.clearInputs) {
                    $(clone).find(':input').each(function () {
                        var type = $(this).attr('type');
                        switch (type) {
                            case "button":
                                break;
                            case "reset":
                                break;
                            case "submit":
                                break;
                            case "checkbox":
                                $(this).prop('checked', false);
                                break;
                            default:
                                $(this).val('');
                        }
                    });
                };

                $(parent).find(rel + ':last').after(clone);

                if (typeof settings.onCopy === 'function') {
                    settings.onCopy.call(that, clone);
                }

                return false;

            });

        });

        return this; // return to jQuery
    };

})(jQuery);