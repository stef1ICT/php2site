if(document.querySelector('#logoutBtn')) {
  const logoutbtn = document.querySelector('#logoutBtn');
  const logout = document.querySelector('#logout');
  logout.addEventListener('click', function(){
      logoutbtn.click();
  });
}


if(document.querySelector('.categoryLink')) {

  let categoriesLinks = document.querySelectorAll('.categoryLink');
  document.body.addEventListener('click', function(e) {

    console.log(e.target.className);
      if(e.target.className.trim() == 'categoryLink') {
        getProductsByCategory(e);
      }
      
  });
  // categoriesLinks.forEach(function(item){
  //     item.addEventListener('click', getProductsByCategory);
  // });

}



function getProductsByCategory(e) {
  const productInfo = e.target.dataset.info.split('|');
  const categoryId = productInfo[0];
  const productGender = productInfo[1];
  const parentElement = e.target.parentElement;
  const section  = productGender == 'Male' ? 'manSection' : 'womanSection';
  const activeLink = parentElement.querySelector('.active');
  activeLink.classList.remove('active');
  e.target.classList.add('active');
const productSlider =   e.target.parentElement.parentElement.parentElement;
  fetch('/api/products/' + categoryId + '/' + productGender)
  .then(data => data.json())
  .then(response => fillProductSlider(productSlider, response, section));
}



function fillProductSlider(parent, products, section) {


  let sectionDiv = document.querySelector('#' + section);

  sectionDiv.innerHTML = '';
  // if(parent.querySelector('.product-slider')) {
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



let output = `<div id="testing-${section}" class="owl-carousel">`;
let items  = Object.values(products);
items.forEach(function(product){
  output += `
  <div class="product-item">
  <div class="pi-pic">
  <img  src="${product.main_image}"  alt="">
      <div class="sale">Sale</div>
      <ul>

          <li class="quick-view"><a href="${product.path}">+ Quick View</a></li>
    
      </ul>
  </div>
  <div class="pi-text">
      <div class="catagory-name">Coat</div>
      <a href="#">
          <h5>${product.name}</h5>
      </a>
      <div class="product-price">
           ${product.price} . 00
      </div>
  </div>
</div>
  `;
});




sectionDiv.innerHTML=output;
var owl = $('#testing' + '-' + section);
owl.owlCarousel({
      items: 3,
      navigation: true,
      loop: true,
      margin:20
  });



}


if(document.querySelector('.filter-btn')) {

  document.querySelector('.filter-btn').addEventListener('click', function(){
  
    let categories = Array.from(document.querySelectorAll("input[class=categories]:checked"));
    let gender =  document.querySelector("input[name=gender]:checked").value;
    let minPrice =   (document.querySelector('#minamount').value).substr(1);
    let  maxPrice =  (document.querySelector('#maxamount').value).substr(1);
    categories = categories.reduce( function(beginValue, currentValue){
      beginValue.push(currentValue.value);
         return beginValue;
    }, []);
    const formData = new FormData();
    formData.append('gender', gender);
    formData.append('categories', categories);
    formData.append('maxPrice', maxPrice);
    formData.append('minPrice', minPrice);
    let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    
    fetch('/filterProducts', {
      method: 'post',
      body: formData,
    headers: {
      'X-CSRF-TOKEN' : csrf
    }}
    )
    .then(response => response.json())
    .then(data => displayProductsInShop(data));
    

  });
  
}



function displayProductsInShop(products) {
console.log(products);

  let output = '';


  products.forEach(function(product){

    output += `
    <div class="col-lg-4 col-sm-6">
    <div class="product-item">
        <div class="pi-pic">
        <img src="${product.main_image}" alt="">
           
            <ul>
                
            <li class="quick-view"><a href="${product.path}">+ Quick View</a></li>
               
            </ul>
        </div>
        <div class="pi-text">
        <div class="catagory-name">${product.gender.genderName}</div>
            <a href="#">
            <h5>${product.name}</h5>
            </a>
            <div class="product-price">
               $ ${product.price}
            <span>${product.price }</span>
            </div>
        </div>
    </div>
  </div>
    `;
  }
  
 
  
  );

  document.querySelector('#products-area').innerHTML = output;

}




if(document.querySelector('#addToCartBtn')) {
  const addToCartBtn = document.querySelector('#addToCartBtn');


  addToCartBtn.addEventListener('click', addProductToCart);
}




function addProductToCart(event) {
let productId = event.target.dataset.id;
let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');

const formData = new FormData();
formData.append('productId', productId);

fetch('/api/addProduct', {
  body : formData,
  method: 'POST',
  headers : {
    'X-CSRF-TOKEN' : csrf
  }
})
.then(response => response.json())
.then(data => {
  
  if(data.code === 401) {
    displayMessage('Please login to continue to shop!', 'danger');
    return;
  }

  updateCart(data.products);
  displayMessage('Added product to cart!', 'success');
});

}


