/*!
 *
 * Super simple wysiwyg editor v0.8.15
 * https://summernote.org
 *
 *
 * Copyright 2013- Alan Hong. and other contributors
 * summernote may be freely distributed under the MIT license.
 *
 * Date: 2020-01-04T11:44Z
 *
 */
(function webpackUniversalModuleDefinition(root, factory) {
    if (typeof exports === 'object' && typeof module === 'object')
        module.exports = factory();
    else if (typeof define === 'function' && define.amd) define([], factory);
    else {
        var a = factory();
        for (var i in a)
            (typeof exports === 'object' ? exports : root)[i] = a[i];
    }
})(window, function () {
    return /******/ (function (modules) {
        // webpackBootstrap
        /******/ // The module cache
        /******/ var installedModules = {};
        /******/
        /******/ // The require function
        /******/ function __webpack_require__(moduleId) {
            /******/
            /******/ // Check if module is in cache
            /******/ if (installedModules[moduleId]) {
                /******/ return installedModules[moduleId].exports;
                /******/
            }
            /******/ // Create a new module (and put it into the cache)
            /******/ var module = (installedModules[moduleId] = {
                /******/ i: moduleId,
                /******/ l: false,
                /******/ exports: {},
                /******/
            });
            /******/
            /******/ // Execute the module function
            /******/ modules[moduleId].call(
                module.exports,
                module,
                module.exports,
                __webpack_require__
            );
            /******/
            /******/ // Flag the module as loaded
            /******/ module.l = true;
            /******/
            /******/ // Return the exports of the module
            /******/ return module.exports;
            /******/
        }
        /******/
        /******/
        /******/ // expose the modules object (__webpack_modules__)
        /******/ __webpack_require__.m = modules;
        /******/
        /******/ // expose the module cache
        /******/ __webpack_require__.c = installedModules;
        /******/
        /******/ // define getter function for harmony exports
        /******/ __webpack_require__.d = function (exports, name, getter) {
            /******/ if (!__webpack_require__.o(exports, name)) {
                /******/ Object.defineProperty(exports, name, {
                    enumerable: true,
                    get: getter,
                });
                /******/
            }
            /******/
        };
        /******/
        /******/ // define __esModule on exports
        /******/ __webpack_require__.r = function (exports) {
            /******/ if (typeof Symbol !== 'undefined' && Symbol.toStringTag) {
                /******/ Object.defineProperty(exports, Symbol.toStringTag, {
                    value: 'Module',
                });
                /******/
            }
            /******/ Object.defineProperty(exports, '__esModule', {
                value: true,
            });
            /******/
        };
        /******/
        /******/ // create a fake namespace object
        /******/ // mode & 1: value is a module id, require it
        /******/ // mode & 2: merge all properties of value into the ns
        /******/ // mode & 4: return value when already ns object
        /******/ // mode & 8|1: behave like require
        /******/ __webpack_require__.t = function (value, mode) {
            /******/ if (mode & 1) value = __webpack_require__(value);
            /******/ if (mode & 8) return value;
            /******/ if (
                mode & 4 &&
                typeof value === 'object' &&
                value &&
                value.__esModule
            )
                return value;
            /******/ var ns = Object.create(null);
            /******/ __webpack_require__.r(ns);
            /******/ Object.defineProperty(ns, 'default', {
                enumerable: true,
                value: value,
            });
            /******/ if (mode & 2 && typeof value != 'string')
                for (var key in value)
                    __webpack_require__.d(
                        ns,
                        key,
                        function (key) {
                            return value[key];
                        }.bind(null, key)
                    );
            /******/ return ns;
            /******/
        };
        /******/
        /******/ // getDefaultExport function for compatibility with non-harmony modules
        /******/ __webpack_require__.n = function (module) {
            /******/ var getter =
                module && module.__esModule
                    ? /******/ function getDefault() {
                          return module['default'];
                      }
                    : /******/ function getModuleExports() {
                          return module;
                      };
            /******/ __webpack_require__.d(getter, 'a', getter);
            /******/ return getter;
            /******/
        };
        /******/
        /******/ // Object.prototype.hasOwnProperty.call
        /******/ __webpack_require__.o = function (object, property) {
            return Object.prototype.hasOwnProperty.call(object, property);
        };
        /******/
        /******/ // __webpack_public_path__
        /******/ __webpack_require__.p = '';
        /******/
        /******/
        /******/ // Load entry module and return exports
        /******/ return __webpack_require__((__webpack_require__.s = 27));
        /******/
    })(
        /************************************************************************/
        /******/ {
            /***/ 27: /***/ function (module, exports) {
                (function ($) {
                    $.extend($.summernote.lang, {
                        'lt-LT': {
                            font: {
                                bold: 'Paryškintas',
                                italic: 'Kursyvas',
                                underline: 'Pabrėžtas',
                                clear: 'Be formatavimo',
                                height: 'Eilutės aukštis',
                                name: 'Šrifto pavadinimas',
                                strikethrough: 'Perbrauktas',
                                superscript: 'Viršutinis',
                                subscript: 'Indeksas',
                                size: 'Šrifto dydis',
                            },
                            image: {
                                image: 'Paveikslėlis',
                                insert: 'Įterpti paveikslėlį',
                                resizeFull: 'Pilnas dydis',
                                resizeHalf: 'Sumažinti dydį 50%',
                                resizeQuarter: 'Sumažinti dydį 25%',
                                floatLeft: 'Kairinis lygiavimas',
                                floatRight: 'Dešininis lygiavimas',
                                floatNone: 'Jokio lygiavimo',
                                shapeRounded: 'Forma: apvalūs kraštai',
                                shapeCircle: 'Forma: apskritimas',
                                shapeThumbnail: 'Forma: miniatiūra',
                                shapeNone: 'Forma: jokia',
                                dragImageHere: 'Vilkite paveikslėlį čia',
                                dropImage: 'Drop image or Text',
                                selectFromFiles: 'Pasirinkite failą',
                                maximumFileSize: 'Maskimalus failo dydis',
                                maximumFileSizeError:
                                    'Maskimalus failo dydis viršytas!',
                                url: 'Paveikslėlio URL adresas',
                                remove: 'Ištrinti paveikslėlį',
                                original: 'Original',
                            },
                            video: {
                                video: 'Video',
                                videoLink: 'Video Link',
                                insert: 'Insert Video',
                                url: 'Video URL?',
                                providers:
                                    '(YouTube, Vimeo, Vine, Instagram, DailyMotion or Youku)',
                            },
                            link: {
                                link: 'Nuoroda',
                                insert: 'Įterpti nuorodą',
                                unlink: 'Pašalinti nuorodą',
                                edit: 'Redaguoti',
                                textToDisplay: 'Rodomas tekstas',
                                url: 'Koks URL adresas yra susietas?',
                                openInNewWindow: 'Atidaryti naujame lange',
                            },
                            table: {
                                table: 'Lentelė',
                                addRowAbove: 'Add row above',
                                addRowBelow: 'Add row below',
                                addColLeft: 'Add column left',
                                addColRight: 'Add column right',
                                delRow: 'Delete row',
                                delCol: 'Delete column',
                                delTable: 'Delete table',
                            },
                            hr: {
                                insert: 'Įterpti horizontalią liniją',
                            },
                            style: {
                                style: 'Stilius',
                                p: 'pus',
                                blockquote: 'Citata',
                                pre: 'Kodas',
                                h1: 'Antraštė 1',
                                h2: 'Antraštė 2',
                                h3: 'Antraštė 3',
                                h4: 'Antraštė 4',
                                h5: 'Antraštė 5',
                                h6: 'Antraštė 6',
                            },
                            lists: {
                                unordered: 'Suženklintasis sąrašas',
                                ordered: 'Sunumeruotas sąrašas',
                            },
                            options: {
                                help: 'Pagalba',
                                fullscreen: 'Viso ekrano režimas',
                                codeview: 'HTML kodo peržiūra',
                            },
                            paragraph: {
                                paragraph: 'Pastraipa',
                                outdent: 'Sumažinti įtrauką',
                                indent: 'Padidinti įtrauką',
                                left: 'Kairinė lygiuotė',
                                center: 'Centrinė lygiuotė',
                                right: 'Dešininė lygiuotė',
                                justify: 'Abipusis išlyginimas',
                            },
                            color: {
                                recent: 'Paskutinė naudota spalva',
                                more: 'Daugiau spalvų',
                                background: 'Fono spalva',
                                foreground: 'Šrifto spalva',
                                transparent: 'Permatoma',
                                setTransparent:
                                    'Nustatyti skaidrumo intensyvumą',
                                reset: 'Atkurti',
                                resetToDefault: 'Atstatyti numatytąją spalvą',
                            },
                            shortcut: {
                                shortcuts: 'Spartieji klavišai',
                                close: 'Uždaryti',
                                textFormatting: 'Teksto formatavimas',
                                action: 'Veiksmas',
                                paragraphFormatting: 'Pastraipos formatavimas',
                                documentStyle: 'Dokumento stilius',
                                extraKeys: 'Papildomi klavišų deriniai',
                            },
                            help: {
                                insertParagraph: 'Insert Paragraph',
                                undo: 'Undoes the last command',
                                redo: 'Redoes the last command',
                                tab: 'Tab',
                                untab: 'Untab',
                                bold: 'Set a bold style',
                                italic: 'Set a italic style',
                                underline: 'Set a underline style',
                                strikethrough: 'Set a strikethrough style',
                                removeFormat: 'Clean a style',
                                justifyLeft: 'Set left align',
                                justifyCenter: 'Set center align',
                                justifyRight: 'Set right align',
                                justifyFull: 'Set full align',
                                insertUnorderedList: 'Toggle unordered list',
                                insertOrderedList: 'Toggle ordered list',
                                outdent: 'Outdent on current paragraph',
                                indent: 'Indent on current paragraph',
                                formatPara:
                                    "Change current block's format as a paragraph(P tag)",
                                formatH1: "Change current block's format as H1",
                                formatH2: "Change current block's format as H2",
                                formatH3: "Change current block's format as H3",
                                formatH4: "Change current block's format as H4",
                                formatH5: "Change current block's format as H5",
                                formatH6: "Change current block's format as H6",
                                insertHorizontalRule: 'Insert horizontal rule',
                                'linkDialog.show': 'Show Link Dialog',
                            },
                            history: {
                                undo: 'Anuliuoti veiksmą',
                                redo: 'Perdaryti veiksmą',
                            },
                            specialChar: {
                                specialChar: 'SPECIAL CHARACTERS',
                                select: 'Select Special characters',
                            },
                        },
                    });
                })(jQuery);

                /***/
            },

            /******/
        }
    );
});
