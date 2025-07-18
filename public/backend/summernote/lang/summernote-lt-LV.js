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
        /******/ return __webpack_require__((__webpack_require__.s = 28));
        /******/
    })(
        /************************************************************************/
        /******/ {
            /***/ 28: /***/ function (module, exports) {
                (function ($) {
                    $.extend($.summernote.lang, {
                        'lv-LV': {
                            font: {
                                bold: 'Treknraksts',
                                italic: 'Kursīvs',
                                underline: 'Pasvītrots',
                                clear: 'Noņemt formatējumu',
                                height: 'Līnijas augstums',
                                name: 'Fonts',
                                strikethrough: 'Nosvītrots',
                                superscript: 'Augšraksts',
                                subscript: 'Apakšraksts',
                                size: 'Fonta lielums',
                            },
                            image: {
                                image: 'Attēls',
                                insert: 'Ievietot attēlu',
                                resizeFull: 'Pilns izmērts',
                                resizeHalf: 'Samazināt 50%',
                                resizeQuarter: 'Samazināt 25%',
                                floatLeft: 'Līdzināt pa kreisi',
                                floatRight: 'Līdzināt pa labi',
                                floatNone: 'Nelīdzināt',
                                shapeRounded: 'Forma: apaļām malām',
                                shapeCircle: 'Forma: aplis',
                                shapeThumbnail: 'Forma: rāmītis',
                                shapeNone: 'Forma: orģināla',
                                dragImageHere: 'Ievēlciet attēlu šeit',
                                dropImage: 'Drop image or Text',
                                selectFromFiles: 'Izvēlēties failu',
                                maximumFileSize: 'Maksimālais faila izmērs',
                                maximumFileSizeError:
                                    'Faila izmērs pārāk liels!',
                                url: 'Attēla URL',
                                remove: 'Dzēst attēlu',
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
                                link: 'Saite',
                                insert: 'Ievietot saiti',
                                unlink: 'Noņemt saiti',
                                edit: 'Rediģēt',
                                textToDisplay: 'Saites saturs',
                                url: 'Koks URL adresas yra susietas?',
                                openInNewWindow: 'Atvērt jaunā logā',
                            },
                            table: {
                                table: 'Tabula',
                                addRowAbove: 'Add row above',
                                addRowBelow: 'Add row below',
                                addColLeft: 'Add column left',
                                addColRight: 'Add column right',
                                delRow: 'Delete row',
                                delCol: 'Delete column',
                                delTable: 'Delete table',
                            },
                            hr: {
                                insert: 'Ievietot līniju',
                            },
                            style: {
                                style: 'Stils',
                                p: 'Parasts',
                                blockquote: 'Citāts',
                                pre: 'Kods',
                                h1: 'Virsraksts h1',
                                h2: 'Virsraksts h2',
                                h3: 'Virsraksts h3',
                                h4: 'Virsraksts h4',
                                h5: 'Virsraksts h5',
                                h6: 'Virsraksts h6',
                            },
                            lists: {
                                unordered: 'Nenumurēts saraksts',
                                ordered: 'Numurēts saraksts',
                            },
                            options: {
                                help: 'Palīdzība',
                                fullscreen: 'Pa visu ekrānu',
                                codeview: 'HTML kods',
                            },
                            paragraph: {
                                paragraph: 'Paragrāfs',
                                outdent: 'Samazināt atkāpi',
                                indent: 'Palielināt atkāpi',
                                left: 'Līdzināt pa kreisi',
                                center: 'Centrēt',
                                right: 'Līdzināt pa labi',
                                justify: 'Līdzināt gar abām malām',
                            },
                            color: {
                                recent: 'Nesen izmantotās',
                                more: 'Citas krāsas',
                                background: 'Fona krāsa',
                                foreground: 'Fonta krāsa',
                                transparent: 'Caurspīdīgs',
                                setTransparent: 'Iestatīt caurspīdīgumu',
                                reset: 'Atjaunot',
                                resetToDefault: 'Atjaunot noklusējumu',
                            },
                            shortcut: {
                                shortcuts: 'Saīsnes',
                                close: 'Aizvērt',
                                textFormatting: 'Teksta formatēšana',
                                action: 'Darbība',
                                paragraphFormatting: 'Paragrāfa formatēšana',
                                documentStyle: 'Dokumenta stils',
                                extraKeys: 'Citas taustiņu kombinācijas',
                            },
                            help: {
                                insertParagraph: 'Ievietot Paragrāfu',
                                undo: 'Atcelt iepriekšējo darbību',
                                redo: 'Atkārtot atcelto darbību',
                                tab: 'Atkāpe',
                                untab: 'Samazināt atkāpi',
                                bold: 'Pārvērst tekstu treknrakstā',
                                italic: 'Pārvērst tekstu slīprakstā (kursīvā)',
                                underline: 'Pasvītrot tekstu',
                                strikethrough: 'Nosvītrot tekstu',
                                removeFormat: 'Notīrīt stilu no teksta',
                                justifyLeft: 'Līdzīnāt saturu pa kreisi',
                                justifyCenter: 'Centrēt saturu',
                                justifyRight: 'Līdzīnāt saturu pa labi',
                                justifyFull: 'Izlīdzināt saturu gar abām malām',
                                insertUnorderedList:
                                    'Ievietot nenumurētu sarakstu',
                                insertOrderedList: 'Ievietot numurētu sarakstu',
                                outdent: 'Samazināt/noņemt atkāpi paragrāfam',
                                indent: 'Uzlikt atkāpi paragrāfam',
                                formatPara:
                                    'Mainīt bloka tipu uz (p) Paragrāfu',
                                formatH1: 'Mainīt bloka tipu uz virsrakstu H1',
                                formatH2: 'Mainīt bloka tipu uz virsrakstu H2',
                                formatH3: 'Mainīt bloka tipu uz virsrakstu H3',
                                formatH4: 'Mainīt bloka tipu uz virsrakstu H4',
                                formatH5: 'Mainīt bloka tipu uz virsrakstu H5',
                                formatH6: 'Mainīt bloka tipu uz virsrakstu H6',
                                insertHorizontalRule:
                                    'Ievietot horizontālu līniju',
                                'linkDialog.show': 'Parādīt saites logu',
                            },
                            history: {
                                undo: 'Atsauks (undo)',
                                redo: 'Atkārtot (redo)',
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
