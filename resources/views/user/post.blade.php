@extends('../layouts.layoutUser')

@section('title')
   Detalle Noticias MULALO
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
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="container">
            <h1 class="display-3">{{$post->name}}
            </h1>
            <div class="col-lg-12">
                <div class="card card-lift--hover shadow border-0 mt-3">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 py-3 mt-3">
                            <h6 class="mx-3">Categoria <small class="text-muted"><a href="{{route('category',$post->category->slug)}}"> {{$post->category->name}}</a></small></h6>

                            <hr>
                        </div>
                        <div class="col-lg-11 mx-3 text-center">
                            @if($post->file)
                                <img src="{{$post->file}}" alt="Raised image" class="img-fluid rounded shadow-lg">
                            @endif
                        </div>
                        <div class="col-lg-11 mt-3 mx-3">
                            <p class="small">{{$post->excerpt}}</p>
                            <hr>
                            {!! $post->body !!}
                            <hr>
                            Etiquetas
                            @foreach($post->tags as $tag)
                                <a href="{{route('tag',$tag->slug)}}">{{$tag->name}}</a>
                            @endforeach
                            <br><br><br>
                        </div>

                    </div>
                </div>
            </div>
            <div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="5"></div>
        </div>

    </section>
@endsection