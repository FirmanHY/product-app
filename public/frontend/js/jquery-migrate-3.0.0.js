/*! jQuery Migrate v3.0.0 | (c) jQuery Foundation and other contributors | jquery.org/license */
'undefined' == typeof jQuery.migrateMute && (jQuery.migrateMute = !0),
    (function (a, b) {
        'use strict';
        function c(c) {
            var d = b.console;
            e[c] ||
                ((e[c] = !0),
                a.migrateWarnings.push(c),
                d &&
                    d.warn &&
                    !a.migrateMute &&
                    (d.warn('JQMIGRATE: ' + c),
                    a.migrateTrace && d.trace && d.trace()));
        }
        function d(a, b, d, e) {
            Object.defineProperty(a, b, {
                configurable: !0,
                enumerable: !0,
                get: function () {
                    return c(e), d;
                },
            });
        }
        (a.migrateVersion = '3.0.0'),
            (function () {
                var c =
                        b.console &&
                        b.console.log &&
                        function () {
                            b.console.log.apply(b.console, arguments);
                        },
                    d = /^[12]\./;
                c &&
                    ((a && !d.test(a.fn.jquery)) ||
                        c('JQMIGRATE: jQuery 3.0.0+ REQUIRED'),
                    a.migrateWarnings &&
                        c('JQMIGRATE: Migrate plugin loaded multiple times'),
                    c(
                        'JQMIGRATE: Migrate is installed' +
                            (a.migrateMute ? '' : ' with logging active') +
                            ', version ' +
                            a.migrateVersion
                    ));
            })();
        var e = {};
        (a.migrateWarnings = []),
            void 0 === a.migrateTrace && (a.migrateTrace = !0),
            (a.migrateReset = function () {
                (e = {}), (a.migrateWarnings.length = 0);
            }),
            'BackCompat' === document.compatMode &&
                c('jQuery is not compatible with Quirks Mode');
        var f = a.fn.init,
            g = a.isNumeric,
            h = a.find,
            i = /\[(\s*[-\w]+\s*)([~|^$*]?=)\s*([-\w#]*?#[-\w#]*)\s*\]/,
            j = /\[(\s*[-\w]+\s*)([~|^$*]?=)\s*([-\w#]*?#[-\w#]*)\s*\]/g;
        (a.fn.init = function (a) {
            var b = Array.prototype.slice.call(arguments);
            return (
                'string' == typeof a &&
                    '#' === a &&
                    (c("jQuery( '#' ) is not a valid selector"), (b[0] = [])),
                f.apply(this, b)
            );
        }),
            (a.fn.init.prototype = a.fn),
            (a.find = function (a) {
                var b = Array.prototype.slice.call(arguments);
                if ('string' == typeof a && i.test(a))
                    try {
                        document.querySelector(a);
                    } catch (d) {
                        a = a.replace(j, function (a, b, c, d) {
                            return '[' + b + c + '"' + d + '"]';
                        });
                        try {
                            document.querySelector(a),
                                c(
                                    "Attribute selector with '#' must be quoted: " +
                                        b[0]
                                ),
                                (b[0] = a);
                        } catch (e) {
                            c(
                                "Attribute selector with '#' was not fixed: " +
                                    b[0]
                            );
                        }
                    }
                return h.apply(this, b);
            });
        var k;
        for (k in h)
            Object.prototype.hasOwnProperty.call(h, k) && (a.find[k] = h[k]);
        (a.fn.size = function () {
            return (
                c('jQuery.fn.size() is deprecated; use the .length property'),
                this.length
            );
        }),
            (a.parseJSON = function () {
                return (
                    c('jQuery.parseJSON is deprecated; use JSON.parse'),
                    JSON.parse.apply(null, arguments)
                );
            }),
            (a.isNumeric = function (b) {
                function d(b) {
                    var c = b && b.toString();
                    return !a.isArray(b) && c - parseFloat(c) + 1 >= 0;
                }
                var e = g(b),
                    f = d(b);
                return (
                    e !== f &&
                        c(
                            'jQuery.isNumeric() should not be called on constructed objects'
                        ),
                    f
                );
            }),
            d(
                a,
                'unique',
                a.uniqueSort,
                'jQuery.unique is deprecated, use jQuery.uniqueSort'
            ),
            d(
                a.expr,
                'filters',
                a.expr.pseudos,
                'jQuery.expr.filters is now jQuery.expr.pseudos'
            ),
            d(
                a.expr,
                ':',
                a.expr.pseudos,
                'jQuery.expr[":"] is now jQuery.expr.pseudos'
            );
        var l = a.ajax;
        a.ajax = function () {
            var a = l.apply(this, arguments);
            return (
                a.promise &&
                    (d(
                        a,
                        'success',
                        a.done,
                        'jQXHR.success is deprecated and removed'
                    ),
                    d(
                        a,
                        'error',
                        a.fail,
                        'jQXHR.error is deprecated and removed'
                    ),
                    d(
                        a,
                        'complete',
                        a.always,
                        'jQXHR.complete is deprecated and removed'
                    )),
                a
            );
        };
        var m = a.fn.removeAttr,
            n = a.fn.toggleClass,
            o = /\S+/g;
        (a.fn.removeAttr = function (b) {
            var d = this;
            return (
                a.each(b.match(o), function (b, e) {
                    a.expr.match.bool.test(e) &&
                        (c(
                            'jQuery.fn.removeAttr no longer sets boolean properties: ' +
                                e
                        ),
                        d.prop(e, !1));
                }),
                m.apply(this, arguments)
            );
        }),
            (a.fn.toggleClass = function (b) {
                return void 0 !== b && 'boolean' != typeof b
                    ? n.apply(this, arguments)
                    : (c('jQuery.fn.toggleClass( boolean ) is deprecated'),
                      this.each(function () {
                          var c =
                              (this.getAttribute &&
                                  this.getAttribute('class')) ||
                              '';
                          c && a.data(this, '__className__', c),
                              this.setAttribute &&
                                  this.setAttribute(
                                      'class',
                                      c || b === !1
                                          ? ''
                                          : a.data(this, '__className__') || ''
                                  );
                      }));
            });
        var p = !1;
        a.swap &&
            a.each(['height', 'width', 'reliableMarginRight'], function (b, c) {
                var d = a.cssHooks[c] && a.cssHooks[c].get;
                d &&
                    (a.cssHooks[c].get = function () {
                        var a;
                        return (
                            (p = !0),
                            (a = d.apply(this, arguments)),
                            (p = !1),
                            a
                        );
                    });
            }),
            (a.swap = function (a, b, d, e) {
                var f,
                    g,
                    h = {};
                p || c('jQuery.swap() is undocumented and deprecated');
                for (g in b) (h[g] = a.style[g]), (a.style[g] = b[g]);
                f = d.apply(a, e || []);
                for (g in b) a.style[g] = h[g];
                return f;
            });
        var q = a.data;
        a.data = function (b, d, e) {
            var f;
            return d &&
                d !== a.camelCase(d) &&
                ((f = a.hasData(b) && q.call(this, b)), f && d in f)
                ? (c('jQuery.data() always sets/gets camelCased names: ' + d),
                  arguments.length > 2 && (f[d] = e),
                  f[d])
                : q.apply(this, arguments);
        };
        var r = a.Tween.prototype.run;
        a.Tween.prototype.run = function (b) {
            a.easing[this.easing].length > 1 &&
                (c(
                    'easing function "jQuery.easing.' +
                        this.easing.toString() +
                        '" should use only first argument'
                ),
                (a.easing[this.easing] = a.easing[this.easing].bind(
                    a.easing,
                    b,
                    this.options.duration * b,
                    0,
                    1,
                    this.options.duration
                ))),
                r.apply(this, arguments);
        };
        var s = a.fn.load,
            t = a.event.fix;
        (a.event.props = []),
            (a.event.fixHooks = {}),
            (a.event.fix = function (b) {
                var d,
                    e = b.type,
                    f = this.fixHooks[e],
                    g = a.event.props;
                if (g.length)
                    for (
                        c(
                            'jQuery.event.props are deprecated and removed: ' +
                                g.join()
                        );
                        g.length;

                    )
                        a.event.addProp(g.pop());
                if (
                    f &&
                    !f._migrated_ &&
                    ((f._migrated_ = !0),
                    c('jQuery.event.fixHooks are deprecated and removed: ' + e),
                    (g = f.props) && g.length)
                )
                    for (; g.length; ) a.event.addProp(g.pop());
                return (
                    (d = t.call(this, b)), f && f.filter ? f.filter(d, b) : d
                );
            }),
            a.each(['load', 'unload', 'error'], function (b, d) {
                a.fn[d] = function () {
                    var a = Array.prototype.slice.call(arguments, 0);
                    return 'load' === d && 'string' == typeof a[0]
                        ? s.apply(this, a)
                        : (c('jQuery.fn.' + d + '() is deprecated'),
                          a.splice(0, 0, d),
                          arguments.length
                              ? this.on.apply(this, a)
                              : (this.triggerHandler.apply(this, a), this));
                };
            }),
            a(function () {
                a(document).triggerHandler('ready');
            }),
            (a.event.special.ready = {
                setup: function () {
                    this === document && c("'ready' event is deprecated");
                },
            }),
            a.fn.extend({
                bind: function (a, b, d) {
                    return (
                        c('jQuery.fn.bind() is deprecated'),
                        this.on(a, null, b, d)
                    );
                },
                unbind: function (a, b) {
                    return (
                        c('jQuery.fn.unbind() is deprecated'),
                        this.off(a, null, b)
                    );
                },
                delegate: function (a, b, d, e) {
                    return (
                        c('jQuery.fn.delegate() is deprecated'),
                        this.on(b, a, d, e)
                    );
                },
                undelegate: function (a, b, d) {
                    return (
                        c('jQuery.fn.undelegate() is deprecated'),
                        1 === arguments.length
                            ? this.off(a, '**')
                            : this.off(b, a || '**', d)
                    );
                },
            });
        var u = a.fn.offset;
        a.fn.offset = function () {
            var b,
                d = this[0],
                e = { top: 0, left: 0 };
            return d && d.nodeType
                ? ((b = (d.ownerDocument || document).documentElement),
                  a.contains(b, d)
                      ? u.apply(this, arguments)
                      : (c(
                            'jQuery.fn.offset() requires an element connected to a document'
                        ),
                        e))
                : (c('jQuery.fn.offset() requires a valid DOM element'), e);
        };
        var v = a.param;
        a.param = function (b, d) {
            var e = a.ajaxSettings && a.ajaxSettings.traditional;
            return (
                void 0 === d &&
                    e &&
                    (c(
                        'jQuery.param() no longer uses jQuery.ajaxSettings.traditional'
                    ),
                    (d = e)),
                v.call(this, b, d)
            );
        };
        var w = a.fn.andSelf || a.fn.addBack;
        a.fn.andSelf = function () {
            return (
                c('jQuery.fn.andSelf() replaced by jQuery.fn.addBack()'),
                w.apply(this, arguments)
            );
        };
        var x = a.Deferred,
            y = [
                [
                    'resolve',
                    'done',
                    a.Callbacks('once memory'),
                    a.Callbacks('once memory'),
                    'resolved',
                ],
                [
                    'reject',
                    'fail',
                    a.Callbacks('once memory'),
                    a.Callbacks('once memory'),
                    'rejected',
                ],
                [
                    'notify',
                    'progress',
                    a.Callbacks('memory'),
                    a.Callbacks('memory'),
                ],
            ];
        a.Deferred = function (b) {
            var d = x(),
                e = d.promise();
            return (
                (d.pipe = e.pipe =
                    function () {
                        var b = arguments;
                        return (
                            c('deferred.pipe() is deprecated'),
                            a
                                .Deferred(function (c) {
                                    a.each(y, function (f, g) {
                                        var h = a.isFunction(b[f]) && b[f];
                                        d[g[1]](function () {
                                            var b =
                                                h && h.apply(this, arguments);
                                            b && a.isFunction(b.promise)
                                                ? b
                                                      .promise()
                                                      .done(c.resolve)
                                                      .fail(c.reject)
                                                      .progress(c.notify)
                                                : c[g[0] + 'With'](
                                                      this === e
                                                          ? c.promise()
                                                          : this,
                                                      h ? [b] : arguments
                                                  );
                                        });
                                    }),
                                        (b = null);
                                })
                                .promise()
                        );
                    }),
                b && b.call(d, d),
                d
            );
        };
    })(jQuery, window);
