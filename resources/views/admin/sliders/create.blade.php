<!-- resources/views/child.blade.php -->

@extends('layouts.adminbase')

@section('title', 'Edit Slider')

@section('content')

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create Slider
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
                        <form role="form" action="{{route('admin.sliders.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First Title</label>
                                    <input type="text" name="firsttitle" class="form-control" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Second Title</label>
                                    <input type="text" name="secondtitle" class="form-control" placeholder="Enter title">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descriptions</label>
                                    <input type="text" name="description" class="form-control" placeholder="Enter description">
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
