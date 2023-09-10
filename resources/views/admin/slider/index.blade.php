@extends('admin_layouts')
@section('admin_content')
@section('title','slider')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">All slider</h3>
		
                <button type="button" id="btnright" class="btn btn-primary  waves-effect m-r-20" data-toggle="modal" data-target="#addSlider"> + Add slider</button>
                
            </div>
			<div class="card-body">
				<table id="example1" class="table">
					<thead>
						<tr>
							<th class="text-center">Sl.no</th>
							<th class="text-center">slider Title</th>
							<th class="text-center">slider Image</th>
							<th class="text-center">Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>

					@foreach($slider as $key=>$row)
					<tbody>
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{$row->slider_title }}</td>
							<td align="center">
								<img src="{{ asset($row->slider_image) }}"  width="500" height="200px">
							</td>
							<td>
								@if($row->status==1)
								<span class="badge badge-success">Active</span>
								@else
								<span class="badge badge-danger">Inactive</span>
								@endif
							</td>

							<td>
                                    
                                 @if($row->status==1)
                                    <a href="" class="btn btn-sm btn-danger inactive " data-id="{{$row->id}}"><i class="bi bi-hand-thumbs-up"></i></a>
                                    @else
                                    <a href=""  class="btn btn-sm btn-success active" data-id="{{$row->id}}"><i class="bi bi-hand-thumbs-down"></i></a>
                                    @endif

                                    <a href="" class="btn btn-sm btn-warning update_slider_Form"
                                    data-toggle="modal" 
                                    data-target="#updateSlider"
                                    data-id="{{$row->id}}"
                                    data-slider_title="{{$row->slider_title}}"
                                    

                                    ><i class="bi bi-pencil-square"></i></a>

                                    <button class="btn btn-danger" type="button" onclick="deleteSlider({{ $row->id }})"><i class="bi bi-trash"></i></button>
                                      <form id="delete-form-{{$row->id}}" action="{{route('slider.delete',$row->id)}}"  method="PUT" style="display: none ; " >
                                      @csrf
                                      @method('DELETE')
                                      </form>
                                    
                                    
                                    
                                </td>

							
						</tr>
					</tbody>

					@endforeach
				</table>
			</div>
		</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

@include('admin.slider.slider_modal')



<script>

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});


	$(document ).ready(function() {

        $(document).on('click','.addSlider',function(e){
            e.preventDefault();

            let formData=new FormData($('#addSliderForm')[0]);
            
            $.ajax({
            	type:"post",
                url:"{{route('slider.store')}}",
                data:formData,
                contentType:false,
                processData:false,

                success:function(response){
                	if(response.status == 'success'){
                		$('#addSlider').modal('hide');
                		$('#addSliderForm')[0].reset();
                		$('.table').load(location.href+' .table');

                        const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'Slider added success'
                    });

                	}
                }
            });
         
        });

    });


     // show category value
        $(document).on('click','.update_slider_Form',function(){

            let id=$(this).data('id');
             let slider_title=$(this).data('slider_title');
          
            $('#up_id').val(id);
            $('#up_slider_title').val(slider_title);
            

        });


      //Update category
      

      $(document).on('click','.updateSlider',function(e){
            e.preventDefault();

            let id=$('#up_id').val();

            let formData=new FormData($('#updateSliderForm')[0]);
            
            $.ajax({
                type:"post",
                url:"{{url('/slider/update')}}/"+id,
                data:formData,
                contentType:false,
                processData:false,

                success:function(response){
                    if(response.status == 'success'){
                        $('#updateSlider').modal('hide');
                        $('#updateSliderForm')[0].reset();
                        $('.table').load(location.href+' .table');

                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'success',
                        title: 'uSlider Update success'
                    });



                    }
                }
            });
         
        });







//active start

    $(document).on('click','.active',function(e){
   e.preventDefault();

   let id=$(this).data('id');

    $.ajax({
        url:"{{url('/slider/active')}}/"+id,
        type:"get",
        success:function(response){
            if(response.status == 'success'){
                $('.table').load(location.href+' .table')

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: 'Slider Active successfully'
                });

            }
        }
    });
});



   
//active end

// inactive start
$(document).on('click','.inactive',function(e){
   e.preventDefault();

   let id=$(this).data('id');

    $.ajax({
        url:"{{url('/slider/inactive')}}/"+id,
        type:"get",
        success:function(response){
            if(response.status == 'success'){
                $('.table').load(location.href+' .table')

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: 'Slider InActive successfully'
                });
            }
        }
    });
});

// inactive end



//category delete start
   function deleteSlider(id){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    })
    .then((result) => {
        if(result.isConfirmed) {
            event.preventDefault();
            document.getElementById('delete-form-'+id).submit();
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )}
        })
}
        
        //category delete end


</script>


@endsection