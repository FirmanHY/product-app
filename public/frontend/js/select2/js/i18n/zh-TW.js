/*! Select2 4.0.12 | https://github.com/select2/select2/blob/master/LICENSE.md */

!(function () {
    if (jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd)
        var n = jQuery.fn.select2.amd;
    n.define('select2/i18n/zh-TW', [], function () {
        return {
            inputTooLong: function (n) {
                return '請刪掉' + (n.input.length - n.maximum) + '個字元';
            },
            inputTooShort: function (n) {
                return '請再輸入' + (n.minimum - n.input.length) + '個字元';
            },
            loadingMore: function () {
                return '載入中…';
            },
            maximumSelected: function (n) {
                return '你只能選擇最多' + n.maximum + '項';
            },
            noResults: function () {
                return '沒有找到相符的項目';
            },
            searching: function () {
                return '搜尋中…';
            },
            removeAllItems: function () {
                return '刪除所有項目';
            },
        };
    }),
        n.define,
        n.require;
})();
