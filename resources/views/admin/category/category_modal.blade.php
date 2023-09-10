<!-- insert data modal -->
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Insert Category</h4>
                    <span id="errormsg"></span>
                </div>
                <div class="modal-body">
                    <form action="" id="addCategoryForm" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label>Category Name:</label>
                            <input type="text" id="cat_name"  name="cat_name"class="form-control" placeholder="Category Name">
                            <span class="text-danger" id="cat_error"></span>
                        </div>

                        <div class="form-group">
                        	<label for="formFile"  class="form-label">Category Image</label>
                        	<input class="form-control" type="file" name="cat_image" id="cat_image">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="close" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <button type="button" class="btn btn-primary addCategory"> submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- insert data modal end -->


    <!-- Update data modal start -->
    <div class="modal fade" id="updateCategory" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Update Category</h4>
                    <span id="errormsg"></span>
                </div>
                <div class="modal-body">
                    <form action="" id="updateCategoryForm" method="POST" enctype="multipart/form-data" >

                        @csrf
                        <input type="hidden" id="up_id">
                        <div class="form-group">
                            <label>Category Name:</label>
                            <input type="text" id="up_cat_name"  name="up_cat_name"class="form-control" placeholder="Category Name">
                            <span class="text-danger" id="cat_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="formFile"  class="form-label">Category Image</label>
                            <input class="form-control" type="file" name="cat_image" id="cat_image">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="close" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <button type="button" class="btn btn-primary updateCategory"> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


       <!-- Update data modal end -->