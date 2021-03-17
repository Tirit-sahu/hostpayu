@extends('layouts.app')

@section('content')

<div id="main-content">
<!-- BEGIN Page Title -->
<div class="page-title">
<div>
<h1><i class="fa fa-list"></i> Hosting</h1>
{{-- <h4>Overview, stats, chat and more</h4> --}}
</div>
</div>
<!-- END Page Title -->

<!-- BEGIN Breadcrumb -->
<div id="breadcrumbs">
<ul class="breadcrumb">
<li class="active"> <a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i>Home</a></li>
</ul>
</div>
<!-- END Breadcrumb -->



<!-- BEGIN Main Content -->

<div class="row">
    <div class="col-md-12">

    <div class="box">
    <div class="box-title">
    <h3><i class="fa fa-plus-square"></i>Add New Hosting</h3>
    <div class="box-tool">
        <a href="{{ url('/hostings') }}" class="btn btn-primary btn-sm"><i class="fa fa-list" aria-hidden="true"></i> Hosting Datatables</a>
    </div>
    </div>
    <div class="box-content">
            <form action="{{ url('/hostings/store') }}" class="form-horizontal" method="POST">
                @csrf

                <div class="box-header">
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade in text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Successfully </strong> {{ Session::get('success') }}
                </div>
                @endif

                @if (Session::has('error'))
                <div class="alert alert-error alert-dismissible fade in text-center">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Warning </strong> {{ Session::get('error') }}
                </div>
                @endif
                </div>
            
            <div class="form-group">
            <label for="customer_name" class="col-sm-3 col-lg-2 control-label">Customer Name</label>
            <div class="col-sm-9 col-lg-10 controls">
              <input type="hidden" name="hostid" value="{{ isset($hosting)?$hosting->id:'' }}">
            <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name', isset($hosting)?$hosting->customer_name:'') }}" placeholder="" class="form-control">
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('customer_name') }}</small>
            </div>
            </div>

            <div class="form-group">
            <label for="customer_email" class="col-sm-3 col-lg-2 control-label">Customer Email</label>
            <div class="col-sm-9 col-lg-10 controls">
            <input type="text" name="customer_email" id="customer_email" value="{{ old('customer_email', isset($hosting)?$hosting->customer_email:'') }}" placeholder="" class="form-control">
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('customer_email') }}</small>
            </div>
            </div>

            <div class="form-group">
            <label for="customer_mobile" class="col-sm-3 col-lg-2 control-label">Customer Mobile</label>
            <div class="col-sm-9 col-lg-10 controls">
            <input type="text" name="customer_mobile" id="customer_mobile" value="{{ old('customer_mobile', isset($hosting)?$hosting->customer_mobile:'') }}" placeholder="" class="form-control">
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('customer_mobile') }}</small>
            </div>
            </div>

            <div class="form-group">
            <label for="doamin_name" class="col-sm-3 col-lg-2 control-label">Domain Name</label>
            <div class="col-sm-9 col-lg-10 controls">
            <input type="text" name="doamin_name" id="doamin_name" value="{{ old('doamin_name', isset($hosting)?$hosting->doamin_name:'') }}" placeholder="" class="form-control">
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('doamin_name') }}</small>
            </div>
            </div>

            <div class="form-group">
            <label for="hosting" class="col-sm-3 col-lg-2 control-label">Hosting</label>
            <div class="col-sm-9 col-lg-10 controls">
            <input type="text" name="hosting" id="hosting" value="{{ old('hosting', isset($hosting)?$hosting->hosting:'') }}" placeholder="" class="form-control">
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('hosting') }}</small>
            </div>
            </div> 

            <div class="form-group">
            <label for="date" class="col-sm-3 col-lg-2 control-label">Implement Date</label>
            <div class="col-sm-9 col-lg-10 controls">
            <input type="text" name="date" id="date" placeholder="" value="{{ old('date', isset($hosting)?date('d-m-Y', strtotime($hosting->date)):'') }}" class="form-control">
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('date') }}</small>
            </div>
            </div>        

            <div class="form-group">
            <label for="expire_date" class="col-sm-3 col-lg-2 control-label">Expire Date</label>
            <div class="col-sm-9 col-lg-10 controls">
            <input type="text" name="expire_date" id="expire_date" value="{{ old('expire_date', isset($hosting)?date('d-m-Y', strtotime($hosting->expire_date)):'') }}" placeholder="" class="form-control">
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('expire_date') }}</small>
            </div>
            </div> 

            <div class="form-group">
            <label for="renewal_amount" class="col-sm-3 col-lg-2 control-label">Renewal Amount</label>
            <div class="col-sm-9 col-lg-10 controls">
            <input type="text" name="renewal_amount" id="renewal_amount" value="{{ old('renewal_amount', isset($hosting)?$hosting->renewal_amount:'') }}" placeholder="" class="form-control">
            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('renewal_amount') }}</small>
            </div>
            </div>  
            
            <div class="form-group">
              <label for="gst" class="col-sm-3 col-lg-2 control-label">GST</label>
              <div class="col-sm-9 col-lg-10 controls">
              <select name="gst" id="gst" class="form-control">
                <option value="enabled">enabled</option>
                <option value="disabled">disabled</option>
              </select>
              <small id="emailHelp" class="form-text text-danger">{{ $errors->first('gst') }}</small>
              </div>
              </div>
            

            <div class="form-group last">
            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> {{ isset($hosting)?'UPDATE':'SAVE' }}</button>
            {{-- <a type="button" class="btn">Cancel</a>   --}}
            </div>
            </div>
            </form>
    </div>
    </div>
    </div>
    
    </div>

<!-- END Main Content -->

<!--footer -->

<!--end footer -->

<a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="fa fa-chevron-up"></i></a>
</div>

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $( function() {
      $( "#date" ).datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            onClose: function(){
            calculateExpireDate($(this).val());
            }
      });
      $( "#expire_date" ).datepicker({
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
      });

      function calculateExpireDate(date){
        var dateArray = date.split('-');
        var y = parseInt(dateArray[2])+1;
        var m = dateArray[1];
        var d = dateArray[0];
        var afterOneYaer = d+'-'+m+'-'+y;
        $("#expire_date").val(afterOneYaer);
      }

    } );
</script>

    