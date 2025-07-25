/*! Select2 4.0.12 | https://github.com/select2/select2/blob/master/LICENSE.md */

!(function () {
    if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
        var e = jQuery.fn.select2.amd;
    e.define('select2/i18n/fr', [], function () {
        return {
            errorLoading: function () {
                return 'Les résultats ne peuvent pas être chargés.';
            },
            inputTooLong: function (e) {
                var n = e.input.length - e.maximum;
                return 'Supprimez ' + n + ' caractère' + (n > 1 ? 's' : '');
            },
            inputTooShort: function (e) {
                var n = e.minimum - e.input.length;
                return (
                    'Saisissez au moins ' +
                    n +
                    ' caractère' +
                    (n > 1 ? 's' : '')
                );
            },
            loadingMore: function () {
                return 'Chargement de résultats supplémentaires…';
            },
            maximumSelected: function (e) {
                return (
                    'Vous pouvez seulement sélectionner ' +
                    e.maximum +
                    ' élément' +
                    (e.maximum > 1 ? 's' : '')
                );
            },
            noResults: function () {
                return 'Aucun résultat trouvé';
            },
            searching: function () {
                return 'Recherche en cours…';
            },
            removeAllItems: function () {
                return 'Supprimer tous les éléments';
            },
        };
    }),
        e.define,
        e.require;
})();
