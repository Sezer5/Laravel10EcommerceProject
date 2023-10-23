




@extends('layouts.adminbase')

@section('title', 'E-Commerce Project')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sliders
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <a href="{{route('admin.sliders.create')}}"><button class="btn-success">Create Slider</button></a>
                </div>
            </div>
            <hr>
            <div style="text-align: center;"><h1>Active Slider</h1></div>

            <div class="row">

                <div class="col-md-12">
                    <div class="box">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">Id</th>
                                <th>First Title</th>
                                <th>Second Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Edit</th>
                            </tr>
                            @foreach($active_slider as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->firsttitle}}</td>
                                    <td>{{$rs->secondtitle}}</td>
                                    <td>{{$rs->description}}</td>
                                    @if($rs->image)
                                        <td><img src="{{Storage::url($rs->image)}}" style="width:40px;"></td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td><a href="{{route('admin.sliders.edit',['id'=>$rs->id])}}">Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.box-body -->
            <hr>
            <div style="text-align: center;"><h1>Other Sliders</h1></div>

            <div class="row">

                <div class="col-md-12">
                    <div class="box">
                        <table class="table table-striped table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 10px">Id</th>
                                <th>First Title</th>
                                <th>Second Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($other_slider as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->firsttitle}}</td>
                                    <td>{{$rs->secondtitle}}</td>
                                    <td>{{$rs->description}}</td>
                                    @if($rs->image)
                                        <td><img src="{{Storage::url($rs->image)}}" style="width:40px;"></td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td><a href="{{route('admin.sliders.edit',['id'=>$rs->id])}}">Edit</a></td>
                                    <td><a href="{{route('admin.sliders.destroy',['id'=>$rs->id])}}">Delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box -->
                </div>
            </div><!-- /.box-body -->

        </div><!-- /.box -->

    </section><!-- /.content -->
</div>




@endsection

