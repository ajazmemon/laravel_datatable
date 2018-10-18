@extends('layouts.admin')
@section('title','Category')
@section('content')
<div class="col-md-4 col-sm-4 col-xs-12">
                <div class="add-department panel panel-white">
                    <div class="panel-heading">
                        <h5 class="panel-title">ADD CATEGORY</h5>
                    </div>
                    <div class="panel-body" style="padding: 25px">

                        {{ Form::open(array('url' =>'admin/category','method'=>'POST','class'=>'GlobalFormValidation',))}}
                        
                     <div class="form-group">
                            <label><strong>Category</strong></label>
                            {!! Form::select('parent_id[]',$category,array(
                            'class' => 'form-control js-example-basic-multiple',
                            'id'=>'cat',
                            'style'=>'width:100%',
                            'data-fv-notempty'=>"true",
                            'data-fv-notempty-message'=>"Please Select Category" ,'multiple'=>"multiple")) !!}
                        </div>
                        @if($errors->has('department_id'))
                            <div class="error text-left" style='color: red'>
                                {{ $errors->first('catgeory_id') }}
                            </div>
                            @endif
                            <div class="form-group">

                            <label for="desiname"><strong>TITLE</strong> <span>e.g."Software Engineer"</span></label>
                            {!! Form::text('title',null,array(
                            'class' => 'form-control',
                            'placeholder'=>'Enter Title',
                            'data-fv-notempty'=>"true",
                            'data-fv-notempty-message'=>"Please Enter Title" 
                            )) !!}

                            @if($errors->has('designation'))
                            <div class="error text-left" style='color: red'>
                                {{ $errors->first('designation') }}
                            </div>
                            @endif
               </div>

                     <div class="form-group">

                            <label for="desiname"><strong>SLUG</strong> <span>e.g."Software Engineer"</span></label>
                            {!! Form::textarea('description',null,array(
                            'class' => 'form-control',
                            'placeholder'=>'Enter Description',
                            'data-fv-notempty'=>"true",
                            'data-fv-notempty-message'=>"Please Enter Title" 
                            )) !!}

                            @if($errors->has('designation'))
                            <div class="error text-left" style='color: red'>
                                {{ $errors->first('designation') }}
                            </div>
                            @endif
               </div>

                      <div class="form-group">

                            <label for="desiname"><strong>SLUG</strong> <span>e.g."Software Engineer"</span></label>
                            {!! Form::text('slug',null,array(
                            'class' => 'form-control',
                            'placeholder'=>'Enter Title',
                            'data-fv-notempty'=>"true",
                            'data-fv-notempty-message'=>"Please Enter Title" 
                            )) !!}

                            @if($errors->has('designation'))
                            <div class="error text-left" style='color: red'>
                                {{ $errors->first('designation') }}
                            </div>
                            @endif
               </div>
                        <div class="space20">
                            {{ Form::button(' Add',array('type'=>'submit','class' => 'btn btn-success add-row fa fa-plus','id'=>'form')) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            @endsection
            @section('script')

            <script type="text/javascript">
            
            </script>
@endsection