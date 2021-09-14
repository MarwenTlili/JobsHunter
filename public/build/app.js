(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");
/* harmony import */ var _scripts_main_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./scripts/main.js */ "./assets/scripts/main.js");
/* harmony import */ var _scripts_main_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_scripts_main_js__WEBPACK_IMPORTED_MODULE_1__);
/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

__webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.esm.js");

__webpack_require__(/*! bootstrap-icons/font/bootstrap-icons.css */ "./node_modules/bootstrap-icons/font/bootstrap-icons.css");


 // any CSS you import will output into a single css file (app.css in this case)
// import './styles/app.css';
// start the Stimulus application
// import './bootstrap';

/***/ }),

/***/ "./assets/scripts/main.js":
/*!********************************!*\
  !*** ./assets/scripts/main.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
$(function () {
  //Get the button
  var scrollup = document.getElementById("scrollup"); // When the user scrolls down 20px from the top of the document, show the button

  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      scrollup.style.display = "block";
    } else {
      scrollup.style.display = "none";
    }
  } // When the user clicks on the button, scroll to the top of the document


  scrollup.addEventListener("click", backToTop);

  function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
});

/***/ }),

/***/ "./assets/styles/app.scss":
/*!********************************!*\
  !*** ./assets/styles/app.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_bootstrap_dist_js_bootstrap_esm_js-node_modules_jquery_dist_jquery_js-no-6ccba5"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQSxJQUFNQSxDQUFDLEdBQUdDLG1CQUFPLENBQUMsb0RBQUQsQ0FBakI7O0FBQ0FBLG1CQUFPLENBQUMsb0VBQUQsQ0FBUDs7QUFDQUEsbUJBQU8sQ0FBQyx5R0FBRCxDQUFQOztBQUNBO0NBR0E7QUFDQTtBQUVBO0FBQ0E7Ozs7Ozs7Ozs7O0FDakJBRCxDQUFDLENBQUMsWUFBVztBQUNUO0FBQ0EsTUFBSUUsUUFBUSxHQUFHQyxRQUFRLENBQUNDLGNBQVQsQ0FBd0IsVUFBeEIsQ0FBZixDQUZTLENBSVQ7O0FBQ0FDLEVBQUFBLE1BQU0sQ0FBQ0MsUUFBUCxHQUFrQixZQUFZO0FBQzFCQyxJQUFBQSxjQUFjO0FBQ2pCLEdBRkQ7O0FBSUEsV0FBU0EsY0FBVCxHQUEwQjtBQUN0QixRQUNJSixRQUFRLENBQUNLLElBQVQsQ0FBY0MsU0FBZCxHQUEwQixFQUExQixJQUNBTixRQUFRLENBQUNPLGVBQVQsQ0FBeUJELFNBQXpCLEdBQXFDLEVBRnpDLEVBR0U7QUFDRVAsTUFBQUEsUUFBUSxDQUFDUyxLQUFULENBQWVDLE9BQWYsR0FBeUIsT0FBekI7QUFDSCxLQUxELE1BS087QUFDSFYsTUFBQUEsUUFBUSxDQUFDUyxLQUFULENBQWVDLE9BQWYsR0FBeUIsTUFBekI7QUFDSDtBQUNKLEdBbEJRLENBbUJUOzs7QUFDQVYsRUFBQUEsUUFBUSxDQUFDVyxnQkFBVCxDQUEwQixPQUExQixFQUFtQ0MsU0FBbkM7O0FBRUEsV0FBU0EsU0FBVCxHQUFxQjtBQUNqQlgsSUFBQUEsUUFBUSxDQUFDSyxJQUFULENBQWNDLFNBQWQsR0FBMEIsQ0FBMUI7QUFDQU4sSUFBQUEsUUFBUSxDQUFDTyxlQUFULENBQXlCRCxTQUF6QixHQUFxQyxDQUFyQztBQUNIO0FBQ0osQ0ExQkEsQ0FBRDs7Ozs7Ozs7Ozs7O0FDQUEiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zY3JpcHRzL21haW4uanMiLCJ3ZWJwYWNrOi8vLy4vYXNzZXRzL3N0eWxlcy9hcHAuc2NzcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvKlxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxuICpcbiAqIFdlIHJlY29tbWVuZCBpbmNsdWRpbmcgdGhlIGJ1aWx0IHZlcnNpb24gb2YgdGhpcyBKYXZhU2NyaXB0IGZpbGVcbiAqIChhbmQgaXRzIENTUyBmaWxlKSBpbiB5b3VyIGJhc2UgbGF5b3V0IChiYXNlLmh0bWwudHdpZykuXG4gKi9cblxuY29uc3QgJCA9IHJlcXVpcmUoJ2pxdWVyeScpO1xucmVxdWlyZSgnYm9vdHN0cmFwJyk7XG5yZXF1aXJlKCdib290c3RyYXAtaWNvbnMvZm9udC9ib290c3RyYXAtaWNvbnMuY3NzJyk7XG5pbXBvcnQgJy4vc3R5bGVzL2FwcC5zY3NzJztcbmltcG9ydCAnLi9zY3JpcHRzL21haW4uanMnO1xuXG4vLyBhbnkgQ1NTIHlvdSBpbXBvcnQgd2lsbCBvdXRwdXQgaW50byBhIHNpbmdsZSBjc3MgZmlsZSAoYXBwLmNzcyBpbiB0aGlzIGNhc2UpXG4vLyBpbXBvcnQgJy4vc3R5bGVzL2FwcC5jc3MnO1xuXG4vLyBzdGFydCB0aGUgU3RpbXVsdXMgYXBwbGljYXRpb25cbi8vIGltcG9ydCAnLi9ib290c3RyYXAnO1xuIiwiJChmdW5jdGlvbigpIHtcbiAgICAvL0dldCB0aGUgYnV0dG9uXG4gICAgbGV0IHNjcm9sbHVwID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoXCJzY3JvbGx1cFwiKTtcblxuICAgIC8vIFdoZW4gdGhlIHVzZXIgc2Nyb2xscyBkb3duIDIwcHggZnJvbSB0aGUgdG9wIG9mIHRoZSBkb2N1bWVudCwgc2hvdyB0aGUgYnV0dG9uXG4gICAgd2luZG93Lm9uc2Nyb2xsID0gZnVuY3Rpb24gKCkge1xuICAgICAgICBzY3JvbGxGdW5jdGlvbigpO1xuICAgIH07XG5cbiAgICBmdW5jdGlvbiBzY3JvbGxGdW5jdGlvbigpIHtcbiAgICAgICAgaWYgKFxuICAgICAgICAgICAgZG9jdW1lbnQuYm9keS5zY3JvbGxUb3AgPiAyMCB8fFxuICAgICAgICAgICAgZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LnNjcm9sbFRvcCA+IDIwXG4gICAgICAgICkge1xuICAgICAgICAgICAgc2Nyb2xsdXAuc3R5bGUuZGlzcGxheSA9IFwiYmxvY2tcIjtcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgIHNjcm9sbHVwLnN0eWxlLmRpc3BsYXkgPSBcIm5vbmVcIjtcbiAgICAgICAgfVxuICAgIH1cbiAgICAvLyBXaGVuIHRoZSB1c2VyIGNsaWNrcyBvbiB0aGUgYnV0dG9uLCBzY3JvbGwgdG8gdGhlIHRvcCBvZiB0aGUgZG9jdW1lbnRcbiAgICBzY3JvbGx1cC5hZGRFdmVudExpc3RlbmVyKFwiY2xpY2tcIiwgYmFja1RvVG9wKTtcblxuICAgIGZ1bmN0aW9uIGJhY2tUb1RvcCgpIHtcbiAgICAgICAgZG9jdW1lbnQuYm9keS5zY3JvbGxUb3AgPSAwO1xuICAgICAgICBkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuc2Nyb2xsVG9wID0gMDtcbiAgICB9XG59KTsiLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJzY3JvbGx1cCIsImRvY3VtZW50IiwiZ2V0RWxlbWVudEJ5SWQiLCJ3aW5kb3ciLCJvbnNjcm9sbCIsInNjcm9sbEZ1bmN0aW9uIiwiYm9keSIsInNjcm9sbFRvcCIsImRvY3VtZW50RWxlbWVudCIsInN0eWxlIiwiZGlzcGxheSIsImFkZEV2ZW50TGlzdGVuZXIiLCJiYWNrVG9Ub3AiXSwic291cmNlUm9vdCI6IiJ9