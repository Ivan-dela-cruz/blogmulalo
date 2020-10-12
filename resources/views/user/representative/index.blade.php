@extends('../layouts.layoutUser')

@section('title')
    Autoridades
@endsection

@section('contenido')


    <img width="100%" src="{{asset('user/img/autoridades1.jpg')}}" alt="">
    <section class="section section-lg pt-lg-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card-body p-0">
                        <h1 class="display-4"> Autoridades del Gobierno Autónomo Descentralizado Parroquial Mulaló</h1>
                        <hr>
                        <div class="table-responsive">
                            <table id="table" class="table m-0 table-bordered">
                                <tbody>
                                {{ csrf_field() }}
                                <div class="col-lg-12 input-group input-group-lg">

                                    @foreach($representatives as $representative)
                                        <div class="cat{{$representative->id}} card card-lift--hover col-lg-4 py-3 border">
                                            <div class="row row-grid">
                                                <div class="col-lg-12 text-center">
                                                    @if($representative->file)
                                                        <div class="col-lg-12 py-2">
                                                            <img width="270px" height="200px"
                                                                 src="{{$representative->file}}" alt="Raised image"
                                                                 class="img-circle">
                                                        </div>
                                                        <div class="col-lg-11 mx-3">
                                                            <p class="small">Período administrativo</p>
                                                            <br>
                                                            <small class="small">Mayo 15,2014 - Mayo 15, 2019</small>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-lg-11 mx-3">
                                                    <h6 class="text-dark mx-3">{{$representative->name}} {{$representative->last_name}}</h6>
                                                    <p class="text-dark mx-3">{{$representative->position}}<br></p>
                                                    <p class="text-dark mx-3">ci: {{$representative->ci}} <br></p>
                                                    <p class="text-dark mx-3">email: {{$representative->email}}<br>
                                                    </p>
                                                    <p class="text-dark mx-3">contacto: {{$representative->phone}}<br>
                                                    </p>
                                                    <p class="text-dark mx-3">dirección: {{$representative->address}}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <br>
                                    {{$representatives->render()}}
                                </div>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

@endsection