@extends('index')

@section('titre')
    Ajouter produit
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
    <div class="col-12 col-md-9">
    <div class="row">
        <div class="col-12  ">
            <div class="container">
                <div class="row my-4">
                    <div class="col-md-9 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <h1 class=" h3 card-title m-2 text-center">
                                    Ajouter un produit
                                </h1>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('Produit.store')}}" enctype="multipart/form-data" class="mr-1">
                                    @csrf
                                    @method('POST')
                                    <div class=" form-group m-3">
                                        <label for="validationName" class="form-label">referenceProduit</label>
                                        <input type="text" class="form-control" name="referenceProduit" required autocomplete="off" placeholder="referenceProduit"  value="{{ old('referenceProduit') }}">
                                    </div>
                                    <div class=" form-group m-3">
                                        <label for="validationName" class="form-label">titreProduit</label>
                                        <input type="text" class="form-control" name="titreProduit" required autocomplete="off" placeholder="Titre"  value="{{ old('titreProduit') }}">
                                    </div>
                                    <div class="form-group m-3">
                                        <label for="validationName" class="form-label">descriptionProduit</label>
                                        <textarea row="5" cols="20" autocomplete="off" class="form-control" name="descriptionProduit" placeholder="Description"  value="{{ old('descriptionProduit') }}"></textarea>
                                    </div>
                                    <div class=" form-group m-3">
                                        <label for="validationName" class="form-label">poidsProduit</label>
                                        <input type="number" class="form-control" name="poidsProduit" required autocomplete="off" placeholder="poidsProduit"  value="{{ old('poidsProduit') }}">
                                    </div>
                                    <div class=" form-group m-3">
                                        <label for="validationName" class="form-label">prixProduit</label>
                                        <input type="number" class="form-control" name="prixProduit" required autocomplete="off" placeholder="prixProduit"  value="{{ old('prixProduit') }}">
                                    </div>
                                    <div class=" form-group m-3">
                                        <label for="validationName" class="form-label">Quantite Disp</label>
                                        <input type="number" class="form-control" name="quantiteProduitDisp"  value="{{ old('quantiteProduitDisp') }}">
                                    </div>
                                    <input type="hidden" name="quantiteProduitVend" value="0">
                                    <div class=" form-group m-3">
                                    </div>
                                    <div class=" m-3 ">
                                        <label class="form-label" for="categorie">Categorie</label>
                                        <select class="form-select" name=" idCat" id="categorie">
                                             @foreach ($categories as $categorie)  
                                                <option value="{{$categorie["idC"]}}">
                                                    {{$categorie["nomCategorie"]}} 
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" m-3">
                                        <label class="form-label" for="couleur">Couleur</label>
                                        <select class="form-select " name=" idCouleur" id="couleur">
                                            @foreach ($couleurs as $couleur) 
                                                <option value=" {{$couleur["idCouleur"]}}">
                                                    {{$couleur["libCouleur"]}} 
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" m-3 ">
                                        <label class="form-label" for="fournisseur">Fournisseur</label>
                                        <select class="form-select" name=" idF" id="fournisseur">
                                            @foreach ($fournisseurs as $fournisseur) 
                                                <option value="{{$fournisseur["idF"]}}">
                                                    {{$fournisseur["codeFournisseur"] . ' - ' . $fournisseur["prenomFournisseur"] . ' ' . $fournisseur["nomFournisseur"]}} 
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group m-3">
                                        <label for="validationName" required autocomplete="off" class="form-label">Image</label>
                                        <input type="file" class="form-control" name="imageProduit"  value="{{ old('imageProduit') }}">
                                    </div>
                                    <div class="form-group m-3">
                                        <button name="submit" class="btn btn-primary">
                                            Valider
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </section>
    </div>
    
    
@endsection