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
                <a href="{{ URL::route('admin-products') }}">Products</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ URL::route('admin-add-products') }}"><button class="btn btn-success">Add product</button></a>
        </div>

    </div>
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-picture"></i> Products Lists</h2>

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
                                <th style="text-align: center;" width="5%">No</th>
                                <th style="text-align: center;" width="15%">Product Name</th>
                                <th style="text-align: center;" width="20%">Image</th>
                                <th style="text-align: center;" width="20%">Description</th>
                                <th style="text-align: center;" width="10%">Price</th>
                                <th style="text-align: center;" width="10%">Stock</th>
                                <th style="text-align: center;" width="20%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 0;
                            ?>
                            
                            @foreach($products as $key => $product)
                            <tr>   
                                <td style="text-align: center;">{{ ++$no }}</td>
                                <td style="text-align: center;">{{$product->name}}</td>
                                <td style="text-align: center;">
                                    <img src="{{URL:: asset('products/'.$product->imageurl)}}" alt="Our Logo..." width="170px" height="170px">
                                    
                                </td>
                                <td style="text-align: center;">{{$product->description}}</td>
                                <td style="text-align: center;">${{$product->price}}</td>
                                <td style="text-align: center;">{{$product->stock}}</td>
                                <td style="text-align: center;">
                                    <a class="btn btn-info" href="{{ URL::route('admin-product-edit',$product->id) }}">
                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                        Edit
                                    </a>

                                    <a class="btn btn-danger dialog-show{{ $product->id }}" href="">
                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                        Delete
                                    </a>
                                </td>               
                            </tr>
                        <script>
                            $('.dialog-show' + {{ $product->id }}).click(function (e) {
                            e.preventDefault();
                            $('#deleteModal' + {{ $product-> id}}).modal('show');
                            });
                        </script>
                        <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h3>Warning !</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure to delete the selected product?{{ $product->id }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-default" data-dismiss="modal">Cancel</a>
                                        <a href="{{ URL::route('admin-product-delete',$product->id) }}" class="btn btn-primary">Yes</a>
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