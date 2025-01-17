@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Product</li>
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
            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-inline-block">
                                <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit</a>
                            </div>
                            <div class="d-inline-block">
                                <form action="{{route('product.delete', $product->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" class="btn badge-danger" value="Delete">
                                </form>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap table-bordered">
                                <tbody>
                                {{--                                @dd($product)--}}
                                <tr>
                                    <td>ID</td>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <td>Title</td>
                                    <td>{{ $product->title }}</td>
                                </tr>
                                <tr>
                                    <td>Description</td>
                                    <td>{{ $product->description }}</td>
                                </tr>
                                <tr>
                                    <td>Content</td>
                                    <td>{{ $product->content }}</td>
                                </tr>
                                <tr>
                                    <td>Count</td>
                                    <td>{{ $product->count }}</td>
                                </tr>
                                <tr>
                                    <td>Is published</td>
                                    <td>{{ $product->is_published }}</td>
                                </tr>
                                <tr>
                                    <td>IMG</td>
                                    <td><img src="{{ $product->preview_img }}" alt="Product Image">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
@endsection
