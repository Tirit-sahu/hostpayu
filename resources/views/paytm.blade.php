@extends('layouts.app')

@section('content')




<div id="main-content">
<!-- BEGIN Page Title -->
<div class="page-title">
<div>
<h1><i class="fa fa-list"></i> Payment</h1>
{{-- <h4>Overview, stats, chat and more</h4> --}}
</div>
</div>
<!-- END Page Title -->

<!-- BEGIN Breadcrumb -->
<div id="breadcrumbs">
<ul class="breadcrumb">
{{-- <li class="active"> <a><i class="fa fa-home"></i>Home</a></li> --}}
</ul>
</div>
<!-- END Breadcrumb -->



<!-- BEGIN Main Content -->

<div class="row">
    <div class="col-md-12">

    <div class="box">
    <div class="box-title">
    <h3><i class="fa fa-plus-square"></i>Payment</h3>
    <div class="box-tool">
    </div>
    </div>
    <div class="box-content">
        <form action="{{ route('make.payment') }}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <small id="emailHelp" class="form-text text-danger">{{ $errors->first('order_id') }}</small>

            <div class="row">
                <div class="col-md-12">
                    <strong>Name:</strong>
                    <input type="hidden" value="{{ isset($hosting->id)?$hosting->id:'' }}" name="order_id">
                    <input type="text" name="name" class="form-control" value="{{ isset($hosting->customer_name)?$hosting->customer_name:'' }}" placeholder="Name" required>
                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="col-md-12">
                    <strong>Mobile No:</strong>
                    <input type="text" name="mobile" value="{{ isset($hosting->customer_mobile)?$hosting->customer_mobile:'' }}" class="form-control" maxlength="10" placeholder="Mobile No." required>
                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('mobile') }}</small>
                </div>
                <div class="col-md-12">
                    <strong>Email:</strong>
                    <input type="email" class="form-control" value="{{ isset($hosting->customer_email)?$hosting->customer_email:'' }}" placeholder="Email" name="email" required>
                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('email') }}</small>
                </div>

                <?php 
                    $total_amount = $hosting->renewal_amount;
                    if($hosting->gst == 'enabled'){
                    $gst = $hosting->renewal_amount*18/100;
                    $total_amount = $hosting->renewal_amount+$gst;
                ?>

                <div class="col-md-12">
                    <strong>Amount:</strong>
                    <input type="text" class="form-control" value="{{ isset($hosting->renewal_amount)?$hosting->renewal_amount:'' }}" readonly>
                </div>                
                <div class="col-md-12">
                    <strong>IGST 18%:</strong>
                    <input type="text" class="form-control" value="{{ $gst }}" readonly>
                </div>
                <?php } ?>


                <div class="col-md-12" >
                    <strong>Total Amount:</strong>
                    <input type="text" class="form-control" value="{{ isset($hosting->renewal_amount)?$total_amount:'' }}" placeholder="Amount" name="renewal_amount" required readonly>
                    <small id="emailHelp" class="form-text text-danger">{{ $errors->first('renewal_amount') }}</small>
                </div>
                <div class="col-md-12">
                    <br/>
                    <button type="submit" class="btn btn-success form-control"><strong>PAY</strong></button>
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
document.addEventListener('contextmenu', event => event.preventDefault());

$(document).keydown(function (event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }
});
</script>


    