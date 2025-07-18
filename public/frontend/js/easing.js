// Easing JS //
!(function (n) {
    'function' == typeof define && define.amd
        ? define(['jquery'], function (e) {
              return n(e);
          })
        : 'object' == typeof module && 'object' == typeof module.exports
          ? (exports = n(require('jquery')))
          : n(jQuery);
})(function (n) {
    function e(n) {
        var e = 7.5625,
            t = 2.75;
        return n < 1 / t
            ? e * n * n
            : n < 2 / t
              ? e * (n -= 1.5 / t) * n + 0.75
              : n < 2.5 / t
                ? e * (n -= 2.25 / t) * n + 0.9375
                : e * (n -= 2.625 / t) * n + 0.984375;
    }
    n.easing.jswing = n.easing.swing;
    var t = Math.pow,
        u = Math.sqrt,
        r = Math.sin,
        i = Math.cos,
        a = Math.PI,
        c = 1.70158,
        o = 1.525 * c,
        s = (2 * a) / 3,
        f = (2 * a) / 4.5;
    n.extend(n.easing, {
        def: 'easeOutQuad',
        swing: function (e) {
            return n.easing[n.easing.def](e);
        },
        easeInQuad: function (n) {
            return n * n;
        },
        easeOutQuad: function (n) {
            return 1 - (1 - n) * (1 - n);
        },
        easeInOutQuad: function (n) {
            return n < 0.5 ? 2 * n * n : 1 - t(-2 * n + 2, 2) / 2;
        },
        easeInCubic: function (n) {
            return n * n * n;
        },
        easeOutCubic: function (n) {
            return 1 - t(1 - n, 3);
        },
        easeInOutCubic: function (n) {
            return n < 0.5 ? 4 * n * n * n : 1 - t(-2 * n + 2, 3) / 2;
        },
        easeInQuart: function (n) {
            return n * n * n * n;
        },
        easeOutQuart: function (n) {
            return 1 - t(1 - n, 4);
        },
        easeInOutQuart: function (n) {
            return n < 0.5 ? 8 * n * n * n * n : 1 - t(-2 * n + 2, 4) / 2;
        },
        easeInQuint: function (n) {
            return n * n * n * n * n;
        },
        easeOutQuint: function (n) {
            return 1 - t(1 - n, 5);
        },
        easeInOutQuint: function (n) {
            return n < 0.5 ? 16 * n * n * n * n * n : 1 - t(-2 * n + 2, 5) / 2;
        },
        easeInSine: function (n) {
            return 1 - i((n * a) / 2);
        },
        easeOutSine: function (n) {
            return r((n * a) / 2);
        },
        easeInOutSine: function (n) {
            return -(i(a * n) - 1) / 2;
        },
        easeInExpo: function (n) {
            return 0 === n ? 0 : t(2, 10 * n - 10);
        },
        easeOutExpo: function (n) {
            return 1 === n ? 1 : 1 - t(2, -10 * n);
        },
        easeInOutExpo: function (n) {
            return 0 === n
                ? 0
                : 1 === n
                  ? 1
                  : n < 0.5
                    ? t(2, 20 * n - 10) / 2
                    : (2 - t(2, -20 * n + 10)) / 2;
        },
        easeInCirc: function (n) {
            return 1 - u(1 - t(n, 2));
        },
        easeOutCirc: function (n) {
            return u(1 - t(n - 1, 2));
        },
        easeInOutCirc: function (n) {
            return n < 0.5
                ? (1 - u(1 - t(2 * n, 2))) / 2
                : (u(1 - t(-2 * n + 2, 2)) + 1) / 2;
        },
        easeInElastic: function (n) {
            return 0 === n
                ? 0
                : 1 === n
                  ? 1
                  : -t(2, 10 * n - 10) * r((10 * n - 10.75) * s);
        },
        easeOutElastic: function (n) {
            return 0 === n
                ? 0
                : 1 === n
                  ? 1
                  : t(2, -10 * n) * r((10 * n - 0.75) * s) + 1;
        },
        easeInOutElastic: function (n) {
            return 0 === n
                ? 0
                : 1 === n
                  ? 1
                  : n < 0.5
                    ? -(t(2, 20 * n - 10) * r((20 * n - 11.125) * f)) / 2
                    : (t(2, -20 * n + 10) * r((20 * n - 11.125) * f)) / 2 + 1;
        },
        easeInBack: function (n) {
            return (c + 1) * n * n * n - c * n * n;
        },
        easeOutBack: function (n) {
            return 1 + (c + 1) * t(n - 1, 3) + c * t(n - 1, 2);
        },
        easeInOutBack: function (n) {
            return n < 0.5
                ? (t(2 * n, 2) * (7.189819 * n - o)) / 2
                : (t(2 * n - 2, 2) * ((o + 1) * (2 * n - 2) + o) + 2) / 2;
        },
        easeInBounce: function (n) {
            return 1 - e(1 - n);
        },
        easeOutBounce: e,
        easeInOutBounce: function (n) {
            return n < 0.5 ? (1 - e(1 - 2 * n)) / 2 : (1 + e(2 * n - 1)) / 2;
        },
    });
});
