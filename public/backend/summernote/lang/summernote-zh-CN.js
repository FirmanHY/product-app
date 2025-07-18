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
        /******/ return __webpack_require__((__webpack_require__.s = 48));
        /******/
    })(
        /************************************************************************/
        /******/ {
            /***/ 48: /***/ function (module, exports) {
                (function ($) {
                    $.extend($.summernote.lang, {
                        'zh-CN': {
                            font: {
                                bold: '粗体',
                                italic: '斜体',
                                underline: '下划线',
                                clear: '清除格式',
                                height: '行高',
                                name: '字体',
                                strikethrough: '删除线',
                                subscript: '下标',
                                superscript: '上标',
                                size: '字号',
                            },
                            image: {
                                image: '图片',
                                insert: '插入图片',
                                resizeFull: '缩放至 100%',
                                resizeHalf: '缩放至 50%',
                                resizeQuarter: '缩放至 25%',
                                floatLeft: '靠左浮动',
                                floatRight: '靠右浮动',
                                floatNone: '取消浮动',
                                shapeRounded: '形状: 圆角',
                                shapeCircle: '形状: 圆',
                                shapeThumbnail: '形状: 缩略图',
                                shapeNone: '形状: 无',
                                dragImageHere: '将图片拖拽至此处',
                                dropImage: '拖拽图片或文本',
                                selectFromFiles: '从本地上传',
                                maximumFileSize: '文件大小最大值',
                                maximumFileSizeError: '文件大小超出最大值。',
                                url: '图片地址',
                                remove: '移除图片',
                                original: '原始图片',
                            },
                            video: {
                                video: '视频',
                                videoLink: '视频链接',
                                insert: '插入视频',
                                url: '视频地址',
                                providers:
                                    '(优酷, 腾讯, Instagram, DailyMotion, Youtube等)',
                            },
                            link: {
                                link: '链接',
                                insert: '插入链接',
                                unlink: '去除链接',
                                edit: '编辑链接',
                                textToDisplay: '显示文本',
                                url: '链接地址',
                                openInNewWindow: '在新窗口打开',
                            },
                            table: {
                                table: '表格',
                                addRowAbove: '在上方插入行',
                                addRowBelow: '在下方插入行',
                                addColLeft: '在左侧插入列',
                                addColRight: '在右侧插入列',
                                delRow: '删除行',
                                delCol: '删除列',
                                delTable: '删除表格',
                            },
                            hr: {
                                insert: '水平线',
                            },
                            style: {
                                style: '样式',
                                p: '普通',
                                blockquote: '引用',
                                pre: '代码',
                                h1: '标题 1',
                                h2: '标题 2',
                                h3: '标题 3',
                                h4: '标题 4',
                                h5: '标题 5',
                                h6: '标题 6',
                            },
                            lists: {
                                unordered: '无序列表',
                                ordered: '有序列表',
                            },
                            options: {
                                help: '帮助',
                                fullscreen: '全屏',
                                codeview: '源代码',
                            },
                            paragraph: {
                                paragraph: '段落',
                                outdent: '减少缩进',
                                indent: '增加缩进',
                                left: '左对齐',
                                center: '居中对齐',
                                right: '右对齐',
                                justify: '两端对齐',
                            },
                            color: {
                                recent: '最近使用',
                                more: '更多',
                                background: '背景',
                                foreground: '前景',
                                transparent: '透明',
                                setTransparent: '透明',
                                reset: '重置',
                                resetToDefault: '默认',
                            },
                            shortcut: {
                                shortcuts: '快捷键',
                                close: '关闭',
                                textFormatting: '文本格式',
                                action: '动作',
                                paragraphFormatting: '段落格式',
                                documentStyle: '文档样式',
                                extraKeys: '额外按键',
                            },
                            help: {
                                insertParagraph: '插入段落',
                                undo: '撤销',
                                redo: '重做',
                                tab: '增加缩进',
                                untab: '减少缩进',
                                bold: '粗体',
                                italic: '斜体',
                                underline: '下划线',
                                strikethrough: '删除线',
                                removeFormat: '清除格式',
                                justifyLeft: '左对齐',
                                justifyCenter: '居中对齐',
                                justifyRight: '右对齐',
                                justifyFull: '两端对齐',
                                insertUnorderedList: '无序列表',
                                insertOrderedList: '有序列表',
                                outdent: '减少缩进',
                                indent: '增加缩进',
                                formatPara: '设置选中内容样式为 普通',
                                formatH1: '设置选中内容样式为 标题1',
                                formatH2: '设置选中内容样式为 标题2',
                                formatH3: '设置选中内容样式为 标题3',
                                formatH4: '设置选中内容样式为 标题4',
                                formatH5: '设置选中内容样式为 标题5',
                                formatH6: '设置选中内容样式为 标题6',
                                insertHorizontalRule: '插入水平线',
                                'linkDialog.show': '显示链接对话框',
                            },
                            history: {
                                undo: '撤销',
                                redo: '重做',
                            },
                            specialChar: {
                                specialChar: '特殊字符',
                                select: '选取特殊字符',
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
