@extends('layouts.adminlayouts.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>{{__('Home')}}</a> <a href="#">{{__('Products')}}</a> <a href="#" class="current">{{__('Edit product')}}</a> </div>
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>{{__('Edit Product')}}</h5>
          </div>
          <div class="widget-content nopadding">
            <form enctype="multipart/form-data" class="form-horizontal"
             method="post" action="{{url('/admin/edit-product/'.$productDetails->id)}}"
             name="edit_product" id="Edit_product" novalidate="novalidate">
              @csrf
              <div class="control-group">
                <label class="control-label">{{__('Under Category')}}</label>
                <div class="controls">
                  <select name="category_id" id="category_id" style="width: 220px">
                    <?php echo $categories_dropdown;?>                                
                  </select>
                </div>
              </div>  
              <div class="control-group">
                <label class="control-label">{{__('Product Name')}}</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name" value="{{$productDetails->product_name}}">
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label">{{__('Product Code')}}</label>
                <div class="controls">
                  <input type="text" name="product_code" id="product_code" value="{{$productDetails->product_code}}">
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label">{{__('Product Color')}}</label>
                <div class="controls">
                  <input type="text" name="product_color" id="product_color" value="{{$productDetails->product_color}}">
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label">{{'Description'}}</label>
                <div class="controls">
                  <textarea name="description" id="description">{{$productDetails->description}}</textarea>
                  
                </div>
              </div>   
              <div class="control-group">
                <label class="control-label">{{__('Price')}}</label>
                <div class="controls">
                  <input type="text" name="price" id="price" value="{{$productDetails->price}}">
                </div>
              </div>   
              <div class="control-group">
                <label class="control-label">{{__('image')}}</label>
                <div class="controls">
                  <input type="file" name="image" id="image" value="{{$productDetails->image}}">
                  <input type="hidden" name="current_image" value="{{$productDetails->image}}">
                  @if(!empty($productDetails->image))
                    <img style="width:40px;"src="{{asset('/images/backend_images/products/small/'.$productDetails->image)}}">
                    |<a id="delPro" href="{{url('/admin/delete-product-image/'.$productDetails->id)}}" class="btn btn-danger btn-mini">{{__('Delete')}}</a>
                  @endif
                </div>
              </div>         
              <div class="form-actions">
                <input type="submit" value="Edit Product" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection