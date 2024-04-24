@extends('admin.layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Topshiriq</h3>
            <a href="send-task.html" class="btn btn-success float-right">Topshiriq yuborish</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nomi</th>
                    <th>Muddati</th>
                    <th>Fakultet</th>
                    <th>Status</th>
                    <th>Jarayon</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>Topshiriq-1</td>
                    <td>28.03.2024</td>
                    <td>Biologiya</td>
                    <td>jarayonda</td>
                    <td>
                        <div class="stepper-wrapper">
                            <div class="stepper-item completed">
                                <div class="step-counter">1</div>
                                <div class="step-name">O'quv bo'limi</div>
                            </div>
                            <div class="stepper-item completed">
                                <div class="step-counter">2</div>
                                <div class="step-name">Yurist</div>
                            </div>
                            <div class="stepper-item active">
                                <div class="step-counter">3</div>
                                <div class="step-name">Prorektor</div>
                            </div>
                            <div class="stepper-item">
                                <div class="step-counter">4</div>
                                <div class="step-name">Devonxona</div>
                            </div>
                        </div>
                    </td>
                </tr>


                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
