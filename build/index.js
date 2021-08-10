(window["webpackJsonp_oik_bob_bing_wide"] = window["webpackJsonp_oik_bob_bing_wide"] || []).push([["style-index"],{

/***/ "./src/github/style.scss":
/*!*******************************!*\
  !*** ./src/github/style.scss ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/oik-csv/style.scss":
/*!********************************!*\
  !*** ./src/oik-csv/style.scss ***!
  \********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/oik-wp/style.scss":
/*!*******************************!*\
  !*** ./src/oik-wp/style.scss ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

}]);

/******/ (function(modules) { // webpackBootstrap
/******/ 	// install a JSONP callback for chunk loading
/******/ 	function webpackJsonpCallback(data) {
/******/ 		var chunkIds = data[0];
/******/ 		var moreModules = data[1];
/******/ 		var executeModules = data[2];
/******/
/******/ 		// add "moreModules" to the modules object,
/******/ 		// then flag all "chunkIds" as loaded and fire callback
/******/ 		var moduleId, chunkId, i = 0, resolves = [];
/******/ 		for(;i < chunkIds.length; i++) {
/******/ 			chunkId = chunkIds[i];
/******/ 			if(Object.prototype.hasOwnProperty.call(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 				resolves.push(installedChunks[chunkId][0]);
/******/ 			}
/******/ 			installedChunks[chunkId] = 0;
/******/ 		}
/******/ 		for(moduleId in moreModules) {
/******/ 			if(Object.prototype.hasOwnProperty.call(moreModules, moduleId)) {
/******/ 				modules[moduleId] = moreModules[moduleId];
/******/ 			}
/******/ 		}
/******/ 		if(parentJsonpFunction) parentJsonpFunction(data);
/******/
/******/ 		while(resolves.length) {
/******/ 			resolves.shift()();
/******/ 		}
/******/
/******/ 		// add entry modules from loaded chunk to deferred list
/******/ 		deferredModules.push.apply(deferredModules, executeModules || []);
/******/
/******/ 		// run deferred modules when all chunks ready
/******/ 		return checkDeferredModules();
/******/ 	};
/******/ 	function checkDeferredModules() {
/******/ 		var result;
/******/ 		for(var i = 0; i < deferredModules.length; i++) {
/******/ 			var deferredModule = deferredModules[i];
/******/ 			var fulfilled = true;
/******/ 			for(var j = 1; j < deferredModule.length; j++) {
/******/ 				var depId = deferredModule[j];
/******/ 				if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 			}
/******/ 			if(fulfilled) {
/******/ 				deferredModules.splice(i--, 1);
/******/ 				result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 			}
/******/ 		}
/******/
/******/ 		return result;
/******/ 	}
/******/
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// object to store loaded and loading chunks
/******/ 	// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 	// Promise = chunk loading, 0 = chunk loaded
/******/ 	var installedChunks = {
/******/ 		"index": 0
/******/ 	};
/******/
/******/ 	var deferredModules = [];
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	var jsonpArray = window["webpackJsonp_oik_bob_bing_wide"] = window["webpackJsonp_oik_bob_bing_wide"] || [];
/******/ 	var oldJsonpFunction = jsonpArray.push.bind(jsonpArray);
/******/ 	jsonpArray.push = webpackJsonpCallback;
/******/ 	jsonpArray = jsonpArray.slice();
/******/ 	for(var i = 0; i < jsonpArray.length; i++) webpackJsonpCallback(jsonpArray[i]);
/******/ 	var parentJsonpFunction = oldJsonpFunction;
/******/
/******/
/******/ 	// add entry module to deferred list
/******/ 	deferredModules.push(["./src/index.js","style-index"]);
/******/ 	// run deferred modules when ready
/******/ 	return checkDeferredModules();
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js":
/*!**********************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/assertThisInitialized.js ***!
  \**********************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _assertThisInitialized(self) {
  if (self === void 0) {
    throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
  }

  return self;
}

module.exports = _assertThisInitialized;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/classCallCheck.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/classCallCheck.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

module.exports = _classCallCheck;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/createClass.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/createClass.js ***!
  \************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _defineProperties(target, props) {
  for (var i = 0; i < props.length; i++) {
    var descriptor = props[i];
    descriptor.enumerable = descriptor.enumerable || false;
    descriptor.configurable = true;
    if ("value" in descriptor) descriptor.writable = true;
    Object.defineProperty(target, descriptor.key, descriptor);
  }
}

function _createClass(Constructor, protoProps, staticProps) {
  if (protoProps) _defineProperties(Constructor.prototype, protoProps);
  if (staticProps) _defineProperties(Constructor, staticProps);
  return Constructor;
}

module.exports = _createClass;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/getPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _getPrototypeOf(o) {
  module.exports = _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) {
    return o.__proto__ || Object.getPrototypeOf(o);
  };
  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _getPrototypeOf(o);
}

module.exports = _getPrototypeOf;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/inherits.js":
/*!*********************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/inherits.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var setPrototypeOf = __webpack_require__(/*! ./setPrototypeOf.js */ "./node_modules/@babel/runtime/helpers/setPrototypeOf.js");

function _inherits(subClass, superClass) {
  if (typeof superClass !== "function" && superClass !== null) {
    throw new TypeError("Super expression must either be null or a function");
  }

  subClass.prototype = Object.create(superClass && superClass.prototype, {
    constructor: {
      value: subClass,
      writable: true,
      configurable: true
    }
  });
  if (superClass) setPrototypeOf(subClass, superClass);
}

module.exports = _inherits;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js":
/*!**************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js ***!
  \**************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var _typeof = __webpack_require__(/*! @babel/runtime/helpers/typeof */ "./node_modules/@babel/runtime/helpers/typeof.js")["default"];

var assertThisInitialized = __webpack_require__(/*! ./assertThisInitialized.js */ "./node_modules/@babel/runtime/helpers/assertThisInitialized.js");

function _possibleConstructorReturn(self, call) {
  if (call && (_typeof(call) === "object" || typeof call === "function")) {
    return call;
  }

  return assertThisInitialized(self);
}

module.exports = _possibleConstructorReturn;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/setPrototypeOf.js":
/*!***************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/setPrototypeOf.js ***!
  \***************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _setPrototypeOf(o, p) {
  module.exports = _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) {
    o.__proto__ = p;
    return o;
  };

  module.exports["default"] = module.exports, module.exports.__esModule = true;
  return _setPrototypeOf(o, p);
}

module.exports = _setPrototypeOf;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/typeof.js":
/*!*******************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/typeof.js ***!
  \*******************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _typeof(obj) {
  "@babel/helpers - typeof";

  if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") {
    module.exports = _typeof = function _typeof(obj) {
      return typeof obj;
    };

    module.exports["default"] = module.exports, module.exports.__esModule = true;
  } else {
    module.exports = _typeof = function _typeof(obj) {
      return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
    };

    module.exports["default"] = module.exports, module.exports.__esModule = true;
  }

  return _typeof(obj);
}

module.exports = _typeof;
module.exports["default"] = module.exports, module.exports.__esModule = true;

/***/ }),

/***/ "./src/github/editor.scss":
/*!********************************!*\
  !*** ./src/github/editor.scss ***!
  \********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/github/index.js":
/*!*****************************!*\
  !*** ./src/github/index.js ***!
  \*****************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./src/github/style.scss");
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./editor.scss */ "./src/github/editor.scss");
/* harmony import */ var _transforms_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./transforms.js */ "./src/github/transforms.js");


