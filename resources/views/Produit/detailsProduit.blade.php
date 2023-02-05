@extends('index')

@section('titre')
    Details Produit
@endsection

@section('contenu')
 
 {{--  side bar des categories --}}
@include('components.produitParCategories')
    <div class="col-12 col-md-9 ">
        <div class="list-group list-group-flush m-3">
            <article class="list-group-item list-group-item-action">
                <div class="row">
                    <div class="col12 col-md-4">
                        <img src='{{asset('/storage/'.$produit->imageProduit)}}'alt="{{$produit->titreProduit}}" class="img-fluid img-thumbnail w-100 h-100">
                    </div>
                    <div class="col12 col-md-8">
                            <h1 class="h3 my-2">{{ $produit->titreProduit }}</h1>
                            <h2 class="h5 my-2"> {{$produit->referenceProduit}}</h2>
                            <p>
                                {{$produit->descriptionProduit}} 
                            </p>
                        <div class="my-2">
                            @foreach ($couleurs as $couleur) 
                                    @if ( $couleur['idCouleur'] == $produit->idCouleur  ) 
                                       Couleur :  {{ $couleur['libCouleur'] }}
                                    @endif
                            @endforeach
                        </div>
                        <form action="{{route('Panier.store')}}" method="POST">
                            @csrf
                                <table>
                                    <tr>
                                        <div class="form-group">
                                            <td><label for="quantiteProduit" class="form-label my-3 mr-4">Quantité</label></td>
                                            <td>
                                                <div class="text-secondary mx-4">
                                                    <input class="form-control @error('quantiteProduit') is-invalid @enderror" type="number" min="0" max="{{$produit->quantiteProduitDisp}}" id="quantiteProduit" name="quantiteProduit" required />
                                                </div>
                                                <div>
                                                    @error('quantiteProduit')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                    
                                            </td>
                                        </div> 
                                        <td><button class="btn btn-primary p-2 mx-4" type="submit">Ajouter au panier</button></td>
                                        <input type="hidden" name="referenceProduit" value="{{$produit->referenceProduit}}" >                                                                                                         
                                    </tr>
                                </table>                
                        </form>
                    </div>
                    <!---End second column of Article-->
                </div>
            </article>
            <!--end article.list-group-item-->
        </div>
        </section>
    </div>
@endsection('contenu')