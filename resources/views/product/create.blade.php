@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add product</h1>
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
            <div class="row card card-primary">
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="title" id="title" value="{{ old('title') }}" required
                                   maxlength="255" class="form-control form-control-border"
                                   placeholder="Title (Required, Max 255 characters)">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="description" id="description" required maxlength="1000"
                                      class="form-control form-control-border"
                                      placeholder="Description (Required, Max 1000 characters)">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="content" id="content" class="form-control form-control-border"
                                      placeholder="Content (Optional)">{{ old('content') }}</textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number" name="price" id="price" value="{{ old('price') }}" required min="0"
                                   class="form-control form-control-border"
                                   placeholder="Price (Required, Integer, Min 0)">
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="number" name="count" id="count" value="{{ old('count') }}" required min="0"
                                   class="form-control form-control-border"
                                   placeholder="Count (Required, Integer, Min 0)">
                            @error('count')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Select a tag"
                                    style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}"> {{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="select2" name="colors[]" multiple="multiple"
                                    data-placeholder="Select a colors" style="width: 100%;">
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}"> {{ $color->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Select category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"> {{ $category->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="preview_img" class="custom-file-input" id="preview_img_id">
                                    <label class="custom-file-label" for="preview_img_id">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group custom-control custom-checkbox">
                            <input class="form-control custom-control-input" type="checkbox" name="is_published"
                                   id="customCheckbox2">
                            <label for="customCheckbox2" class="custom-control-label">Published</label>
                            @error('is_published')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </form>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
