<!-- resources/views/child.blade.php -->

@extends('layouts.adminbase')

@section('title', 'Category List')

@section('content')

    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User List
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
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Roles</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>Roles</th>
                                <th>Add</th>
                            </tr>
                            @foreach($data as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->name}}</td>
                                    <td>{{$rs->email}}</td>
                                    <td>
                                        @foreach($rs->roles as $role)
                                            {{$role->name}} <a href="{{route('admin.users.destroy_role',['uid'=>$rs->id,'rid'=>$role->id])}}">X</a><br>
                                        @endforeach
                                    </td>

                                    <td><a href="{{route('admin.category.edit',['id'=>$rs->id])}}">Edit</a></td>
                                    <td><a href="{{route('admin.category.destroy',['id'=>$rs->id])}}">Delete</a></td>
                                    <form action="{{route('admin.users.add_role',['id'=>$rs->id])}}" method="post">
                                        @csrf
                                        <td>
                                            <select name="role_id" class="form-control">
                                                @foreach($data_roles as $ss)
                                                    <option value="{{$ss->id}}">{{$ss->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <button class="btn-success"><i class="fa fa-plus"></i></button>
                                        </td>
                                    </form>

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
