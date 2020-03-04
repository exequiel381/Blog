@extends('layouts.app')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('/storage/images/posts_images/'.$post['image_url']) }}')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
            <h1>{{$post['title']}}</h1>
            <span class="subheading">By {{ $post->user['name'] }}</span>
            </div>
        </div>
        </div>
    </div>
    </header>

    <!-- Main Content -->
    <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <p>{!!$post['content']!!}</p>
        </div>
    </div>
    </div>


<!-- lista de comentarios -->

    <div class="row py-lg-2">
        <div class="col-md-6">

        </div>

    </div>

    <!-- DataTables Example -->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Comentario</th>


                </tr>
                </thead>

                <!--Aqui va TBODY -->

                @foreach ($post->comments as $comment)
                        <tr>
                            <td>{{ $comment['body'] }}</td>


                        </tr>
                    @endforeach



            </table>
            </div>
        </div>

    </div>





<!-- comentario -->

<hr>






    <h1>Realizar comentario</h1>

@if ($errors->any()) <!--Me trae los tipós de errores atraves de las validaciones-->
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/comment/{{$post['id']}}" enctype="multipart/form-data"> <!--action llamara al controlador metodo store, enctype para mandar ficheros -->
    {{ csrf_field() }} <!-- para que otros usuario no accionen sobre el codigo-->


    <div class="form-group">
        <textarea name="post_comment" id="comment">{{ old('post_coment') }}</textarea>
    </div>



    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>





    <hr>



@endsection
