(self["webpackChunk"] = self["webpackChunk"] || []).push([["imageDelete"],{

/***/ "./assets/js/images.js":
/*!*****************************!*\
  !*** ./assets/js/images.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
__webpack_require__(/*! core-js/modules/es.promise.js */ "./node_modules/core-js/modules/es.promise.js");
__webpack_require__(/*! core-js/modules/es.json.stringify.js */ "./node_modules/core-js/modules/es.json.stringify.js");
__webpack_require__(/*! core-js/modules/es.array.slice.js */ "./node_modules/core-js/modules/es.array.slice.js");
__webpack_require__(/*! core-js/modules/es.function.name.js */ "./node_modules/core-js/modules/es.function.name.js");
__webpack_require__(/*! core-js/modules/es.array.from.js */ "./node_modules/core-js/modules/es.array.from.js");
__webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
__webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");
__webpack_require__(/*! core-js/modules/es.regexp.test.js */ "./node_modules/core-js/modules/es.regexp.test.js");
__webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
__webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
__webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
__webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
__webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
__webpack_require__(/*! core-js/modules/es.array.is-array.js */ "./node_modules/core-js/modules/es.array.is-array.js");
__webpack_require__(/*! core-js/modules/es.error.cause.js */ "./node_modules/core-js/modules/es.error.cause.js");
__webpack_require__(/*! core-js/modules/es.error.to-string.js */ "./node_modules/core-js/modules/es.error.to-string.js");
function _createForOfIteratorHelper(o, allowArrayLike) { var it = typeof Symbol !== "undefined" && o[Symbol.iterator] || o["@@iterator"]; if (!it) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = it.call(o); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }
function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }
function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }
window.onload = function () {
  var links = document.querySelectorAll("[data-delete]");
  var _iterator = _createForOfIteratorHelper(links),
    _step;
  try {
    for (_iterator.s(); !(_step = _iterator.n()).done;) {
      link = _step.value;
      link.addEventListener("click", function (e) {
        var _this = this;
        e.preventDefault();

        //confirmation
        if (confirm("Voulez-vous supprimer cette image ?")) {
          // envoie de la requête Ajax vers le lien 

          console.log(this.getAttribute("href"));
          // console.log(JSON.parse(this.getAttribute("href")))

          fetch(JSON.parse(this.getAttribute("href")), {
            method: "DELETE",
            headers: {
              "X-Requested-With": "XMLHttpRequest",
              "Content-Type": "application/json"
            },
            body: JSON.stringify({
              "_token": this.dataset.token
            })
          }).then(
          //réponse en JSON
          function (response) {
            return response.json();
          }).then(function (data) {
            if (data.success) _this.parentElement.remove();else alert(data.error);
          })["catch"](function (e) {
            return alert(e);
          });
        }
      });
    }
  } catch (err) {
    _iterator.e(err);
  } finally {
    _iterator.f();
  }
};

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_internals_array-iteration_js-node_modules_core-js_internals_dom--711a0d","vendors-node_modules_core-js_modules_es_array_from_js-node_modules_core-js_modules_es_array_i-dc351c"], () => (__webpack_exec__("./assets/js/images.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiaW1hZ2VEZWxldGUuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQUFBQSxNQUFNLENBQUNDLE1BQU0sR0FBRyxZQUFNO0VBRWxCLElBQUlDLEtBQUssR0FBR0MsUUFBUSxDQUFDQyxnQkFBZ0IsQ0FBQyxlQUFlLENBQUM7RUFBQSwyQ0FFMUNGLEtBQUs7SUFBQTtFQUFBO0lBQWpCLG9EQUFrQjtNQUFkRyxJQUFJO01BRUpBLElBQUksQ0FBQ0MsZ0JBQWdCLENBQUMsT0FBTyxFQUFFLFVBQVNDLENBQUMsRUFBQztRQUFBO1FBRXRDQSxDQUFDLENBQUNDLGNBQWMsRUFBRTs7UUFFbEI7UUFDQSxJQUFHQyxPQUFPLENBQUMscUNBQXFDLENBQUMsRUFBQztVQUM5Qzs7VUFFQUMsT0FBTyxDQUFDQyxHQUFHLENBQUMsSUFBSSxDQUFDQyxZQUFZLENBQUMsTUFBTSxDQUFDLENBQUM7VUFDdEM7O1VBRUFDLEtBQUssQ0FBQ0MsSUFBSSxDQUFDQyxLQUFLLENBQUMsSUFBSSxDQUFDSCxZQUFZLENBQUMsTUFBTSxDQUFDLENBQUMsRUFBRTtZQUN6Q0ksTUFBTSxFQUFFLFFBQVE7WUFDaEJDLE9BQU8sRUFBRTtjQUNMLGtCQUFrQixFQUFFLGdCQUFnQjtjQUNwQyxjQUFjLEVBQUU7WUFDcEIsQ0FBQztZQUNEQyxJQUFJLEVBQUVKLElBQUksQ0FBQ0ssU0FBUyxDQUFDO2NBQUMsUUFBUSxFQUFFLElBQUksQ0FBQ0MsT0FBTyxDQUFDQztZQUFLLENBQUM7VUFDdkQsQ0FBQyxDQUFDLENBQUNDLElBQUk7VUFDSDtVQUNBLFVBQUFDLFFBQVE7WUFBQSxPQUFJQSxRQUFRLENBQUNDLElBQUksRUFBRTtVQUFBLEVBQzlCLENBQUNGLElBQUksQ0FBQyxVQUFBRyxJQUFJLEVBQUk7WUFDWCxJQUFHQSxJQUFJLENBQUNDLE9BQU8sRUFDWCxLQUFJLENBQUNDLGFBQWEsQ0FBQ0MsTUFBTSxFQUFFLE1BRTNCQyxLQUFLLENBQUNKLElBQUksQ0FBQ0ssS0FBSyxDQUFDO1VBQ3pCLENBQUMsQ0FBQyxTQUFNLENBQUMsVUFBQXZCLENBQUM7WUFBQSxPQUFJc0IsS0FBSyxDQUFDdEIsQ0FBQyxDQUFDO1VBQUEsRUFBQztRQUMzQjtNQUNKLENBQUMsQ0FBQztJQUNOO0VBQUM7SUFBQTtFQUFBO0lBQUE7RUFBQTtBQUNMLENBQUMiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvaW1hZ2VzLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIndpbmRvdy5vbmxvYWQgPSAoKSA9PiB7XG5cbiAgICBsZXQgbGlua3MgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKFwiW2RhdGEtZGVsZXRlXVwiKVxuXG4gICAgZm9yKGxpbmsgb2YgbGlua3Mpe1xuXG4gICAgICAgIGxpbmsuYWRkRXZlbnRMaXN0ZW5lcihcImNsaWNrXCIsIGZ1bmN0aW9uKGUpe1xuXG4gICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KClcbiAgICAgICAgICAgIFxuICAgICAgICAgICAgLy9jb25maXJtYXRpb25cbiAgICAgICAgICAgIGlmKGNvbmZpcm0oXCJWb3VsZXotdm91cyBzdXBwcmltZXIgY2V0dGUgaW1hZ2UgP1wiKSl7XG4gICAgICAgICAgICAgICAgLy8gZW52b2llIGRlIGxhIHJlcXXDqnRlIEFqYXggdmVycyBsZSBsaWVuIFxuICAgICAgICAgICAgICAgIFxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHRoaXMuZ2V0QXR0cmlidXRlKFwiaHJlZlwiKSlcbiAgICAgICAgICAgICAgICAvLyBjb25zb2xlLmxvZyhKU09OLnBhcnNlKHRoaXMuZ2V0QXR0cmlidXRlKFwiaHJlZlwiKSkpXG5cbiAgICAgICAgICAgICAgICBmZXRjaChKU09OLnBhcnNlKHRoaXMuZ2V0QXR0cmlidXRlKFwiaHJlZlwiKSksIHtcbiAgICAgICAgICAgICAgICAgICAgbWV0aG9kOiBcIkRFTEVURVwiLFxuICAgICAgICAgICAgICAgICAgICBoZWFkZXJzOiB7XG4gICAgICAgICAgICAgICAgICAgICAgICBcIlgtUmVxdWVzdGVkLVdpdGhcIjogXCJYTUxIdHRwUmVxdWVzdFwiLFxuICAgICAgICAgICAgICAgICAgICAgICAgXCJDb250ZW50LVR5cGVcIjogXCJhcHBsaWNhdGlvbi9qc29uXCJcbiAgICAgICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICAgICAgYm9keTogSlNPTi5zdHJpbmdpZnkoe1wiX3Rva2VuXCI6IHRoaXMuZGF0YXNldC50b2tlbn0pXG4gICAgICAgICAgICAgICAgfSkudGhlbihcbiAgICAgICAgICAgICAgICAgICAgLy9yw6lwb25zZSBlbiBKU09OXG4gICAgICAgICAgICAgICAgICAgIHJlc3BvbnNlID0+IHJlc3BvbnNlLmpzb24oKVxuICAgICAgICAgICAgICAgICkudGhlbihkYXRhID0+IHtcbiAgICAgICAgICAgICAgICAgICAgaWYoZGF0YS5zdWNjZXNzKVxuICAgICAgICAgICAgICAgICAgICAgICAgdGhpcy5wYXJlbnRFbGVtZW50LnJlbW92ZSgpXG4gICAgICAgICAgICAgICAgICAgIGVsc2VcbiAgICAgICAgICAgICAgICAgICAgICAgIGFsZXJ0KGRhdGEuZXJyb3IpXG4gICAgICAgICAgICAgICAgfSkuY2F0Y2goZSA9PiBhbGVydChlKSlcbiAgICAgICAgICAgIH1cbiAgICAgICAgfSlcbiAgICB9XG59Il0sIm5hbWVzIjpbIndpbmRvdyIsIm9ubG9hZCIsImxpbmtzIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yQWxsIiwibGluayIsImFkZEV2ZW50TGlzdGVuZXIiLCJlIiwicHJldmVudERlZmF1bHQiLCJjb25maXJtIiwiY29uc29sZSIsImxvZyIsImdldEF0dHJpYnV0ZSIsImZldGNoIiwiSlNPTiIsInBhcnNlIiwibWV0aG9kIiwiaGVhZGVycyIsImJvZHkiLCJzdHJpbmdpZnkiLCJkYXRhc2V0IiwidG9rZW4iLCJ0aGVuIiwicmVzcG9uc2UiLCJqc29uIiwiZGF0YSIsInN1Y2Nlc3MiLCJwYXJlbnRFbGVtZW50IiwicmVtb3ZlIiwiYWxlcnQiLCJlcnJvciJdLCJzb3VyY2VSb290IjoiIn0=