function displayMessage(message, level) {


const alertMessage = document.createElement('div');
alertMessage.id = 'alert-message';
const alertContent = document.createElement('div');
alertContent.className = 'alert alert-'+level;
alertContent.innerHTML = message;
alertMessage.appendChild(alertContent);
document.body.appendChild(alertMessage);

setTimeout(()=> {
  alertMessage.remove();
}, 3000);
}


if(document.querySelector('#cart-body')) {
  const cartbody = document.querySelector('#cart-body');

  cartbody.addEventListener('click', function(e) {
      if(e.target.className === 'ti-close') {
        deleteFromCart(e);
        displayMessage('Remove product from cart!', 'success');
      }
  });
}


function deleteFromCart(element) {
  let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
  const row = element.path[2];
  const productId = element.target.dataset.id;

  const formData = new FormData();
  formData.append('productId', productId);
  fetch('/api/removeProduct', {
    body : formData,
    method: 'POST',
    headers : {
      'X-CSRF-TOKEN' : csrf
    }
  })
  .then(response => response.json())
  .then(data => {
    document.querySelector('#totalQuantity').innerHTML = data.totalQuantity;
    document.querySelector('#totalPrice').innerHTML = data.totalPrice + '$';
    document.querySelector('#totalPriceCart').innerHTML = data.totalPrice + '$';
  });

  row.classList.add('fadeOut');
  setTimeout(() => {
    row.remove();
  },3000); 
}
function updateCart(data) {
  let output = '';
  let totalQuantity = 0;
  let totalPrice = 0;
  data.forEach(function(item) {
    totalPrice+= parseFloat(item.price) * parseFloat(item.quantity);
    totalQuantity+=  parseFloat(item.quantity);

   
    output += `
    <tr>
    <td class="si-pic"><img src="${item.main_image}" alt=""></td>
        <td class="si-text">
            <div class="product-selected">
            <p>${item.price } $ x ${item.quantity}</p>
            <h6>${item.name}</h6>
            </div>
        </td>
        <td class="si-close">
        <i data-id="${item.id}" class="ti-close"></i>
        </td>
    </tr>
    `;

  });
  document.querySelector('#cart-body').innerHTML = output;

  document.querySelector('#totalQuantity').innerHTML = totalQuantity;
  document.querySelector('#totalPrice').innerHTML = totalPrice + '$';
  document.querySelector('#totalPriceCart').innerHTML = totalPrice + '$';
}



if(document.querySelector('#shoppingCartProducts')) {

  const shoopingCartProducts = document.querySelector('#shoppingCartProducts');

  shoopingCartProducts.addEventListener('click', (e) => {
 
    if(e.target.className.includes('dec')) {
      updateQuantity(e, 'desc');
    }

    if(e.target.className.includes('inc')) {
      updateQuantity(e, 'inc');
    }
    if(e.target.className.includes('ti-close')) {
      shoppingCartDelete(e);
    }
   
  });
}



 function updateQuantity(element, type) {
  const el = element.target;
  const parent = el.parentElement;
  const productId = parent.dataset.id;
  let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
  const formData = new FormData();
  formData.append('productId', productId);
  formData.append('type', type);

  fetch('/api/updateQuantity', {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN' : csrf },
      body : formData
  })
  .then(response => response.json())
  .then(data => 
    {
      if(data.error == 419) {
        displayMessage('You cannot set quantity to zero', 'danger');
        parent.querySelector('input').value++;
        return;
      }
      updateCart(data.products);
      const tr = element.path[4];
      const productPrice = Number(tr.querySelector('.p-price').innerHTML.substr(1));
      const quantity = Number(tr.querySelector('.quantity-value').value);
      const productTotalPrice = productPrice * quantity;
      tr.querySelector('.total-price').innerHTML = '$' + productTotalPrice;
      document.querySelector('.subtotal-value').innerHTML = '$' + data.totalPrice;
      document.querySelector('.cart-total-value').innerHTML = '$' + data.totalPrice;
    }
    );
}



function shoppingCartDelete(e) {
  const productId = e.target.dataset.id;
  let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
  const formData = new FormData();
  formData.append('productId', productId);
  


  fetch('/api/removeProduct', {
    body : formData,
    method: 'POST',
    headers : {
      'X-CSRF-TOKEN' : csrf
    }
  })
  .then(response => response.json())
  .then(data => {
    console.log(data);
    updateCart(data.products);
    const tr = e.path[2];
    tr.classList.add('fadeOut');
    displayMessage('Remove item from cart!', 'success');
    document.querySelector('.subtotal-value').innerHTML = '$' + data.totalPrice;
    document.querySelector('.cart-total-value').innerHTML = '$' + data.totalPrice;
    setTimeout(()=> {
      tr.remove();
    },3000);
  });
}