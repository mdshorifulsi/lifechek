@extends('admin_layouts')
@section('admin_content')
@section('title','Category')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">All Category</h3>
		
                <button type="button" id="btnright" class="btn btn-primary  waves-effect m-r-20" data-toggle="modal" data-target="#addCategory"> + Add Category</button>
                
            </div>
			<div class="card-body">
				<table id="example1" class="table">
					<thead>
						<tr>
							<th>Sl.no</th>
							<th>Category Name</th>
							<th>Category slug</th>
							<th>Category Image</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>

					@foreach($category as $key=>$row)
					<tbody>
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{$row->cat_name }}</td>
							<td>{{$row->cat_slug }}</td>
							<td>
								<img src="{{ asset($row->cat_image) }}"  width="150" height="100px">
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

                                    <a href="" class="btn btn-sm btn-warning update_category_Form"
                                    data-toggle="modal" 
                                    data-target="#updateCategory"
                                    data-id="{{$row->id}}"
                                    data-cat_name="{{$row->cat_name}}"
                                    

                                    ><i class="bi bi-pencil-square"></i></a>

                                    <button class="btn btn-danger" type="button" onclick="deletecategory({{ $row->id }})"><i class="bi bi-trash"></i></button>
                                      <form id="delete-form-{{$row->id}}" action="{{route('category.delete',$row->id)}}"  method="PUT" style="display: none ; " >
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

@include('admin.category.category_modal')



<script>

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});


	$(document ).ready(function() {

        $(document).on('click','.addCategory',function(e){
            e.preventDefault();

            let formData=new FormData($('#addCategoryForm')[0]);
            
            $.ajax({
            	type:"post",
                url:"{{route('category.store')}}",
                data:formData,
                contentType:false,
                processData:false,

                success:function(response){
                	if(response.status == 'success'){
                		$('#addCategory').modal('hide');
                		$('#addCategoryForm')[0].reset();
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
                        title: 'Category added success'
                    });

                	}
                }
            });
         
        });

    });


     // show category value
        $(document).on('click','.update_category_Form',function(){

            let id=$(this).data('id');
             let cat_name=$(this).data('cat_name');
          
            $('#up_id').val(id);
            $('#up_cat_name').val(cat_name);
            

        });


      //Update category
      

      $(document).on('click','.updateCategory',function(e){
            e.preventDefault();

            let id=$('#up_id').val();

            let formData=new FormData($('#updateCategoryForm')[0]);
            
            $.ajax({
                type:"post",
                url:"{{url('/category/update')}}/"+id,
                data:formData,
                contentType:false,
                processData:false,

                success:function(response){
                    if(response.status == 'success'){
                        $('#updateCategory').modal('hide');
                        $('#updateCategoryForm')[0].reset();
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
                        title: 'Category Update success'
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
        url:"{{url('/category/active')}}/"+id,
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
                    title: 'Category Active successfully'
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
        url:"{{url('/category/inactive')}}/"+id,
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
                    title: 'Category InActive successfully'
                });
            }
        }
    });
});

// inactive end



//category delete start
   function deletecategory(id){
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