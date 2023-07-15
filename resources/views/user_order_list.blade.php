@extends('layout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/table/datatable/dt-global_style.css')}}">
@endsection
@section('page-title') My Orders @endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="javascript:void(0);">
        Orders
    </a></li>
<li class="breadcrumb-item active" aria-current="page"><span>My Orders</span></li>

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
                <h6 class="">My Orders</h6>
                <a href="{{ route('makeorderpage') }}">
                    <button type="button" class="btn btn-warning mb-2 mr-2 btn-rounded" style="float: right">Buy Products
                    </button>
                </a>
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>ORDER ID</th>
                                <th>PRODUCT ID</th>
                                <th>PRODUCT DETAILS</th>
                                <th>STATUS</th>
                                {{-- <th>TOTAL</th> --}}
                                <th class="no-content text-center" ></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $data)
                            <tr>
                                <td>{{$nomor++}}</td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->products_id }}</td>
                                <td>{{ $data->products_name }}, {{ $data->cc }} CC</td>
                                <td><span class="badge badge-{{ $data->badge_status }}"> {{ $data->status }} </span></td>
                                <td class="text-center">
                                    <?php if($data->badge_status != 'danger'): ?>
                                    <a href="{{ route('cancelorder', $data->id) }}">
                                        <button type="button" class="btn btn-warning mb-2 mr-2 rounded-circle">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-square">
                                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                            </svg>
                                        </button>
                                    </a>
                                    <?php endif ?>
                                    <a href="{{ route('deleteorder', $data->id) }}">
                                        <button type="button" class="btn btn-danger mb-2 mr-2 rounded-circle">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-trash-2">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NO.</th>
                                <th>ORDER ID</th>
                                <th>PRODUCT ID</th>
                                <th>PRODUCT DETAILS</th>
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