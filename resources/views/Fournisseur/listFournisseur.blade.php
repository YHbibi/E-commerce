@extends('index')

@section('titre')
    Fournisseurs
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
    <div class="col-12 col-md-9 p-2">
    <div class="row">
        <div class="col-12 col-md-12  mr-2 ">
            <table class="table table-striped ">
                <thead>
                    <tr>
                        <th>Nom du fournisseur</th>
                        <th>Preom du fournisseur</th>
                        <th>Code fournisseur</th>
                        <th>Tel</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($Fournisseurs as $Fournisseur) 
                        <tr>
                            <td>{{ $Fournisseur->nomFournisseur}}</td>
                            <td>{{ $Fournisseur->prenomFournisseur}}</td>
                            <td>{{ $Fournisseur->codeFournisseur}}</td>
                            <td>{{ $Fournisseur->telFournisseur}}</td>
                            <td><a href="{{route('Fournisseur.edit', $Fournisseur->idF)}}">Editer</a></td>
                            <td>
                                <form method="post" action="{{route('Fournisseur.destroy', $Fournisseur->idF)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Supprimer</button>
                                </form>
                            </td> 
                        </tr>
                    @endforeach
                     
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><button class="btn btn-primary" type="submit"><a class=" link-light text-wrap" href="{{route('Fournisseur.create')}}">Ajouter</a></button></td>
                        <!-- <td><button class="btn btn-primary" type="submit"><a class=" link-light text-wrap" href="index.php?Action=Newfournisseur">Ajouter</a></button></td> -->
                    </tr>
                </tbody>
            </table>

        </div>
        </section>
    </div>
@endsection