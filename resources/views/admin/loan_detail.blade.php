@extends('layouts.dashboard_layout')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Loan Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Loan Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    {{--                                    <img class="profile-user-img img-fluid img-circle"--}}
                                    {{--                                         src="../../dist/img/user4-128x128.jpg"--}}
                                    {{--                                         alt="User profile picture">--}}
                                </div>

                                <h3 class="profile-username text-center">{{$user_details[0]->name}}</h3>

                                <p class="text-muted text-center">Software Engineer</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        {{--                                        {{$user[0]}}--}}
                                        <b>Requested Amount</b> <a
                                            class="float-right">{{$loan_Applications->loan_amount}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Loan Amount Term</b> <a
                                            class="float-right">{{$loan_Applications->loan_amount_term/365}}</a>
                                    </li>
                                    {{--                                    <li class="list-group-item">--}}
                                    {{--                                        <b>Friends</b> <a class="float-right">13,287</a>--}}
                                    {{--                                    </li>--}}
                                </ul>

                                <a href="#" class="btn btn-primary btn-block"><b>Approve</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">About Client</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-user mr-1"></i> Member ID</strong>

                                <p class="text-muted">
                                    "PLACEHOLDER"
                                </p>

                                <hr>
                                <strong><i class="fas fa-sticky-note mr-1"></i> Email</strong>

                                <p class="text-muted">
                                    {{$user_details[0]->email}}
                                </p>

                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                <p class="text-muted">{{$user_details[0]->city}}, {{$user_details[0]->street}}
                                    , {{$user_details[0]->address}}</p>

                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                <p class="text-muted">
                                    <span class="tag tag-danger">UI Design</span>
                                    <span class="tag tag-success">Coding</span>
                                    <span class="tag tag-info">Javascript</span>
                                    <span class="tag tag-warning">PHP</span>
                                    <span class="tag tag-primary">Node.js</span>
                                </p>

                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                                    fermentum enim neque.</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Financial
                                            History</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Guarantor
                                            Details</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Send
                                            Email</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <!-- Post -->
                                        <div class="card-body">
                                            <table id="members_loans"
                                                   class="table table-bordered table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Loan Amount</th>
                                                    <th>Loan Default Score</th>
                                                    <th>Loan Status</th>
                                                    <th>Request Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>


                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- Post -->
                                        <div class="card-body">
                                            <table id="guarantors"
                                                   class="table table-bordered table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Income</th>
                                                    <th>Approved</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <div class="col-md-9">
                                            <div class="card card-primary card-outline">
                                                <div class="card-header">
                                                    <h3 class="card-title">Compose New Message</h3>
                                                </div>
                                                <form method="POST" action="{{route('send.confirmation.email')}}"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    @if($success = Session::has('message'))
                                                        <div class="alert alert-success" role="alert">
                                                            {{session('message')}}
                                                        </div>
                                                    @endif
                                                    @if ($errors->any())
                                                        @foreach($errors->all() as $error)
                                                            <div class="alert alert-danger" role="alert">
                                                                {{$error}}
                                                            </div>
                                                    @endforeach

                                                @endif

                                                <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <input class="form-control" name="name" hidden
                                                               value="{{$user_details[0]->name}}">
                                                        <div class="form-group">
                                                            <input class="form-control" name="email" placeholder="To:"
                                                                   value="{{$user_details[0]->email}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <input class="form-control" name="subject"
                                                                   placeholder="Subject:"
                                                                   value="More Information On Loan Request">
                                                        </div>
                                                        <div class="form-group">
                    <textarea name="body" id="compose-textarea" class="form-control" style="height: 300px">
                      <h1><u>Heading Of Message</u></h1>
                      <h4>Subheading</h4>
                      <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                        was born and I will give you a complete account of the system, and expound the actual teachings
                        of the great explorer of the truth, the master-builder of human happiness. No one rejects,
                        dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know
                        how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again
                        is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,
                        but because occasionally circumstances occur in which toil and pain can procure him some great
                        pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,
                        except to obtain some advantage from it? But who has any right to find fault with a man who
                        chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that
                        produces no resultant pleasure? On the other hand, we denounce with righteous indignation and
                        dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so
                        blinded by desire, that they cannot foresee</p>
                      <ul>
                        <li>List item one</li>
                        <li>List item two</li>
                        <li>List item three</li>
                        <li>List item four</li>
                      </ul>
                      <p>Thank you,</p>
                      <p>John Doe</p>
                    </textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="btn btn-default btn-file">
                                                                <i class="fas fa-paperclip"></i> Attachment
                                                                <input type="file" name="attachment">
                                                            </div>
                                                            <p class="help-block">Max. 32MB</p>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="card-footer">
                                                        <div class="float-right">
                                                            <button type="button" class="btn btn-default"><i
                                                                    class="fas fa-pencil-alt"></i> Draft
                                                            </button>
                                                            <button type="submit" class="btn btn-primary"><i
                                                                    class="far fa-envelope"></i> Send
                                                            </button>
                                                        </div>
                                                        <button type="reset" class="btn btn-default"><i
                                                                class="fas fa-times"></i> Discard
                                                        </button>
                                                    </div>
                                                    <!-- /.card-footer -->
                                                </form>
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
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
            console.log("{{ route('loans.client.view', $user_details[0]->id) }}");
            const d_table = members_loans.DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

                ajax: {
                    url: "{{ route('loans.client.view', $user_details[0]->id) }}",
                    dataType: "json",
                    dataSrc: ''
                },
                columns: [
                    {data: 'number'},
                    {data: 'loan_amount'},
                    {data: 'default_bar'},
                    {data: 'loan_state'},
                    {data: 'request_date'}
                ]
            });
            const guarantor_table = $('table#guarantors');


            const g_table = guarantor_table.DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],

                ajax: {
                    url: "{{ route('loans.guarantor.view', $loan_Applications->id) }}",
                    dataType: "json",
                    dataSrc: ''
                },
                columns: [
                    {data: 'number'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'income'},
                    {data: 'approved'}
                ]
            });
            {{--console.log({{ $user_details[0]->name}});--}}
            // d_table.on('click', '#approve-loan', function (event) {
            //     const _this = event.target;
            //     const tr = $(_this).closest('tr');
            //     const rowIndex = d_table.row(tr).index();
            //     const rowData = d_table.rows(rowIndex).data()[0];
            //     data = rowData.bank_statement;
            // });
            {{--d_table.on('click', '#approve-user', function (event) {--}}
            {{--    event.preventDefault();--}}
            {{--    const _this = event.target;--}}
            {{--    const tr = $(_this).closest('tr');--}}
            {{--    const rowIndex = d_table.row(tr).index();--}}
            {{--    const rowData = d_table.rows(rowIndex).data()[0];--}}
            {{--    let data = {id: rowData.id, name: rowData.full_name};--}}
            {{--    $.ajax({--}}
            {{--        url: '{{route('backend.loans.approve')}}',--}}
            {{--        data: data,--}}
            {{--        type: 'POST',--}}
            {{--        success: function (res) {--}}
            {{--            toast.fire({--}}
            {{--                title: 'Success',--}}
            {{--                text: res.msg,--}}
            {{--                icon: 'success',--}}
            {{--                showCancelButton: false,--}}
            {{--                customClass: {--}}
            {{--                    confirmButton: 'btn btn-alt-success m-1'--}}
            {{--                },--}}
            {{--                confirmButtonText: 'Ok',--}}
            {{--                html: false,--}}
            {{--                preConfirm: e => {--}}
            {{--                    return new Promise(resolve => {--}}
            {{--                        setTimeout(() => {--}}
            {{--                            toastr["success"](res.msg);--}}
            {{--                            resolve();--}}
            {{--                        }, 50);--}}
            {{--                    });--}}
            {{--                }--}}
            {{--            }).then(result => {--}}
            {{--                d_table.ajax.reload();--}}
            {{--            });--}}
            {{--        }--}}
            {{--    });--}}
            {{--});--}}
            d_table.buttons().container().appendTo('#members_loans' +
                '_wrapper .col-md-6:eq(0)');
            g_table.buttons().container().appendTo('#guarantors' +
                '_wrapper .col-md-6:eq(0)');

            {{--d_table.on('click','tbody > tr > td', function (event) {--}}
            {{--    event.preventDefault();--}}
            {{--    const _this = event.target;--}}
            {{--    const tr = $(_this).closest('tr');--}}
            {{--    const rowIndex = d_table.row(tr).index();--}}
            {{--    const rowData = d_table.rows(rowIndex).data()[0];--}}
            {{--    let id = rowData.user_id;--}}
            {{--    window.location.href = "{{ url('view_loans/') }}"+ "/"+id--}}
            {{--});--}}


            {{--$('#bank_statement_modal').on('show.bs.modal', function (event) {--}}
            {{--    let image_path = "{{asset('uploads/')}}";--}}
            {{--    let image_url = image_path + "/" + data;--}}
            {{--    $('#embed-license-doc').prop('src', image_url);--}}
            {{--});--}}
            $('#progress_bar').attr("aria-valuenow",)
        });

    </script>
@endpush


