@extends('layouts.admin')
@section('title','General Setting')
@section('style')
{!! Html::style('bower_components/select2/dist/css/select2.min.css')!!}
@endsection
@section('content')  

<div id="loader" style="display: none;">
    <div class="preloader">
        {{Html::image('image/ajax-loader.gif')}}
    </div>
</div>
<!-- start: BREADCRUMB -->
<div class="breadcrumb-wrapper">
    <h4 class="mainTitle no-margin">SYSTEM SETTINGS</h4>


</div>
<!-- end: BREADCRUMB -->
<div class="container-fluid container-fullw">
    <div class="row">
        <div class="alert alert-white" id="divi" style="margin-top:10px;display: none;">
            <strong id='msg'></strong>
        </div>
        <div class="col-md-12">
            <div class="tabbable">
                <ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
                    <li class="active">
                        <a data-toggle="tab" href="#panel_overview"><i class="fa fa-cog"></i> General </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#panel_smtp"><i class="fa fa-envelope "></i> Smtp </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#panel_company"><i class="fa fa-institution"></i> Company </a>
                    </li>
                    
                </ul>
                <div class="tab-content general-sett" style="padding: 15px">

                    <div id="panel_overview" class="tab-pane fade in active">
                        {!! Form::open(array('route'=>'update','files' => true,'method'=>'POST','class'=>'GlobalForm','id'=>'btnsubmit'))!!} 
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="fname"><strong>APPLICATION NAME</strong></label>
                                    {!! Form::text('application_name',$GenSetting->application_name,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter Application Name',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter Application Name"
                                    )) !!}
                                    @if($errors->has('application_name'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('application_name') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"><strong>APPLICATION TITLE</strong></label>
                                    {!! Form::text('application_title',$GenSetting->application_title,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter Application Title'
                                    )) !!}
                                    @if($errors->has('application_title'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('application_title') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label"> ADDRESS  </label>
                                    {!! Form::textarea('address',$GenSetting->address, array('placeholder' => 'Address','class' => 'form-control','id'=>'summary-ckeditor','style'=>'height:150px',
                                    )) !!}
                                    @if($errors->has('address'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('address') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="email"><strong>SYSTEM EMAIL</strong> <span>Remember: All Email Going to the Receiver from this Email</span></label>
                                    {{ Form::email('system_mail',$GenSetting->system_mail,array('class'=>'form-control',
                                    'placeholder'=>'Enter System Email'
                                    )) }}
                                    @if($errors->has('system_mail'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('system_mail') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label" for="ftext"><strong>FOOTER TEXT</strong></label>
                                    {!! Form::text('footer_text',$GenSetting->footer_text,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter Footer Text'
                                    )) !!}
                                    @if($errors->has('footer_text'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('footer_text') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ftext" class="control-label browse-input"><strong>APPLICATION LOGO</strong></label>
                                    <div class="input-group">
                                        {{Form::file('application_logo',array(
                                        'data-fv-file'=>"true",
                                        'data-fv-file-extension'=>"jpeg,jpg,png",
                                        'data-fv-file-type'=>"image/jpeg,image/png",
                                        'data-fv-file-maxsize'=>"2097152",
                                        'data-fv-file-message'=>"The Selected File Only Jpeg Jpg Png"))}}
                                        @if($errors->has('application_logo'))
                                        <div class="text-left error" style="color: red">
                                            {{ $errors->first('application_logo') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ftext" class="control-label browse-input"><strong>APPLICATION FAVICON</strong></label>
                                    <div class="input-group">

                                        {{ Form::file('application_fevicon',array(
                                        'data-fv-file'=>"true" ,                                    
                                        'data-fv-file-extension'=>"png",
                                        'data-fv-file-type'=>"image/png",
                                        'data-fv-file-maxsize'=>"2097152",
                                        'data-fv-file-message'=>"The Selected File Only Png")) }}
                                        @if($errors->has('application_fevicon'))
                                        <div class="text-left error" style="color: red">
                                            {{ $errors->first('application_fevicon') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label"><strong>EMAIL GATEWAY</strong></label>
                                    {!! Form::select('email_getway',[''=>'','192.168.1.1'=>'192.168.1.1'],$GenSetting->email_getway ,array(
                                    'class' => 'form-control js-example-basic-single',
                                    'id'=>'email_getway',
                                    'style'=>'width:100%',
                                    )) !!}
                                    @if($errors->has('email_getway'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('email_getway') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12 text-right">
                                {{ Form::button(' Update', array('class' => 'btn btn-success add-row fa fa-check-circle ','type'=>'submit')) }}
                            </div>
                        </div>
                        {{ Form::close()}}
                    </div>
                    
                    <div id="panel_smtp" class="tab-pane">
                        {{Form::open(['url'=>'smtp/update','method'=>'POST','class'=>'GlobalFormValidation','id'=>'form'])}}
                        <div class="row">
                            <div class="col-sm-10 col-lg-offset-1" style="margin-top: 10px;">
                                @include('layouts.alert_process')
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class=' col-lg-6 col-md-6'>
                                <div class="form-group">
                                    <label class="control-label"><strong>DRIVER</strong></label>
                                    {!! Form::text('driver',$smtp->driver,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter Driver Name',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter Driver Name"
                                    )) !!}
                                    @if($errors->has('driver'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('driver') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>HOST</strong></label>
                                    {!! Form::text('host',$smtp->host,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter Host Name',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter Host Name"
                                    )) !!}
                                    @if($errors->has('host'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('host') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>PORT</strong></label>
                                    {!! Form::text('port',$smtp->port,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter Port Name',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter Port Name"
                                    )) !!}
                                    @if($errors->has('port'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('port') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>USERNAME</strong></label>
                                    {!! Form::text('UserName',$smtp->UserName,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter User Name',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter User Name Name"
                                    )) !!}
                                    @if($errors->has('UserName'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('UserName') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    {{Form::label('password','<strong>PASSWORD</strong>', array('class' => 'control-label'),false)}}
                                    {{ Form::text('password',$smtp->password,array('placeholder' => 'Enter Password','data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter Password",'class' => 'form-control','id' => 'password')) }}
                                     @if($errors->has('password'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('password') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>ENYCRPTION</strong></label>
                                    {!! Form::text('enycrption',$smtp->enycrption,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter Enycrption Name',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter Enycrption Name"
                                    )) !!}
                                    @if($errors->has('enycrption'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('enycrption') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="space20 pull-right">
                                {{ Form::button('Update', ['type' => 'submit', 'class' => 'btn btn-success add-row fa fa-check-circle'] )  }}
                               
                            </div>
                            {{Form::close()}}

                        </div>
                    </div>

                    <div id="panel_company" class="tab-pane">
                        {{Form::open(['url'=>'company/update','method'=>'POST','class'=>'GlobalFormValidation','id'=>'form'])}}
                        <div class="row">
                            <div class="col-sm-10 col-lg-offset-1" style="margin-top: 10px;">
                                @include('layouts.alert_process')
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class=' col-lg-6 col-md-6'>
                                <div class="form-group">
                                    <label class="control-label"><strong>COMPANY NAME</strong></label>
                                    {!! Form::text('company_name',$company->company_name,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter Company Name',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter Company Name"
                                    )) !!}
                                    @if($errors->has('company_name'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('company_name') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>ADDRESS</strong></label>
                                    {!! Form::textarea('address',$company->address,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter Address',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter Address"
                                    )) !!}
                                    @if($errors->has('address'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('address') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label class="control-label"><strong>CITY</strong></label>
                                    {!! Form::text('city',$company->city,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter City',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter City"
                                    )) !!}
                                    @if($errors->has('city'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('city') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>STATE</strong></label>
                                    {!! Form::text('state',$company->state,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter State',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter State"
                                    )) !!}
                                    @if($errors->has('state'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('state') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>COUNTRY CODE</strong></label>
                                    {!! Form::text('country_code',$company->country_code,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter Country Code',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter Country Code"
                                    )) !!}
                                    @if($errors->has('country_code'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('country_code') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>ZIP CODE</strong></label>
                                    {!! Form::text('zip_code',$company->zip_code,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter Zip Code',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter Zip Code"
                                    )) !!}
                                    @if($errors->has('zip_code'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('zip_code') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>PHONE NO</strong></label>
                                    {!! Form::text('phone_no',$company->phone_no,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter Phone No',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter Phone No"
                                    )) !!}
                                    @if($errors->has('phone_no'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('phone_no') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="control-label"><strong>GST NO</strong></label>
                                    {!! Form::text('gst_no',$company->gst_no,array(
                                    'class' => 'form-control',
                                    'placeholder'=>'Enter Gst No',
                                    'data-fv-notempty'=>"true",
                                    'data-fv-notempty-message'=>"Please Enter Zip Code"
                                    )) !!}
                                    @if($errors->has('gst_no'))
                                    <div class="text-left error" style="color: red">
                                        {{ $errors->first('gst_no') }}
                                    </div>
                                    @endif
                                </div>

                            </div> 
                            <div class="space20 pull-right">
                                {{ Form::button('<i class="fa fa-check-circle"></i> Update', ['type' => 'submit', 'class' => 'btn btn-success add-row'] )  }}
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                    <div id="panel_edit_account" class="tab-pane fade">
                        <div class="department">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="add-department panel panel-white">
                                        <div class="panel-heading">
                                            <h5 class="panel-title">ADD BANK ACCOUNT</h5>
                                        </div>
                                        <div class="panel-body">
                                            {{ Form::open()}}
                                            <div class="form-group">
                                                <label for="bname"><strong>BANK NAME</strong> <span>e.g."United State Bank"</span></label>

                                                {!! Form::text('bank_name',null,array(
                                                'class' => 'form-control',
                                                'placeholder'=>'Enter Bank Name')) !!}
                                            </div>
                                            <div class="form-group">
                                                <label for="bhname"><strong>BRANCH NAME</strong> <span>e.g."Washington Branch"</span></label>
                                                {!! Form::text('branch_name',null,array(
                                                'class' => 'form-control',
                                                'placeholder'=>'Enter Branch Name')) !!}
                                            </div>
                                            <div class="form-group">
                                                <label for="aname"><strong>ACCOUNT NAME</strong> <span>e.g."Abdul Kashem Shamim"</span></label>
                                                {!! Form::text('account_name',null,array(
                                                'class' => 'form-control',
                                                'placeholder'=>'Enter Account Name')) !!}
                                            </div>
                                            <div class="form-group">
                                                <label for="anumber"><strong>ACCOUNT NUMBER</strong> <span>e.g."1234567891234567"</span></label>
                                                {!! Form::text('account_number',null,array(
                                                'class' => 'form-control',
                                                'placeholder'=>'Enter Account Number')) !!}
                                            </div>
                                            <div class="form-group">
                                                <label for="ifsccode"><strong>IFSC CODE</strong></label>
                                                {!! Form::text('ifsc_code',null,array(
                                                'class' => 'form-control',
                                                'placeholder'=>'Enter IFSC Code')) !!}
                                            </div>
                                            <div class="form-group">
                                                <label for="pannum"><strong>PAN NUMBER</strong></label>
                                                {!! Form::text('pan_number',null,array(
                                                'class' => 'form-control',
                                                'placeholder'=>'Enter Pan Number')) !!}
                                            </div>
                                            <div class="space20">

                                                {{ Form::button(' Add', array('class' => 'btn btn-success add-row fa fa-plus','type'=>'submit')) }}

                                            </div>
                                            {{ Form::close()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('pagejs')
{!! Html::script('bower_components/select2/dist/js/select2.min.js')!!}
{!! Html::script('vendor/unisharp/laravel-ckeditor/ckeditor.js') !!}
{!! Html::script('bower_components/formValidation/js/formValidation.min.js') !!}
{!! Html::script('bower_components/formValidation/js/framework/bootstrap.min.js') !!}
{!! Html::script('js/general_setting/general_setting.js')!!}
{!! Html::script('js/globalAjax.js') !!}
@endsection