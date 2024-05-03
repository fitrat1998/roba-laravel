@extends('admin.layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Foydalanuvchilar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Obyektlar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Obyektlar</h3>
                        <a onclick="myFunction()" href="#" class="btn btn-success btn-sm float-right">
                            <span class="fas fa-plus-circle"></span>
                            Qo'shish
                        </a>
                        @can('object.add')
                        @endcan
                    </div>

                    <div id="card">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('objects.store')  }}" method="POST" id="object">
                                            @csrf
                                            <div class="row mb-3">

                                                <div class="col-lg-3">
                                                    <i class="fa fa-building"></i>
                                                    <label>Obyekt nomi</label>
                                                    <input type="text" name="object_name" class="form-control"
                                                           placeholder="obyekt nomi" required
                                                           style="background-color: #F8F8F8 !important;">
                                                </div>

                                                <div class="col-lg-5">
                                                    <i class="fa fa-parking"></i>
                                                    <label>Obyektning qo'shimcha qismlari</label><br>
                                                    <select name="ob_sec[]"
                                                            class=" select2"
                                                            multiple="multiple"
                                                            style="background-color: #F8F8F8 !important;width:700px !important; ">
                                                        @foreach($sections as $section)
                                                            @if($section['parent'] == "object")
                                                                <option
                                                                    value=" {{$section->id}} ">{{$section->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-lg-3 ml-5">
                                                    <i class="fa fa-arrow-up-1-9"></i>
                                                    <label>Qavatlar</label><br>
                                                    <input type="text" name="floors" class="form-control"
                                                           placeholder="qavatlar soni 1/4" required
                                                           style="background-color: #F8F8F8 !important;">

                                                </div>

                                                <div class="row mb-3">

                                                    <div class="col-lg-2 mt-3">
                                                        <i class="fa fa-house"></i>
                                                        <label>Kvartiralar</label>
                                                        <input type="text" name="rooms" class="form-control"
                                                               placeholder="qavatlar soni 1/10" required
                                                               style="background-color: #F8F8F8 !important;">
                                                    </div>

                                                    <div class="col-lg-5 mt-3">
                                                        <i class="fa fa-stairs"></i>
                                                        <label>Qavatlarning qo'shimcha qismlari</label><br>
                                                        <select name="floor_sec[]"
                                                                class="js-example-basic-multiple form-control select2"
                                                                multiple="multiple"
                                                                style="background-color: #F8F8F8 !important;width:650px !important; ">
                                                            @foreach($sections as $section)
                                                                @if($section['parent'] == "floor")
                                                                    <option
                                                                        value=" {{$section->id}} ">{{$section->name}}</option>
                                                                @endif
                                                            @endforeach

                                                        </select>
                                                    </div>


                                                    <div class="col-lg-5 mt-3">
                                                        <i class="fa fa-parking"></i>
                                                        <label>Kvartiralarning qo'shimcha qismlari</label><br>
                                                        <select name="flat_sec[]"
                                                                class="js-example-basic-multiple form-control select2"
                                                                multiple="multiple"
                                                                style="background-color: #F8F8F8 !important;width:650px !important; ">
                                                            @foreach($sections as $section)
                                                                @if($section['parent'] == "flat")
                                                                    <option
                                                                        value=" {{$section->id}} ">{{$section->name}}</option>
                                                                @endif
                                                            @endforeach

                                                        </select>
                                                    </div>


                                                </div>

                                            </div>

                                            <button type="submit" class="btn btn-success float-justify ">
                                                Kiritish
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- Data table -->
                        <table id="dataTable"
                               class="table table-bordered table-striped dataTable dtr-inline table-responsive-lg"
                               object="grid" aria-describedby="dataTable_info">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nomi</th>
                                <th>Qavatlar soni</th>
                                <th>Xonalar soni</th>
{{--                                <th>Qo'shimcha qismlar</th>--}}
                                <th class="w-25">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($objects as $object)
                                <tr>
                                    <td>{{ $object->id }}</td>
                                    <td>{{ $object->name }}</td>
                                    <td>{{ count($object->floors) - 1 }} - (0 qavat ham mavjud)</td>
                                    <td>{{ count($object->flats) -   1 }} - (0 qavat ham mavjud)</td>

                                    <td class="text-center">
                                        @can('object.delete')
                                            <form action="{{ route('objects.destroy',$object->id) }}" method="post">
                                                @csrf
                                                <div class="btn-group">
                                                    @can('object.edit')
                                                        <a href="{{ route('objects.edit',$object->id) }}" type="button"
                                                           class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    @endcan
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                            onclick="if (confirm('Вы уверены?')) { this.form.submit() } ">
                                                        <i class="fa fa-trash"></i></button>
                                                </div>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
