@extends('index')

@section('titre')
    Couleurs
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
    <div class="col-12 col-md-8 m-1 ">
        <div class="row">
            <table class="table table-striped m-5">
                <thead>
                    <tr>
                        <th>Nom Couleur</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($couleurs  as $couleur)
                        <tr>
                            <td>{{$couleur->libCouleur}}</td>
                            <td><a href="{{route('Couleur.edit',$couleur->idCouleur)}}">Editer</a></td>
                        <td>
                            <form method="POST" action="{{route('Couleur.destroy',$couleur->idCouleur)}}">
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
                        <td><button class="btn btn-primary" type="submit"><a class=" link-light text-wrap" href="{{route('Couleur.create')}}">Ajouter</a></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    
    
@endsection