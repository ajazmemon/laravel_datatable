@extends('layouts.admin')
@section('title','Category')
@section('style')
<style>
    .buttons-pdf {
        color: #fff;
        background-color: #e42a23;
        border-color: white;
    }
    .buttons-csv {
        color: #fff;
        background-color: #3f8852;
        border-color: white;
    }
    .buttons-pdf:hover {
        background-color: #e42a23;
        border-color: white;

    }
    .buttons-csv:hover {
        color: #fff;
        background-color: #3f8852;
        border-color: white;
    }
</style>

{{ Html::style('bower_components/DataTables/datatables.min.css') }}
{!! Html::style('bower_components/DataTables/media/css/dataTables.bootstrap.min.css') !!}
{!! Html::style('bower_components/DataTables/media/css/responsive.bootstrap.min.css') !!}
{!! Html::style('https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css') !!}


@endsection
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Categories</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
                <a class="btn btn-sm btn-outline-secondary" href="{{url('admin/category/create')}}">Add New</a>
            </div>
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="all-department">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h5 class="panel-title">ALL DEPARTMENTS</h5>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered dt-responsive nowrap" id="data_table" width="100%" cellspacing="0">                                
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>TItle</th>
                                        <th>Description</th>
                                        <th>Slug</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        
        

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group">
                <label><strong>Category</strong></label>
                {!! Form::select('title',$category,null,array(
                'class' => 'form-control js-example-basic-multiple',
                'id'=>'category',
                'style'=>'width:100%')) !!}
                
            </div>
            <div class="form-group">
                <label>Title :<span style="color: red">*</span> </label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-building" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label>Description :<span style="color: red">*</span> </label>
                <div class="input-group mb-3">
                    <textarea id="description" class="form-control" style="height: 120px"></textarea>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('script')
{{ Html::script('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}
<!--{{ Html::script('bower_components/DataTables/media/js/dataTables.bootstrap.min.js') }}-->
{{ Html::script('bower_components/DataTables/datatables.min.js') }}
{{ Html::script('bower_components/DataTables/media/js/dataTables.responsive.min.js') }}
{{ Html::script('bower_components/DataTables/media/js/responsive.bootstrap.min.js') }}
{{ Html::script('https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js') }}
{{ Html::script('https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js') }}
{{ Html::script('bower_components/jszip/dist/jszip.min.js') }}
{{ Html::script('bower_components/pdfmake.min.js') }}
{{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js') }}
{{ Html::script('https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js') }}
{{ Html::script('https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js') }}
{!! Html::script('js/category/category.js') !!}
@endsection

