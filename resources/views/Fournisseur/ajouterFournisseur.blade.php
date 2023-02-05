@extends('index')

@section('titre')
    Ajouter Fournisseur
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
<div class="col-12 col-md-9">
    <div class="row">
        <div class="col-12  ">
            <form method="post" action="{{route('Fournisseur.store')}}">
                @csrf
                @method('POST')
                <table class=" table table-hover m-4">
                    <tbody>
                        <tr>
                            <th><label for="nomFournisseur" class="form-label">Nom du fournisseur</label></th>
                            <td class="text-secondary"><input type="text" id="nomFournisseur" name="nomFournisseur" required /></td>
                        </tr>
                        <tr>
                            <th><label for="prenomFournisseur" class="form-label">Preom du fournisseur</label></th>
                            <td class="text-secondary"><input type="text" id="prenomFournisseur" name="prenomFournisseur" required /></td>
                        </tr>
                        <tr>
                            <th><label for="codeFournisseur" class="form-label">Code fournisseur</label></th>
                            <td class="text-secondary"><input type="text" id="codeFournisseur" name="codeFournisseur" required /></td>
                        </tr>
                        <tr>
                            <th><label for="telFournisseur" class="form-label">Tel</label></th>
                            <td class="text-secondary"><input type="text" id="telFournisseur" name="telFournisseur" required /></td>
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