/**
 * Implements GitHub Issue shortcode block
 * 
 * Uses [github] shortcode from oik-bob-bing-wide plugin
 *
 * @copyright (C) Copyright Bobbing Wide 2018-2020
 * @author Herb Miller @bobbingwide
 */


 // Get just the __() localization function from wp.i18n

var __ = wp.i18n.__; // Get registerBlockType wp.blocks

var registerBlockType = wp.blocks.registerBlockType; // Set the h2 header for the block since it is reused

var blockHeader = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("h3", null, __('GitHub Issue', 'oik-blocks'));
var TextControl = wp.components.TextControl;
/**
 * Register example block
 */

/* harmony default export */ __webpack_exports__["default"] = (registerBlockType( // Namespaced, hyphens, lowercase, unique name
'oik-bbw/github', {
  // Localize title using wp.i18n.__()
  title: __('GitHub Issue', 'oik-blocks'),
  description: 'Display a link to a GitHub issue',
  // Category Options: common, formatting, layout, widgets, embed
  category: 'common',
  // Dashicons Options - https://goo.gl/aTM1DQ
  icon: 'wordpress-alt',
  // Limit to 3 Keywords / Phrases
  keywords: [__('GitHub Issue', 'oik-blocks'), __('Link', 'oik-blocks'), __('oik', 'oik-blocks')],
  // Set for each piece of dynamic data used in your block
  attributes: {
    shortcode: {
      type: 'string',
      default: 'github'
    },
    owner: {
      type: 'string',
      default: 'wordpress'
    },
    repo: {
      type: 'string',
      default: 'gutenberg'
    },
    issue: {
      type: 'string'
    }
  },
  transforms: _transforms_js__WEBPACK_IMPORTED_MODULE_3__["transforms"],
  edit: function edit(props) {
    var onChangeInput = function onChangeInput(event) {
      props.setAttributes({
        issue: event
      });
    };

    var onChangeOwner = function onChangeOwner(event) {
      props.setAttributes({
        owner: event
      });
    };

    var onChangeRepo = function onChangeRepo(event) {
      props.setAttributes({
        repo: event
      });
    }; //const focus = ( focus ) => {
    //props.setAttributes( { issue: 'fred' } );
    //};


    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: props.className
    }, blockHeader, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(TextControl, {
      id: "owner",
      label: "Owner",
      value: props.attributes.owner,
      onChange: onChangeOwner,
      onFocus: focus
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(TextControl, {
      id: "repo",
      label: "Repository",
      value: props.attributes.repo,
      onChange: onChangeRepo,
      onFocus: focus
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(TextControl, {
      id: "issue",
      label: "Issue",
      value: props.attributes.issue,
      onChange: onChangeInput,
      onFocus: focus
    }));
  },
  save: function save(props) {
    // console.log( props );
    //var shortcode =  {props.attributes.issue} ;
    var lsb = '[';
    var rsb = ']';
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, blockHeader, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", null, lsb, "github ", props.attributes.owner, " ", props.attributes.repo, " issue ", props.attributes.issue, rsb));
  }
}));

/***/ }),

