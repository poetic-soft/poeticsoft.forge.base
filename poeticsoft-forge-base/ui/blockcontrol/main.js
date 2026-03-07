/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/blockcontrol/core/post-content.js"
/*!***********************************************!*\
  !*** ./src/blockcontrol/core/post-content.js ***!
  \***********************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var InspectorControls = wp.blockEditor.InspectorControls;
var PanelBody = wp.components.PanelBody;
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (function (props) {
  var attributes = props.attributes;
  var control_text = attributes.control_text;
  return /*#__PURE__*/React.createElement(InspectorControls, null, /*#__PURE__*/React.createElement(PanelBody, {
    title: "Controles de bloque",
    initialOpen: true
  }, control_text));
});

/***/ },

/***/ "./src/blockcontrol/core/post-title.js"
/*!*********************************************!*\
  !*** ./src/blockcontrol/core/post-title.js ***!
  \*********************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
var InspectorControls = wp.blockEditor.InspectorControls;
var PanelBody = wp.components.PanelBody;
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (function (props) {
  var attributes = props.attributes,
    setAttributes = props.setAttributes;
  var control_text = attributes.control_text;
  return /*#__PURE__*/React.createElement(InspectorControls, null, /*#__PURE__*/React.createElement(PanelBody, {
    title: "Controles de bloque",
    initialOpen: true
  }, control_text));
});

/***/ },

/***/ "./src/blockcontrol/main.scss"
/*!************************************!*\
  !*** ./src/blockcontrol/main.scss ***!
  \************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Check if module exists (development only)
/******/ 		if (__webpack_modules__[moduleId] === undefined) {
/******/ 			var e = new Error("Cannot find module '" + moduleId + "'");
/******/ 			e.code = 'MODULE_NOT_FOUND';
/******/ 			throw e;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!**********************************!*\
  !*** ./src/blockcontrol/main.js ***!
  \**********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _main_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./main.scss */ "./src/blockcontrol/main.scss");
/* harmony import */ var _core_post_content__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./core/post-content */ "./src/blockcontrol/core/post-content.js");
/* harmony import */ var _core_post_title__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./core/post-title */ "./src/blockcontrol/core/post-title.js");
var createHigherOrderComponent = wp.compose.createHigherOrderComponent;
var addFilter = wp.hooks.addFilter;



var withInspectorControls = createHigherOrderComponent(function (BlockEdit) {
  return function (props) {
    return /*#__PURE__*/React.createElement(React.Fragment, null, /*#__PURE__*/React.createElement(BlockEdit, props), props.name === 'core/post-content' && /*#__PURE__*/React.createElement(_core_post_content__WEBPACK_IMPORTED_MODULE_1__["default"], props), props.name === 'core/post-title' && /*#__PURE__*/React.createElement(_core_post_title__WEBPACK_IMPORTED_MODULE_2__["default"], props));
  };
}, 'withInspectorControls');
addFilter('editor.BlockEdit', 'poeticsoft/configs', withInspectorControls);
})();

/******/ })()
;
//# sourceMappingURL=main.js.map