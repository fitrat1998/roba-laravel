@extends('admin.layouts.admin')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Topshiriq</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Bosh sahifa</a></li>
                        <li class="breadcrumb-item active">Topshiriq</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Topshiriq</h3>
            <a href="{{route('sendtask.create')}}" class="btn btn-success float-right">Topshiriq yuborish</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Kategoriya</th>
                    <th>Muddati</th>
                    <th>Fakultet</th>
                    <th>Izoh</th>
                    <th>Status</th>
                    <th>Jarayon</th>
                    <th>Fayllar</th>
                    <th>Fayl</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <td>{{$task->category->name}}</td>
                        <td>{{$task->deadline}}</td>
                        <td>
                            @foreach($task->faculties()->get() as $g)
                                <span class="btn  btn-info text-white p-1">{{ $g->name }}</span>
                            @endforeach
                        </td>
                        <td>{!! $task->comment !!}</td>
                        <td class="text-info">{{$task->status}}</td>
                        <td>{{$task->process}}</td>
                        <td>
                            @foreach($task->files as $f)
                                <a href="{{ asset('storage/senduploads/'.$f->name) }}" class="btn btn-primary" type="button" download="{{ $f->name }}">{{ $f->name }}</a>
                            @endforeach
                        </td>
                        <td class="text-center">
                            <form action="{{ route('sendtask.destroy',$task->id) }}" method="post">
                                @csrf
                                <div class="btn-group">
                                    <a href="{{ route('sendtask.edit',$task->id) }}" type="button"
                                       class="btn btn-primary btn-sm "><i class="fa fa-edit"></i></a>
                                    @can('user.edit')
                                    @endcan
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="button" class="btn btn-danger btn-sm"
                                            onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><i
                                            class="fa fa-trash"></i></button>
                                </div>
                            </form>
                            @can('user.delete')
                            @endcan
                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
