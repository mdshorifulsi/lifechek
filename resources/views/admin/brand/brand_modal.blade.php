<!-- insert data modal -->
    <div class="modal fade" id="addBrand" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Insert Category</h4>
                    <span id="errormsg"></span>
                </div>
                <div class="modal-body">
                    <form action="" id="addBrandForm" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label>Brand Name:</label>
                            <input type="text" id="brand_name"  name="brand_name"class="form-control" placeholder="Brand Name">
                            <span class="text-danger" id="brand_error"></span>
                        </div>

                        <div class="form-group">
                        	<label for="formFile"  class="form-label">Brand Logo</label>
                        	<input class="form-control" type="file" name="brand_logo" id="brand_logo">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="close" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <button type="button" class="btn btn-primary addBrand"> submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- insert data modal end -->


    <!-- Update data modal start -->
    <div class="modal fade" id="updateBrand" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Update Category</h4>
                    <span id="errormsg"></span>
                </div>
                <div class="modal-body">
                    <form action="" id="updateBrandForm" method="POST" enctype="multipart/form-data" >

                        @csrf
                        <input type="hidden" id="up_id">
                        <div class="form-group">
                            <label>Brand Name:</label>
                            <input type="text" id="up_brand_name"  name="up_brand_name"class="form-control" placeholder="Brand Name">
                            <span class="text-danger" id="brand_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="formFile"  class="form-label">Brand Logo</label>
                            <input class="form-control" type="file" name="brand_logo" id="brand_logo">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="close" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <button type="button" class="btn btn-primary updateBrand"> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


       <!-- Update data modal end -->