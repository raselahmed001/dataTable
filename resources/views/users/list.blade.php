{{-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel Custom DataTable with Filters</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
</head>
<body>
    <div class="container">
        <h2>Laravel Custom DataTable with Filters</h2>

        <!-- Filters -->
        <div class="row mb-4">
            <div class="col-md-3">
                <input type="text" id="name" class="form-control" placeholder="Name">
            </div>
            <div class="col-md-3">
                <input type="text" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="col-md-3">
                <input type="date" id="created_at" class="form-control" placeholder="Created At">
            </div>
            <div class="col-md-3">
                <button id="filter" class="btn btn-primary">Filter</button>
            </div>
        </div>

        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                pagingType: 'simple', 
                lengthChange: true,
                ajax: {
                    url: "{{ route('users.list') }}",
                    type: 'POST',
                    data: function (d) {
                        d._token = '{{ csrf_token() }}';
                        d.name = $('#name').val();
                        d.email = $('#email').val();
                        d.created_at = $('#created_at').val();
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                drawCallback: function(settings) {
                    var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                    if (settings._iDisplayLength >= settings.fnRecordsDisplay()) {
                        pagination.hide();
                    } else {
                        pagination.show();
                    }
                }
            });

            $('#filter').click(function() {
                table.draw();
            });
        });
    </script>
</body>
</html> --}}


{{-- final --}}
<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Custom DataTable with Filters</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
   
</head>
<body>
    <div class="container">
        <h2>Laravel Custom DataTable with Filters</h2>

        <!-- Filters -->
        <div class="row mb-4">
            <div class="col-md-3">
                <input type="text" id="name" class="form-control" placeholder="Name">
            </div>
            <div class="col-md-3">
                <input type="text" id="email" class="form-control" placeholder="Email">
            </div>
            <div class="col-md-3">
                <input type="date" id="created_at" class="form-control" placeholder="Created At">
            </div>
            <div class="col-md-3">
                <button id="filter" class="btn btn-primary">Filter</button>
            </div>
        </div>

        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                //paging: true,
                //lengthChange: false,
                //searching : true,
                // info:true,
                //autoWidth:false,
                
                // responsive: true,
                ajax: {
                    url: "{{ route('users.list') }}",
                    dataType: "json",
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   },
                    data: function (d) {
                        d._token = '{{ csrf_token() }}';
                        d.name = $('#name').val();
                        d.email = $('#email').val();
                        d.created_at = $('#created_at').val();
                        d.search.value = $('input[type="search"]').val();
                    },
                    error: function(xhr, error, code) {
                    console.log("Error code: " + code);
                    console.log("Error message: " + error);
                    console.log("XHR response: " + xhr.responseText);
            }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                dom: 'Bfrtip', // Include buttons, filtering input, processing indicator, table, information summary, and pagination
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i> Excel',
                        title: 'User Data',
                        className: 'btn btn-success',
                        exportOptions: {
                            columns: ':visible' // Export only visible columns
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        title: 'User Data',
                        className: 'btn btn-info', 
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Print',
                        title: 'User Data',
                        className: 'btn btn-warning', 
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf"></i> PDF',
                        title: 'Export to PDF',
                        className: 'btn btn-outline-primary',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fa fa-files-o"></i> Copy',
                        title: 'Copy',
                        className: 'btn btn-outline-primary',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }
                    },
                   
                    
                    {
                        extend: 'colvis',
                        text: '<i class="fas fa-eye"></i> Column visibility',
                        titleAttr: 'Toggle Column Visibility',
                        className: 'btn btn-primary'
                    }
                ],
                drawCallback: function(settings) {
                    var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                    if (settings._iDisplayLength >= settings.fnRecordsDisplay()) {
                        pagination.hide();
                    } else {
                        pagination.show();
                    }
        }
            });

            $('#filter').click(function() {
                table.draw();
            });
        });
    </script>
</body>
</html>
