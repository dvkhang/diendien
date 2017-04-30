@extends('admin.templates.default', ['title'=>'Danh sách tỉnh thành',
            'libs_elements'=>['node-waves', 'animate',  'dataTables'],
            'customs_css'=>[],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/pages/category/edit_status.js'),
                URL::asset('admin/js/pages/category/delete.js')
            ]
            ])
@section('content')

            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Danh sách tỉnh thành
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="{{url('admin/state/add')}}">Thêm Tỉnh Thành</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body" style="width: 100%; overflow-y: hidden;">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>Tên Tỉnh thành</th>
                                    <th>Khoảng cách đến cửa hàng (Km)</th>
                                    <th>Hành Động</th>
                                </tr>
                                </thead>

                                <tfoot>
                                <tr>
                                    <th>Tên Tỉnh thành</th>
                                    <th>Khoảng cách đến cửa hàng (Km)</th>
                                    <th>Hành Động</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                @foreach($states as $state)
                                        <tr>
                                            <td>
                                                <a href="{{url('admin/state/detail', ['id'=>$state->id] )}}">{{$state->name}}</a>
                                            </td>
                                            <td>{{$state->distance}}</td>
                                            <td>
                                                <a href="edit/{{$state->id}}">
                                                    <button type="button" class="btn btn-primary btn-lg">Sửa</button>
                                                </a>
                                                
                                                <a href="#" id="{{$state->id}}" class="delete-category" category-id="{{$state->id}}" data-token="{{ csrf_token() }}">
                                                    <button type="button" class="btn btn-danger btn-lg">Xóa</button>
                                                </a>
                                            </td>
                                        </tr>
                                @endforeach
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
@stop