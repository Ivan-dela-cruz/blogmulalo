@extends('../layouts.layoutUser')

@section('title')
    Planificaciones GAD MULALO
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
            <h1 class="display-3">Planificaciones
                <small class="text-muted">recientes</small>
            </h1>
            <div class="col-lg-12">
                @foreach($planifications as $planification)
                    <div class="card card-lift--hover shadow border-0 mt-3">
                        <div class="row row-grid">
                            <div class="col-lg-3 mt-3 mx-2 mb-2 py-2">
                                @if($planification->file)
                                    <img width="300px" height="300px" src="{{$planification->file}}" alt="Raised image" class="img-fluid rounded shadow-lg">
                                    <mark class="small">Autor nombre</mark>
                                    <small class="small">11/11/2018</small>
                                @endif
                            </div>
                            <div class="col-lg-8 mt-3 mx-2 mb-2 py-2">

                                <h6 class="text-primary text-uppercase">{{$planification->name}}</h6>
                                <p class="small">{{$planification->description}}</p>

                                <a href="{{ route('planificacion', $planification->slug) }}" class="pull-right">Leer más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                    <br>
                {{$planifications->render()}}
            </div>
        </div>
    </section>
@endsection