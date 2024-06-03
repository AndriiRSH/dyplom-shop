@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Додати Продукт</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Головна</li>
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
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Назва">
                    </div>

                    <div class="form-group">
                        <input type="text" name="description" class="form-control" placeholder="Опис">
                    </div>

                    <div class="form-group">
                        <textarea name="content" class="form-control" cols="30" rows="10" placeholder="Контент"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="text" name="price" class="form-control" placeholder="Ціна">
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Виберіть файл</label>
                            </div>
                        </div>
                    </div>
{{--                    <div class="">--}}
{{--                        <div class="">--}}
{{--                            <div class="">--}}
{{--                                <input type="file" id="preview_image" name="preview_image">--}}
{{--                                <label for="preview_image" class="">Виберіть картинку</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <input type="file" id="preview_image" name="preview_image">--}}
{{--                        <label for="preview_image">Виберіть картинку</label>--}}
{{--                    </div>--}}
{{--                    <input type="file" id="fileInput">--}}
{{--                    <label for="fileInput" id="fileLabel">Виберіть картинку</label>--}}

{{--                                        <div class="form-group">--}}
{{--                        <div class="input-group">--}}
{{--                            <div class="custom-file">--}}
{{--                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">--}}
{{--                                <label class="custom-file-label" for="exampleInputFile">Виберіть файл</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <div class="input-group">--}}
{{--                            <div class="custom-file">--}}
{{--                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile">--}}
{{--                                <label class="custom-file-label" for="exampleInputFile">Виберіть файл</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="input-group">--}}
{{--                            <div class="custom-file">--}}
{{--                                <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">--}}
{{--                                <label class="custom-file-label" for="exampleInputFile">Виберіть файл</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <div class="input-group">--}}
{{--                            <div class="custom-file">--}}
{{--                                <input name="product_images[]" type="file" class="custom-file-input" id="exampleInputFile">--}}
{{--                                <label class="custom-file-label" for="exampleInputFile">Виберіть файл</label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group">
                        <select name="category_id" class="form-control select2" style="width: 100%;">
                            <option selected="selected" disabled>Виберіть категорію</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Додати">
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection
