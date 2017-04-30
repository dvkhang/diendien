@extends('admin.templates.default', ['title'=>'Thêm Huyện trong Tỉnh',
            'libs_elements'=>['node-waves', 'animate', 'bootstrap-select','colorpicker','validate'],
            'customs_css'=>[
                URL::asset('admin/css/error.css'),
            ],
            'custom_scripts'=>[
                URL::asset('admin/js/admin.js'),
                URL::asset('admin/js/script.js'),
                URL::asset('admin/js/pages/forms/form-validation.js'),
            ]
            ])
@section('content')
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Thêm Huyện</h2>
                        </div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="body">
                            <form id="form_advanced_validation" method="POST" action="{{url('admin/district/add')}}" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <label for="email_address">Chọn Tỉnh</label>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <select name="state" class="form-control form-float show-tick">
                                                <option value="">--- Chọn Tỉnh ---</option>
                                            @foreach($states as $states)
                                                <option value="{{$states->id}}">{{$states->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" maxlength="255" minlength="3" name="name" required>
                                        <label class="form-label">Tên Huyện</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit">Thêm Huyện</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->



@stop