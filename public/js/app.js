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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

if (document.querySelector('#logoutBtn')) {
  var logoutbtn = document.querySelector('#logoutBtn');
  var logout = document.querySelector('#logout');
  logout.addEventListener('click', function () {
    logoutbtn.click();
  });
}

if (document.querySelector('.categoryLink')) {
  var categoriesLinks = document.querySelectorAll('.categoryLink');
  document.body.addEventListener('click', function (e) {
    console.log(e.target.className);

    if (e.target.className.trim() == 'categoryLink') {
      getProductsByCategory(e);
    }
  }); // categoriesLinks.forEach(function(item){
  //     item.addEventListener('click', getProductsByCategory);
  // });
}

function getProductsByCategory(e) {
  var productInfo = e.target.dataset.info.split('|');
  var categoryId = productInfo[0];
  var productGender = productInfo[1];
  var parentElement = e.target.parentElement;
  var section = productGender == 'Male' ? 'manSection' : 'womanSection';
  var activeLink = parentElement.querySelector('.active');
  activeLink.classList.remove('active');
  e.target.classList.add('active');
  var productSlider = e.target.parentElement.parentElement.parentElement;
  fetch('/api/products/' + categoryId + '/' + productGender).then(function (data) {
    return data.json();
  }).then(function (response) {
    return fillProductSlider(productSlider, response, section);
  });
}

function fillProductSlider(parent, products, section) {
  var sectionDiv = document.querySelector('#' + section);
  sectionDiv.innerHTML = ''; // if(parent.querySelector('.product-slider')) {
  //   parent.querySelector('.product-slider').remove();
  // }
  // result = Object.values(products);
  // $('#demo').html('<div id="testing" class="owl-carousel"></div>');
  // for(var i=0;i<result.length;i++){
  //     $(".owl-carousel").append('<div class="item"><img src="'+result[i].main_image+'" /></div>');
  // };
  // var owl = $("#testing");
  // owl.owlCarousel({
  //     items: 4,
  //     navigation: true
  // });

  var output = "<div id=\"testing-".concat(section, "\" class=\"owl-carousel\">");
  var items = Object.values(products);
  items.forEach(function (product) {
    output += "\n  <div class=\"product-item\">\n  <div class=\"pi-pic\">\n  <img  src=\"".concat(product.main_image, "\"  alt=\"\">\n      <div class=\"sale\">Sale</div>\n      <ul>\n\n          <li class=\"quick-view\"><a href=\"").concat(product.path, "\">+ Quick View</a></li>\n    \n      </ul>\n  </div>\n  <div class=\"pi-text\">\n      <div class=\"catagory-name\">Coat</div>\n      <a href=\"#\">\n          <h5>").concat(product.name, "</h5>\n      </a>\n      <div class=\"product-price\">\n           ").concat(product.price, " . 00\n      </div>\n  </div>\n</div>\n  ");
  });
  sectionDiv.innerHTML = output;
  var owl = $('#testing' + '-' + section);
  owl.owlCarousel({
    items: 3,
    navigation: true,
    loop: true,
    margin: 20
  });
}

if (document.querySelector('.filter-btn')) {
  document.querySelector('.filter-btn').addEventListener('click', function () {
    var categories = Array.from(document.querySelectorAll("input[class=categories]:checked"));
    var gender = document.querySelector("input[name=gender]:checked").value;
    var minPrice = document.querySelector('#minamount').value.substr(1);
    var maxPrice = document.querySelector('#maxamount').value.substr(1);
    categories = categories.reduce(function (beginValue, currentValue) {
      beginValue.push(currentValue.value);
      return beginValue;
    }, []);
    var formData = new FormData();
    formData.append('gender', gender);
    formData.append('categories', categories);
    formData.append('maxPrice', maxPrice);
    formData.append('minPrice', minPrice);
    var csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    fetch('/filterProducts', {
      method: 'post',
      body: formData,
      headers: {
        'X-CSRF-TOKEN': csrf
      }
    }).then(function (response) {
      return response.json();
    }).then(function (data) {
      return displayProductsInShop(data);
    });
  });
}

function displayProductsInShop(products) {
  console.log(products);
  var output = '';
  products.forEach(function (product) {
    output += "\n    <div class=\"col-lg-4 col-sm-6\">\n    <div class=\"product-item\">\n        <div class=\"pi-pic\">\n        <img src=\"".concat(product.main_image, "\" alt=\"\">\n           \n            <ul>\n                \n            <li class=\"quick-view\"><a href=\"").concat(product.path, "\">+ Quick View</a></li>\n               \n            </ul>\n        </div>\n        <div class=\"pi-text\">\n        <div class=\"catagory-name\">").concat(product.gender.genderName, "</div>\n            <a href=\"#\">\n            <h5>").concat(product.name, "</h5>\n            </a>\n            <div class=\"product-price\">\n               $ ").concat(product.price, "\n            <span>").concat(product.price, "</span>\n            </div>\n        </div>\n    </div>\n  </div>\n    ");
  });
  document.querySelector('#products-area').innerHTML = output;
}

