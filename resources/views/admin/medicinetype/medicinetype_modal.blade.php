<!-- insert data modal -->
    <div class="modal fade" id="addMedicinetype" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Insert Category</h4>
                    <span id="errormsg"></span>
                </div>
                <div class="modal-body">
                    <form action="" id="addMedicinetypeForm" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label>medicine Type Name:</label>
                            <input type="text" id="medicinetype_name"  name="medicinetype_name"class="form-control" placeholder="Category Name">
                            <span class="text-danger" id="medicinetype_error"></span>
                        </div>

                        
                        
                        <div class="modal-footer">
                            <button type="close" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <button type="button" class="btn btn-primary addMedicinetype"> submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- insert data modal end -->


    <!-- Update data modal start -->
    <div class="modal fade" id="updateMedicinetype" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Update Category</h4>
                    <span id="errormsg"></span>
                </div>
                <div class="modal-body">
                    <form action="" id="updateMedicinetypeForm" method="POST" enctype="multipart/form-data" >

                        @csrf
                        <input type="hidden" id="up_id">
                        <div class="form-group">
                            <label>Medicine Type Name:</label>
                            <input type="text" id="up_medicinetype_name"  name="up_medicinetype_name"class="form-control" placeholder="Medicinetype Name">
                            <span class="text-danger" id="medicinetype_error"></span>
                        </div>

                     
                        
                        <div class="modal-footer">
                            <button type="close" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <button type="button" class="btn btn-primary updateMedicinetype"> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


       <!-- Update data modal end -->