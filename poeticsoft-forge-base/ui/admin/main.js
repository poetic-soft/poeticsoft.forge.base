/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/admin/js/portal/dashboard-sections/dashboard-sections.js"
/*!**********************************************************************!*\
  !*** ./src/admin/js/portal/dashboard-sections/dashboard-sections.js ***!
  \**********************************************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (function (_ref) {
  var data = _ref.data;
  return /*#__PURE__*/React.createElement("div", {
    className: "dashboard-base"
  }, "DASHBOARD BASE!");
});

/***/ },

/***/ "./src/admin/js/portal/manager.js"
/*!****************************************!*\
  !*** ./src/admin/js/portal/manager.js ***!
  \****************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _portalsmap__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./portalsmap */ "./src/admin/js/portal/portalsmap.js");
function _slicedToArray(r, e) { return _arrayWithHoles(r) || _iterableToArrayLimit(r, e) || _unsupportedIterableToArray(r, e) || _nonIterableRest(); }
function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
function _iterableToArrayLimit(r, l) { var t = null == r ? null : "undefined" != typeof Symbol && r[Symbol.iterator] || r["@@iterator"]; if (null != t) { var e, n, i, u, a = [], f = !0, o = !1; try { if (i = (t = t.call(r)).next, 0 === l) { if (Object(t) !== t) return; f = !1; } else for (; !(f = (e = i.call(t)).done) && (a.push(e.value), a.length !== l); f = !0); } catch (r) { o = !0, n = r; } finally { try { if (!f && null != t["return"] && (u = t["return"](), Object(u) !== u)) return; } finally { if (o) throw n; } } return a; } }
function _arrayWithHoles(r) { if (Array.isArray(r)) return r; }
var _wp$element = wp.element,
  useState = _wp$element.useState,
  useEffect = _wp$element.useEffect,
  useCallback = _wp$element.useCallback,
  createPortal = _wp$element.createPortal,
  cloneElement = _wp$element.cloneElement;

var ADMIN_ROOT = '#wpbody-content .wrap';
var PortalManager = function PortalManager() {
  var _useState = useState([]),
    _useState2 = _slicedToArray(_useState, 2),
    portals = _useState2[0],
    setPortals = _useState2[1];
  var scan = useCallback(function () {
    // console.count('scan'); // Parar el observer?

    var detected = [];
    Object.keys(_portalsmap__WEBPACK_IMPORTED_MODULE_0__.portalsMap).forEach(function (selector) {
      var elements = document.querySelectorAll(selector);
      elements.forEach(function (el) {
        var config = _portalsmap__WEBPACK_IMPORTED_MODULE_0__.portalsMap[selector];
        var target = el.querySelector(config.target);
        if (target) {
          if (!target.dataset.portalInitialized) {
            target.innerHTML = '';
            target.dataset.portalInitialized = 'true';
          }
          var id = target.id;
          var targetData = el.querySelector('script.data');
          var data = [];
          try {
            data = targetData ? JSON.parse(targetData.textContent) : [];
          } catch (e) {
            console.warn("JSON corrupto en ".concat(id));
          }
          detected.push({
            id: id,
            target: target,
            component: cloneElement(config.comp, {
              data: data,
              rootElement: el,
              boxId: id
            })
          });
        }
      });
    });
    setPortals(function (prevPortals) {
      if (prevPortals.length !== detected.length) return detected;
      var hasChanges = detected.some(function (p, i) {
        return p.id !== prevPortals[i].id || p.target !== prevPortals[i].target;
      });
      return hasChanges ? detected : prevPortals;
    });
  }, []);
  useEffect(function () {
    scan();
    var adminRoot = document.querySelector(ADMIN_ROOT);
    var observer = new MutationObserver(scan);
    observer.observe(adminRoot, {
      childList: true,
      subtree: true
    });
  }, [scan]);
  return /*#__PURE__*/React.createElement(React.Fragment, null, portals.map(function (p) {
    return createPortal(p.component, p.target, p.id);
  }));
};
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (PortalManager);

/***/ },

/***/ "./src/admin/js/portal/portalsmap.js"
/*!*******************************************!*\
  !*** ./src/admin/js/portal/portalsmap.js ***!
  \*******************************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   portalsMap: () => (/* binding */ portalsMap)
/* harmony export */ });
/* harmony import */ var _dashboard_sections_dashboard_sections__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./dashboard-sections/dashboard-sections */ "./src/admin/js/portal/dashboard-sections/dashboard-sections.js");

var portalsMap = {
  '.postbox .DashboardWidget.poeticsoft_heart_forge_alexandria_sections': {
    target: '.Portal',
    comp: /*#__PURE__*/React.createElement(_dashboard_sections_dashboard_sections__WEBPACK_IMPORTED_MODULE_0__["default"], null)
  }
};

/***/ },

/***/ "./src/admin/main.scss"
/*!*****************************!*\
  !*** ./src/admin/main.scss ***!
  \*****************************/
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
/*!***************************!*\
  !*** ./src/admin/main.js ***!
  \***************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _js_portal_manager__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./js/portal/manager */ "./src/admin/js/portal/manager.js");
/* harmony import */ var _main_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./main.scss */ "./src/admin/main.scss");
var render = wp.element.render;


var setup = function setup() {
  var container = document.createElement('div');
  container.id = 'playmotiv-theme-player-portal-root';
  container.style.display = 'none';
  document.body.appendChild(container);
  render(/*#__PURE__*/React.createElement(_js_portal_manager__WEBPACK_IMPORTED_MODULE_0__["default"], null), container);
};
if (document.readyState === 'complete' || document.readyState === 'interactive') {
  setup();
} else {
  document.addEventListener('DOMContentLoaded', setup);
}
})();

/******/ })()
;
//# sourceMappingURL=main.js.map