/***/ "./src/github/transforms.js":
/*!**********************************!*\
  !*** ./src/github/transforms.js ***!
  \**********************************/
/*! exports provided: transforms */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "transforms", function() { return transforms; });
/* Transformation to oik-bbw/github of oik-block/github and [github]
 *
 * You'll find that the shortcode doesn't transform if it's been coded with positional parameters.
 */
var createBlock = wp.blocks.createBlock;
var transforms = {
  from: [{
    type: 'block',
    blocks: ['oik-block/github'],
    transform: function transform(attributes) {
      return createBlock('oik-bbw/github', {
        content: attributes.content,
        owner: attributes.owner,
        repo: attributes.repo,
        issue: attributes.issue
      });
    }
  }, {
    type: 'shortcode',
    tag: 'github',
    attributes: {
      owner: {
        type: 'string',
        shortcode: function shortcode(_ref) {
          var owner = _ref.named.owner;
          return owner;
        }
      },
      repo: {
        type: 'string',
        shortcode: function shortcode(_ref2) {
          var repo = _ref2.named.repo;
          return repo;
        }
      },
      issue: {
        type: 'string',
        shortcode: function shortcode(_ref3) {
          var issue = _ref3.named.issue;
          return issue;
        }
      }
    }
  }]
};


/***/ }),

/***/ "./src/index.js":
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _github__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./github */ "./src/github/index.js");
/* harmony import */ var _oik_csv__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./oik-csv */ "./src/oik-csv/index.js");
/* harmony import */ var _oik_wp__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./oik-wp */ "./src/oik-wp/index.js");
/* harmony import */ var _oik_search__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./oik-search */ "./src/oik-search/index.js");
/* harmony import */ var _oik_dashicon__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./oik-dashicon */ "./src/oik-dashicon/index.js");
/**
 * Imports oik shortcode blocks
 *
 * Each shortcode block is in a separate folder
 * The build directory is the target. 
 * See webpack.config.js
 * 
 * @copyright (C) Copyright Bobbing Wide 2018, 2019, 2020
 * @author Herb Miller @bobbingwide
 */
 // From oik-bob-bing-wide
//import './oik-address';		 // From oik & oik-user
//import './oik-googlemap';    // From oik bw_show_googlemap
//import './oik-person';       // From oik-user bw_user  and bw_follow_me etc
//import './oik-contact-form'; // From oik bw_contact_form
//import './oik-follow-me';    // From oik bw_follow_me
//import './oik-countdown';    // From oik bw_countdown
//import './oik-nivo';         // From oik-nivo-slider nivo
//import './oik-css';          // From oik-css bw_css

 // From oik-bob-bing-wide bw_csv
//import './oik-shortcode';    // From oik general purpose shortcode block

 // From oik-bob-bing-wide wp shortcode
//import './oik-geshi';        // From oik-css bw_geshi shortcode

 // From WordPress - get_search_form()
//import './oik-uk-tides';     // From uk-tides - [bw_tides] shortcode
//import './oik-fields';       // From oik-fields - [bw_fields] and [bw_field] shortcode

 // From oik-bob-bing-wide [bw_dash]
//import './oik-blockicon';    // Displays a selected BlockIcon
//import './oik-blockinfo';    // Displays a selected Block's information
//import './oik-blocklist';    // Displays a list of Blocks for a selected prefix
//import './oik-inline-shortcode'; // First attempt at inline shortcodes added by a toolbar button

/***/ }),

/***/ "./src/oik-csv/editor.scss":
/*!*********************************!*\
  !*** ./src/oik-csv/editor.scss ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/oik-csv/icons.js":
/*!******************************!*\
  !*** ./src/oik-csv/icons.js ***!
  \******************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

var icons = {};
icons.descriptionList = Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("svg", {
  id: "SVGRoot",
  version: "1.1",
  viewBox: "0 0 128 128",
  height: "20px",
  width: "20px"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("g", {
  id: "layer1"
}, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  ry: "0.25",
  rx: "19.75",
  y: "25",
  x: "15.5",
  height: "11.5",
  width: "41.5",
  id: "rect6037"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  ry: "0.25",
  rx: "19.75",
  y: "49.75",
  x: "36.5",
  height: "11.5",
  width: "61",
  id: "rect6092-0"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  ry: "0.25",
  rx: "19.75",
  y: "80.5",
  x: "17.5",
  height: "11.5",
  width: "41.5",
  id: "rect6062"
}), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("rect", {
  ry: "0.25",
  rx: "19.75",
  y: "104.75",
  x: "33.25",
  height: "11.5",
  width: "61",
  id: "rect6062-0"
})));
/* harmony default export */ __webpack_exports__["default"] = (icons);

/***/ }),

/***/ "./src/oik-csv/index.js":
/*!******************************!*\
  !*** ./src/oik-csv/index.js ***!
  \******************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./src/oik-csv/style.scss");
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./editor.scss */ "./src/oik-csv/editor.scss");
/* harmony import */ var _transforms_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./transforms.js */ "./src/oik-csv/transforms.js");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! lodash */ "lodash");
/* harmony import */ var lodash__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(lodash__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _icons_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./icons.js */ "./src/oik-csv/icons.js");


