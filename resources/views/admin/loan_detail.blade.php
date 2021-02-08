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
                                        <b>Requested Amount</b> <a class="float-right">{{$loan_Applications->loan_amount}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Loan Amount Term</b> <a class="float-right">{{$loan_Applications->loan_amount_term/365}}</a>
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

                                <p class="text-muted">{{$user_details[0]->city}}, {{$user_details[0]->street}}, {{$user_details[0]->address}}</p>

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
                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Employment
                                            Details</a></li>
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
                                        <div class="post">
                                            <div class="user-block">
{{--                                                <img class="img-circle img-bordered-sm"--}}
{{--                                                     src="../../dist/img/user1-128x128.jpg" alt="user image">--}}
                                                <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                                <span class="description">Shared publicly - 7:30 PM today</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i
                                                        class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i
                                                        class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text"
                                                   placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post clearfix">
                                            <div class="user-block">
{{--                                                <img class="img-circle img-bordered-sm"--}}
{{--                                                     src="../../dist/img/user7-128x128.jpg" alt="User Image">--}}
                                                <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                                <span class="description">Sent you a message - 3 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                Lorem ipsum represents a long-held tradition for designers,
                                                typographers and the like. Some people hate it and argue for
                                                its demise, but others ignore the hate as they create awesome
                                                tools to help create filler text for everyone from bacon lovers
                                                to Charlie Sheen fans.
                                            </p>

                                            <form class="form-horizontal">
                                                <div class="input-group input-group-sm mb-0">
                                                    <input class="form-control form-control-sm" placeholder="Response">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-danger">Send</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.post -->

                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
{{--                                                <img class="img-circle img-bordered-sm"--}}
{{--                                                     src="../../dist/img/user6-128x128.jpg" alt="User Image">--}}
                                                <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                                                <span class="description">Posted 5 photos - 5 days ago</span>
                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">
                                                <div class="col-sm-6">
{{--                                                    <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">--}}
                                                </div>
                                                <!-- /.col -->
                                                <div class="col-sm-6">
                                                    <div class="row">
                                                        <div class="col-sm-6">
{{--                                                            <img class="img-fluid mb-3" src="../../dist/img/photo2.png"--}}
{{--                                                                 alt="Photo">--}}
{{--                                                            <img class="img-fluid" src="../../dist/img/photo3.jpg"--}}
{{--                                                                 alt="Photo">--}}
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-sm-6">
{{--                                                            <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg"--}}
{{--                                                                 alt="Photo">--}}
{{--                                                            <img class="img-fluid" src="../../dist/img/photo1.png"--}}
{{--                                                                 alt="Photo">--}}
                                                        </div>
                                                        <!-- /.col -->
                                                    </div>
                                                    <!-- /.row -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->

                                            <p>
                                                <a href="#" class="link-black text-sm mr-2"><i
                                                        class="fas fa-share mr-1"></i> Share</a>
                                                <a href="#" class="link-black text-sm"><i
                                                        class="far fa-thumbs-up mr-1"></i> Like</a>
                                                <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                                            </p>

                                            <input class="form-control form-control-sm" type="text"
                                                   placeholder="Type a comment">
                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-envelope bg-primary"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an
                                                        email</h3>

                                                    <div class="timeline-body">
                                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo
                                                        kaboodle
                                                        quora plaxo ideeli hulu weebly balihoo...
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-user bg-info"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                                    <h3 class="timeline-header border-0"><a href="#">Sarah Young</a>
                                                        accepted your friend request
                                                    </h3>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-comments bg-warning"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on
                                                        your post</h3>

                                                    <div class="timeline-body">
                                                        Take me to your leader!
                                                        Switzerland is small and neutral!
                                                        We are more like Germany, ambitious and misunderstood!
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-warning btn-flat btn-sm">View
                                                            comment</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline time label -->
                                            <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                                            </div>
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-camera bg-purple"></i>

                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new
                                                        photos</h3>

                                                    <div class="timeline-body">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                        <img src="https://placehold.it/150x100" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <div class="col-md-9">
                                            <div class="card card-primary card-outline">
                                                <div class="card-header">
                                                    <h3 class="card-title">Compose New Message</h3>
                                                </div>
                                                <form method="POST" action="{{route('send.confirmation.email')}}" enctype="multipart/form-data">
                                                <!-- /.card-header -->
                                                <div class="card-body">
                                                    <input class="form-control" name="name" hidden value="{{$user_details[0]->name}}">
                                                    <div class="form-group">
                                                        <input class="form-control" name="email" placeholder="To:" value="{{$user_details[0]->email}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" name="subject" placeholder="Subject:" value="More Information On Loan Request">
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
                                                        <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button>
                                                        <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                                                    </div>
                                                    <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
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

{{--@push('backend-scripts')--}}
{{--    <script>--}}
{{--        let toast = Swal.mixin({--}}
{{--            buttonsStyling: false,--}}
{{--            customClass: {--}}
{{--                confirmButton: 'btn btn-alt-success m-5',--}}
{{--                input: 'form-control'--}}
{{--            }--}}
{{--        });--}}
{{--        $(() => {--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}
{{--            const members_loans = $('table#members_loans');--}}
{{--            let data;--}}
{{--            const d_table = members_loans.DataTable({--}}
{{--                "responsive": true, "lengthChange": false, "autoWidth": false,--}}
{{--                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],--}}
{{--                ajax: {--}}
{{--                    url: "{{ route('backend.loans.view') }}",--}}
{{--                    dataType: "json",--}}
{{--                    dataSrc: ''--}}
{{--                },--}}
{{--                columns: [--}}
{{--                    {data: 'number'},--}}
{{--                    {data: 'full_name'},--}}
{{--                    {data: 'phone_number'},--}}
{{--                    {data: 'email'},--}}
{{--                    {data: 'loan_amount'},--}}
{{--                    {data: 'bank_statement'},--}}
{{--                    {data: 'default_score'},--}}
{{--                    {data: 'actions'},--}}
{{--                ]--}}
{{--            });--}}
{{--            d_table.on('click', '#approve-loan', function (event) {--}}
{{--                const _this = event.target;--}}
{{--                const tr = $(_this).closest('tr');--}}
{{--                const rowIndex = d_table.row(tr).index();--}}
{{--                const rowData = d_table.rows(rowIndex).data()[0];--}}
{{--                data = rowData.bank_statement--}}
{{--            });--}}
{{--            d_table.on('click','tbody > tr > td', function (event) {--}}
{{--                event.preventDefault();--}}
{{--                const _this = event.target;--}}
{{--                const tr = $(_this).closest('tr');--}}
{{--                const rowIndex = d_table.row(tr).index();--}}
{{--                const rowData = d_table.rows(rowIndex).data()[0];--}}
{{--                const id = rowData.id;--}}
{{--                window.open('{{route('loan-details', id)}}')--}}
{{--            });--}}
{{--            d_table.on('click', '#approve-user', function (event) {--}}
{{--                event.preventDefault();--}}
{{--                const _this = event.target;--}}
{{--                const tr = $(_this).closest('tr');--}}
{{--                const rowIndex = d_table.row(tr).index();--}}
{{--                const rowData = d_table.rows(rowIndex).data()[0];--}}
{{--                let data = {id: rowData.id, name: rowData.full_name};--}}
{{--                $.ajax({--}}
{{--                    url: '{{route('backend.loans.approve')}}',--}}
{{--                    data: data,--}}
{{--                    type: 'POST',--}}
{{--                    success: function (res) {--}}
{{--                        toast.fire({--}}
{{--                            title: 'Success',--}}
{{--                            text: res.msg,--}}
{{--                            icon: 'success',--}}
{{--                            showCancelButton: false,--}}
{{--                            customClass: {--}}
{{--                                confirmButton: 'btn btn-alt-success m-1'--}}
{{--                            },--}}
{{--                            confirmButtonText: 'Ok',--}}
{{--                            html: false,--}}
{{--                            preConfirm: e => {--}}
{{--                                return new Promise(resolve => {--}}
{{--                                    setTimeout(() => {--}}
{{--                                        toastr["success"](res.msg);--}}
{{--                                        resolve();--}}
{{--                                    }, 50);--}}
{{--                                });--}}
{{--                            }--}}
{{--                        }).then(result => {--}}
{{--                            d_table.ajax.reload();--}}
{{--                        });--}}
{{--                    }--}}
{{--                });--}}
{{--            });--}}
{{--            d_table.buttons().container().appendTo('#members_loans' +--}}
{{--                '_wrapper .col-md-6:eq(0)');--}}


{{--            $('#bank_statement_modal').on('show.bs.modal', function (event) {--}}
{{--                let image_path = "{{asset('uploads/')}}";--}}
{{--                let image_url = image_path + "/" + data;--}}
{{--                $('#embed-license-doc').prop('src', image_url);--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endpush--}}

