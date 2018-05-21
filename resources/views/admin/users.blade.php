@extends('admin.layouts.layout')
@section('content')


<div id="content" class="col-lg-10 col-sm-10">
    <!-- content starts -->
    <div>
        <ul class="breadcrumb">
            <li>
                <a href="{{ URL::route('admin-index') }}">Home</a>
            </li>
            <li>
                <a href="{{ URL::route('admin-userlist') }}">Users</a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i> User Lists</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <!--
                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                        -->
                    </div>
                </div>
                <div class="box-content">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User Name</th>
                                <th>E-Mail</th>
                                <th>Role</th>
                                <th>Date Registered</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 0;
                            ?>
                            @foreach($users as $key => $user)
                            <tr>   
                                <td>{{ ++$no }}</td>
                                <td class="center" style="text-align: center;">{{$user->name}}</td>
                                <td class="center" style="text-align: center;">{{$user->email}}</td>
                                <td class="center" style="text-align: center;">
                                    <?php if ($user->active == 2) { ?>
                                        <span class="label-success label label-default">Administrator</span>
                                    <?php } else if ($user->active == 1) { ?>
                                        <span class="label-default label label-danger">Customer</span>
                                    <?php } else { ?>
                                        <span class="label-default label">Inactive</span>
                                    <?php } ?>
                                </td>
                                <td class="center" style="text-align: center;">{{$user->created_at}}</td>
                                <td style="text-align: center;">
                                    <a class="btn btn-info" href="#">
                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                        Edit
                                    </a>

                                    <a class="btn btn-danger dialog-show{{ $user->id }}" href="">
                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                        Delete
                                    </a>
                                </td>               
                            </tr>
                        <script>
                            $('.dialog-show'+{{ $user->id }}).click(function (e) {
                                e.preventDefault();
                                $('#deleteModal'+{{ $user->id }}).modal('show');
                            });
                        </script>
                        <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h3>Warning !</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure to delete the selected item?{{ $user->id }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>
                                        <a href="{{ URL::route('admin-user-delete',$user->id) }}" class="btn btn-primary">Yes</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/span-->
    </div><!--/row-->


    <!-- content ends -->
</div><!--/#content.col-md-0-->
@endsection