{{-- ======================= product view  modal ======================== --}}
<!-- Modal -->
<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><span id="pname"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModal" >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width:16rem;">
                        <img src="" class="card-img-top" id="pimage" alt="" style="height: 200px;">
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item">Price: <strong class="text-danger">$<span id="pprice"></span> </strong>
                            <del id="oldprice">$</del>
                        </li>
                        <li class="list-group-item">Product Code: <strong id="pcode"></strong></li>
                        <li class="list-group-item">Category: <strong id="pcategory"></strong></li>
                        <li class="list-group-item">Brand: <strong id="pbrand"></strong> </li>
                        <li class="list-group-item">Stock: <span class="badge badge-pill badge-success" id="aviable" style="background:green; color:white;"></span>
                            <span class="badge badge-pill badge-danger" id="stockout" style="background:red; color:white;"></span>
                        </li>
                      </ul>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="color">Select Color</label>
                        <select class="form-control" id="color" name="color">
                        </select>
                      </div>
                      <div class="form-group" id="sizeArea">
                        <label for="size">Select Size</label>
                        <select class="form-control" id="size" name="size">
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" class="form-control" id="qty" value="1" min="1">
                      </div>
                      <input type="hidden" id="product_id">
                      <button type="submit" class="btn btn-danger" onclick="addToCart()">Add To Cart</button>
                      </div>
                </div>
            </div>
        </div>

      </div>
    </div>

   