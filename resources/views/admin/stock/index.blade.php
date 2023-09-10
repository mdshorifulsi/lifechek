@extends('admin_layouts')
@section('admin_content')
@section('title','Stock')

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">All Stock</h3>
		
            
                 
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
                            
                            <td>{{$row->discount }} % </td>

                            <td><span class="badge badge-success">{{$row->stock_quantity }} piece</span></td>

                          							
							
							<td>
                                    
                                 <a href="" class="btn btn-sm btn-warning update_stock_Form"
                                    data-toggle="modal" 
                                    data-target="#updateStock"
                                    data-id="{{$row->id}}"
                                    data-stock_quantity="{{$row->stock_quantity}}"
                                    

                                    ><i class="bi bi-pencil-square"></i></a>



                                    

                                  
                                    
                                    
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

@include('admin.stock.stock_modal')



<script>

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});




$(document ).ready(function() {
// show category value
        $(document).on('click','.update_stock_Form',function(){

            let id=$(this).data('id');
             let stock_quantity=$(this).data('stock_quantity');
            $('#up_id').val(id);  
            $('#up_stock_quantity').val(stock_quantity);
           
                        
            

        });



      $(document).on('click','.updateStock',function(e){
            e.preventDefault();

            let id=$('#up_id').val();

            let formData=new FormData($('#updateStockForm')[0]);
            
            $.ajax({
                type:"post",
                url:"{{url('/stock/update')}}/"+id,
                data:formData,
                contentType:false,
                processData:false,

                success:function(response){
                    if(response.status == 'success'){
                        $('#updateStock').modal('hide');
                        $('#updateStockForm')[0].reset();
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
                        title: 'Stock Product  Update success'
                    });



                    }
                }
            });
         
        });




})


</script>
 
@endsection