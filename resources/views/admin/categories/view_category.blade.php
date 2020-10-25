@extends('layouts.adminlayouts.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>{{__(' Home')}}</a> <a href="#">{{__('Categories')}}</a> <a href="{{url('/admin/view-categories')}}" class="current">{{'View categories'}}</a> </div>
    <h1>{{__('Categories')}}</h1>
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
            <h5>{{__('View Categories')}}</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>{{__('Category ID')}}</th>
                  <th>{{__('Category Name')}}</th>
                  <th>{{__('Category Level')}}</th>
                  <th>{{__('Category Url')}}</th>
                  <th>{{__('Actions')}}</th>
                </tr>
              </thead>
              <tbody>
                  @foreach($categories as $category)
                    <tr class="gradeX">
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->parent_id}}</td>
                        <td>{{$category->url}}</td>
                        <td class="center">
                          <div>
                            <a href="{{url('/admin/edit-category/'.$category->id)}}" class="btn btn-primary btn-mini">{{__('Edit')}}</a> 
                              <a id="delCat" href="{{url('/admin/delete-category/'.$category->id)}}" class="btn btn-danger btn-mini">{{__('Delete')}}</a></div>
                        </td>
                    </tr>  
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