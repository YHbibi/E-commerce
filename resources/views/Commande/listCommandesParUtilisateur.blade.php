@extends('index')

@section('titre')
    Liste commandes
@endsection

@section('contenu') 

    {{--  side bar des categories --}}
    @include('components.produitParCategories')      
    <div class="col-12 col-md-9">
    <div class="row">
        <div class="col-12 px-2">
            <div class="row my-2">
                <div class="col-md-12  ">
                    <div class=" ">
                        <table class="table table-hover table-bordered border-light table-striped ">
                            <thead>
                                <tr>
                                    <th colspan="9">
                                        <h3 class="font-weight-bold">Votres Commandes</h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Ref cmd</th>
                                    <th>Produit</th>
                                    <th>referenceProduit</th>
                                    <th>Quantité</th>
                                    <th>Prix</th>
                                    <th>Total</th>
                                    <th>Effectuée le</th>
                                    <th>Livrée le</th>
                                    <th>Etat</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($commandes as $commande) 
                                    <tr>
                                        <td>{{ $commande->referenceCommande }}</td>
                                        <td>{{ $commande->titreProduit }}</td>
                                        <td>{{ $commande->referenceProduit }}</td>
                                        <td>{{ $commande->quantite }}</td>
                                        <td>{{ $commande->prixProduit  . ' DT'}}</td>
                                        <td>{{ $commande->prixProduit  * $commande->quantite  . ' DT'}}</td>
                                        <td>{{ $commande->dateCommandePass }}</td>
                                        <td>{{ $commande->dateCommandeLiv }}</td>
                                        <td>{{ $commande->etat }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!--End first element-->
    </div>

    </section>
    </div>
@endsection
