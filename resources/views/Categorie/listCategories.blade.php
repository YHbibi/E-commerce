@extends('index')

@section('titre')
    Categories
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
    <div class="col-12 col-md-8 ">
    <div class="row">
        <div class="col-12 ">
            <table class="table table-striped m-2">
                <thead>
                    <tr>
                        <th>Nom Categorie</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Categories as $Categorie) 
                        <tr>
                            <td>{{ $Categorie->nomCategorie}}</td>
                            <td><a href="{{route('Categorie.edit',$Categorie->idC)}}">Editer</a></td>
                            <td>                           
                                <form method="POST" action="{{route('Categorie.destroy',$Categorie->idC)}}">
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
                        <td><button class="btn btn-primary" type="submit"><a class=" link-light text-wrap" href="{{route('Categorie.create')}}">Ajouter</a></button></td>
                        <!-- <td><button class="btn btn-primary" type="submit"><a class=" link-light text-wrap" href="index.php?Action=NewCategorie">Ajouter</a></button></td> -->
                    </tr>
                </tbody>
            </table>
        </div>

        </section>
    </div>
    
@endsection