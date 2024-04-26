@extends('admin.layouts.admin')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tahrirlash</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sections.index') }}">Obyektlar qismlari</a></li>
                        <li class="breadcrumb-item active">Tahrirlash</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tahrirlash</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form action="{{ route('sections.update',$section->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Nomi</label>
                                <input type="text" name="name"
                                       class="form-control {{ $errors->has('name') ? "is-invalid":"" }}"
                                       value="{{ old('name',$section->name) }}" required>
                                @if($errors->has('name'))
                                    <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Obyekt</label>
                                <select name="parent" id="parent" class="form-control select2">
                                    <option
                                        value="object" {{ old('parent',$section->parent) == 'object' ? 'selected' : '' }}>
                                        Obyekt
                                    </option>
                                    <option
                                        value="flat" {{ old('parent',$section->parent) == 'flat' ? 'selected' : '' }}>
                                       Xona
                                    </option>
                                    <option
                                        value="floor" {{ old('parent',$section->parent) == 'floor' ? 'selected' : '' }}>
                                        Qavat
                                    </option>
                                </select>

                                @if($errors->has('login'))
                                    <span class="error invalid-feedback">{{ $errors->first('login') }}</span>
                                @endif
                            </div>

                            <div id="message"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success float-right">Saqlash</button>
                                <a href="{{ route('sections.index') }}" class="btn btn-danger float-left">Bekor
                                    qilish</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
