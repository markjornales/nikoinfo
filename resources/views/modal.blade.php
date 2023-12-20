<div class="modal fade" id="product-modal" tabindex="-1" aria-labelledby="product-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" id="modals-id">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="product-modalLabel">Create products</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form-data">
            <div class="mb-3">
              <label for="product-name" class="col-form-label">Product name:</label>
              <input type="text" name="product_name" class="form-control" id="product-name">
            </div>
            <div class="mb-3">
                <label for="date">Expiry date:</label>
                <input type="date" name="expiry_date" class="form-control" value="{{date('Y-m-d')}}"/>
            </div>
            <div class="mb-3">
              <label for="price-text" class="col-form-label">Price:</label>
              <input type="number" name="price" min="0" class="form-control" id="price-text">
            </div>
            <div class="mb-3">
              <label for="unit-text" class="col-form-label">Unit:</label>
              <input type="text" name="unit" class="form-control" id="unit-text"/>
            </div>
            <div class="mb-3">
              <label for="avail-text" class="col-form-label">Available Inventory:</label>
              <input type="number" min="0" name="available_inventory" class="form-control" id="avail-text"/>
            </div> 
            <div id="imageContainer" class="w-100">
                <label for="image-text" class="col-form-label">Product image:</label>
                <img style="height:15em;width:100%" id="attachimage-product" src="{{asset('assets/images/attach.png')}}"/>
                <div id="imageOverlay"></div>
            </div>
            <input type="file" name="product_image" class="d-none" id="fileInput" onchange="onchangefile()"/>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="close-modal">Close</button>
          <button type="button" class="btn btn-success" id="create-product">Create</button>
        </div>
      </div>
    </div>
  </div>