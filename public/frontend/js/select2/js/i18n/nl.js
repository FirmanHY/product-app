/*! Select2 4.0.12 | https://github.com/select2/select2/blob/master/LICENSE.md */

!(function () {
    if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
        var e = jQuery.fn.select2.amd;
    e.define('select2/i18n/nl', [], function () {
        return {
            errorLoading: function () {
                return 'De resultaten konden niet worden geladen.';
            },
            inputTooLong: function (e) {
                return (
                    'Gelieve ' +
                    (e.input.length - e.maximum) +
                    ' karakters te verwijderen'
                );
            },
            inputTooShort: function (e) {
                return (
                    'Gelieve ' +
                    (e.minimum - e.input.length) +
                    ' of meer karakters in te voeren'
                );
            },
            loadingMore: function () {
                return 'Meer resultaten laden…';
            },
            maximumSelected: function (e) {
                var n = 1 == e.maximum ? 'kan' : 'kunnen',
                    r = 'Er ' + n + ' maar ' + e.maximum + ' item';
                return (
                    1 != e.maximum && (r += 's'), (r += ' worden geselecteerd')
                );
            },
            noResults: function () {
                return 'Geen resultaten gevonden…';
            },
            searching: function () {
                return 'Zoeken…';
            },
            removeAllItems: function () {
                return 'Verwijder alle items';
            },
        };
    }),
        e.define,
        e.require;
})();
