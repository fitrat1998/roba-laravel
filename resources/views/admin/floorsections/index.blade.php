@extends('admin.layouts.admin')


@section('content')
@section('styles')
    <link rel="stylesheet" href="{{ asset('dist/assets/excel.css') }}">
@show

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Qavat qismlari</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Bosh sahifa</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('floorsections.index') }}">Qavat qismlari</a></li>
                    <li class="breadcrumb-item active">Qo'shish</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- Main content -->

<section class="content">
    <div class="row">
        <div class="col-lg-12 offset-lg-12 col-sm-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title ">Qo'shish</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="{{ route('workers.store') }}" method="post">
                        @csrf
                        <section class="spreadsheet">
                            <table class="spreadsheet__table"
                                   id="table-main">
                                <thead class="spreadsheet__table--headers"
                                       id="table-headers">
                                </thead>
                                <tbody class="spreadsheet__table--body"
                                       id="table-body2">
                                </tbody>
                            </table>
                        </section>
                        <div class="form-group">

                            <section class="spreadsheet-controls">
                                <button class="reset-btn "
                                        id="reset">Reset Data
                                </button>
                            </section>

                            <section class="spreadsheet-controls2">
                                <button class="submit-btn " type="submit" id="submit">Send-data</button>
                            </section>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>

@section('scripts')
    <script src="{{ asset('dist/assets/excel.js')}}"></script>
@show
@endsection


