@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Редагувати Продукт</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Головна</a></li>
                        <li class="breadcrumb-item active">Продукти</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Form for creating/editing a product -->
            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Назва" value="{{ $product->title }}">
                </div>

                <div class="form-group">
                    <input type="text" name="description" class="form-control" placeholder="Опис" value="{{ $product->description }}">
                </div>

                <div class="form-group">
                    <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Контент">{{ $product->content }}</textarea>
                </div>

                <div class="form-group">
                    <input type="text" name="price" class="form-control" placeholder="Ціна" value="{{ $product->price }}">
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Виберіть файл</label>
{{--                            <label class="custom-file-label" for="exampleInputFile">--}}
{{--                                {{ old('preview_image_path', 'Виберіть файл') }}--}}
{{--                            </label>--}}
                        </div>
                    </div>
                </div>

{{--                <div class="form-group">--}}
{{--                    <div class="input-group">--}}
{{--                        <div class="custom-file">--}}
{{--                            <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">--}}
{{--                            <label class="custom-file-label" for="exampleInputFile">Виберіть файл</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!-- Repeat the following block for additional image uploads -->
                <!--
                <div class="form-group">
                    <div class="input-group">
                        <div class="custom-file">
                            <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Виберіть файл</label>
                        </div>
                    </div>
                </div>
                -->

                <div class="form-group">
                    <select name="category_id" class="form-control select2" style="width: 100%;">
                        <option selected="selected" disabled>Виберіть категорію</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ (isset($product) && $product->category_id == $category->id) ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Оновити">
                </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
