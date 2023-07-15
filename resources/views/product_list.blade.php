@extends('layout')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/table/datatable/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/plugins/table/datatable/dt-global_style.css')}}">
@endsection
@section('page-title') Products List @endsection
@section('breadcrumbs')
<li class="breadcrumb-item"><a href="javascript:void(0);">
        Products
    </a></li>
<li class="breadcrumb-item active" aria-current="page"><span>Products List</span></li>

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
                <h6 class="">Product List</h6>
                <?php if(session('role')==1) :?>
                <a href="{{ route('addproductspage') }}">
                    <button type="button" class="btn btn-warning mb-2 mr-2 btn-rounded" style="float: right">Add Products
                    </button>
                </a>
                <?php endif ?>
                <div class="table-responsive mb-4 mt-4">
                    <table id="zero-config" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>DETAIL</th>
                                {{-- <th>PRICE</th> --}}
                                <th class="no-content"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $data)
                            <tr>
                                <td>{{$nomor++}}</td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->products_name }}</td>
                                <td>{{ $data->cc }} CC</td>
                                <?php if(session('role')==1) :?>
                                <td>
                                    <a href="{{ route('editproductspage', $data->id) }}">
                                    <button type="button" class="btn btn-warning mb-2 mr-2 rounded-circle" >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                        </svg>
                                    </button>
                                    </a>
                                    <a href="{{ route('deleteproducts', $data->id) }}">
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
                                <?php elseif(session('role')==2) :?>
                                <td>
                                    <a href="{{ route('actionbuyproduct', $data->id) }}">
                                        <button type="button" class="btn btn-success mb-2 mr-2 rounded-circle">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                                                <circle cx="9" cy="21" r="1"></circle>
                                                <circle cx="20" cy="21" r="1"></circle>
                                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                                <?php endif ?>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>NO.</th>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>DETAIL</th>
                                {{-- <th>PRICE</th> --}}
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