@extends('layout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/table/datatable/dt-global_style.css')}}">
@endsection
@section('page-title') Order List @endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="javascript:void(0);">
        Orders
    </a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Order List</span></li>

@endsection
@section('content')
<div class="layout-px-spacing">

    <div class="row layout-top-spacing">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            
            <div class="widget-content widget-content-area br-6">
                @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
                @endif
                @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif
                <h6 class="">Orders List</h6>
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>ORDER ID</th>
                                <th>PRODUCT ID</th>
                                <th>PRODUCT DETAILS</th>
                                <th>BUYER</th>
                                <th>STATUS</th>
                                {{-- <th>TOTAL</th> --}}
                                <th class="no-content"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $data)
                            <tr>
                                <td>{{$nomor++}}</td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->products_id }}</td>
                                <td>{{ $data->products_name }}, {{ $data->cc }} CC</td>
                                <td>{{ $data->id_user }}</td>
                                <td><span class="badge badge-{{ $data->badge_status }}"> {{ $data->status }} </span></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NO.</th>
                                <th>ORDER ID</th>
                                <th>PRODUCT ID</th>
                                <th>PRODUCT DETAILS</th>
                                <th>BUYER</th>
                                <th>STATUS</th>
                                {{-- <th>TOTAL</th> --}}
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
@section('js')
<script src="{{asset('assets/plugins/highlight/highlight.pack.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('assets/plugins/table/datatable/datatables.js')}}"></script>
<script>
    $('#zero-config').DataTable({
            "oLanguage": {
                "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
               "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [7, 10, 20, 50],
            "pageLength": 7 
        });
</script>
@endsection