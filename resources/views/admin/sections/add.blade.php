@extends('admin.layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Obyektlar qismlari</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Obyektlar qismlarilar</a></li>
                        <li class="breadcrumb-item active">Qo'shish</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title ">Qo'shish</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('sections.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nomi</label>
                                <input type="text" name="name"
                                       class="form-control {{ $errors->has('name') ? "is-invalid":"" }}"
                                       value="{{ old('name') }}" required>
                                @if($errors->has('name'))
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Obyekt</label>
                                <select name="parent" id="parent" class="form-control select2">
                                    <option value="">tanlang</option>
                                    <option value="object">Obyekt</option>
                                    <option value="floor">Qavat</option>
                                    <option value="flat">Xona</option>
                                </select>
                                @if($errors->has('login'))
                                    <span class="error invalid-feedback">{{ $errors->first('login') }}</span>
                                @endif
                            </div>

                                <div id="message"></div>
                            </div>

                            <div class="form-group m-1">
                                <button type="submit" class="btn btn-success float-right">Saqlash</button>
                                <a href="{{ route('users.index') }}" class="btn btn-danger float-left">Bekor qilish</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
