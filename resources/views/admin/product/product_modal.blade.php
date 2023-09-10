<!-- insert data modal -->


<div class="modal fade" id="addProduct">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Insert Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <div class="modal-body">
                    <form action="" id="addProductForm" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                
                                <input type="text" id="product_name"  name="product_name"class="form-control" placeholder="Medicine Name">
                                <span class="text-danger" id="product_error"></span>
                            </div>

                            <div class="form-group col-md-6">
                               
                                <input type="text" id="generic_name"  name="generic_name"class="form-control" placeholder="Generic Name">
                                <span class="text-danger" id="generic_error"></span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-4">
                              
                                <select class="form-control" id="brand_id" name="brand_id">
                                <option> >> Select Brand Name...</option>
                                @foreach($brand as $row)
                                <option value="{{$row->id}}">{{$row->brand_name}}</option>
                                @endforeach
                            </select>
                            
                            </div>

                            <div class="form-group col-md-4">
                              
                                <select class="form-control" id="category_id" name="category_id">
                                <option> >> Select category Name...</option>
                                @foreach($category as $row)
                                <option value="{{$row->id}}">{{$row->cat_name}}</option>
                                @endforeach
                            </select>
                               
                            </div> 


                            <div class="form-group col-md-4">
                            
                                <select class="form-control" id="medicinetype_id" name="medicinetype_id">
                                <option> >> Select medicinetype Name...</option>
                                @foreach($medicinetype as $row)
                                <option value="{{$row->id}}">{{$row->medicinetype_name}}</option>
                                @endforeach
                            </select>
                               
                            </div> 
                        </div>


                        <div class="row">
                            

                            <div class="form-group col-md-4">
                             
                                <input type="text" id="purchase_price"  name="purchase_price"class="form-control" placeholder="purchase price Tk">
                                <span class="text-danger" id="purchase_price_error"></span>
                            </div>


                            <div class="form-group col-md-4">
                           
                                <input type="text" id="mrp"  name="mrp"class="form-control" placeholder="MRP tk.">
                                <span class="text-danger" id="mrp_error"></span>
                            </div>

                            <div class="form-group col-md-4">
                              
                                <input type="text" id="discount"  name="discount"class="form-control" placeholder="Discount %">
                                <span class="text-danger" id="discount_error"></span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-4">
                              
                                <input type="text" id="power"  name="power"class="form-control" placeholder="Medicine power">
                                <span class="text-danger" id="power_error"></span>
                            </div>

                            <div class="form-group col-md-4">
                          
                                <input type="text" id="stock_quantity"  name="stock_quantity"class="form-control" placeholder="Stock quantity">
                                <span class="text-danger" id="product_error"></span>
                            </div>

                            <div class="form-group col-md-4">
                              
                            <input class="form-control" type="file" name="product_image" id="product_image">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                              <div class="form-floating mb-3 mb-md-0">
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" placeholder="Product Description"  rows="3"></textarea>
    
                                
                            </div>
                            </div>
                        </div>



                        
                        <div class="modal-footer">
                            <button type="close" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <button type="button" class="btn btn-primary addProduct"> submit</button>
                        </div>
                    </form>
                </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>



    <!-- insert data modal end -->


    <!-- Update data modal start -->


   <div class="modal fade" id="updateProduct">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Update Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>


            <div class="modal-body">
                    <form action="" id="updateProductForm" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <input type="hidden" id="up_id">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>product Name:</label>
                                <input type="text" id="up_product_name"  name="up_product_name"class="form-control" placeholder="Medicine Name">
                                <span class="text-danger" id="product_error"></span>
                            </div>

                            <div class="form-group col-md-6">
                               <label>Generic Name:</label>
                                <input type="text" id="up_generic_name"  name="up_generic_name"class="form-control" placeholder="Generic Name">
                                <span class="text-danger" id="generic_error"></span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-4">
                              <label>Brand Name:</label>
                                <select class="form-control" name="up_brand_id" id="up_brand_id">
                                <option> >> Select Brand Name...</option>
                                @foreach($brand as $row)
                                <option value="{{$row->id}}">{{$row->brand_name}}</option>
                                @endforeach
                            </select>
                            
                            </div>

                            <div class="form-group col-md-4">
                              <label>category Name:</label>
                                <select class="form-control" name="up_category_id" id="up_category_id">
                                <option> >> Select category Name...</option>
                                @foreach($category as $row)
                                <option value="{{$row->id}}">{{$row->cat_name}}</option>
                                @endforeach
                            </select>
                               
                            </div> 


                            <div class="form-group col-md-4">
                            <label>Medicine Type :</label>
                                <select class="form-control" name="up_medicinetype_id" id="up_medicinetype_id">
                                <option> >> Select medicinetype Name...</option>
                                @foreach($medicinetype as $row)
                                <option value="{{$row->id}}">{{$row->medicinetype_name}}</option>
                                @endforeach
                            </select>
                               
                            </div> 
                        </div>


                        <div class="row">
                            

                            <div class="form-group col-md-4">
                             <label>purchase price :</label>
                                <input type="text" id="up_purchase_price"  name="up_purchase_price"class="form-control" placeholder="purchase price Tk">
                                <span class="text-danger" id="purchase_price_error"></span>
                            </div>


                            <div class="form-group col-md-4">
                           <label>MRP :</label>
                                <input type="text" id="up_mrp"  name="up_mrp"class="form-control" placeholder="MRP tk.">
                                <span class="text-danger" id="mrp_error"></span>
                            </div>

                            <div class="form-group col-md-4">
                              <label>Discount:</label>
                                <input type="text" id="up_discount"  name="up_discount"class="form-control" placeholder="Discount %">
                                <span class="text-danger" id="discount_error"></span>
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-4">
                              <label>Power:</label>
                                <input type="text" id="up_power"  name="up_power"class="form-control" placeholder="Medicine power">
                                <span class="text-danger" id="power_error"></span>
                            </div>

                            <div class="form-group col-md-4">
                          <label>Stock Quantity:</label>
                                <input type="text" id="up_stock_quantity"  name="up_stock_quantity"class="form-control" placeholder="Stock quantity">
                                <span class="text-danger" id="product_error"></span>
                            </div>

                            <div class="form-group col-md-4">
                              <label>Product Image:</label>
                            <input class="form-control" type="file" name="product_image" id="product_image">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label>Description:</label>
                              <div class="form-floating mb-3 mb-md-0">
                                <textarea class="form-control" id="up_description" name="up_description" placeholder="Product Description"  rows="3"></textarea>
    
                                
                            </div>
                            </div>
                        </div>



                        
                        <div class="modal-footer">
                            <button type="close" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <button type="button" class="btn btn-primary updateProduct"> submit</button>
                        </div>
                    </form>
                </div>
           
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>





 


       <!-- Update data modal end -->


