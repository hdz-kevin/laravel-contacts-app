/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/welcome.js":
/*!*********************************!*\
  !*** ./resources/js/welcome.js ***!
  \*********************************/
/***/ (() => {

eval("var navbar = document.querySelector(\".navbar\");\nvar welcome = document.querySelector(\".welcome\");\nvar navbarToggle = document.querySelector(\"#navbarSupportedContent\");\nvar resizeBakgroundImg = function resizeBakgroundImg() {\n  var height = window.innerHeight - navbar.clientHeight;\n  welcome.style.height = \"\".concat(height, \"px\");\n};\nnavbarToggle.ontransitionend = resizeBakgroundImg;\nnavbarToggle.ontransitionstart = resizeBakgroundImg;\nwindow.onresize = resizeBakgroundImg;\nwindow.onload = resizeBakgroundImg;\ndocument.querySelector(\"main\").classList.remove(\"py-4\");//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvd2VsY29tZS5qcyIsIm5hbWVzIjpbIm5hdmJhciIsImRvY3VtZW50IiwicXVlcnlTZWxlY3RvciIsIndlbGNvbWUiLCJuYXZiYXJUb2dnbGUiLCJyZXNpemVCYWtncm91bmRJbWciLCJoZWlnaHQiLCJ3aW5kb3ciLCJpbm5lckhlaWdodCIsImNsaWVudEhlaWdodCIsInN0eWxlIiwiY29uY2F0Iiwib250cmFuc2l0aW9uZW5kIiwib250cmFuc2l0aW9uc3RhcnQiLCJvbnJlc2l6ZSIsIm9ubG9hZCIsImNsYXNzTGlzdCIsInJlbW92ZSJdLCJzb3VyY2VSb290IjoiIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vcmVzb3VyY2VzL2pzL3dlbGNvbWUuanM/MjZkMiJdLCJzb3VyY2VzQ29udGVudCI6WyJjb25zdCBuYXZiYXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLm5hdmJhclwiKTtcbmNvbnN0IHdlbGNvbWUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiLndlbGNvbWVcIik7XG5jb25zdCBuYXZiYXJUb2dnbGUgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwiI25hdmJhclN1cHBvcnRlZENvbnRlbnRcIik7XG5cbmNvbnN0IHJlc2l6ZUJha2dyb3VuZEltZyA9ICgpID0+IHtcbiAgY29uc3QgaGVpZ2h0ID0gd2luZG93LmlubmVySGVpZ2h0IC0gbmF2YmFyLmNsaWVudEhlaWdodDtcbiAgd2VsY29tZS5zdHlsZS5oZWlnaHQgPSBgJHtoZWlnaHR9cHhgO1xufTtcblxubmF2YmFyVG9nZ2xlLm9udHJhbnNpdGlvbmVuZCA9IHJlc2l6ZUJha2dyb3VuZEltZztcbm5hdmJhclRvZ2dsZS5vbnRyYW5zaXRpb25zdGFydCA9IHJlc2l6ZUJha2dyb3VuZEltZztcbndpbmRvdy5vbnJlc2l6ZSA9IHJlc2l6ZUJha2dyb3VuZEltZztcbndpbmRvdy5vbmxvYWQgPSByZXNpemVCYWtncm91bmRJbWc7XG5kb2N1bWVudC5xdWVyeVNlbGVjdG9yKFwibWFpblwiKS5jbGFzc0xpc3QucmVtb3ZlKFwicHktNFwiKTtcbiJdLCJtYXBwaW5ncyI6IkFBQUEsSUFBTUEsTUFBTSxHQUFHQyxRQUFRLENBQUNDLGFBQWEsQ0FBQyxTQUFTLENBQUM7QUFDaEQsSUFBTUMsT0FBTyxHQUFHRixRQUFRLENBQUNDLGFBQWEsQ0FBQyxVQUFVLENBQUM7QUFDbEQsSUFBTUUsWUFBWSxHQUFHSCxRQUFRLENBQUNDLGFBQWEsQ0FBQyx5QkFBeUIsQ0FBQztBQUV0RSxJQUFNRyxrQkFBa0IsR0FBRyxTQUFyQkEsa0JBQWtCQSxDQUFBLEVBQVM7RUFDL0IsSUFBTUMsTUFBTSxHQUFHQyxNQUFNLENBQUNDLFdBQVcsR0FBR1IsTUFBTSxDQUFDUyxZQUFZO0VBQ3ZETixPQUFPLENBQUNPLEtBQUssQ0FBQ0osTUFBTSxNQUFBSyxNQUFBLENBQU1MLE1BQU0sT0FBSTtBQUN0QyxDQUFDO0FBRURGLFlBQVksQ0FBQ1EsZUFBZSxHQUFHUCxrQkFBa0I7QUFDakRELFlBQVksQ0FBQ1MsaUJBQWlCLEdBQUdSLGtCQUFrQjtBQUNuREUsTUFBTSxDQUFDTyxRQUFRLEdBQUdULGtCQUFrQjtBQUNwQ0UsTUFBTSxDQUFDUSxNQUFNLEdBQUdWLGtCQUFrQjtBQUNsQ0osUUFBUSxDQUFDQyxhQUFhLENBQUMsTUFBTSxDQUFDLENBQUNjLFNBQVMsQ0FBQ0MsTUFBTSxDQUFDLE1BQU0sQ0FBQyIsImlnbm9yZUxpc3QiOltdfQ==\n//# sourceURL=webpack-internal:///./resources/js/welcome.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/welcome.js"]();
/******/ 	
/******/ })()
;