@extends('../layouts.layoutUser')

@section('title')
    Noticias GAD MULALO
@endsection

@section('contenido')
    <section class="section section-shaped section-lg">
        <div class="shape shape-style-1 bg-gradient-default">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </section>
    <section class="">
        <div class="container">
            <h1 class="display-3">Noticias
                <small class="text-muted">recientes</small>
            </h1>
            <div class="col-lg-12">
                @foreach($posts as $post)
                    <div class="card card-lift--hover shadow border-0 mt-3">
                        <div class="row row-grid">
                            <div class="col-lg-3 mt-3 mx-2 mb-2 py-2">
                                @if($post->file)
                                    <img width="250px" height="150px" src="{{$post->file}}" alt="Raised image">
                                @endif
                            </div>
                            <div class="col-lg-8 mt-3 mx-2 mb-2 py-2">

                                <h6 class="text-primary text-uppercase">{{$post->name}}</h6>
                                <p class="small">{{$post->excerpt}}</p>

                                <a href="{{ route('post', $post->slug) }}" class="pull-right">Leer más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <br>
                {{$posts->render()}}
            </div>
        </div>
    </section>
@endsection