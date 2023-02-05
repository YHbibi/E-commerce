@extends('index')

@section('titre')
    Details Facture
@endsection

@section('contenu') 

    {{--  side bar des categories --}}
    @include('components.produitParCategories')  
     <div class="col-12 col-md-9 mt-2 padding">
    <div class="card">
        <div class="card-header p-4">
            <div class="float-right">
                <h3 class="mb-2">{{"Reference Facture : " . $Factures[0]->idFacture }}</h3>
                {{$Factures[0]->dateFacture }}
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h5 class="mb-3">From:</h5>
                    <h3 class="text-dark mb-1">E-commerce</h3>
                    <div>Tunis, Avenue 110034</div>
                    <div>Email: Y-commerce@yahoo.com</div>
                    <div>Phone: 71852963</div>
                </div>
                <div class="col-sm-6 ">
                    <h5 class="mb-3">To:</h5>
                    <h3 class="text-dark mb-1">{{$Factures[0]->nom  . " " . $Factures[0]->prenom }}</h3>
                    <div>{{$Factures[0]->adresse }}</div>
                    <div>Email: {{$Factures[0]->email }}</div>
                    <div>Phone: {{$Factures[0]->tel }}</div>
                </div>
            </div>
            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="center">#</th>
                            <th>Item</th>
                            <th class="right">Price</th>
                            <th class="center">Qty</th>
                            <th class="right">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @php
                                $i = 1;
                                $prixTot = 0;
                            @endphp
                            @foreach ($Factures as $Facture) 
                                <td class="center">{{$i}}</td>
                                <td class="left strong">{{$Facture->titreProduit }}</td>
                                <td class="right">{{$Facture->prixProduit  . " DT"}}</td>
                                <td class="center">{{$Facture->quantite }}</td>
                                <td class="right">{{$Facture->quantite  * $Facture->prixProduit  . " DT"}}</td>
                        </tr>
                                @php
                                    $prixTot +=$Facture->quantite  * $Facture->prixProduit ; 
                                    $i ++;
                                    if ($Factures[0]->prixTotal == $prixTot){

                                        break;
                                    }
                                    
                                @endphp
                                
                           @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row ">
                <div class="col-lg-4 col-sm-5 ">
                </div>
                <div class="col-lg-4 col-sm-5 ml-auto mt-5">
                    <table class="table table-clear ">
                        <tbody>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Subtotal</strong>
                                </td>
                                <td class="right">{{$Factures[0]->prixTotal  . " DT"}}</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Discount </strong>
                                </td>
                                <td class="right">7%</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong class="text-dark">Total</strong>
                                </td>
                                <td class="right">
                                    <strong class="text-dark">{{$Factures[0]->prixTotal  * (1 - 0.07) . " DT"}}</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white d-flex justify-content-end ">
            <button class="btn btn-primary p-2  ">Imprimer</button>
        </div>
    </div>
    </div>
 
@endsection
