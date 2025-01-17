@extends('layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Tag</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Tag</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row card card-primary">
                <div class="card-body">
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH') <!-- Use PATCH or PUT for update operations -->

                        <!-- Title -->
                        <div class="form-group">
                            <input type="text" name="title" id="title" value="{{ old('title', $product->title) }}" required maxlength="255" class="form-control form-control-border" placeholder="Title (Required, Max 255 characters)">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <textarea name="description" id="description" required maxlength="1000" class="form-control form-control-border" placeholder="Description (Required, Max 1000 characters)">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Content -->
                        <div class="form-group">
                            <textarea name="content" id="content" class="form-control form-control-border" placeholder="Content (Optional)">{{ old('content', $product->content) }}</textarea>
                            @error('content')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" required min="0" class="form-control form-control-border" placeholder="Price (Required, Integer, Min 0)">
                            @error('price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Count -->
                        <div class="form-group">
                            <input type="number" name="count" id="count" value="{{ old('count', $product->count) }}" required min="0" class="form-control form-control-border" placeholder="Count (Required, Integer, Min 0)">
                            @error('count')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tags -->
                        <div class="form-group">
                            <select class="select2" name="tags[]" multiple="multiple" data-placeholder="Select a tag" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', $product->tags->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $tag->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Colors -->
                        <div class="form-group">
                            <select class="select2" name="colors[]" multiple="multiple" data-placeholder="Select colors" style="width: 100%;">
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}" {{ in_array($color->id, old('colors', $product->colors->pluck('id')->toArray()) ?? []) ? 'selected' : '' }}>
                                        {{ $color->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <select name="category_id" class="form-control select2" style="width: 100%;">
                                <option selected="selected">Select category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Image Upload -->
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="preview_img" class="custom-file-input" id="preview_img_id">
                                    <label class="custom-file-label" for="preview_img_id">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <!-- Published Checkbox -->
                        <div class="form-group custom-control custom-checkbox">
                            <input class="form-control custom-control-input" type="checkbox" name="is_published" id="customCheckbox2" {{ old('is_published', $product->is_published) ? 'checked' : '' }}>
                            <label for="customCheckbox2" class="custom-control-label">Published</label>
                            @error('is_published')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Product</button>
                    </form>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
