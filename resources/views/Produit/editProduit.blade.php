@extends('index')

@section('titre')
    Editer produit
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
                                    Modifier ce produit
                                </h1>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{route('Produit.update',$produit->referenceProduit)}}" enctype="multipart/form-data" class="mr-1">
                                    @csrf
                                    @method('PUT')
                                    <div class=" form-group m-3">
                                        <label for="validationName" class="form-label">Nom</label>
                                        <input type="text" class="form-control" name="titreProduit" value="{{ $produit->titreProduit}}">
                                    </div>
                                    <div class="form-group m-3">
                                        <label for="validationName" class="form-label">Description</label>
                                        <textarea row="5" cols="20" class="form-control" name="descriptionProduit">{{ $produit->descriptionProduit}}</textarea>
                                    </div>
                                    <div class=" form-group m-3">
                                        <label for="validationName" class="form-label">Poids</label>
                                        <input type="number" class="form-control" name="poidsProduit" value="{{ $produit->poidsProduit}}">
                                    </div>
                                    <div class=" form-group m-3">
                                        <label for="validationName" class="form-label">Prix</label>
                                        <input type="number" class="form-control" name="prixProduit" value="{{ $produit->prixProduit}}">
                                    </div>
                                    <div class=" form-group m-3">
                                        <label for="validationName" class="form-label">Quantite Disp</label>
                                        <input type="number" class="form-control" name="quantiteProduitDisp" value="{{ $produit->quantiteProduitDisp}}">
                                    </div>
                                    <div class=" m-3 ">
                                        <label class="form-label" for="categorie">Categorie</label>
                                        <select class="form-select" name=" idCat" id="categorie">
                                            @foreach ($categories as $categorie) 
                                                <option <?php if ($produit->idCat  == $categorie["idC"]) echo  "selected"; ?> value="{{ $categorie["idC"]}}">
                                                    {{ $categorie["nomCategorie"]}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" m-3">
                                        <label class="form-label" for="couleur">Couleur</label>
                                        <select class="form-select " name=" idCouleur" id="couleur">
                                            @foreach ($couleurs as $couleur)  
                                                <option <?php if ($produit->idCouleur == $couleur["idCouleur"]) echo  "selected"; ?> value="{{ $couleur["idCouleur"]}}">
                                                    {{ $couleur['libCouleur']}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class=" m-3 ">
                                        <label class="form-label" for="fournisseur">Fournisseur</label>
                                        <select class="form-select" name=" idF" id="fournisseur">
                                            @foreach ($fournisseurs as $fournisseur)  
                                                <option <?php if ($fournisseur["idF"] == $produit->idF) echo "selected"; ?> value=" {{ $fournisseur["idF"]}}">
                                                    {{ $fournisseur["codeFournisseur"] . ' - ' . $fournisseur["prenomFournisseur"] . ' ' . $fournisseur["nomFournisseur"] }}
                                                </option>
                                             @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group m-3">
                                        <label for="validationName" class="form-label">Image :</label>
                                        <img src='{{asset('/storage/'.$produit->imageProduit)}}' width="100" height="100" alt="" class="img-fluid rounded m-3 ">
                                        <input type="file" class="form-control" name="imageProduit" value="{{$produit->imageProduit}}">
                                    </div>
                                    <div class="form-group mt-5 mb-2 d-flex justify-content-center">
                                        <button name="submit" class="btn btn-primary">Editer</button>
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