/**
 * Implements CSV block
 *
 * Uses [bw_csv] shortcode from oik- plugin
 *
 * @copyright (C) Copyright Bobbing Wide 2018, 2019, 2020
 * @author Herb Miller @bobbingwide
 */

 //import portOptions from "../oik-uk-tides/tidetimes-co-uk";

 // Get just the __() localization function from wp.i18n

var __ = wp.i18n.__; // Get registerBlockType and Editable from wp.blocks

var registerBlockType = wp.blocks.registerBlockType;
var _wp$editor = wp.editor,
    Editable = _wp$editor.Editable,
    AlignmentToolbar = _wp$editor.AlignmentToolbar,
    ServerSideRender = _wp$editor.ServerSideRender;
var _wp$blockEditor = wp.blockEditor,
    InspectorControls = _wp$blockEditor.InspectorControls,
    BlockControls = _wp$blockEditor.BlockControls,
    PlainText = _wp$blockEditor.PlainText;
var _wp$components = wp.components,
    Toolbar = _wp$components.Toolbar,
    Button = _wp$components.Button,
    Tooltip = _wp$components.Tooltip,
    PanelBody = _wp$components.PanelBody,
    PanelRow = _wp$components.PanelRow,
    FormToggle = _wp$components.FormToggle,
    TextControl = _wp$components.TextControl,
    SelectControl = _wp$components.SelectControl,
    ToggleControl = _wp$components.ToggleControl;
var withInstanceId = wp.compose.withInstanceId;
var Fragment = wp.element.Fragment;
var RawHTML = wp.element.RawHTML;
 // Set the header for the block since it is reused
//const blockHeader = <h3>{ __( 'Person' ) }</h3>;
//var TextControl = wp.blocks.InspectorControls.TextControl;


/**
 * Register the oik-block/csv block
 * 
 * registerBlockType is a function which takes the name of the block to register
 * and an object that contains the properties of the block.
 * Some of these properties are objects and others are functions
 */

/* harmony default export */ __webpack_exports__["default"] = (registerBlockType( // Namespaced, hyphens, lowercase, unique name
'oik-bbw/csv', {
  // Localize title using wp.i18n.__()
  title: __('CSV'),
  description: 'Displays CSV content',
  // Category Options: common, formatting, layout, widgets, embed
  category: 'layout',
  // Dashicons Options - https://goo.gl/aTM1DQ
  icon: 'media-spreadsheet',
  // Limit to 3 Keywords / Phrases
  keywords: [__('CSV'), __('list'), __('oik')],
  // Set for each piece of dynamic data used in your block
  attributes: {
    content: {
      type: 'string'
    },
    uo: {
      type: 'string',
      default: ''
    },
    th: {
      type: 'boolean',
      default: true
    },
    src: {
      type: 'string',
      default: ''
    }
  },
  transforms: _transforms_js__WEBPACK_IMPORTED_MODULE_3__["transforms"],
  supports: {
    customClassName: false,
    className: false,
    html: false
  },
  edit: withInstanceId(function (_ref) {
    var attributes = _ref.attributes,
        setAttributes = _ref.setAttributes,
        instanceId = _ref.instanceId,
        isSelected = _ref.isSelected;
    var inputId = "blocks-csv-input-".concat(instanceId);

    var onChangeContent = function onChangeContent(value) {
      value = value.replace(/<br>/g, '\n');
      console.log(value);
      setAttributes({
        content: value
      });
    };

    var onChangeAlignment = function onChangeAlignment(value) {};

    var onChangeUo = function onChangeUo(value) {
      setAttributes({
        uo: value
      });
    };

    var onChangeSrc = function onChangeSrc(value) {
      setAttributes({
        src: value
      });
    };

    function isTable() {
      return attributes.uo == "";
    }

    function isUl() {
      return attributes.uo == "u";
    }

    function isOl() {
      return attributes.uo == "o";
    }

    function isDl() {
      return attributes.uo == "d";
    }

    function setTable() {
      setAttributes({
        uo: ""
      });
    }

    function setUl() {
      setAttributes({
        uo: "u"
      });
    }

    function setOl() {
      setAttributes({
        uo: "o"
      });
    }

    function setDl() {
      setAttributes({
        uo: "d"
      });
    }

    var onChangeTh = function onChangeTh(event) {
      setAttributes({
        th: !attributes.th
      });
    };

    var uoOptions = {
      "": "Table",
      "u": "Unordered list",
      "o": "Ordered list",
      "d": "Description list"
    };
    var mapped = Object(lodash__WEBPACK_IMPORTED_MODULE_4__["map"])(uoOptions, function (key, label) {
      return {
        value: label,
        label: key
      };
    });
    console.log(mapped);
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, {
      key: "csv"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(SelectControl, {
      label: "Format",
      value: attributes.uo,
      onChange: onChangeUo,
      options: mapped
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelRow, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ToggleControl, {
      label: __('Format table heading'),
      checked: !!attributes.th,
      onChange: onChangeTh
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelRow, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(TextControl, {
      label: __('Source file: ID, URL or path'),
      value: attributes.src,
      onChange: onChangeSrc
    })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(BlockControls, {
      key: "flagbogtiddle",
      controls: [{
        icon: 'editor-table',
        title: __('Display as table'),
        isActive: isTable(),
        onClick: setTable
      }, {
        icon: 'editor-ul',
        title: __('Display as unordered list'),
        isActive: isUl(),
        onClick: setUl
      }, {
        icon: 'editor-ol',
        title: __('Display as ordered list'),
        isActive: isOl(),
        onClick: setOl
      }, {
        icon: _icons_js__WEBPACK_IMPORTED_MODULE_5__["default"].descriptionList,
        title: __('Display as description list'),
        isActive: isDl(),
        onClick: setDl
      }]
    }), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("div", {
      className: "wp-block-oik-block-csv"
    }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PlainText, {
      id: inputId,
      value: attributes.content,
      placeholder: __('Enter your CSV data or specify a source file.'),
      onChange: onChangeContent
    })), !isSelected && Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ServerSideRender, {
      block: "oik-bbw/csv",
      attributes: attributes
    })));
  }),

  /**
   * We intend to render this dynamically. The content created by the user
   * is stored in the content attribute.
   * 
   */
  save: function save(_ref2) {
    var attributes = _ref2.attributes;
    return null;
  }
}));

