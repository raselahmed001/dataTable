@extends('ui')
@section('title', 'Client List')
@push('style')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">
    </script> <!-- MAKE SURE THIS IS LOADED -->

     <link
        rel="stylesheet"
        type="text/css"
        href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
@endpush
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0"> {{ __('Clients') }} </h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('general.home') }}</a></li>
                        <li class="breadcrumb-item active">Clients</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('client.create') }}" type="button" class="btn btn-outline-secondary">
                            <span class="icon-on"><i class="ri-add-line align-bottom me-1"></i> {{ __('Add Client') }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                        <strong> Hi, {{ auth()->user()->name }}! </strong> <b>   {{ session('message') }} </b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="datatable" class="table">
                        <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Name</th>
                            <th>{{ __('general.email') }}</th>
                            <th>Site Number</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>QRCode</th>
                            <th>{{ trans('general.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($clients as $vrm)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$vrm->name}}</td>
                                <td>{{$vrm->email}}</td>
                                <td>{{$vrm->site_number}}</td>
                                <td>{{$vrm->address}}</td>
                                <td>
                                    @if($vrm->status === 1 )
                                        <span class="badge text-bg-primary">Enabled</span>
                                    @elseif($vrm->status === 0)
                                        <span class="badge text-bg-danger ">Terminate</span>
                                    @endif
                                </td>
                                <td>
                                    @if(isset($vrm->coupon->coupon))
                                        <a href="{{route('qrcode.show',$vrm->coupon->coupon)}}">
                                            {!! QrCode::size(50)->generate(route('qrcode.submit',[$vrm->id,$vrm->coupon->coupon])) !!}
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('client.edit',$vrm->id)}}" class="btn btn-sm btn-info mb-1">Edit</a>

                                    @if($vrm->status == true && !isset($vrm->coupon->coupon))
                                        <a href="{{route('qrcode.add',$vrm->id)}}" class="btn btn-sm btn-info"
                                           style="text-decoration: none;">{{__('Add QR Code')}} </a>
                                    @endif

                                    <button id="ter" data-id="{{$vrm->id}}"
                                            class="btn btn-sm btn-{{$vrm->status == true ? 'danger' : 'success'}}">
                                        {{$vrm->status == true ? "Terminate" : "Enable"}}
                                    </button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
{{--                    {{$clients->links()}}--}}
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- @push('script')
    <script src="{{ asset('els/js/pages/sweetalerts.init.js')}}"></script>
    <script
        type="text/javascript"
        charset="utf8"
        src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js">
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable({
                language: {
                    "paginate": {
                        "next": "{{ __('general.next') }}",
                        "previous": "{{ __('general.previous') }}",
                    },
                    "search": "{{ __('general.search') }}",
                }
            });
        });


        $(document).on('click', '#ter', function (e) {
            let id = $(this).attr('data-id');
            // console.log(id);
            let url = "{{route('client.status')}}";
            swal({
                title: "Are you sure?",
                text: "You want to change the status!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((result) => {
                    if (result) {
                        $.ajax({
                            type: "GET",
                            url: url,
                            data: {
                                'id': id,
                            },
                            success: function (data) {
                                console.log(data);
                                if (data.status === 'success') {

                                    swal("Poof! Your data has been changed!", {
                                        icon: "success",
                                    }).then((value) => {
                                        location.reload();
                                    });
                                }
                            },
                            error: function (data) {
                                console.log("fail");
                            }

                        });
                    } else {
                        swal("Your data is safe!");
                    }
                });
        });
    </script>
@endpush --}}


{{-- rasel --}}
@push('script')
<script src="{{ asset('els/js/pages/sweetalerts.init.js')}}"></script>
<script
    type="text/javascript"
    charset="utf8"
    src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js">
</script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('client.status') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'site_number', name: 'site_number' },
                    { data: 'address', name: 'address' },
                    { data: 'status', name: 'status' },
                    { data: 'qrcode', name: 'qrcode' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ],
                language: {
                    paginate: {
                        next: "{{ __('general.next') }}",
                        previous: "{{ __('general.previous') }}",
                    },
                    search: "{{ __('general.search') }}",
                }
            });
        });

        $(document).on('click', '#ter', function (e) {
            let id = $(this).attr('data-id');
            let url = "{{route('client.status')}}";
            swal({
                title: "Are you sure?",
                text: "You want to change the status!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((result) => {
                    if (result) {
                        $.ajax({
                            type: "GET",
                            url: url,
                            data: {
                                'id': id,
                            },
                            success: function (data) {
                                console.log(data);
                                if (data.status === 'success') {
                                    swal("Poof! Your data has been changed!", {
                                        icon: "success",
                                    }).then((value) => {
                                        $('#datatable').DataTable().ajax.reload();
                                    });
                                }
                            },
                            error: function (data) {
                                console.log("fail");
                            }
                        });
                    } else {
                        swal("Your data is safe!");
                    }
                });
        });
    </script>
@endpush


