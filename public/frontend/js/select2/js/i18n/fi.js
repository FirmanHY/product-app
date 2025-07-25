/*! Select2 4.0.12 | https://github.com/select2/select2/blob/master/LICENSE.md */

!(function () {
    if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
        var n = jQuery.fn.select2.amd;
    n.define('select2/i18n/fi', [], function () {
        return {
            errorLoading: function () {
                return 'Tuloksia ei saatu ladattua.';
            },
            inputTooLong: function (n) {
                return (
                    'Ole hyvä ja anna ' +
                    (n.input.length - n.maximum) +
                    ' merkkiä vähemmän'
                );
            },
            inputTooShort: function (n) {
                return (
                    'Ole hyvä ja anna ' +
                    (n.minimum - n.input.length) +
                    ' merkkiä lisää'
                );
            },
            loadingMore: function () {
                return 'Ladataan lisää tuloksia…';
            },
            maximumSelected: function (n) {
                return 'Voit valita ainoastaan ' + n.maximum + ' kpl';
            },
            noResults: function () {
                return 'Ei tuloksia';
            },
            searching: function () {
                return 'Haetaan…';
            },
            removeAllItems: function () {
                return 'Poista kaikki kohteet';
            },
        };
    }),
        n.define,
        n.require;
})();