/***/ }),

/***/ "./src/oik-csv/transforms.js":
/*!***********************************!*\
  !*** ./src/oik-csv/transforms.js ***!
  \***********************************/
/*! exports provided: transforms */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "transforms", function() { return transforms; });
/* Transformation to oik-bbw/csv of to oik-block/csv and [bw_csv]
 *
 *
 */
var createBlock = wp.blocks.createBlock;
var transforms = {
  from: [{
    type: 'block',
    blocks: ['oik-block/csv'],
    transform: function transform(attributes) {
      return createBlock('oik-bbw/csv', {
        content: attributes.content,
        th: attributes.th,
        uo: attributes.uo
      });
    }
  }, {
    type: 'shortcode',
    tag: 'bw_csv',
    attributes: {
      content: {
        type: 'string',
        source: 'html'
      }
    }
  }]
};


/***/ }),

/***/ "./src/oik-dashicon/dashiconlist.js":
/*!******************************************!*\
  !*** ./src/oik-dashicon/dashiconlist.js ***!
  \******************************************/
/*! exports provided: dashiconslist */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "dashiconslist", function() { return dashiconslist; });
var dashiconslist = ['admin-appearance', 'admin-collapse', 'admin-comments', 'admin-customizer', 'admin-generic', 'admin-home', 'admin-links', 'admin-media', 'admin-multisite', 'admin-network', 'admin-page', 'admin-plugins', 'admin-post', 'admin-settings', 'admin-site', 'admin-tools', 'admin-users', 'album', 'align-center', 'align-left', 'align-none', 'align-right', 'analytics', 'archive', 'arrow-down', 'arrow-down-alt', 'arrow-down-alt2', 'arrow-left', 'arrow-left-alt', 'arrow-left-alt2', 'arrow-right', 'arrow-right-alt', 'arrow-right-alt2', 'arrow-up', 'arrow-up-alt', 'arrow-up-alt2', 'art', 'awards', 'backup', 'book', 'book-alt', 'building', 'businessman', 'calendar', 'calendar-alt', 'camera', 'carrot', 'cart', 'category', 'chart-area', 'chart-bar', 'chart-line', 'chart-pie', 'clipboard', 'clock', 'cloud', 'controls-back', 'controls-forward', 'controls-pause', 'controls-play', 'controls-repeat', 'controls-skipback', 'controls-skipforward', 'controls-volumeoff', 'controls-volumeon', 'dashboard', 'desktop', 'dismiss', 'download', 'edit', 'editor-aligncenter', 'editor-alignleft', 'editor-alignright', 'editor-bold', 'editor-break', 'editor-code', 'editor-contract', 'editor-customchar', 'editor-distractionfree', 'editor-expand', 'editor-help', 'editor-indent', 'editor-insertmore', 'editor-italic', 'editor-justify', 'editor-kitchensink', 'editor-ol', 'editor-outdent', 'editor-paragraph', 'editor-paste-word', 'editor-quote', 'editor-removeformatting', 'editor-rtl', 'editor-spellcheck', 'editor-strikethrough', 'editor-table', 'editor-textcolor', 'editor-ul', 'editor-underline', 'editor-unlink', 'editor-video', 'email', 'email-alt', 'excerpt-view', 'exerpt-view', 'external', 'facebook', 'facebook-alt', 'feedback', 'filter', 'flag', 'format-aside', 'format-audio', 'format-chat', 'format-gallery', 'format-image', 'format-quote', 'format-status', 'format-video', 'forms', 'googleplus', 'grid-view', 'groups', 'hammer', 'heart', 'hidden', 'id', 'id-alt', 'image-crop', 'image-filter', 'image-flip-horizontal', 'image-flip-vertical', 'image-rotate', 'image-rotate-left', 'image-rotate-right', 'images-alt', 'images-alt2', 'index-card', 'info', 'laptop', 'layout', 'leftright', 'lightbulb', 'list-view', 'location', 'location-alt', 'lock', 'marker', 'media-archive', 'media-audio', 'media-code', 'media-default', 'media-document', 'media-interactive', 'media-spreadsheet', 'media-text', 'media-video', 'megaphone', 'menu', 'microphone', 'migrate', 'minus', 'money', 'move', 'nametag', 'networking', 'no', 'no-alt', 'palmtree', 'paperclip', 'performance', 'phone', 'playlist-audio', 'playlist-video', 'plus', 'plus-alt', 'plus-alt2', 'portfolio', 'post-status', 'pressthis', 'products', 'randomize', 'redo', 'rss', 'schedule', 'screenoptions', 'search', 'share', 'share-alt', 'share-alt2', 'share1', 'shield', 'shield-alt', 'slides', 'smartphone', 'smiley', 'sort', 'sos', 'star-empty', 'star-filled', 'star-half', 'sticky', 'store', 'tablet', 'tag', 'tagcloud', 'testimonial', 'text', 'thumbs-down', 'thumbs-up', 'tickets', 'tickets-alt', 'translation', 'trash', 'twitter', 'undo', 'universal-access', 'universal-access-alt', 'unlock', 'update', 'upload', 'vault', 'video-alt', 'video-alt2', 'video-alt3', 'visibility', 'warning', 'welcome-add-page', 'welcome-comments', 'welcome-learn-more', 'welcome-view-site', 'welcome-widgets-menus', 'welcome-write-blog', 'wordpress', 'wordpress-alt', 'yes'];


