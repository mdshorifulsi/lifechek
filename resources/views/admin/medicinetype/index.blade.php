@extends('admin_layouts')
@section('admin_content')
@section('title','Medicine Type')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">All Medicine Type</h3>
		
                <button type="button" id="btnright" class="btn btn-primary  waves-effect m-r-20" data-toggle="modal" data-target="#addMedicinetype"> + Add Medicine Type</button>
                
            </div>
			<div class="card-body">
				<table id="example1" class="table">
					<thead>
						<tr>
							<th>Sl.no</th>
							<th>Medicine Type Name</th>
                            <th>Medicine Type Slug</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>

					@foreach($medicinetype as $key=>$row)
					<tbody>
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{$row->medicinetype_name }}</td>
                            <td>{{$row->medicinetype_slug }}</td>
							
							
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

                                    <a href="" class="btn btn-sm btn-warning update_medicinetype_Form"
                                    data-toggle="modal" 
                                    data-target="#updateMedicinetype"
                                    data-id="{{$row->id}}"
                                    data-medicinetype_name="{{$row->medicinetype_name}}"
                                    

                                    ><i class="bi bi-pencil-square"></i></a>

                                    <button class="btn btn-danger" type="button" onclick="deleteMedicinetype({{ $row->id }})"><i class="bi bi-trash"></i></button>
                                      <form id="delete-form-{{$row->id}}" action="{{route('medicinetype.delete',$row->id)}}"  method="PUT" style="display: none ; " >
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

@include('admin.medicinetype.medicinetype_modal')



<script>

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});


	$(document ).ready(function() {

        $(document).on('click','.addMedicinetype',function(e){
            e.preventDefault();

            let formData=new FormData($('#addMedicinetypeForm')[0]);
            
            $.ajax({
            	type:"post",
                url:"{{route('medicinetype.store')}}",
                data:formData,
                contentType:false,
                processData:false,

                success:function(response){
                	if(response.status == 'success'){
                		$('#addMedicinetype').modal('hide');
                		$('#addMedicinetypeForm')[0].reset();
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
                        title: 'Medicinetype added success'
                    });

                	}
                }
            });
         
        });

    });


     // show category value
        $(document).on('click','.update_medicinetype_Form',function(){

            let id=$(this).data('id');
             let medicinetype_name=$(this).data('medicinetype_name');
          
            $('#up_id').val(id);
            $('#up_medicinetype_name').val(medicinetype_name);
            

        });


      //Update category
      

      $(document).on('click','.updateMedicinetype',function(e){
            e.preventDefault();

            let id=$('#up_id').val();

            let formData=new FormData($('#updateMedicinetypeForm')[0]);
            
            $.ajax({
                type:"post",
                url:"{{url('/medicinetype/update')}}/"+id,
                data:formData,
                contentType:false,
                processData:false,

                success:function(response){
                    if(response.status == 'success'){
                        $('#updateMedicinetype').modal('hide');
                        $('#updateMedicinetypeForm')[0].reset();
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
                        title: 'Medicinetype update success'
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
        url:"{{url('/medicinetype/active')}}/"+id,
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
                    title: 'medicinetype Active successfully'
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
        url:"{{url('/medicinetype/inactive')}}/"+id,
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
                    title: 'medicinetype InActive successfully'
                });
            }
        }
    });
});

// inactive end



//category delete start
   function deleteMedicinetype(id){
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