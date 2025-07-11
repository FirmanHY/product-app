/*
 * jQuery FlexSlider v2.0
 * Copyright 2012 WooThemes
 * Contributing Author: Tyler Smith
 */
(function (d) {
    d.flexslider = function (h, k) {
        var a = d(h),
            c = d.extend({}, d.flexslider.defaults, k),
            e = c.namespace,
            o =
                'ontouchstart' in window ||
                (window.DocumentTouch && document instanceof DocumentTouch),
            s = o ? 'touchend' : 'click',
            l = 'vertical' === c.direction,
            m = c.reverse,
            i = 0 < c.itemWidth,
            p = 'fade' === c.animation,
            r = '' !== c.asNavFor,
            f = {};
        d.data(h, 'flexslider', a);
        f = {
            init: function () {
                a.animating = !1;
                a.currentSlide = c.startAt;
                a.animatingTo = a.currentSlide;
                a.atEnd = 0 === a.currentSlide || a.currentSlide === a.last;
                a.containerSelector = c.selector.substr(
                    0,
                    c.selector.search(' ')
                );
                a.slides = d(c.selector, a);
                a.container = d(a.containerSelector, a);
                a.count = a.slides.length;
                a.syncExists = 0 < d(c.sync).length;
                'slide' === c.animation && (c.animation = 'swing');
                a.prop = l ? 'top' : 'marginLeft';
                a.args = {};
                a.manualPause = !1;
                a.transitions =
                    !c.video &&
                    !p &&
                    c.useCSS &&
                    (function () {
                        var b = document.createElement('div'),
                            c = [
                                'perspectiveProperty',
                                'WebkitPerspective',
                                'MozPerspective',
                                'OPerspective',
                                'msPerspective',
                            ],
                            d;
                        for (d in c)
                            if (b.style[c[d]] !== void 0) {
                                a.pfx = c[d]
                                    .replace('Perspective', '')
                                    .toLowerCase();
                                a.prop = '-' + a.pfx + '-transform';
                                return true;
                            }
                        return false;
                    })();
                '' !== c.controlsContainer &&
                    (a.controlsContainer =
                        0 < d(c.controlsContainer).length &&
                        d(c.controlsContainer));
                '' !== c.manualControls &&
                    (a.manualControls =
                        0 < d(c.manualControls).length && d(c.manualControls));
                c.randomize &&
                    (a.slides.sort(function () {
                        return Math.round(Math.random()) - 0.5;
                    }),
                    a.container.empty().append(a.slides));
                a.doMath();
                r && f.asNav.setup();
                a.setup('init');
                c.controlNav && f.controlNav.setup();
                c.directionNav && f.directionNav.setup();
                c.keyboard &&
                    (1 === d(a.containerSelector).length ||
                        c.multipleKeyboard) &&
                    d(document).bind('keyup', function (b) {
                        b = b.keyCode;
                        if (!a.animating && (b === 39 || b === 37)) {
                            b =
                                b === 39
                                    ? a.getTarget('next')
                                    : b === 37
                                      ? a.getTarget('prev')
                                      : false;
                            a.flexAnimate(b, c.pauseOnAction);
                        }
                    });
                c.mousewheel &&
                    a.bind('mousewheel', function (b, g) {
                        b.preventDefault();
                        var d =
                            g < 0 ? a.getTarget('next') : a.getTarget('prev');
                        a.flexAnimate(d, c.pauseOnAction);
                    });
                c.pausePlay && f.pausePlay.setup();
                c.slideshow &&
                    (c.pauseOnHover &&
                        a.hover(
                            function () {
                                a.pause();
                            },
                            function () {
                                a.manualPause || a.play();
                            }
                        ),
                    0 < c.initDelay
                        ? setTimeout(a.play, c.initDelay)
                        : a.play());
                o && c.touch && f.touch();
                (!p || (p && c.smoothHeight)) &&
                    d(window).bind('resize focus', f.resize);
                setTimeout(function () {
                    c.start(a);
                }, 200);
            },
            asNav: {
                setup: function () {
                    a.asNav = !0;
                    a.animatingTo = Math.floor(a.currentSlide / a.move);
                    a.currentItem = a.currentSlide;
                    a.slides
                        .removeClass(e + 'active-slide')
                        .eq(a.currentItem)
                        .addClass(e + 'active-slide');
                    a.slides.click(function (b) {
                        b.preventDefault();
                        var b = d(this),
                            g = b.index();
                        !d(c.asNavFor).data('flexslider').animating &&
                            !b.hasClass('active') &&
                            ((a.direction =
                                a.currentItem < g ? 'next' : 'prev'),
                            a.flexAnimate(g, c.pauseOnAction, !1, !0, !0));
                    });
                },
            },
            controlNav: {
                setup: function () {
                    a.manualControls
                        ? f.controlNav.setupManual()
                        : f.controlNav.setupPaging();
                },
                setupPaging: function () {
                    var b = 1,
                        g;
                    a.controlNavScaffold = d(
                        '<ol class="' +
                            e +
                            'control-nav ' +
                            e +
                            ('thumbnails' === c.controlNav
                                ? 'control-thumbs'
                                : 'control-paging') +
                            '"></ol>'
                    );
                    if (1 < a.pagingCount)
                        for (var q = 0; q < a.pagingCount; q++)
                            (g =
                                'thumbnails' === c.controlNav
                                    ? '<img src="' +
                                      a.slides.eq(q).attr('data-thumb') +
                                      '"/>'
                                    : '<a>' + b + '</a>'),
                                a.controlNavScaffold.append(
                                    '<li>' + g + '</li>'
                                ),
                                b++;
                    a.controlsContainer
                        ? d(a.controlsContainer).append(a.controlNavScaffold)
                        : a.append(a.controlNavScaffold);
                    f.controlNav.set();
                    f.controlNav.active();
                    a.controlNavScaffold.delegate('a, img', s, function (b) {
                        b.preventDefault();
                        var b = d(this),
                            g = a.controlNav.index(b);
                        b.hasClass(e + 'active') ||
                            ((a.direction =
                                g > a.currentSlide ? 'next' : 'prev'),
                            a.flexAnimate(g, c.pauseOnAction));
                    });
                    o &&
                        a.controlNavScaffold.delegate(
                            'a',
                            'click touchstart',
                            function (a) {
                                a.preventDefault();
                            }
                        );
                },
                setupManual: function () {
                    a.controlNav = a.manualControls;
                    f.controlNav.active();
                    a.controlNav.live(s, function (b) {
                        b.preventDefault();
                        var b = d(this),
                            g = a.controlNav.index(b);
                        b.hasClass(e + 'active') ||
                            (g > a.currentSlide
                                ? (a.direction = 'next')
                                : (a.direction = 'prev'),
                            a.flexAnimate(g, c.pauseOnAction));
                    });
                    o &&
                        a.controlNav.live('click touchstart', function (a) {
                            a.preventDefault();
                        });
                },
                set: function () {
                    a.controlNav = d(
                        '.' +
                            e +
                            'control-nav li ' +
                            ('thumbnails' === c.controlNav ? 'img' : 'a'),
                        a.controlsContainer ? a.controlsContainer : a
                    );
                },
                active: function () {
                    a.controlNav
                        .removeClass(e + 'active')
                        .eq(a.animatingTo)
                        .addClass(e + 'active');
                },
                update: function (b, c) {
                    1 < a.pagingCount && 'add' === b
                        ? a.controlNavScaffold.append(
                              d('<li><a>' + a.count + '</a></li>')
                          )
                        : 1 === a.pagingCount
                          ? a.controlNavScaffold.find('li').remove()
                          : a.controlNav.eq(c).closest('li').remove();
                    f.controlNav.set();
                    1 < a.pagingCount && a.pagingCount !== a.controlNav.length
                        ? a.update(c, b)
                        : f.controlNav.active();
                },
            },
            directionNav: {
                setup: function () {
                    var b = d(
                        '<ul class="' +
                            e +
                            'direction-nav"><li><a class="' +
                            e +
                            'prev" href="#">' +
                            c.prevText +
                            '</a></li><li><a class="' +
                            e +
                            'next" href="#">' +
                            c.nextText +
                            '</a></li></ul>'
                    );
                    a.controlsContainer
                        ? (d(a.controlsContainer).append(b),
                          (a.directionNav = d(
                              '.' + e + 'direction-nav li a',
                              a.controlsContainer
                          )))
                        : (a.append(b),
                          (a.directionNav = d(
                              '.' + e + 'direction-nav li a',
                              a
                          )));
                    f.directionNav.update();
                    a.directionNav.bind(s, function (b) {
                        b.preventDefault();
                        b = d(this).hasClass(e + 'next')
                            ? a.getTarget('next')
                            : a.getTarget('prev');
                        a.flexAnimate(b, c.pauseOnAction);
                    });
                    o &&
                        a.directionNav.bind('click touchstart', function (a) {
                            a.preventDefault();
                        });
                },
                update: function () {
                    var b = e + 'disabled';
                    c.animationLoop ||
                        (1 === a.pagingCount
                            ? a.directionNav.addClass(b)
                            : 0 === a.animatingTo
                              ? a.directionNav
                                    .removeClass(b)
                                    .filter('.' + e + 'prev')
                                    .addClass(b)
                              : a.animatingTo === a.last
                                ? a.directionNav
                                      .removeClass(b)
                                      .filter('.' + e + 'next')
                                      .addClass(b)
                                : a.directionNav.removeClass(b));
                },
            },
            pausePlay: {
                setup: function () {
                    var b = d('<div class="' + e + 'pauseplay"><a></a></div>');
                    a.controlsContainer
                        ? (a.controlsContainer.append(b),
                          (a.pausePlay = d(
                              '.' + e + 'pauseplay a',
                              a.controlsContainer
                          )))
                        : (a.append(b),
                          (a.pausePlay = d('.' + e + 'pauseplay a', a)));
                    f.pausePlay.update(c.slideshow ? e + 'pause' : e + 'play');
                    a.pausePlay.bind(s, function (b) {
                        b.preventDefault();
                        if (d(this).hasClass(e + 'pause')) {
                            a.pause();
                            a.manualPause = true;
                        } else {
                            a.play();
                            a.manualPause = false;
                        }
                    });
                    o &&
                        a.pausePlay.bind('click touchstart', function (a) {
                            a.preventDefault();
                        });
                },
                update: function (b) {
                    'play' === b
                        ? a.pausePlay
                              .removeClass(e + 'pause')
                              .addClass(e + 'play')
                              .text(c.playText)
                        : a.pausePlay
                              .removeClass(e + 'play')
                              .addClass(e + 'pause')
                              .text(c.pauseText);
                },
            },
            touch: function () {
                function b(b) {
                    j = l ? d - b.touches[0].pageY : d - b.touches[0].pageX;
                    o = l
                        ? Math.abs(j) < Math.abs(b.touches[0].pageX - e)
                        : Math.abs(j) < Math.abs(b.touches[0].pageY - e);
                    if (!o || 500 < Number(new Date()) - k)
                        b.preventDefault(),
                            !p &&
                                a.transitions &&
                                (c.animationLoop ||
                                    (j /=
                                        (0 === a.currentSlide && 0 > j) ||
                                        (a.currentSlide === a.last && 0 < j)
                                            ? Math.abs(j) / n + 2
                                            : 1),
                                a.setProps(f + j, 'setTouch'));
                }
                function g() {
                    if (a.animatingTo === a.currentSlide && !o && null !== j) {
                        var i = m ? -j : j,
                            l =
                                0 < i
                                    ? a.getTarget('next')
                                    : a.getTarget('prev');
                        a.canAdvance(l) &&
                        ((550 > Number(new Date()) - k && 20 < Math.abs(i)) ||
                            Math.abs(i) > n / 2)
                            ? a.flexAnimate(l, c.pauseOnAction)
                            : a.flexAnimate(
                                  a.currentSlide,
                                  c.pauseOnAction,
                                  !0
                              );
                    }
                    h.removeEventListener('touchmove', b, !1);
                    h.removeEventListener('touchend', g, !1);
                    f = j = e = d = null;
                }
                var d,
                    e,
                    f,
                    n,
                    j,
                    k,
                    o = !1;
                h.addEventListener(
                    'touchstart',
                    function (j) {
                        a.animating
                            ? j.preventDefault()
                            : 1 === j.touches.length &&
                              (a.pause(),
                              (n = l ? a.h : a.w),
                              (k = Number(new Date())),
                              (f =
                                  i && m && a.animatingTo === a.last
                                      ? 0
                                      : i && m
                                        ? a.limit -
                                          (a.itemW + c.itemMargin) *
                                              a.move *
                                              a.animatingTo
                                        : i && a.currentSlide === a.last
                                          ? a.limit
                                          : i
                                            ? (a.itemW + c.itemMargin) *
                                              a.move *
                                              a.currentSlide
                                            : m
                                              ? (a.last -
                                                    a.currentSlide +
                                                    a.cloneOffset) *
                                                n
                                              : (a.currentSlide +
                                                    a.cloneOffset) *
                                                n),
                              (d = l ? j.touches[0].pageY : j.touches[0].pageX),
                              (e = l ? j.touches[0].pageX : j.touches[0].pageY),
                              h.addEventListener('touchmove', b, !1),
                              h.addEventListener('touchend', g, !1));
                    },
                    !1
                );
            },
            resize: function () {
                !a.animating &&
                    a.is(':visible') &&
                    (i || a.doMath(),
                    p
                        ? f.smoothHeight()
                        : i
                          ? (a.slides.width(a.computedW),
                            a.update(a.pagingCount),
                            a.setProps())
                          : l
                            ? (a.viewport.height(a.h),
                              a.setProps(a.h, 'setTotal'))
                            : (c.smoothHeight && f.smoothHeight(),
                              a.newSlides.width(a.computedW),
                              a.setProps(a.computedW, 'setTotal')));
            },
            smoothHeight: function (b) {
                if (!l || p) {
                    var c = p ? a : a.viewport;
                    b
                        ? c.animate(
                              { height: a.slides.eq(a.animatingTo).height() },
                              b
                          )
                        : c.height(a.slides.eq(a.animatingTo).height());
                }
            },
            sync: function (b) {
                var g = d(c.sync).data('flexslider'),
                    e = a.animatingTo;
                switch (b) {
                    case 'animate':
                        g.flexAnimate(e, c.pauseOnAction, !1, !0);
                        break;
                    case 'play':
                        !g.playing && !g.asNav && g.play();
                        break;
                    case 'pause':
                        g.pause();
                }
            },
        };
        a.flexAnimate = function (b, g, q, h, k) {
            if (!a.animating && (a.canAdvance(b) || q) && a.is(':visible')) {
                if (r && h)
                    if (
                        ((q = d(c.asNavFor).data('flexslider')),
                        (a.atEnd = 0 === b || b === a.count - 1),
                        q.flexAnimate(b, !0, !1, !0, k),
                        (a.direction = a.currentItem < b ? 'next' : 'prev'),
                        (q.direction = a.direction),
                        Math.ceil((b + 1) / a.visible) - 1 !== a.currentSlide &&
                            0 !== b)
                    )
                        (a.currentItem = b),
                            a.slides
                                .removeClass(e + 'active-slide')
                                .eq(b)
                                .addClass(e + 'active-slide'),
                            (b = Math.floor(b / a.visible));
                    else
                        return (
                            (a.currentItem = b),
                            a.slides
                                .removeClass(e + 'active-slide')
                                .eq(b)
                                .addClass(e + 'active-slide'),
                            !1
                        );
                a.animating = !0;
                a.animatingTo = b;
                c.before(a);
                g && a.pause();
                a.syncExists && !k && f.sync('animate');
                c.controlNav && f.controlNav.active();
                i ||
                    a.slides
                        .removeClass(e + 'active-slide')
                        .eq(b)
                        .addClass(e + 'active-slide');
                a.atEnd = 0 === b || b === a.last;
                c.directionNav && f.directionNav.update();
                b === a.last && (c.end(a), c.animationLoop || a.pause());
                if (p)
                    a.slides
                        .eq(a.currentSlide)
                        .fadeOut(c.animationSpeed, c.easing),
                        a.slides
                            .eq(b)
                            .fadeIn(c.animationSpeed, c.easing, a.wrapup);
                else {
                    var n = l
                        ? a.slides.filter(':first').height()
                        : a.computedW;
                    i
                        ? ((b =
                              c.itemWidth > a.w
                                  ? 2 * c.itemMargin
                                  : c.itemMargin),
                          (b = (a.itemW + b) * a.move * a.animatingTo),
                          (b = b > a.limit && 1 !== a.visible ? a.limit : b))
                        : (b =
                              0 === a.currentSlide &&
                              b === a.count - 1 &&
                              c.animationLoop &&
                              'next' !== a.direction
                                  ? m
                                      ? (a.count + a.cloneOffset) * n
                                      : 0
                                  : a.currentSlide === a.last &&
                                      0 === b &&
                                      c.animationLoop &&
                                      'prev' !== a.direction
                                    ? m
                                        ? 0
                                        : (a.count + 1) * n
                                    : m
                                      ? (a.count - 1 - b + a.cloneOffset) * n
                                      : (b + a.cloneOffset) * n);
                    a.setProps(b, '', c.animationSpeed);
                    if (a.transitions) {
                        if (!c.animationLoop || !a.atEnd)
                            (a.animating = !1),
                                (a.currentSlide = a.animatingTo);
                        a.container.unbind('webkitTransitionEnd transitionend');
                        a.container.bind(
                            'webkitTransitionEnd transitionend',
                            function () {
                                a.wrapup(n);
                            }
                        );
                    } else
                        a.container.animate(
                            a.args,
                            c.animationSpeed,
                            c.easing,
                            function () {
                                a.wrapup(n);
                            }
                        );
                }
                c.smoothHeight && f.smoothHeight(c.animationSpeed);
            }
        };
        a.wrapup = function (b) {
            !p &&
                !i &&
                (0 === a.currentSlide &&
                a.animatingTo === a.last &&
                c.animationLoop
                    ? a.setProps(b, 'jumpEnd')
                    : a.currentSlide === a.last &&
                      0 === a.animatingTo &&
                      c.animationLoop &&
                      a.setProps(b, 'jumpStart'));
            a.animating = !1;
            a.currentSlide = a.animatingTo;
            c.after(a);
        };
        a.animateSlides = function () {
            a.animating || a.flexAnimate(a.getTarget('next'));
        };
        a.pause = function () {
            clearInterval(a.animatedSlides);
            a.playing = !1;
            c.pausePlay && f.pausePlay.update('play');
            a.syncExists && f.sync('pause');
        };
        a.play = function () {
            a.animatedSlides = setInterval(a.animateSlides, c.slideshowSpeed);
            a.playing = !0;
            c.pausePlay && f.pausePlay.update('pause');
            a.syncExists && f.sync('play');
        };
        a.canAdvance = function (b) {
            var d = r ? a.pagingCount - 1 : a.last;
            return r &&
                0 === a.currentItem &&
                b === a.pagingCount - 1 &&
                'next' !== a.direction
                ? !1
                : b === a.currentSlide && !r
                  ? !1
                  : c.animationLoop
                    ? !0
                    : a.atEnd &&
                        0 === a.currentSlide &&
                        b === d &&
                        'next' !== a.direction
                      ? !1
                      : a.atEnd &&
                          a.currentSlide === d &&
                          0 === b &&
                          'next' === a.direction
                        ? !1
                        : !0;
        };
        a.getTarget = function (b) {
            a.direction = b;
            return 'next' === b
                ? a.currentSlide === a.last
                    ? 0
                    : a.currentSlide + 1
                : 0 === a.currentSlide
                  ? a.last
                  : a.currentSlide - 1;
        };
        a.setProps = function (b, d, e) {
            var f = (function () {
                var e = b
                    ? b
                    : (a.itemW + c.itemMargin) * a.move * a.animatingTo;
                return (
                    -1 *
                        (function () {
                            if (i)
                                return 'setTouch' === d
                                    ? b
                                    : m && a.animatingTo === a.last
                                      ? 0
                                      : m
                                        ? a.limit -
                                          (a.itemW + c.itemMargin) *
                                              a.move *
                                              a.animatingTo
                                        : a.animatingTo === a.last
                                          ? a.limit
                                          : e;
                            switch (d) {
                                case 'setTotal':
                                    return m
                                        ? (a.count -
                                              1 -
                                              a.currentSlide +
                                              a.cloneOffset) *
                                              b
                                        : (a.currentSlide + a.cloneOffset) * b;
                                case 'setTouch':
                                    return b;
                                case 'jumpEnd':
                                    return m ? b : a.count * b;
                                case 'jumpStart':
                                    return m ? a.count * b : b;
                                default:
                                    return b;
                            }
                        })() +
                    'px'
                );
            })();
            a.transitions &&
                ((f = l
                    ? 'translate3d(0,' + f + ',0)'
                    : 'translate3d(' + f + ',0,0)'),
                (e = void 0 !== e ? e / 1e3 + 's' : '0s'),
                a.container.css('-' + a.pfx + '-transition-duration', e));
            a.args[a.prop] = f;
            (a.transitions || void 0 === e) && a.container.css(a.args);
        };
        a.setup = function (b) {
            if (p)
                a.slides.css({
                    width: '100%',
                    float: 'left',
                    marginRight: '-100%',
                    position: 'relative',
                }),
                    'init' === b &&
                        a.slides
                            .eq(a.currentSlide)
                            .fadeIn(c.animationSpeed, c.easing),
                    c.smoothHeight && f.smoothHeight();
            else {
                var g, h;
                'init' === b &&
                    ((a.viewport = d('<div class="flex-viewport"></div>')
                        .css({ overflow: 'hidden', position: 'relative' })
                        .appendTo(a)
                        .append(a.container)),
                    (a.cloneCount = 0),
                    (a.cloneOffset = 0),
                    m &&
                        ((h = d.makeArray(a.slides).reverse()),
                        (a.slides = d(h)),
                        a.container.empty().append(a.slides)));
                c.animationLoop &&
                    !i &&
                    ((a.cloneCount = 2),
                    (a.cloneOffset = 1),
                    'init' !== b && a.container.find('.clone').remove(),
                    a.container
                        .append(a.slides.first().clone().addClass('clone'))
                        .prepend(a.slides.last().clone().addClass('clone')));
                a.newSlides = d(c.selector, a);
                g = m
                    ? a.count - 1 - a.currentSlide + a.cloneOffset
                    : a.currentSlide + a.cloneOffset;
                l && !i
                    ? (a.container
                          .height(200 * (a.count + a.cloneCount) + '%')
                          .css('position', 'absolute')
                          .width('100%'),
                      setTimeout(
                          function () {
                              a.newSlides.css({ display: 'block' });
                              a.doMath();
                              a.viewport.height(a.h);
                              a.setProps(g * a.h, 'init');
                          },
                          'init' === b ? 100 : 0
                      ))
                    : (a.container.width(200 * (a.count + a.cloneCount) + '%'),
                      a.setProps(g * a.computedW, 'init'),
                      setTimeout(
                          function () {
                              a.doMath();
                              a.newSlides.css({
                                  width: a.computedW,
                                  float: 'left',
                                  display: 'block',
                              });
                              c.smoothHeight && f.smoothHeight();
                          },
                          'init' === b ? 100 : 0
                      ));
            }
            i ||
                a.slides
                    .removeClass(e + 'active-slide')
                    .eq(a.currentSlide)
                    .addClass(e + 'active-slide');
        };
        a.doMath = function () {
            var b = a.slides.first(),
                d = c.itemMargin,
                e = c.minItems,
                f = c.maxItems;
            a.w = a.width();
            a.h = b.height();
            a.boxPadding = b.outerWidth() - b.width();
            i
                ? ((a.itemT = c.itemWidth + d),
                  (a.minW = e ? e * a.itemT : a.w),
                  (a.maxW = f ? f * a.itemT : a.w),
                  (a.itemW =
                      a.minW > a.w
                          ? (a.w - d * e) / e
                          : a.maxW < a.w
                            ? (a.w - d * f) / f
                            : c.itemWidth > a.w
                              ? a.w
                              : c.itemWidth),
                  (a.visible = Math.floor(a.w / (a.itemW + d))),
                  (a.move =
                      0 < c.move && c.move < a.visible ? c.move : a.visible),
                  (a.pagingCount = Math.ceil(
                      (a.count - a.visible) / a.move + 1
                  )),
                  (a.last = a.pagingCount - 1),
                  (a.limit =
                      1 === a.pagingCount
                          ? 0
                          : c.itemWidth > a.w
                            ? (a.itemW + 2 * d) * a.count - a.w - d
                            : (a.itemW + d) * a.count - a.w))
                : ((a.itemW = a.w),
                  (a.pagingCount = a.count),
                  (a.last = a.count - 1));
            a.computedW = a.itemW - a.boxPadding;
        };
        a.update = function (b, d) {
            a.doMath();
            i ||
                (b < a.currentSlide
                    ? (a.currentSlide += 1)
                    : b <= a.currentSlide && 0 !== b && (a.currentSlide -= 1),
                (a.animatingTo = a.currentSlide));
            if (c.controlNav && !a.manualControls)
                if (('add' === d && !i) || a.pagingCount > a.controlNav.length)
                    f.controlNav.update('add');
                else if (
                    ('remove' === d && !i) ||
                    a.pagingCount < a.controlNav.length
                )
                    i &&
                        a.currentSlide > a.last &&
                        ((a.currentSlide -= 1), (a.animatingTo -= 1)),
                        f.controlNav.update('remove', a.last);
            c.directionNav && f.directionNav.update();
        };
        a.addSlide = function (b, e) {
            var f = d(b);
            a.count += 1;
            a.last = a.count - 1;
            l && m
                ? void 0 !== e
                    ? a.slides.eq(a.count - e).after(f)
                    : a.container.prepend(f)
                : void 0 !== e
                  ? a.slides.eq(e).before(f)
                  : a.container.append(f);
            a.update(e, 'add');
            a.slides = d(c.selector + ':not(.clone)', a);
            a.setup();
            c.added(a);
        };
        a.removeSlide = function (b) {
            var e = isNaN(b) ? a.slides.index(d(b)) : b;
            a.count -= 1;
            a.last = a.count - 1;
            isNaN(b)
                ? d(b, a.slides).remove()
                : l && m
                  ? a.slides.eq(a.last).remove()
                  : a.slides.eq(b).remove();
            a.doMath();
            a.update(e, 'remove');
            a.slides = d(c.selector + ':not(.clone)', a);
            a.setup();
            c.removed(a);
        };
        f.init();
    };
    d.flexslider.defaults = {
        namespace: 'flex-',
        selector: '.slides > li',
        animation: 'fade',
        easing: 'swing',
        direction: 'horizontal',
        reverse: !1,
        animationLoop: !0,
        smoothHeight: !1,
        startAt: 0,
        slideshow: !0,
        slideshowSpeed: 7e3,
        animationSpeed: 600,
        initDelay: 0,
        randomize: !1,
        pauseOnAction: !0,
        pauseOnHover: !1,
        useCSS: !0,
        touch: !0,
        video: !1,
        controlNav: !0,
        directionNav: !0,
        prevText: '',
        nextText: '',
        keyboard: !0,
        multipleKeyboard: !1,
        mousewheel: !1,
        pausePlay: !1,
        pauseText: 'Pause',
        playText: 'Play',
        controlsContainer: '',
        manualControls: '',
        sync: '',
        asNavFor: '',
        itemWidth: 0,
        itemMargin: 0,
        minItems: 0,
        maxItems: 0,
        move: 0,
        start: function () {},
        before: function () {},
        after: function () {},
        end: function () {},
        added: function () {},
        removed: function () {},
    };
    d.fn.flexslider = function (h) {
        h = h || {};
        if ('object' === typeof h)
            return this.each(function () {
                var a = d(this),
                    c = a.find(h.selector ? h.selector : '.slides > li');
                1 === c.length
                    ? (c.fadeIn(400), h.start && h.start(a))
                    : void 0 === a.data('flexslider') &&
                      new d.flexslider(this, h);
            });
        var k = d(this).data('flexslider');
        switch (h) {
            case 'play':
                k.play();
                break;
            case 'pause':
                k.pause();
                break;
            case 'next':
                k.flexAnimate(k.getTarget('next'), !0);
                break;
            case 'prev':
            case 'previous':
                k.flexAnimate(k.getTarget('prev'), !0);
                break;
            default:
                'number' === typeof h && k.flexAnimate(h, !0);
        }
    };
})(jQuery);
