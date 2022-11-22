(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _sass_app_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./sass/app.scss */ "./assets/sass/app.scss");
/* harmony import */ var _js_scrollAnimation__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js/scrollAnimation */ "./assets/js/scrollAnimation.js");
/* harmony import */ var _js_scrollAnimation__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_js_scrollAnimation__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var mdb_ui_kit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! mdb-ui-kit */ "./node_modules/mdb-ui-kit/js/mdb.min.js");
/* harmony import */ var mdb_ui_kit__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(mdb_ui_kit__WEBPACK_IMPORTED_MODULE_2__);
// import sass


//import JS



/***/ }),

/***/ "./assets/js/scrollAnimation.js":
/*!**************************************!*\
  !*** ./assets/js/scrollAnimation.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
__webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
var header = document.querySelector('.site-header');
var zone = document.querySelector('#zoneScroll');
var nav = document.querySelector('.header__menu');
// let ul = document.querySelector('.menu').querySelectorAll('li')
// console.log(ul)
window.addEventListener('scroll', function (e) {
  var color = "";
  var pos = zone.offsetTop - 200;
  if (pos - nav.offsetHeight < window.scrollY) color = "black";
  nav.style.backgroundColor = color;
  // nav.style.backgroundColor = "black"
});

/***************** apparition block *****************/
var ratio = .5;
var options = {
  root: null,
  rootMargin: '0px',
  threshold: ratio
};
var callback = function callback(entries, observer) {
  entries.forEach(function (entry) {
    if (entry.intersectionRatio > ratio) {
      entry.target.classList.add('reveal-visible');
      observer.unobserve(entry.target);
    }
  });
};
var observer = new IntersectionObserver(callback, options);
document.querySelectorAll('.reveal').forEach(function (r) {
  observer.observe(r);
});

/***/ }),

