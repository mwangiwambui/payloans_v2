@extends('layouts.dashboard_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Loan Approval</h1>
                        <p>Please approve the users and recommend the way forward for the applications. </p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Approve Loans</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Loan Applicants details</h3>
                            </div>

                        </div>
                        <div class="card-body">
                            <table id="members_loans" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Loan Amount</th>
                                    <th>Bank Statements</th>
                                    <th>Loan Default Score</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="bank_statement_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> VIEW BANK STATEMENT</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><i class="fal fa-times"></i></span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div id="manage-facilities" class="panel">
                                <div class="panel-hdr color-success-600">
                                    <h2>
                                        BANK STATEMENT
                                    </h2>
                                    <div class="panel-toolbar">
                                        <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip"
                                                data-offset="0,10" data-original-title="Collapse"></button>
                                    </div>
                                </div>
                                <div class="panel-container show">
                                    <div class="panel-content">
                                        <embed id="embed-license-doc" frameborder="0" width="100%" height="400px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->




@endsection

@push('backend-scripts')
    <script>
        let toast = Swal.mixin({
            buttonsStyling: false,
            customClass: {
                confirmButton: 'btn btn-alt-success m-5',
                input: 'form-control'
            }
        });
        $(() => {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            const members_loans = $('table#members_loans');
            let data;
            const d_table = members_loans.DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                ajax: {
                    url: "{{ route('backend.loans.view') }}",
                    dataType: "json",
                    dataSrc: ''
                },
                columns: [
                    {data: 'number'},
                    {data: 'full_name'},
                    {data: 'phone_number'},
                    {data: 'email'},
                    {data: 'loan_amount'},
                    {data: 'bank_statement'},
                    {data: 'default_score'},
                    {data: 'actions'},
                ]
            });
            d_table.on('click', '#approve-loan', function (event) {
                const _this = event.target;
                const tr = $(_this).closest('tr');
                const rowIndex = d_table.row(tr).index();
                const rowData = d_table.rows(rowIndex).data()[0];
                data = rowData.bank_statement
            });
            d_table.on('click', '#approve-user', function (event) {
                event.preventDefault();
                const _this = event.target;
                const tr = $(_this).closest('tr');
                const rowIndex = d_table.row(tr).index();
                const rowData = d_table.rows(rowIndex).data()[0];
                let data = {id: rowData.id, name: rowData.full_name};
                $.ajax({
                    url: '{{route('backend.loans.approve')}}',
                    data: data,
                    type: 'POST',
                    success: function (res) {
                        toast.fire({
                            title: 'Success',
                            text: res.msg,
                            icon: 'success',
                            showCancelButton: false,
                            customClass: {
                                confirmButton: 'btn btn-alt-success m-1'
                            },
                            confirmButtonText: 'Ok',
                            html: false,
                            preConfirm: e => {
                                return new Promise(resolve => {
                                    setTimeout(() => {
                                        toastr["success"](res.msg);
                                        resolve();
                                    }, 50);
                                });
                            }
                        }).then(result => {
                            d_table.ajax.reload();
                        });
                    }
                });
            });
            d_table.buttons().container().appendTo('#members_loans' +
                '_wrapper .col-md-6:eq(0)');


            $('#bank_statement_modal').on('show.bs.modal', function (event) {
                let image_path = "{{asset('uploads/')}}";
                let image_url = image_path + "/" + data;
                $('#embed-license-doc').prop('src', image_url);
            });
        });
    </script>
@endpush

