@extends('admin.layouts.dashboard')

@section('content')

<h1>Create New Post</h1>

@if ($errors->any()) <!--Me trae los tipós de errores atraves de las validaciones-->
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/posts" enctype="multipart/form-data"> <!--action llamara al controlador metodo store, enctype para mandar ficheros -->
    {{ csrf_field() }} <!-- para que otros usuario no accionen sobre el codigo-->

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title..." value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <label for="image">Select Image</label>
        <input type="file" name="image" class="form-control-file" id="image">
    </div>
    <div class="form-group">
        <label for="content">Insert Content</label>
        <textarea name="post_content" id="content">{{ old('post_content') }}</textarea>
    </div>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>

<script>
    CKEDITOR.replace( 'post_content' );
</script>

@endsection
