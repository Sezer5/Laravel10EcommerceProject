@extends('layouts.adminbase')

@section('title', 'E-Commerce Project')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blank page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Images</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <form role="form" action="{{route('admin.gallery.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th colspan="2">File Upload</th>
                            </tr>
                            <tr>
                                <input type="text" name="product_id" value="{{$product_id}}" hidden>
                                <td><input type="file" id="exampleInputFile" class="custom-file-input form-control" name="image"></td>
                                <td><button type="submit" class="btn btn-primary">Submit</button></td>
                            </tr>
                            </tbody>
                        </table>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>

            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Images</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th>Images</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($images as $rs)
                                @if($rs->image)
                                    <tr>
                                        <td><img src="{{Storage::url($rs->image)}}" style="width:40px;"></td>
                                        <td><a href="{{route('admin.gallery.destroy',['id'=>$rs->id])}}">Delete</a></td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

            </div>


        </section><!-- /.content -->
    </div>




@endsection

