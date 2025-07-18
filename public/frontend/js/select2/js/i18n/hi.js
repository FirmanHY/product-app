/*! Select2 4.0.12 | https://github.com/select2/select2/blob/master/LICENSE.md */

!(function () {
    if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
        var n = jQuery.fn.select2.amd;
    n.define('select2/i18n/hi', [], function () {
        return {
            errorLoading: function () {
                return 'परिणामों को लोड नहीं किया जा सका।';
            },
            inputTooLong: function (n) {
                var e = n.input.length - n.maximum,
                    r = e + ' अक्षर को हटा दें';
                return e > 1 && (r = e + ' अक्षरों को हटा दें '), r;
            },
            inputTooShort: function (n) {
                return (
                    'कृपया ' +
                    (n.minimum - n.input.length) +
                    ' या अधिक अक्षर दर्ज करें'
                );
            },
            loadingMore: function () {
                return 'अधिक परिणाम लोड हो रहे है...';
            },
            maximumSelected: function (n) {
                return 'आप केवल ' + n.maximum + ' आइटम का चयन कर सकते हैं';
            },
            noResults: function () {
                return 'कोई परिणाम नहीं मिला';
            },
            searching: function () {
                return 'खोज रहा है...';
            },
            removeAllItems: function () {
                return 'सभी वस्तुओं को हटा दें';
            },
        };
    }),
        n.define,
        n.require;
})();
