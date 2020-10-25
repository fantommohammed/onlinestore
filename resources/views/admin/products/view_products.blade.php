@extends('layouts.adminlayouts.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>{{__(' Home')}}</a> <a href="#">{{__('Product')}}</a> <a href="{{url('/admin/view-categories')}}" class="current">{{'View products'}}</a> </div>
    <h1>{{__('Products')}}</h1>
            @if(Session::has('flash_message_error'))                    
                        <div class="alert alert-error alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>{!!session('flash_message_error')!!}</strong>
                        </div>   
                    @endif   
                    @if(Session::has('flash_message_success'))                    
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                                <strong>{!!session('flash_message_success')!!}</strong>
                        </div>   
            @endif       
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">    
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>{{__('View Products')}}</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table"> 
              <thead>
                <tr>
                  <th>{{__('Image')}}</th>
                  <th>{{__('Product ID')}}</th>
                  <th>{{__('Category Name')}}</th>
                  <th>{{__('Product Name')}}</th>
                  <th>{{__('Product Code')}}</th>
                  <th>{{__('Product Color')}}</th>
                  <th>{{__('Price')}}</th>
                  <th>{{__('Actions')}}</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($products as $product)
                    <tr class="gradeX">
                        <td>
                          @if(!empty($product->image))
                            <img src="{{asset('/images/backend_images/products/small/'.$product->image)}}" style="width:70px;">
                          @endif
                        </td>
                        <td>{{$product->id}}</td>
                        <td>{{$product->category_name}}</td>
                       <td>{{$product->product_name}}</td>
                        <td>{{$product->product_code}}</td>
                        <td>{{$product->product_color}}</td>
                        <td>{{$product->price}}</td>                     
                        <td class="center">
                          <div>
                            <a href="#myModal{{$product->id}}" data-toggle="modal" class="btn btn-success btn-mini">{{__('Datails')}}</a>
                            <a href="{{url('/admin/edit-product/'.$product->id)}}" class="btn btn-primary btn-mini">{{__('Edit')}}</a> 
                            <a rel="{{$product->id}}" rel1="delete-product" href="javascript:" class="btn btn-danger btn-mini deleteRecord">{{__('Delete')}}</a>
                          </div>
                        </td>
                    </tr>  
                      <div id="myModal{{$product->id}}" class="modal hide">
                        <div class="modal-header">
                          <button data-dismiss="modal" class="close" type="button">×</button>
                          <h3>{{$product->product_name}} Full description</h3>
                        </div>
                        <div class="modal-body">
                          <p>{{$product->description}}</p>
                        </div>
                      </div>
                  @endforeach                            
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection