@extends('../layouts.layoutUser')

@section('title')
    Convocatorias GAD MULALO
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
            <h1 class="display-3">Convocatorias
                <small class="text-muted">recientes</small>
            </h1>
            <div class="col-lg-12">
                @foreach($releases as $release)
                    <div class="card card-lift--hover shadow border-0 mt-3">
                        <div class="row row-grid">

                            <div class="col-lg-8 mt-3 mx-2 mb-2 py-2">

                                <h6 class="text-primary text-uppercase">{{$release->meeting->topic}}</h6>
                                <p class="small">{!!$release->body!!}</p>

                                <a href="{{ route('planificacion', $release->slug) }}" class="pull-right">Leer más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <br>
                {{$releases->render()}}
            </div>
        </div>
    </section>
@endsection