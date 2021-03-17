
<?php use \App\Http\Controllers\HostingController;
use Illuminate\Http\Request;
?>

@extends('layouts.app')

@section('content')


<div id="main-content">
<!-- BEGIN Page Title -->
<div class="page-title">
<div>
<h1><i class="fa fa-file-o"></i> Dashboard</h1>
<h4>Overview, stats, chat and more</h4>
</div>
</div>
<!-- END Page Title -->

<!-- BEGIN Breadcrumb -->
<div id="breadcrumbs">
<ul class="breadcrumb">
<li class="active"><i class="fa fa-home"></i> Home</li>
</ul>
</div>
<!-- END Breadcrumb -->


<!-- BEGIN Tiles -->
<div class="row">
<div class="col-md-7">
<div class="row">
    <div class="col-md-7">
        <div class="tile tile-dark-blue">
        <div class="img">
        <i class="fa fa-list"></i>
        </div>
        <div class="content">
        <p class="big">{{ HostingController::dashboard('total_hosting') }}</p>
        <p class="title"><b><a style="color: white;" href="{{ url('/survey') }}">Total Hosting</a></b></p>
        </div>
        </div>
        </div>

<div class="col-md-5">
    <div class="tile tile-pink">
    <div class="img">
    <i class="fa fa-list"></i>
    </div>
    <div class="content">
        <p class="big">{{ HostingController::dashboard('expire') }}</p>
    <p class="title"><b><a style="color: white;" href="{{ url('/users') }}">Expire</a></b></p>
    </div>
    </div>
    </div>


</div>
</div>

<div class="col-md-5">
<div class="row">
<div class="col-md-6">
<div class="tile tile-green">
<div class="img">
<i class="fa fa-list"></i>
</div>
<div class="content">
    <p class="big">{{ HostingController::dashboard('active') }}</p>
<p class="title"><b><a style="color: white;" href="#">Active</a></b></p>
</div>
</div>
</div>

<div class="col-md-6">
<div class="tile tile-orange">
<div class="img">
<i class="fa fa-list"></i>
</div>
<div class="content">
    <p class="big">{{ HostingController::dashboard('upcommimg_expire') }}</p>
<p class="title"><b><a style="color: white;" href="#">Upcommimg Expire</a></b></p>
</div>
</div>
</div>
</div>
</div>

</div>

<!-- END Tiles -->


<!-- BEGIN Main Content -->







<!-- END Main Content -->

<!--footer -->

<!--end footer -->

<a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="fa fa-chevron-up"></i></a>
</div>

@endsection
