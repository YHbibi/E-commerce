@extends('index')

@section('titre')
    Accueil
@endsection

@section('contenu')

{{--  side bar des categories --}}
@include('components.produitParCategories')
    <div class="col-12 col-md-9">
        <div class="row">
            @foreach ($produits as $produit) 
                <div class="col-12 col-md-4 m-5">
                    <div class="card">
                            <img src='{{asset('/storage/'.$produit->imageProduit)}}' alt="{{$produit->titreProduit}}" class="img-fluid img-thumbnail w-100 h-50">
                        <div class="card-body d-flex flex-column">
                            <h1 class="card-title h3">{{$produit->titreProduit}}</h1>
                            <p class="card-text">
                                {{ Str::limit( $produit->descriptionProduit, 80 ); }} 
                            </p>
                            <a href="{{route('Produit.show', $produit->referenceProduit)}}" class="btn btn-primary mt-auto">En savoir plus</a>
                        </div>
                        <!--end .card-body-->
                    </div>
                    <!--End .card-->
                </div>
            @endforeach
        </div>
        <!--End first element-->
    </div>

    </section>

    </div>
    <!--Begin Bottom pagination-->
    <nav>
        <ul class="pagination justify-content-center mt-4">
            <li class="page-item disabled"><a href="#" class="page-link">&laquo;</a></li>
            <li class="page-item active"><a href="#" class="page-link">1</a></li>
            <li class="page-item"><a href="#" class="page-link">2</a></li>
            <li class="page-item"><a href="#" class="page-link">3</a></li>
            <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
        </ul>
    </nav>
    <!--End Bottom pagination-->

@endsection('contenu')