if (document.querySelector('#addToCartBtn')) {
  var addToCartBtn = document.querySelector('#addToCartBtn');
  addToCartBtn.addEventListener('click', addProductToCart);
}

function addProductToCart(event) {
  var productId = event.target.dataset.id;
  var csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
  var formData = new FormData();
  formData.append('productId', productId);
  fetch('/api/addProduct', {
    body: formData,
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': csrf
    }
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    if (data.code === 401) {
      displayMessage('Please login to continue to shop!', 'danger');
      return;
    }

    updateCart(data.products);
    displayMessage('Added product to cart!', 'success');
  });
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

if (document.querySelector('#cart-body')) {
  var cartbody = document.querySelector('#cart-body');
  cartbody.addEventListener('click', function (e) {
    if (e.target.className === 'ti-close') {
      deleteFromCart(e);
      displayMessage('Remove product from cart!', 'success');
    }
  });
}

function deleteFromCart(element) {
  var csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
  var row = element.path[2];
  var productId = element.target.dataset.id;
  var formData = new FormData();
  formData.append('productId', productId);
  fetch('/api/removeProduct', {
    body: formData,
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': csrf
    }
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    document.querySelector('#totalQuantity').innerHTML = data.totalQuantity;
    document.querySelector('#totalPrice').innerHTML = data.totalPrice + '$';
    document.querySelector('#totalPriceCart').innerHTML = data.totalPrice + '$';
  });
  row.classList.add('fadeOut');
  setTimeout(function () {
    row.remove();
  }, 3000);
}

function updateCart(data) {
  var output = '';
  var totalQuantity = 0;
  var totalPrice = 0;
  data.forEach(function (item) {
    totalPrice += parseFloat(item.price) * parseFloat(item.quantity);
    totalQuantity += parseFloat(item.quantity);
    output += "\n    <tr>\n    <td class=\"si-pic\"><img src=\"".concat(item.main_image, "\" alt=\"\"></td>\n        <td class=\"si-text\">\n            <div class=\"product-selected\">\n            <p>").concat(item.price, " $ x ").concat(item.quantity, "</p>\n            <h6>").concat(item.name, "</h6>\n            </div>\n        </td>\n        <td class=\"si-close\">\n        <i data-id=\"").concat(item.id, "\" class=\"ti-close\"></i>\n        </td>\n    </tr>\n    ");
  });
  document.querySelector('#cart-body').innerHTML = output;
  document.querySelector('#totalQuantity').innerHTML = totalQuantity;
  document.querySelector('#totalPrice').innerHTML = totalPrice + '$';
  document.querySelector('#totalPriceCart').innerHTML = totalPrice + '$';
}

if (document.querySelector('#shoppingCartProducts')) {
  var shoopingCartProducts = document.querySelector('#shoppingCartProducts');
  shoopingCartProducts.addEventListener('click', function (e) {
    if (e.target.className.includes('dec')) {
      updateQuantity(e, 'desc');
    }

    if (e.target.className.includes('inc')) {
      updateQuantity(e, 'inc');
    }

    if (e.target.className.includes('ti-close')) {
      shoppingCartDelete(e);
    }
  });
}

function updateQuantity(element, type) {
  var el = element.target;
  var parent = el.parentElement;
  var productId = parent.dataset.id;
  var csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
  var formData = new FormData();
  formData.append('productId', productId);
  formData.append('type', type);
  fetch('/api/updateQuantity', {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': csrf
    },
    body: formData
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    if (data.error == 419) {
      displayMessage('You cannot set quantity to zero', 'danger');
      parent.querySelector('input').value++;
      return;
    }

    updateCart(data.products);
    var tr = element.path[4];
    var productPrice = Number(tr.querySelector('.p-price').innerHTML.substr(1));
    var quantity = Number(tr.querySelector('.quantity-value').value);
    var productTotalPrice = productPrice * quantity;
    tr.querySelector('.total-price').innerHTML = '$' + productTotalPrice;
    document.querySelector('.subtotal-value').innerHTML = '$' + data.totalPrice;
    document.querySelector('.cart-total-value').innerHTML = '$' + data.totalPrice;
  });
}

function shoppingCartDelete(e) {
  var productId = e.target.dataset.id;
  var csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
  var formData = new FormData();
  formData.append('productId', productId);
  fetch('/api/removeProduct', {
    body: formData,
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': csrf
    }
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    console.log(data);
    updateCart(data.products);
    var tr = e.path[2];
    tr.classList.add('fadeOut');
    displayMessage('Remove item from cart!', 'success');
    document.querySelector('.subtotal-value').innerHTML = '$' + data.totalPrice;
    document.querySelector('.cart-total-value').innerHTML = '$' + data.totalPrice;
    setTimeout(function () {
      tr.remove();
    }, 3000);
  });
}

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\Dell E6540\Desktop\LaravelWork\schoolproject\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\Users\Dell E6540\Desktop\LaravelWork\schoolproject\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });