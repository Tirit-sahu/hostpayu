@extends('layouts.app')

@section('content')


<div id="main-content">
<!-- BEGIN Page Title -->
<div class="page-title">
<div>
<h1><i class="fa fa-list"></i> Payment Datatables</h1>
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

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center>
        <i class="icon fa fa-check"></i> Successfully {{ Session::get('success') }}
        </center>
        </div>
        @endif

        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <center><i class="icon fa fa-warning"></i> {{ Session::get('error') }}</center>
        </div>
        @endif

    <div class="box">
    <div class="box-title">
    <h3><i class="fa fa-list"></i> Payment Datatables</h3>
    <div class="box-tool">
    </div>
    </div>
    <div class="box-content">
    <div class="table-responsive">
    <table id="payment-table" class="table table-hover">
    <thead>
    <tr>
    <th>SNO.</th>
    <th>Name</th>
    <th>Mobile</th>
    <th>Email</th>
    <th>Status</th>
    <th>Amount</th>
    <th>Order id</th>
    <th>Transaction id</th>
    <th>Date</th>
    <th>Created at</th>
    <th>Action</th>
    </tr>
    </thead>
    
    </table>
    </div>
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

<script src="//code.jquery.com/jquery.js"></script>
<script>
    $(document).ready(function(){
        $('#payment-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('get.paymentData') !!}',
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'name', name: 'name' },
                { data: 'mobile', name: 'mobile' },
                { data: 'email', name: 'email' },
                { data: 'status', name: 'status' },
                { data: 'fee', name: 'fee' },
                { data: 'order_id', name: 'order_id' },
                { data: 'transaction_id', name: 'transaction_id' },
                { data: 'date', name: 'date' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action' },
            ]
        });
    });
    </script>

    <script>
        function destroy(id){
            swal({
            title: "Are you sure?",
            text: "You will not be able to recover this file!",
            icon: "warning",
            buttons: [
            'No, cancel it!',
            'Yes, I am sure!'
            ],
            dangerMode: true,
            }).then(function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                type:"GET",
                url:"{{ url('/payment/destroy') }}?id="+id,
                success:function(res){
                console.log(res);
                    if(res==1){
                        swal({
                        title: 'Successfully!',
                        text: 'User Blocked Successfully!',
                        icon: 'success'
                        });
                        var table = $('#payment-table').DataTable();
                        table.ajax.reload();
                    }
                }
                });            
            }
            });
            }
    </script>

    

    