<!-- insert data modal -->
    <div class="modal fade" id="addSlider" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Insert Slider</h4>
                    <span id="errormsg"></span>
                </div>
                <div class="modal-body">
                    <form action="" id="addSliderForm" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <label>Slider Title:</label>
                            <input type="text" id="slider_title"  name="slider_title"class="form-control" placeholder="Slider Title">
                            <span class="text-danger" id="slider_error"></span>
                        </div>

                        <div class="form-group">
                        	<label for="formFile"  class="form-label">Slider Image</label>
                        	<input class="form-control" type="file" name="slider_image" id="slider_image">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="close" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <button type="button" class="btn btn-primary addSlider"> submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- insert data modal end -->


    <!-- Update data modal start -->
    <div class="modal fade" id="updateSlider" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">Update Slider</h4>
                    <span id="errormsg"></span>
                </div>
                <div class="modal-body">
                    <form action="" id="updateSliderForm" method="POST" enctype="multipart/form-data" >

                        @csrf
                        <input type="hidden" id="up_id">
                        <div class="form-group">
                            <label>Slider Name:</label>
                            <input type="text" id="up_slider_title"  name="up_slider_title"class="form-control" placeholder="Slider Title">
                            <span class="text-danger" id="slider_error"></span>
                        </div>

                        <div class="form-group">
                            <label for="formFile"  class="form-label">Slider Image</label>
                            <input class="form-control" type="file" name="slider_image" id="slider_image">
                        </div>
                        
                        <div class="modal-footer">
                            <button type="close" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                            <button type="button" class="btn btn-primary updateSlider"> Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


       <!-- Update data modal end -->