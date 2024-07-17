<!DOCTYPE html>
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

        <!-- Edit User Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editUserForm">
                            <input type="hidden" id="userId" name="id">
                            <div class="form-group">
                                <label for="editName">Name</label>
                                <input type="text" class="form-control" id="editName" name="name">
                            </div>
                            <div class="form-group">
                                <label for="editEmail">Email</label>
                                <input type="email" class="form-control" id="editEmail" name="email">
                            </div>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>
                </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

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
                ]
            });

            $('#filter').click(function() {
                table.draw();
            });

            // Edit button click event
            $('.data-table').on('click', '.edit', function () {
                var id = $(this).data('id');
                $.get("{{ route('users.edit', '') }}" + "/" + id, function (data) {
                    $('#userId').val(data.id);
                    $('#editName').val(data.name);
                    $('#editEmail').val(data.email);
                    $('#editUserModal').modal('show');
                })
            });

            // Form submit event
            $('#editUserForm').submit(function (e) {
                e.preventDefault();
                var id = $('#userId').val();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('users.update', '') }}" + "/" + id,
                    method: 'POST',
                    data: formData,
                    success: function (response) {
                        $('#editUserModal').modal('hide');
                        table.draw();
                    }
                });
            });
        });
    </script>
</body>
</html>
