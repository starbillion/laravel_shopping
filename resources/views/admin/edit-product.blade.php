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
        <div class="box col-md-12">
            <div class="box-inner">
                @if(Session::has('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Error!</strong> creating New product. Please again...
                </div>
                @endif
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-picture"></i> Edit Product</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form method="POST" action="{{ URL::route('admin-product-update') }}" class="form-horizontal" enctype="multipart/form-data" role="form">
                        {!! csrf_field() !!}
                        <fieldset>
                            <!-- Text input-->
                            @foreach($editproduct as $key => $product)
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label" for="name">Product Name</label>
                                <div class="col-md-9">
                                    <input id="pid" name="pid" type="hidden" class="form-control input-md" value="{{ $product->id }}">

                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label" for="name">Product Name</label>
                                <div class="col-md-9">
                                    <input id="price" name="name" type="text" placeholder="Product Name" class="form-control input-md" value="{{ $product->name }}">
                                    @if($errors->has('name'))
                                    <span class="help-block">
                                        @foreach($errors->get('name') as $message)
                                        {{ $message }} 
                                        @endforeach
                                        </ul></span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                <label class="col-md-3 control-label" for="textarea">Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="textarea" name="description" {{ Input::old('description') ? ' value='. Input::old('description')  : '' }}>
                                              {{ $product->description }}
                                </textarea>
                                @if($errors->has('description'))
                                <span class="help-block">
                                    @foreach($errors->get('description') as $message)
                                    {{ $message }} 
                                    @endforeach
                                    </ul></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="price">Price</label>
                            <div class="col-md-9">
                                <input id="price" name="price" type="number" placeholder="Price" class="form-control input-md" value="{{ $product->price }}">
                                @if($errors->has('price'))
                                <span class="help-block">
                                    @foreach($errors->get('price') as $message)
                                    {{ $message }} 
                                    @endforeach
                                    </ul></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('stock') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="stock">Price</label>
                            <div class="col-md-9">
                                <input id="stock" name="stock" type="number" placeholder="Stock" class="form-control input-md" value="{{ $product->stock }}">
                                @if($errors->has('stock'))
                                <span class="help-block">
                                    @foreach($errors->get('stock') as $message)
                                    {{ $message }} 
                                    @endforeach
                                    </ul></span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('imageurl') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="file">Product Image</label>
                            <div class="col-md-9">
                                <img id="productImage{{ $product->id }}" src="{{URL:: asset('products/'.$product->imageurl)}}" title="{{ $product->name }}" width="200px" height="200px">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('imageurl') ? ' has-error' : '' }}">
                            <label class="col-md-3 control-label" for="file">Change Product Image</label>
                            <div class="col-md-9">
                                <input id="upload{{ $product->id }}" name="imageurl" class="input-file" type="file" accept=".jpg, .jpeg, .png" value="">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="submit"></label>
                            <div class="col-md-9">
                                <button id="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        <script>
                            $(function () {
                                $('#upload'+{{ $product->id }}).change(function () {
                                    var input = this;
                                    var url = $(this).val();
                                    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                                    if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
                                    {
                                        var reader = new FileReader();

                                        reader.onload = function (e) {
                                            $('#productImage'+{{ $product->id }}).attr('src', e.target.result);
                                        }
                                        reader.readAsDataURL(input.files[0]);
                                    } 

                                });

                            });
                        </script>
                        @endforeach
                    </fieldset>

                </form>
            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->


<!-- content ends -->
</div><!--/#content.col-md-0-->

@endsection