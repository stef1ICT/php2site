/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin.js":
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

if (document.querySelector('.btns-delete-photos')) {
  var deletePhotosBtnsArea = document.querySelector('.btns-delete-photos');
  deletePhotosBtnsArea.addEventListener('click', function (e) {
    if (e.target.className.includes('delete-photo')) {
      deletePhoto(e);
    }
  });
}

function deletePhoto(e) {
  var ids = e.target.dataset.ids.split('|');
  var productId = ids[0];
  var imageId = ids[1];
  var formData = new FormData();
  formData.append('productId', productId);
  formData.append('imageId', imageId);
  var csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
  fetch('/api/admin-panel/deleteImage', {
    method: 'post',
    body: formData,
    headers: {
      'X-CSRF-TOKEN': csrf
    }
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    var element = e.path[3];
    element.classList.add('fadeOut');
    setTimeout(function () {
      updateProductImages(data);
      element.remove();
      displayMessage('Deleted image!', 'success');
    }, 3000);
  });
}

function updateProductImages(images) {
  var productImagesArea = document.querySelector('#product-images');
  var output = '';
  images.forEach(function (image) {
    output += "\n    <img \n    style=\"width:25%; height:150px\"\n    class=\"rounded\" src=\"".concat(image.imageUrl, "\" />\n    ");
  });
  productImagesArea.innerHTML = output;
}

function displayMessage(message, level) {
  var alertMessage = document.createElement('div');
  alertMessage.id = 'alert-message';
  var alertContent = document.createElement('div');
  alertContent.className = 'alert alert-' + level;
  alertContent.innerHTML = message;
  alertMessage.appendChild(alertContent);
  document.body.appendChild(alertMessage);
  setTimeout(function () {
    alertMessage.remove();
  }, 3000);
}

function deleteSpecification(e) {
  var specificationId = e.target.dataset.id;
  var csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
  fetch('/api/admin-panel/deleteImage', {
    method: 'post',
    body: formData,
    headers: {
      'X-CSRF-TOKEN': csrf
    }
  });
}

if (document.querySelector('#order-statuses')) {
  var selectStatus = document.querySelector('#selectStatus');
  selectStatus.addEventListener('change', changeStatus);
}

function changeStatus(e) {
  var ids = e.target.value.split('|');
  var orderId = ids[0];
  var statusId = ids[1];
  var formData = new FormData();
  formData.append('orderId', orderId);
  formData.append('statusId', statusId);
  var csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
  fetch('/api/admin-panel/change-status', {
    method: 'post',
    body: formData,
    headers: {
      'X-CSRF-TOKEN': csrf
    }
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    if (data.statusCode === 200) {
      displayMessage('Status changed', 'success');
    }
  });
}

/***/ }),

/***/ 1:
/*!*************************************!*\
  !*** multi ./resources/js/admin.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Dell E6540\Desktop\LaravelWork\schoolproject\resources\js\admin.js */"./resources/js/admin.js");


/***/ })

/******/ });