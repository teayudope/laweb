;

jQuery.fn.extend({
    bmodal: function (params) {

        var self = this;
        var defaults = {
            trigger_id: undefined,
            trigger_event: 'click',
            keyboard: true,
            click_dismiss: true,
            effect: '',
            delay: 400
        };

        defaults.active_tag = 'is-active';
        defaults.background_tag = '<div class="modal-background"></div>';
        defaults.contents_tag = '.modal-content, .modal-card';

        if (typeof params === 'string') {
            if (self._bmodal_params[self.attr('id')] == undefined)
                self._bmodal_params[self.attr('id')] = defaults;
        }
        else {
            self._bmodal_params[self.attr('id')] = params;
        }

        self._bmodal_params[self.attr('id')] = $.extend({}, defaults, self._bmodal_params[self.attr('id')]);
        var opts = self._bmodal_params[self.attr('id')];

        if (typeof params === 'string') {
            switch (params) {
                case 'show': {
                    self._show();
                    break;
                }
                case 'hide': {
                    self._hide();
                    break;
                }
                case 'toggle': {
                    self._toggle();
                    break;
                }
            }
        }
        else {
            if (opts.trigger_id != undefined) {
                jQuery('#' + opts.trigger_id).on(opts.trigger_event, function () {
                    self._toggle();
                });
            }
        }


        self.prepend(opts.background_tag);
        if (opts.click_dismiss) {
            self.find('.modal-background').on('click', function (e) {
                e.preventDefault();
                self._hide();
            });
        }

        self.find('.close-bmodal').on('click', function (e) {
            e.preventDefault();
            self._hide();
        });

        if (opts.keyboard) {
            jQuery(document).on('keyup', function (e) {
                if (e.keyCode == 27 && self.hasClass(opts.active_tag)) {
                    e.preventDefault();
                    self._hide();
                }
            });
        }
    },

    _bmodal_params: [],

    _toggle: function () {
        var self = this;
        var opts = self._bmodal_params[self.attr('id')];
        if (self.hasClass(opts.active_tag))
            self._hide();
        else
            self._show(opts.active_tag);
    },

    _show: function () {
        var self = this;
        var opts = self._bmodal_params[self.attr('id')];
        var modal_content = self.find(opts.contents_tag);
        switch (opts.effect) {
            case 'fade': {
                modal_content.hide();
                self.addClass(opts.active_tag);
                modal_content.fadeIn(opts.delay);
                break;
            }
            case 'slideY': {
                modal_content.hide();
                self.addClass(opts.active_tag);
                modal_content.slideDown(opts.delay);
                break;
            }
            case 'slideX': {
                modal_content.hide();
                self.addClass(opts.active_tag);
                modal_content.animate({'width': 'toggle'}, opts.delay);
                break;
            }
            default: {
                self.addClass(opts.active_tag);
            }
        }

    },

    _hide: function () {
        var self = this;
        var opts = self._bmodal_params[self.attr('id')];
        var modal_content = self.find(opts.contents_tag);
        switch (opts.effect) {
            case 'fade': {
                modal_content.fadeOut(opts.delay);
                setTimeout(function () {
                    self.removeClass(opts.active_tag);
                }, opts.delay);
                break;
            }
            case 'slideY': {
                modal_content.slideUp(opts.delay);
                setTimeout(function () {
                    self.removeClass(opts.active_tag);
                }, opts.delay);
                break;
            }
            case 'slideX': {
                modal_content.animate({'width': 'toggle'}, opts.delay);
                setTimeout(function () {
                    self.removeClass(opts.active_tag);
                }, opts.delay);
                break;
            }
            default: {
                self.removeClass(opts.active_tag);
            }
        }
    }
});


jQuery('[data-bmodal]').each(function () {
    jQuery(this).on('click', function (e) {
        jQuery('#' + $(this).attr('data-bmodal')).bmodal('toggle');
    });
});