/***/ }),

/***/ "./src/oik-dashicon/dashicons.js":
/*!***************************************!*\
  !*** ./src/oik-dashicon/dashicons.js ***!
  \***************************************/
/*! exports provided: DashiconsSelect */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DashiconsSelect", function() { return DashiconsSelect; });
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/classCallCheck */ "./node_modules/@babel/runtime/helpers/classCallCheck.js");
/* harmony import */ var _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @babel/runtime/helpers/createClass */ "./node_modules/@babel/runtime/helpers/createClass.js");
/* harmony import */ var _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @babel/runtime/helpers/inherits */ "./node_modules/@babel/runtime/helpers/inherits.js");
/* harmony import */ var _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @babel/runtime/helpers/possibleConstructorReturn */ "./node_modules/@babel/runtime/helpers/possibleConstructorReturn.js");
/* harmony import */ var _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @babel/runtime/helpers/getPrototypeOf */ "./node_modules/@babel/runtime/helpers/getPrototypeOf.js");
/* harmony import */ var _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _dashiconlist_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./dashiconlist.js */ "./src/oik-dashicon/dashiconlist.js");







function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _babel_runtime_helpers_getPrototypeOf__WEBPACK_IMPORTED_MODULE_4___default()(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _babel_runtime_helpers_possibleConstructorReturn__WEBPACK_IMPORTED_MODULE_3___default()(this, result); }; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

/*
 * Dashicons Select list
 *
 * @copyright (C) Copyright Bobbing Wide 2019
 * @author Herb Miller @bobbingwide
 *
 * We want a big list of icons from which the user can choose one to have displayed in the Dashicon block.
 * The Dashicon component covers the standard WordPress list
 *
 * 'Blockicons', my name for the icons associated with blocks are a slightly different kettle of fish.
 * How do we enumerate the icon attributes of the registered block types?
 *
 *
 *
 */
var Component = wp.element.Component;
var Dashicon = wp.components.Dashicon;

/**
 * This hard coded logic should be replaced by some mapping stuff
 * where each of the Dashicons values are displayed.
 * Assume we can do this in a standard select list
 */

var DashiconsSelect = /*#__PURE__*/function (_Component) {
  _babel_runtime_helpers_inherits__WEBPACK_IMPORTED_MODULE_2___default()(DashiconsSelect, _Component);

  var _super = _createSuper(DashiconsSelect);

  function DashiconsSelect() {
    _babel_runtime_helpers_classCallCheck__WEBPACK_IMPORTED_MODULE_0___default()(this, DashiconsSelect);

    return _super.apply(this, arguments);
  }

  _babel_runtime_helpers_createClass__WEBPACK_IMPORTED_MODULE_1___default()(DashiconsSelect, [{
    key: "render",
    value: function render() {
      var _this = this;

      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("ul", null, _dashiconlist_js__WEBPACK_IMPORTED_MODULE_6__["dashiconslist"].map(function (icon) {
        return _this.renderDashicon(icon);
      }));
    }
  }, {
    key: "renderDashicon",
    value: function renderDashicon(icon) {
      return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])("li", {
        key: icon
      }, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_5__["createElement"])(Dashicon, {
        icon: icon
      }), " ", icon, " ");
    }
  }]);

  return DashiconsSelect;
}(Component);



/***/ }),

/***/ "./src/oik-dashicon/index.js":
/*!***********************************!*\
  !*** ./src/oik-dashicon/index.js ***!
  \***********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _transforms_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./transforms.js */ "./src/oik-dashicon/transforms.js");
/* harmony import */ var _dashicons_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./dashicons.js */ "./src/oik-dashicon/dashicons.js");


/**
 * Implements [bw_dash] shortcode
 *
 * tries to use Dashicon component
 *
 * @copyright (C) Copyright Bobbing Wide 2019, 2020
 * @author Herb Miller @bobbingwide
 */
