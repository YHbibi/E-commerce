@extends('index')

@section('titre')
    Ajouter categorie
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
    <div class="col-12 col-md-9">
    <div class="row">
        <div class="col-12 ">
            <form method="post" action="{{route('Categorie.store')}}">
                @csrf
                @method('POST')
                <table class=" table table-hover m-4">
                    <tbody>
                        <tr>
                            <th><label for="nomCategorie" class="form-label">Nom du categorie</label></th>
                            <td class="text-secondary"><input placeholder="nom du categorie" type="text" id="nomCategorie" name="nomCategorie" required /></td>
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