@extends('index')

@section('titre')
    Ajouter couleur
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
    <div class="col-12 col-md-9">
    <div class="row">
        <div class="col-12">
            <form method="post" action="{{route('Couleur.store')}}">
                @csrf
                <table class=" table table-hover m-4">
                    <tbody>
                        <tr>
                            <th><label for="libCouleur" class="form-label">Nom du couleur</label></th>
                            <td class="text-secondary"><input placeholder="nom du couleur" type="text" id="libCouleur" name="libCouleur" required /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="btn btn-primary" type="submit">Ajouter</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>

        </section>
    </div>
    
    
@endsection