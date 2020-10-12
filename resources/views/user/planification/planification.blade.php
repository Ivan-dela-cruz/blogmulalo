@extends('../layouts.layoutUser')

@section('title')
   Detalle Planificaciones MULALO
@endsection
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
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
            <h4 class="display-4">{{$planification->name}}
            </h4>
            <div class="col-lg-12">
                <div class="card card-lift--hover shadow border-0 mt-3">
                    <div class="row justify-content-center">
                        <div class="col-lg-12 py-3 mt-3">
                            <h6 class="mx-3">Categoria <small class="text-muted"><a href="{{route('category-planification',$planification->category->slug)}}"> {{$planification->category->name}}</a></small></h6>

                            <hr>
                        </div>
                        <div class="col-lg-11 mx-3 text-center">
                            @if($planification->pdf)
                                <iframe width="100%" height="400px" src="{{$planification->pdf}}" frameborder="0"></iframe>
                                <hr>
                            @endif
                        </div>
                        <h4 class="display-4 pull-right">{{$planification->name}}
                        </h4>
                        <div class="col-lg-11 mx-3 text-center">
                            @if($planification->file)
                                <img src="{{$planification->file}}" alt="Raised image" class="img-fluid rounded shadow-lg">
                            @endif
                        </div>
                        <div class="col-lg-11 mt-3 mx-3">
                            <p class="small">{{$planification->description}}</p>
                            <hr>
                            {!! $planification->body !!}
                            <hr>
                        </div>
                        <div class="col-lg-11 mx-3">
                            <div class="fb-comments col-lg-12 mx-5" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-numposts="6"></div>
                        </div>

                        <hr>

                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection