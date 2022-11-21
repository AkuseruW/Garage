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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7OztBQUFBO0FBQ3lCOztBQUV6QjtBQUM4Qjs7Ozs7Ozs7Ozs7Ozs7QUNKOUIsSUFBTUMsTUFBTSxHQUFHQyxRQUFRLENBQUNDLGFBQWEsQ0FBQyxjQUFjLENBQUM7QUFDckQsSUFBTUMsSUFBSSxHQUFHRixRQUFRLENBQUNDLGFBQWEsQ0FBQyxhQUFhLENBQUM7QUFDbEQsSUFBTUUsR0FBRyxHQUFHSCxRQUFRLENBQUNDLGFBQWEsQ0FBQyxlQUFlLENBQUM7QUFDbkQ7QUFDQTtBQUNBRyxNQUFNLENBQUNDLGdCQUFnQixDQUFDLFFBQVEsRUFBQyxVQUFBQyxDQUFDLEVBQUU7RUFDaEMsSUFBSUMsS0FBSyxHQUFHLEVBQUU7RUFDZCxJQUFNQyxHQUFHLEdBQUdOLElBQUksQ0FBQ08sU0FBUyxHQUFDLEdBQUc7RUFDOUIsSUFBR0QsR0FBRyxHQUFDTCxHQUFHLENBQUNPLFlBQVksR0FBQ04sTUFBTSxDQUFDTyxPQUFPLEVBQUVKLEtBQUssR0FBRyxPQUFPO0VBRXZESixHQUFHLENBQUNTLEtBQUssQ0FBQ0MsZUFBZSxHQUFJTixLQUFLO0VBQ2xDO0FBQ0osQ0FBQyxDQUFDOztBQUlGO0FBQ0EsSUFBSU8sS0FBSyxHQUFHLEVBQUU7QUFDZCxJQUFJQyxPQUFPLEdBQUc7RUFDVkMsSUFBSSxFQUFFLElBQUk7RUFDVkMsVUFBVSxFQUFFLEtBQUs7RUFDakJDLFNBQVMsRUFBRUo7QUFDZixDQUFDO0FBR0QsSUFBSUssUUFBUSxHQUFHLFNBQVhBLFFBQVEsQ0FBSUMsT0FBTyxFQUFFQyxRQUFRLEVBQUs7RUFDbENELE9BQU8sQ0FBQ0UsT0FBTyxDQUFDLFVBQUNDLEtBQUssRUFBSztJQUN2QixJQUFJQSxLQUFLLENBQUNDLGlCQUFpQixHQUFHVixLQUFLLEVBQUU7TUFDakNTLEtBQUssQ0FBQ0UsTUFBTSxDQUFDQyxTQUFTLENBQUNDLEdBQUcsQ0FBQyxnQkFBZ0IsQ0FBQztNQUM1Q04sUUFBUSxDQUFDTyxTQUFTLENBQUNMLEtBQUssQ0FBQ0UsTUFBTSxDQUFDO0lBQ3BDO0VBQ0osQ0FBQyxDQUFDO0FBQ04sQ0FBQztBQUVELElBQUlKLFFBQVEsR0FBRyxJQUFJUSxvQkFBb0IsQ0FBQ1YsUUFBUSxFQUFFSixPQUFPLENBQUM7QUFDMURmLFFBQVEsQ0FBQzhCLGdCQUFnQixDQUFDLFNBQVMsQ0FBQyxDQUFDUixPQUFPLENBQUMsVUFBQ1MsQ0FBQyxFQUFHO0VBQzlDVixRQUFRLENBQUNXLE9BQU8sQ0FBQ0QsQ0FBQyxDQUFDO0FBQ3ZCLENBQUMsQ0FBQzs7Ozs7Ozs7Ozs7O0FDckNGIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2FwcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvc2Nyb2xsQW5pbWF0aW9uLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zYXNzL2FwcC5zY3NzIl0sInNvdXJjZXNDb250ZW50IjpbIi8vIGltcG9ydCBzYXNzXG5pbXBvcnQgJy4vc2Fzcy9hcHAuc2Nzcyc7XG5cbi8vaW1wb3J0IEpTXG5pbXBvcnQgJy4vanMvc2Nyb2xsQW5pbWF0aW9uJztcbmltcG9ydCAqIGFzIG1kYiBmcm9tICdtZGItdWkta2l0JztcbiIsImNvbnN0IGhlYWRlciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5zaXRlLWhlYWRlcicpXG5jb25zdCB6b25lID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI3pvbmVTY3JvbGwnKVxuY29uc3QgbmF2ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmhlYWRlcl9fbWVudScpXG4vLyBsZXQgdWwgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcubWVudScpLnF1ZXJ5U2VsZWN0b3JBbGwoJ2xpJylcbi8vIGNvbnNvbGUubG9nKHVsKVxud2luZG93LmFkZEV2ZW50TGlzdGVuZXIoJ3Njcm9sbCcsZT0+e1xuICAgIGxldCBjb2xvciA9IFwiXCJcbiAgICBjb25zdCBwb3MgPSB6b25lLm9mZnNldFRvcC0yMDBcbiAgICBpZihwb3MtbmF2Lm9mZnNldEhlaWdodDx3aW5kb3cuc2Nyb2xsWSkgY29sb3IgPSBcImJsYWNrXCJcbiAgICBcbiAgICBuYXYuc3R5bGUuYmFja2dyb3VuZENvbG9yICA9IGNvbG9yXG4gICAgLy8gbmF2LnN0eWxlLmJhY2tncm91bmRDb2xvciA9IFwiYmxhY2tcIlxufSlcblxuXG5cbi8qKioqKioqKioqKioqKioqKiBhcHBhcml0aW9uIGJsb2NrICoqKioqKioqKioqKioqKioqL1xubGV0IHJhdGlvID0gLjVcbmxldCBvcHRpb25zID0ge1xuICAgIHJvb3Q6IG51bGwsXG4gICAgcm9vdE1hcmdpbjogJzBweCcsXG4gICAgdGhyZXNob2xkOiByYXRpb1xufVxuXG5cbmxldCBjYWxsYmFjayA9IChlbnRyaWVzLCBvYnNlcnZlcikgPT4ge1xuICAgIGVudHJpZXMuZm9yRWFjaCgoZW50cnkpID0+IHtcbiAgICAgICAgaWYgKGVudHJ5LmludGVyc2VjdGlvblJhdGlvID4gcmF0aW8pIHtcbiAgICAgICAgICAgIGVudHJ5LnRhcmdldC5jbGFzc0xpc3QuYWRkKCdyZXZlYWwtdmlzaWJsZScpXG4gICAgICAgICAgICBvYnNlcnZlci51bm9ic2VydmUoZW50cnkudGFyZ2V0KVxuICAgICAgICB9XG4gICAgfSk7XG59O1xuXG5sZXQgb2JzZXJ2ZXIgPSBuZXcgSW50ZXJzZWN0aW9uT2JzZXJ2ZXIoY2FsbGJhY2ssIG9wdGlvbnMpO1xuZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLnJldmVhbCcpLmZvckVhY2goKHIpPT57XG4gICAgb2JzZXJ2ZXIub2JzZXJ2ZShyKVxufSkiLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOlsibWRiIiwiaGVhZGVyIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwiem9uZSIsIm5hdiIsIndpbmRvdyIsImFkZEV2ZW50TGlzdGVuZXIiLCJlIiwiY29sb3IiLCJwb3MiLCJvZmZzZXRUb3AiLCJvZmZzZXRIZWlnaHQiLCJzY3JvbGxZIiwic3R5bGUiLCJiYWNrZ3JvdW5kQ29sb3IiLCJyYXRpbyIsIm9wdGlvbnMiLCJyb290Iiwicm9vdE1hcmdpbiIsInRocmVzaG9sZCIsImNhbGxiYWNrIiwiZW50cmllcyIsIm9ic2VydmVyIiwiZm9yRWFjaCIsImVudHJ5IiwiaW50ZXJzZWN0aW9uUmF0aW8iLCJ0YXJnZXQiLCJjbGFzc0xpc3QiLCJhZGQiLCJ1bm9ic2VydmUiLCJJbnRlcnNlY3Rpb25PYnNlcnZlciIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJyIiwib2JzZXJ2ZSJdLCJzb3VyY2VSb290IjoiIn0=