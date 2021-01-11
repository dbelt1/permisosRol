@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="content-post">
            <div class="autor-post">
                <p class="name">Diego Beltrán</p>
            </div>
            <div class="date-post">
                <p class="date">11 / 01 /2021</p>
            </div>
            <div class="text-post">
                <p class="post">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum quidem vel, sapiente numquam nemo laborum
                    harum labore hic minus saepe similique, temporibus ipsam alias! Ratione veritatis velit at dignissimos
                    distinctio.
                    Vero quis deleniti velit est recusandae officia esse eveniet similique neque, enim blanditiis voluptas,
                    aut omnis iure voluptates. Porro repudiandae aut eius perferendis maxime esse assumenda eos unde neque
                    odio.
                </p>
            </div>
            <div class="galeria">
                <input type="radio" name="navegacion" id="_1" checked>
                <input type="radio" name="navegacion" id="_2">
                <img src="{{asset('img/imagen1.jpg')}}"/>
                <img src="{{asset('img/imagen2.jpg')}}"/>
            </div>
            <form action="" method="POST">
                <input type="text" placeholder="Escribe tu comentario">
                <button type="submit">Comentar</button>
            </form>
        </div>
    </div>
@endsection