//import './style.scss';
//import './editor.scss';
 // Get just the __() localization function from wp.i18n

var __ = wp.i18n.__; // Get registerBlockType from wp.blocks

var registerBlockType = wp.blocks.registerBlockType;
var ServerSideRender = wp.editor.ServerSideRender;
var InspectorControls = wp.blockEditor.InspectorControls;
var _wp$components = wp.components,
    Toolbar = _wp$components.Toolbar,
    PanelBody = _wp$components.PanelBody,
    PanelRow = _wp$components.PanelRow,
    FormToggle = _wp$components.FormToggle,
    TextControl = _wp$components.TextControl,
    Dashicon = _wp$components.Dashicon;
 //import { BlockiconsSelect } from './blockicons.js';

var Fragment = wp.element.Fragment;
/**
 * Register the WordPress block
 */

/* harmony default export */ __webpack_exports__["default"] = (registerBlockType( // Namespaced, hyphens, lowercase, unique name
'oik-bbw/dashicon', {
  // Localize title using wp.i18n.__()
  title: __('Dashicon'),
  description: 'Displays icons',
  // Category Options: common, formatting, layout, widgets, embed
  category: 'widgets',
  // Dashicons Options - https://goo.gl/aTM1DQ
  icon: 'heart',
  // Limit to 3 Keywords / Phrases
  keywords: [__('icon'), __('oik'), __('dash')],
  // Set for each piece of dynamic data used in your block
  attributes: {
    dashicon: {
      type: 'string',
      default: 'heart'
    }
  },
  transforms: _transforms_js__WEBPACK_IMPORTED_MODULE_1__["transforms"],
  edit: function edit(props) {
    var onChangeDashicon = function onChangeDashicon(event) {
      props.setAttributes({
        dashicon: event
      });
    };

    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelRow, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(TextControl, {
      label: "Dashicon",
      value: props.attributes.dashicon,
      onChange: onChangeDashicon
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelRow, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(_dashicons_js__WEBPACK_IMPORTED_MODULE_2__["DashiconsSelect"], null)))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])("p", null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Dashicon, {
      icon: props.attributes.dashicon
    })));
  },

  /*
  <ServerSideRender
              block="oik-block/dashicon" attributes={ props.attributes }
          />
   */
  save: function save(props) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Dashicon, {
      icon: props.attributes.dashicon
    });
  }
}));

/***/ }),

/***/ "./src/oik-dashicon/transforms.js":
/*!****************************************!*\
  !*** ./src/oik-dashicon/transforms.js ***!
  \****************************************/
/*! exports provided: transforms */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "transforms", function() { return transforms; });
/* Transformation to oik-bbw/dashicon of oik-block/dashicon and [bw_dash]
 *
 * You'll find that the shortcode doesn't transform if it's been coded with positional parameters.
 * Actually, I can't get it to work with a parameter name of icon either.
 */
var createBlock = wp.blocks.createBlock;
var transforms = {
  from: [{
    type: 'block',
    blocks: ['oik-block/dashicon'],
    transform: function transform(attributes) {
      return createBlock('oik-bbw/dashicon', {
        dashicon: attributes.dashicon
      });
    }
  }, {
    type: 'shortcode',
    tag: 'bw_dash',
    attributes: {
      dashicon: {
        type: 'string',
        shortcode: function shortcode(_ref) {
          var icon = _ref.named.icon;
          return icon;
        }
      }
    }
  }]
};


/***/ }),

/***/ "./src/oik-search/index.js":
/*!*********************************!*\
  !*** ./src/oik-search/index.js ***!
  \*********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);


/**
 * Implements Search as a server rendered block
 *
 * Originally intended to uses [bw_search] shortcode from oik-bob-bing-wide plugin
 * but it's much easier to use get_search_form... that's all that [bw_search] does.
 *
 * @copyright (C) Copyright Bobbing Wide 2018-2020
 * @author Herb Miller @bobbingwide
 */
//import './style.scss';
//import './editor.scss';
// Get just the __() localization function from wp.i18n
var __ = wp.i18n.__; // Get registerBlockType from wp.blocks

var registerBlockType = wp.blocks.registerBlockType;
var ServerSideRender = wp.editor.ServerSideRender;
var InspectorControls = wp.blockEditor.InspectorControls;
var _wp$components = wp.components,
    Toolbar = _wp$components.Toolbar,
    PanelBody = _wp$components.PanelBody,
    PanelRow = _wp$components.PanelRow,
    FormToggle = _wp$components.FormToggle,
    TextControl = _wp$components.TextControl;
var Fragment = wp.element.Fragment;
/**
 * Register the WordPress block
 */

/* harmony default export */ __webpack_exports__["default"] = (registerBlockType( // Namespaced, hyphens, lowercase, unique name
'oik-bbw/search', {
  // Localize title using wp.i18n.__()
  title: __('Search'),
  description: 'Displays a search form',
  // Category Options: common, formatting, layout, widgets, embed
  category: 'widgets',
  // Dashicons Options - https://goo.gl/aTM1DQ
  icon: 'search',
  // Limit to 3 Keywords / Phrases
  keywords: [__('search'), __('oik'), __('find')],
  // Set for each piece of dynamic data used in your block
  attributes: {},
  example: {},
  supports: {
    customClassName: false,
    className: false,
    html: false
  },
  edit: function edit(props) {
    return Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(Fragment, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelRow, null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelRow, null), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelRow, null))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ServerSideRender, {
      block: "oik-bbw/search",
      attributes: props.attributes
    }));
  },
  save: function save() {
    return null;
  }
}));

