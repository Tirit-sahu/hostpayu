@extends('layouts.app')

@section('content')




<div id="main-content">
<!-- BEGIN Page Title -->
<div class="page-title">
<div>
<h1><i class="fa fa-list"></i> Payment Status</h1>
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
    <h3><i class="fa fa-plus-square"></i>Payment Status</h3>
    <div class="box-tool">
    </div>
    </div>
    <div class="box-content">
        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>
        <i class="icon fa fa-check"></i> {{ Session::get('success') }}
        </center>
        </div>
        @endif

        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center><i class="icon fa fa-warning"></i> {{ Session::get('error') }}</center>
        </div>
        @endif

        <br>
        @if(isset($response))
        @foreach($response as $key => $value)
            <p><b>{{ $key }} </b>: {{ $value }}</p>
        @endforeach
        @endif
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




    