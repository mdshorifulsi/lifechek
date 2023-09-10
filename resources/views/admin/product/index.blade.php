@extends('admin_layouts')
@section('admin_content')
@section('title','Product')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">All Product</h3>
		
                <button type="button" id="btnright" class="btn btn-primary  waves-effect m-r-20" data-toggle="modal" data-target="#addProduct"> + Add Product</button>
                 
            </div>
			<div class="card-body">
				<table id="example1" class="table">
					<thead>
						<tr>
							<th>Sl.no</th>
							<th class="text-center">Name</th>
							<th>Generic</th>
                            <th>Brand</th>
							<th>Image</th>
                            <th>Category</th>
                            <th>purchase</th>
                            <th>MRP</th>
                            <th>Discount</th>
                            <th>stock</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>

					@foreach($product as $key=>$row)
					<tbody>
						<tr>
							<td>{{ ++$key }}</td>
							<td>{{$row->product_name }} {{$row->medicinetype->medicinetype_name }} ({{$row->power}}mg)</td>
							<td>{{$row->generic_name }}</td>
                            <td>{{$row->brand->brand_name }}</td>
							<td>
								<img src="{{ asset($row->product_image) }}"  width="80px" height="50px">
							</td>
                            <td>{{$row->category->cat_name }}</td>
                            <td>{{$row->purchase_price }} Tk</td>
                            <td>{{$row->mrp }} Tk</td>
                            
                            <td><span class="badge badge-success">{{$row->discount }} %</span> </td>
                            <td>{{$row->stock_quantity }}</td>
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

                                    <a href="" class="btn btn-sm btn-warning update_product_Form"
                                    data-toggle="modal" 
                                    data-target="#updateProduct"
                                    data-id="{{$row->id}}"
                                    data-product_name="{{$row->product_name}}"
                                    data-generic_name="{{$row->generic_name}}"
                                    data-power="{{$row->power}}"
                                    data-purchase_price="{{$row->purchase_price}}"
                                    data-mrp="{{$row->mrp}}"
                                    data-discount="{{$row->discount}}"
                                    data-stock_quantity="{{$row->stock_quantity}}"
                                    data-description="{{$row->description}}"
                                    data-category_id="{{$row->category_id}}"
                                    data-brand_id="{{$row->brand_id}}"
                                    data-medicinetype_id ="{{$row->medicinetype_id }}"
                                   
                                    

                                    ><i class="bi bi-pencil-square"></i></a>

                                    <button class="btn btn-danger" type="button" onclick="deleteProduct({{ $row->id }})"><i class="bi bi-trash"></i></button>
                                      <form id="delete-form-{{$row->id}}" action="{{route('product.delete',$row->id)}}"  method="PUT" style="display: none ; " >
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

@include('admin.product.product_modal')



<script>

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});


	$(document ).ready(function() {

        $(document).on('click','.addProduct',function(e){
            e.preventDefault();

            let formData=new FormData($('#addProductForm')[0]);
            
            $.ajax({
            	type:"post",
                url:"{{route('product.store')}}",
                data:formData,
                contentType:false,
                processData:false,

                success:function(response){
                	if(response.status == 'success'){
                		$('#addProduct').modal('hide');
                		$('#addProductForm')[0].reset();
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
                        title: 'Product added success'
                    });

                	}
                }
            });
         
        });

    });




// show category value
        $(document).on('click','.update_product_Form',function(){

            let id=$(this).data('id');
             let product_name=$(this).data('product_name');
             let generic_name=$(this).data('generic_name');
             let power=$(this).data('power');
             let purchase_price=$(this).data('purchase_price');
             let mrp=$(this).data('mrp');
             let discount=$(this).data('discount');
             let stock_quantity=$(this).data('stock_quantity');
             let description=$(this).data('description');
             let category_id=$(this).data('category_id');
             let brand_id =$(this).data('brand_id');
             let medicinetype_id =$(this).data('medicinetype_id');
          
            $('#up_id').val(id);
            $('#up_product_name').val(product_name);
            $('#up_generic_name').val(generic_name);
            $('#up_power').val(power);
            $('#up_purchase_price').val(purchase_price);
            $('#up_mrp').val(mrp);
            $('#up_discount').val(discount);
            $('#up_stock_quantity').val(stock_quantity);
            $('#up_description').val(description);
            $('#up_category_id').val(category_id);
            $('#up_brand_id').val(brand_id );
            $('#up_medicinetype_id ').val(medicinetype_id);
                        
            

        });



      $(document).on('click','.updateProduct',function(e){
            e.preventDefault();

            let id=$('#up_id').val();

            let formData=new FormData($('#updateProductForm')[0]);
            
            $.ajax({
                type:"post",
                url:"{{url('/product/update')}}/"+id,
                data:formData,
                contentType:false,
                processData:false,

                success:function(response){
                    if(response.status == 'success'){
                        $('#updateProduct').modal('hide');
                        $('#updateProductForm')[0].reset();
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
                        title: 'Product Update success'
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
        url:"{{url('/product/active')}}/"+id,
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
        url:"{{url('/product/inactive')}}/"+id,
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
                    title: 'product InActive successfully'
                });
            }
        }
    });
});

// inactive end



//category delete start
   function deleteProduct(id){
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