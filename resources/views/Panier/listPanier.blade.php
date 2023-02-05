@extends('index')

@section('titre')
    Panier
@endsection

@section('contenu')

{{--  side bar des categories --}}
@include('components.produitParCategories')
    <div class="col-12 col-md-8 ">
    <div class="row">
        <div class="col-12 ">
            <div class="m-1 ">
                <table class="table table-light table-bordered border-light table-striped p-2">
                    <thead>
                        <tr>
                            <th colspan="6">
                                <h1 class=" h3 font-weight-bold ">Produits</h1>
                            </th>
                        </tr>
                        <tr>
                            <th>nb Produit</th>
                            <th>Libellé</th>
                            <th>Prix unitaire</th>
                            <th>Quantité </th>
                            <th>Prix total</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                        $i = 1;
                        $prixTotals = 0;
                        @endphp
                        @foreach ($produits as $produit) 
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $produit["titreProduit"]; ?></td>
                                <td><?= $produit["prixProduit"]; ?></td>
                                <td><?= session('panier')[$i-1][$produit['referenceProduit']]; ?></td>
                                <td><?= $produit["prixProduit"] * session('panier')[$i-1][$produit['referenceProduit']] . ' DT'; ?></td>
                                <td>
                                    <a href="{{route('Panier.DeleteProduitPanier',$produit["referenceProduit"])}}" class="btn btn-danger btn-sm p-2"> Supprimer</a>
                                </td>
                            </tr>
                            @php
                                $prixTotals += $produit["prixProduit"] * session('panier')[$i-1][$produit['referenceProduit']];
                                $i++;
                            @endphp                         
                        @endforeach
                        <tr>
                            <td colspan="5 ">
                                <div class="h4">Total TTC</div>
                            </td>
                            <td>
                                <div class="h4"><?= $prixTotals . ' DT'; ?></div>
                            </td>
                        </tr>

                        <tr>
                            <td><button class="btn btn-primary p-2" type="submit"><a class=" text-decoration-none text-white text-wrap" href="{{route('Produit.index')}}">
                                        < Continuer mes achats</a></button></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                @if ((Session::has('connected') && (session('connected') === true)))    
                                    <form action="{{route('Commande.store')}}" method="post">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-primary p-2" type="submit">                                        
                                            Passer Commande
                                        </button>
                                        <input type="hidden" name="connected" value="true">
                                    </form>
                                @else
                                    <button class="btn btn-primary p-2" type="submit">
                                        <a class=" text-decoration-none text-white text-wrap" href="{{route('Utilisateur.logIn')}}">Se connecter pour passer commande > </a>
                                    </button>
                                @endif
                        </td>
                            <!-- <td><button class="btn btn-primary p-2" type="submit"><a class=" link-light text-wrap" href="NewCouleur">Ajouter</a></button></td> -->
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        </section>
    </div>
@endsection