@extends('index')

@section('titre')
    Produits
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
    <div class="col-12 col-md-9">
    <div class="row">
        <div class="col-12 ">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th colspan="13">
                            <h1 class=" h3 font-weight-bold m-3">Produits</h1>
                        </th>
                    </tr>
                    <tr>
                        <th>referenceProduit</th>
                        <th>Libellé</th>
                        <th>Description</th>
                        <th>Prix</th>
                        <th>Poids</th>
                        <th>Quantité vendu</th>
                        <th>Quantité disp</th>
                        <th>Couleur</th>
                        <th>Categorie</th>
                        <th>Fournisseur</th>
                        <th>Image</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produits as $produit) 
                        <tr>
                            <td>{{ $produit->referenceProduit}}</td>
                            <td>{{ $produit->titreProduit}}</td>
                            <td>{{ Str::limit( $produit->descriptionProduit, 80 ); }}</td>
                            <td>{{ $produit->prixProduit}}</td>
                            <td>{{ $produit->poidsProduit}}</td>
                            <td>{{ $produit->quantiteProduitVend}}</td>
                            <td>{{ $produit->quantiteProduitDisp}}</td>
                            <td>
                                @foreach ($couleurs as $couleur) 
                                    @if ( $couleur['idCouleur'] == $produit->idCouleur  ) 
                                        {{ $couleur['libCouleur'] }}
                                        
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($categories as $categorie) 
                                    @if ( $categorie['idC'] == $produit->idCat  ) 
                                        {{ $categorie['nomCategorie'] }}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($fournisseurs as $fournisseur)
                                    @if ( $fournisseur['idF'] == $produit->idF  ) 
                                        {{ $fournisseur['codeFournisseur'] . ' - ' . $fournisseur['nomFournisseur']}}
                                    @endif
                                @endforeach
                            <td>
                                <img width="50" height="50" src='{{asset('/storage/'.$produit->imageProduit)}}' alt="{{ $produit->titreProduit}}" class="img-fluid">
                            </td>
                            <td>
                                <a href="{{route('Produit.edit',$produit->referenceProduit)}}" class="btn btn-warning btn-sm p-2">Modifier</a>
                            </td>
                            <td>
                                <form method="POST" action="{{route('Produit.destroy',$produit->referenceProduit)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">Supprimer</button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="12"></td>
                        <td><button class="btn btn-primary p-2" type="submit"><a class=" link-light text-wrap" href="{{route('Produit.create')}}">Ajouter</a></button></td>
                    </tr>
                </tbody>
            </table>

        </div>

        </section>
    </div>
    
@endsection