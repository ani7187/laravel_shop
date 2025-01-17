@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit user</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">user</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row card card-primary">
                <div class="card-body">
                    <form action="{{ route('user.update', $user->id) }}" method="POST">
                        @csrf
                        @method('patch')

                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-border" placeholder="Name"
                                   value="{{ $user->name ?? old('name') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="email" class="form-control form-control-border"
                                   placeholder="Email" value="{{ $user->email ?? old('email') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="surname" class="form-control form-control-border"
                                   placeholder="Surname" value="{{ $user->surname ?? old('surname') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="patronymic_name" class="form-control form-control-border"
                                   placeholder="Patronymic Name" value="{{ $user->patronymic_name ?? old('patronymic_name') }}">
                        </div>
                        <div class="form-group">
                            <input type="number" name="age" class="form-control form-control-border" placeholder="Age"
                                   value="{{ $user->age ?? old('age') }}">
                        </div>
                        <div class="form-group">
                            <input type="text" name="address" class="form-control form-control-border"
                                   placeholder="Address" value="{{ $user->address ?? old('address') }}">
                        </div>
                        <div class="form-group">
                            <select class="custom-select form-control-border" id="gender" name="gender">
                                <option disabled selected>Gender</option>
                                <option {{ $user->gender || old('gender') == 1 }} value="1">Male</option>
                                <option {{ $user->gender || old('gender') == 2 }} value="2">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
