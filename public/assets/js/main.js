function onchangefile() {
  const selectedFile = document.getElementById('fileInput');
  const files = selectedFile.files[0]
  if(files){
    const formdata = new FormData()
    formdata.append('attachimage-product', files);
    $.ajax({
      url: "/api/product_image_uploader",
      type: "POST",
      data: formdata,
      contentType: false,
      processData: false,
      success: function (filesresponse) {
        $('#attachimage-product').attr("src", filesresponse)
      },
      error: function(error) {
        console.log({error})
      }
    })
  }
 }

function loadStoreProducts() {
  $.ajax({
    url: "/api/view_products",
    type: "POST",
    success: response => {
        const data = response;
        $(".custom-table > tbody > tr").remove()
        data.map((prod_info) => { 
          const {
            available_inventory,
            expiry_date,
            price,
            product_image,
            product_name,
            unit} = prod_info;
            const htmlContent = `
              <tr> 
                  <td class="p-0">
                      <div class="d-flex flex-column  ">
                          <img class="rounded" style="width:100px;height:100px;" src="${product_image}"/>
                      </div>
                  </td>
                  <td class="align-self-end">
                      <div class="text-wrap">
                          ${product_name}
                      </div>
                  </td>
                  <td>${moment(expiry_date).format("MMMM DD, YYYY")}</td>
                  <td>₱${price.toFixed(2)}</td>
                  <td>${unit}</td>
                  <td>${available_inventory}</td> 
              </tr>
            `;
          $(".custom-table > tbody").append(htmlContent)
        })
    }
  })
}

$(function() {
  $('.js-check-all').on('click', function() {

  	if ( $(this).prop('checked') ) {
	  	$('th input[type="checkbox"]').each(function() {
	  		$(this).prop('checked', true);
        $(this).closest('tr').addClass('active');
	  	})
  	} else {
  		$('th input[type="checkbox"]').each(function() {
	  		$(this).prop('checked', false);
        $(this).closest('tr').removeClass('active');
	  	})
  	}

  });

  $('th[scope="row"] input[type="checkbox"]').on('click', function() {
    if ( $(this).closest('tr').hasClass('active') ) {
      $(this).closest('tr').removeClass('active');
    } else {
      $(this).closest('tr').addClass('active');
    }
  });

  $("#imageOverlay").on("click", () => {
    document.getElementById('fileInput').click();
  });

  $("#create-product").on("click", function() {
    const queryString = $('#form-data')[0];
    const product_src = $("#attachimage-product").attr("src");
    const formdata = new FormData(queryString)
    formdata.delete("product_image");
    formdata.append("product_image", product_src) 
    $.ajax({
      url: "/api/product_stores",
      type: "POST",
      data: formdata,
      contentType: false,
      processData: false,
      success: response =>{ 
        alert("Success Created products")
        $('#form-data')[0].reset()
        $('#close-modal').click() 
        loadStoreProducts()
      }, 
      error: error => {
        console.log(error)
      }
    })
  });

  loadStoreProducts();
});




