@extends('index')

@section('titre')
    Commandes
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
    <div class="col-12 col-md-8 m-1 ">
        <div class="row">
            <table class="table table-hover table-bordered border-light table-striped m-2 ">
                <thead>
                    <tr>
                        <th colspan="12">
                            <h3 class="font-weight-bold">Commandes</h3>
                        </th>
                    </tr>
                    <tr>
                        <th>Ref cmd</th>
                        <th>Passée par</th>
                        <th>Tel</th>
                        <th>Effectuée le</th>
                        <th>Etat</th>
                        <th>Modifier Etat cmd</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $commande) 
                        <tr>
                            <td>{{ $commande->referenceCommande}}</td>
                            <td>{{ $commande->nom .' '. $commande->prenom}}</td>
                            <td>{{ $commande->tel}}</td>
                            <td>{{ $commande->dateCommandePass}}</td>
                            <td>{{ $commande->etat}}</td>
                            <td><button class="btn btn-primary p-2" type="submit"><a class=" text-decoration-none text-white text-wrap" href="{{ route('Commande.edit',$commande->referenceCommande)}}">Modifier</a></button></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--End first element-->
    </div>

    </section>
    </div>
@endsection
