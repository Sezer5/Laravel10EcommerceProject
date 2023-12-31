<!-- resources/views/child.blade.php -->

@extends('layouts.adminbase')

@section('title', 'Category List')

@section('content')

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Products List
            </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="row">

                <div class="col-md-12">
                    <div class="box">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">Id</th>
                                <th>Category</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Keywords</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Gallery</th>
                            </tr>
                            @foreach($data as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->category->title}}</td>
                                    <td>{{$rs->title}}</td>
                                    <td>{{$rs->description}}</td>
                                    <td>{{$rs->keywords}}</td>
                                    <td>{{$rs->status}}</td>


                                    @if($rs->image)
                                        <td><img src="{{Storage::url($rs->image)}}" style="width:40px;"></td>
                                    @endif


                                    <td><a href="{{route('admin.products.edit',['id'=>$rs->id])}}">Edit</a></td>
                                    <td><a href="{{route('admin.products.destroy',['id'=>$rs->id])}}">Delete</a></td>
                                    <td><a href="{{route('admin.gallery.show',['id'=>$rs->id])}}">Gallery</a></td>



                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.box-body -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

@endsection
