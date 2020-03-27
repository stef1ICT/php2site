if(document.querySelector('.btns-delete-photos')) {
  const deletePhotosBtnsArea = document.querySelector('.btns-delete-photos');


  deletePhotosBtnsArea.addEventListener('click', function(e) {
    if(e.target.className.includes('delete-photo')) {
      deletePhoto(e);
    }
  });

  
}

function deletePhoto(e) {
 const ids = (e.target.dataset.ids).split('|');
 const productId = ids[0];
 const imageId = ids[1];
  
 const formData = new FormData();

 formData.append('productId', productId);
 formData.append('imageId', imageId);
 let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    fetch('/api/admin-panel/deleteImage', {
      method: 'post',
      body: formData,
    headers: {
      'X-CSRF-TOKEN' : csrf
    }}
    )
    .then(response => response.json())
    .then(data => {
      let element = e.path[3];
      element.classList.add('fadeOut');
      setTimeout(()=> {
        updateProductImages(data);
        element.remove();
        displayMessage('Deleted image!', 'success');

      },3000);
    });
    
}
function updateProductImages(images) {
  const productImagesArea = document.querySelector('#product-images');

  let output = '';

  images.forEach((image)=> {
    output += `
    <img 
    style="width:25%; height:150px"
    class="rounded" src="${image.imageUrl}" />
    `;

  })

  productImagesArea.innerHTML = output;
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

  function deleteSpecification(e) {
    const specificationId = e.target.dataset.id;
    
    
    let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    fetch('/api/admin-panel/deleteImage', {
      method: 'post',
      body: formData,
    headers: {
      'X-CSRF-TOKEN' : csrf
    }}
    )
  } 


  if(document.querySelector('#order-statuses')) {
   const selectStatus = document.querySelector('#selectStatus');

   selectStatus.addEventListener('change', changeStatus);
  }


  function changeStatus(e) {
    const ids = e.target.value.split('|');
    const orderId = ids[0];
    const statusId = ids[1];

    const formData = new FormData();
    formData.append('orderId', orderId);
    formData.append('statusId', statusId);
    let csrf = document.querySelector('meta[name=csrf-token]').getAttribute('content');
    fetch('/api/admin-panel/change-status', {
      method: 'post',
      body: formData,
    headers: {
      'X-CSRF-TOKEN' : csrf
    }}
    )
    .then(response => response.json())
    .then(data => {
        if(data.statusCode === 200) {
          displayMessage('Status changed', 'success');
        }
       
    });

   
  
  }