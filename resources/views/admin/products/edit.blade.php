<!-- resources/views/child.blade.php -->

@extends('layouts.adminbase')

@section('title', 'Edit Product')

@section('content')

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create Category
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Quick Example</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="{{route('admin.products.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Category</label>
                                    <select class="form-control" name="category_id">
                                        <option value="{{$data->category->id}}">{{$data->category->title}}</option>
                                        @foreach($datalist as $rs)
                                            <option value="{{$rs->id}}">{{$rs->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{$data->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Keywords</label>
                                    <input type="text" name="keywords" class="form-control" placeholder="Enter keywords" value="{{$data->keywords}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descriptions</label>
                                    <input type="text" name="description" class="form-control" placeholder="Enter description" value="{{$data->description}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Detail</label>
                                    <input type="text" name="detail" class="form-control" placeholder="Enter Detail" value="{{$data->detail}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="Enter Price" value="{{$data->price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quantity</label>
                                    <input type="text" name="quantity" class="form-control" placeholder="Enter Quantity" value="{{$data->quantity}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Min. Quantity</label>
                                    <input type="text" name="minquantity" class="form-control" placeholder="Enter Min. Quantity" value="{{$data->minquantity}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tax</label>
                                    <input type="text" name="tax" class="form-control" placeholder="Enter Tax" value="{{$data->tax}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <input type="text" name="status" class="form-control" placeholder="Enter Status" value="{{$data->status}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" id="exampleInputFile" class="custom-file-input form-control" name="image">
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div><!-- /.box -->
                </div>
            </div>

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endsection
