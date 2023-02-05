@extends('index')

@section('titre')
    Liste Factures
@endsection

@section('contenu') 

    {{--  side bar des categories --}}
    @include('components.produitParCategories')

    <div class="col-12 col-md-9">
        <div class="row">
            <div class="row my-5">
                <div class="col-md-12 col-sm-8 mx-auto">
                    <div class=" ">
                        <table class="table table-hover table-bordered border-light table-striped ">
                            <thead>
                                <tr>
                                    <th colspan="4">
                                        <h3 class="font-weight-bold">Factures</h3>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Ref cmd</th>
                                    <th>Prix Total</th>
                                    <th>Effectuée le</th>
                                    <th>Deatails</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Factures as $Facture) 
                                    <tr>
                                        <td>{{ $Facture->referenceCommande}}</td>
                                        <td>{{ $Facture->prixTotal}}</td>
                                        <td>{{ $Facture->dateFacture}}</td>
                                        <td><button class="btn btn-primary p-2" type="submit"><a class=" text-decoration-none text-white text-wrap" href="{{route('Facture.show',$Facture->idFacture)}}">voir details</a></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <!--End first element-->
    </div>

    </section>
    </div>
@endsection
