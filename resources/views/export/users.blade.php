{{-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel DataTables Export Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Laravel DataTables Export Example</h2>
        <button id="exportExcel" class="btn btn-success mb-4"><i class="fas fa-file-excel"></i> Export to Excel</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

    <script type="text/javascript">
        $(function () {
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
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
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fa fa-files-o"></i> Copy',
                        titleAttr: 'Copy',
                        className: 'btn btn-outline-primary',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fa fa-file-csv"></i> CSV',
                        titleAttr: 'CSV',
                        className: 'btn btn-outline-primary',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel"></i> Excel',
                        titleAttr: 'Excel',
                        className: 'btn btn-outline-primary',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fa fa-file-pdf"></i> PDF',
                        titleAttr: 'PDF',
                        className: 'btn btn-outline-primary',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }
                    },
                    {
                        extend: 'print',
                        text: '<i class="fa fa-print"></i> Print',
                        titleAttr: 'Print',
                        className: 'btn btn-outline-primary',
                        exportOptions: {
                            columns: "thead th:not(.noExport)"
                        }
                    }
                ]
            });

            $('#exportExcel').click(function() {
                window.location.href = "{{ route('export.users') }}";
            });

            $('#filter').click(function() {
                table.draw();
            });
        });
    </script>
</body>
</html> --}}