/***/ }),

/***/ "./src/oik-wp/editor.scss":
/*!********************************!*\
  !*** ./src/oik-wp/editor.scss ***!
  \********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/oik-wp/index.js":
/*!*****************************!*\
  !*** ./src/oik-wp/index.js ***!
  \*****************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./src/oik-wp/style.scss");
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./editor.scss */ "./src/oik-wp/editor.scss");
/* harmony import */ var _transforms_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./transforms.js */ "./src/oik-wp/transforms.js");


/**
* Implements [wp] shortcode as a server side rendered block
*
* @copyright (C) Copyright Bobbing Wide 2018-2021
* @author Herb Miller @bobbingwide
*/


 // Get just the __() localization function from wp.i18n

var __ = wp.i18n.__; // Get registerBlockType from wp.blocks

var registerBlockType = wp.blocks.registerBlockType;
var _wp$editor = wp.editor,
    InspectorControls = _wp$editor.InspectorControls,
    ServerSideRender = _wp$editor.ServerSideRender;
var _wp$components = wp.components,
    Toolbar = _wp$components.Toolbar,
    PanelBody = _wp$components.PanelBody,
    PanelRow = _wp$components.PanelRow,
    FormToggle = _wp$components.FormToggle,
    TextControl = _wp$components.TextControl;
/**
 * Register the WordPress block
 */

/* harmony default export */ __webpack_exports__["default"] = (registerBlockType( // Namespaced, hyphens, lowercase, unique name
'oik-bbw/wp', {
  // Localize title using wp.i18n.__()
  title: __('WordPress'),
  description: 'Displays information about WordPress and PHP versions',
  // Category Options: common, formatting, layout, widgets, embed
  category: 'widgets',
  // Dashicons Options - https://goo.gl/aTM1DQ
  icon: 'wordpress',
  // Limit to 3 Keywords / Phrases
  keywords: [__('WordPress'), __('oik'), __('PHP')],
  // Set for each piece of dynamic data used in your block
  attributes: {
    v: {
      type: 'string'
    },
    p: {
      type: 'string'
    },
    m: {
      type: 'string'
    },
    g: {
      type: 'string'
    }
  },
  supports: {
    typography: {
      fontSize: true
    },
    color: {
      gradients: false,
      text: false,
      background: true,
      link: false
    }
  },
  transforms: _transforms_js__WEBPACK_IMPORTED_MODULE_3__["transforms"],
  edit: function edit(props) {
    var onChangeV = function onChangeV(event) {
      props.setAttributes({
        v: event
      });
    };

    var onChangeP = function onChangeP(event) {
      props.setAttributes({
        p: event
      });
    };

    var onChangeM = function onChangeM(event) {
      props.setAttributes({
        m: event
      });
    };

    var onChangeG = function onChangeG(event) {
      props.setAttributes({
        g: event
      });
    };

    return [Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(InspectorControls, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelBody, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelRow, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(TextControl, {
      label: "Version",
      value: props.attributes.v,
      onChange: onChangeV
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelRow, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(TextControl, {
      label: "PHP Version",
      value: props.attributes.p,
      onChange: onChangeP
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelRow, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(TextControl, {
      label: "Memory limit",
      value: props.attributes.m,
      onChange: onChangeM
    })), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(PanelRow, null, Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(TextControl, {
      label: "Gutenberg details",
      value: props.attributes.g,
      onChange: onChangeG
    })))), Object(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__["createElement"])(ServerSideRender, {
      block: "oik-bbw/wp",
      attributes: props.attributes
    })];
  },
  save: function save() {
    return null;
  }
}));

/***/ }),

/***/ "./src/oik-wp/transforms.js":
/*!**********************************!*\
  !*** ./src/oik-wp/transforms.js ***!
  \**********************************/
/*! exports provided: transforms */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "transforms", function() { return transforms; });
/* Transformation to oik-bbw/wp of oik-block/wp and [wp]
 *
 * You'll find that the shortcode doesn't transform if it's been coded with positional parameters.

 */
var createBlock = wp.blocks.createBlock;
var transforms = {
  from: [{
    type: 'block',
    blocks: ['oik-block/wp'],
    transform: function transform(attributes) {
      return createBlock('oik-bbw/wp', {
        v: attributes.v,
        p: attributes.p,
        m: attributes.m
      });
    }
  }, {
    type: 'shortcode',
    tag: 'wp',
    attributes: {
      v: {
        type: 'string',
        shortcode: function shortcode(_ref) {
          var v = _ref.named.v;
          return v;
        }
      }
    }
  }]
};


/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["wp"]["element"]; }());

/***/ }),

/***/ "lodash":
/*!*************************!*\
  !*** external "lodash" ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function() { module.exports = window["lodash"]; }());

/***/ })

/******/ });
//# sourceMappingURL=index.js.map