/***/ "./assets/sass/app.scss":
/*!******************************!*\
  !*** ./assets/sass/app.scss ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_internals_array-iteration_js-node_modules_core-js_internals_dom--711a0d","vendors-node_modules_core-js_modules_es_array_for-each_js-node_modules_core-js_modules_web_do-7026e0"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7OztBQUFBO0FBQ3lCOztBQUV6QjtBQUM4Qjs7Ozs7Ozs7Ozs7Ozs7QUNKOUIsSUFBTUMsTUFBTSxHQUFHQyxRQUFRLENBQUNDLGFBQWEsQ0FBQyxjQUFjLENBQUM7QUFDckQsSUFBTUMsSUFBSSxHQUFHRixRQUFRLENBQUNDLGFBQWEsQ0FBQyxhQUFhLENBQUM7QUFDbEQsSUFBTUUsR0FBRyxHQUFHSCxRQUFRLENBQUNDLGFBQWEsQ0FBQyxlQUFlLENBQUM7QUFDbkQ7QUFDQTtBQUNBRyxNQUFNLENBQUNDLGdCQUFnQixDQUFDLFFBQVEsRUFBQyxVQUFBQyxDQUFDLEVBQUU7RUFDaEMsSUFBSUMsS0FBSyxHQUFHLEVBQUU7RUFDZCxJQUFNQyxHQUFHLEdBQUdOLElBQUksQ0FBQ08sU0FBUyxHQUFDLEdBQUc7RUFDOUIsSUFBR0QsR0FBRyxHQUFDTCxHQUFHLENBQUNPLFlBQVksR0FBQ04sTUFBTSxDQUFDTyxPQUFPLEVBQUVKLEtBQUssR0FBRyxPQUFPO0VBRXZESixHQUFHLENBQUNTLEtBQUssQ0FBQ0MsZUFBZSxHQUFJTixLQUFLO0VBQ2xDO0FBQ0osQ0FBQyxDQUFDOztBQUlGO0FBQ0EsSUFBSU8sS0FBSyxHQUFHLEVBQUU7QUFDZCxJQUFJQyxPQUFPLEdBQUc7RUFDVkMsSUFBSSxFQUFFLElBQUk7RUFDVkMsVUFBVSxFQUFFLEtBQUs7RUFDakJDLFNBQVMsRUFBRUo7QUFDZixDQUFDO0FBR0QsSUFBSUssUUFBUSxHQUFHLFNBQVhBLFFBQVEsQ0FBSUMsT0FBTyxFQUFFQyxRQUFRLEVBQUs7RUFDbENELE9BQU8sQ0FBQ0UsT0FBTyxDQUFDLFVBQUNDLEtBQUssRUFBSztJQUN2QixJQUFJQSxLQUFLLENBQUNDLGlCQUFpQixHQUFHVixLQUFLLEVBQUU7TUFDakNTLEtBQUssQ0FBQ0UsTUFBTSxDQUFDQyxTQUFTLENBQUNDLEdBQUcsQ0FBQyxnQkFBZ0IsQ0FBQztNQUM1Q04sUUFBUSxDQUFDTyxTQUFTLENBQUNMLEtBQUssQ0FBQ0UsTUFBTSxDQUFDO0lBQ3BDO0VBQ0osQ0FBQyxDQUFDO0FBQ04sQ0FBQztBQUVELElBQUlKLFFBQVEsR0FBRyxJQUFJUSxvQkFBb0IsQ0FBQ1YsUUFBUSxFQUFFSixPQUFPLENBQUM7QUFDMURmLFFBQVEsQ0FBQzhCLGdCQUFnQixDQUFDLFNBQVMsQ0FBQyxDQUFDUixPQUFPLENBQUMsVUFBQ1MsQ0FBQyxFQUFHO0VBQzlDVixRQUFRLENBQUNXLE9BQU8sQ0FBQ0QsQ0FBQyxDQUFDO0FBQ3ZCLENBQUMsQ0FBQzs7Ozs7Ozs7Ozs7O0FDckNGIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2FwcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvc2Nyb2xsQW5pbWF0aW9uLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zYXNzL2FwcC5zY3NzP2I1MmYiXSwic291cmNlc0NvbnRlbnQiOlsiLy8gaW1wb3J0IHNhc3NcbmltcG9ydCAnLi9zYXNzL2FwcC5zY3NzJztcblxuLy9pbXBvcnQgSlNcbmltcG9ydCAnLi9qcy9zY3JvbGxBbmltYXRpb24nO1xuaW1wb3J0ICogYXMgbWRiIGZyb20gJ21kYi11aS1raXQnO1xuIiwiY29uc3QgaGVhZGVyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLnNpdGUtaGVhZGVyJylcbmNvbnN0IHpvbmUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjem9uZVNjcm9sbCcpXG5jb25zdCBuYXYgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcuaGVhZGVyX19tZW51Jylcbi8vIGxldCB1bCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5tZW51JykucXVlcnlTZWxlY3RvckFsbCgnbGknKVxuLy8gY29uc29sZS5sb2codWwpXG53aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcignc2Nyb2xsJyxlPT57XG4gICAgbGV0IGNvbG9yID0gXCJcIlxuICAgIGNvbnN0IHBvcyA9IHpvbmUub2Zmc2V0VG9wLTIwMFxuICAgIGlmKHBvcy1uYXYub2Zmc2V0SGVpZ2h0PHdpbmRvdy5zY3JvbGxZKSBjb2xvciA9IFwiYmxhY2tcIlxuICAgIFxuICAgIG5hdi5zdHlsZS5iYWNrZ3JvdW5kQ29sb3IgID0gY29sb3JcbiAgICAvLyBuYXYuc3R5bGUuYmFja2dyb3VuZENvbG9yID0gXCJibGFja1wiXG59KVxuXG5cblxuLyoqKioqKioqKioqKioqKioqIGFwcGFyaXRpb24gYmxvY2sgKioqKioqKioqKioqKioqKiovXG5sZXQgcmF0aW8gPSAuNVxubGV0IG9wdGlvbnMgPSB7XG4gICAgcm9vdDogbnVsbCxcbiAgICByb290TWFyZ2luOiAnMHB4JyxcbiAgICB0aHJlc2hvbGQ6IHJhdGlvXG59XG5cblxubGV0IGNhbGxiYWNrID0gKGVudHJpZXMsIG9ic2VydmVyKSA9PiB7XG4gICAgZW50cmllcy5mb3JFYWNoKChlbnRyeSkgPT4ge1xuICAgICAgICBpZiAoZW50cnkuaW50ZXJzZWN0aW9uUmF0aW8gPiByYXRpbykge1xuICAgICAgICAgICAgZW50cnkudGFyZ2V0LmNsYXNzTGlzdC5hZGQoJ3JldmVhbC12aXNpYmxlJylcbiAgICAgICAgICAgIG9ic2VydmVyLnVub2JzZXJ2ZShlbnRyeS50YXJnZXQpXG4gICAgICAgIH1cbiAgICB9KTtcbn07XG5cbmxldCBvYnNlcnZlciA9IG5ldyBJbnRlcnNlY3Rpb25PYnNlcnZlcihjYWxsYmFjaywgb3B0aW9ucyk7XG5kb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcucmV2ZWFsJykuZm9yRWFjaCgocik9PntcbiAgICBvYnNlcnZlci5vYnNlcnZlKHIpXG59KSIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJuYW1lcyI6WyJtZGIiLCJoZWFkZXIiLCJkb2N1bWVudCIsInF1ZXJ5U2VsZWN0b3IiLCJ6b25lIiwibmF2Iiwid2luZG93IiwiYWRkRXZlbnRMaXN0ZW5lciIsImUiLCJjb2xvciIsInBvcyIsIm9mZnNldFRvcCIsIm9mZnNldEhlaWdodCIsInNjcm9sbFkiLCJzdHlsZSIsImJhY2tncm91bmRDb2xvciIsInJhdGlvIiwib3B0aW9ucyIsInJvb3QiLCJyb290TWFyZ2luIiwidGhyZXNob2xkIiwiY2FsbGJhY2siLCJlbnRyaWVzIiwib2JzZXJ2ZXIiLCJmb3JFYWNoIiwiZW50cnkiLCJpbnRlcnNlY3Rpb25SYXRpbyIsInRhcmdldCIsImNsYXNzTGlzdCIsImFkZCIsInVub2JzZXJ2ZSIsIkludGVyc2VjdGlvbk9ic2VydmVyIiwicXVlcnlTZWxlY3RvckFsbCIsInIiLCJvYnNlcnZlIl0sInNvdXJjZVJvb3QiOiIifQ==