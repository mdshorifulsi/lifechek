


 <div class="modal fade" id="updateStock" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Update Category</h4>
                    <span id="errormsg"></span>
                </div>
                <div class="modal-body">
                    <form action="" id="updateStockForm" method="POST" enctype="multipart/form-data" >

                        @csrf
                        <input type="hidden" id="up_id">
                        <div class="form-group">
                            <label>Stock Quantity:</label>
                            <input type="text" id="up_stock_quantity"  name="up_stock_quantity"class="form-control" placeholder="Stock Quantity">
                            <span class="text-danger" id="up_stock_error"></span>
                        </div>

                      
                        
                        <div class="modal-footer">
                            <button type="close" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <button type="button" class="btn btn-primary updateStock"> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 


       <!-- Update data modal end -->


