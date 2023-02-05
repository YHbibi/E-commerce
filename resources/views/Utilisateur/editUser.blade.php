@extends('index')

@section('titre')
    Editer user
@endsection

@section('contenu') 

    {{--  side bar des categories --}}
    @include('components.produitParCategories')

    <div class="col-12 col-md-9 my-3">
        <form method="POST" action="{{route('Utilisateur.update',session('idU'))}}">
        @csrf
        @method('PUT')
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th colspan='2' class="h4">Paramètres généraux du compte</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th><label for="nom" class="form-label">Nom</label></th>
                        <td class="text-secondary"><input value="{{ $utilisateur->nom}}" type="text" id="nom" name="nom" /></td>
                    </tr>
                    <tr>
                        <th><label for="prenom" class="form-label">Prenom</label></th>
                        <td class="text-secondary"><input value="{{ $utilisateur->prenom}}" type="text" id="prenom" name="prenom" /></td>
                    </tr>
                    <tr>
                        <th><label for="age" class="form-label ">Date naissance</label></th>
                        <td class="text-secondary "><input value="{{ $utilisateur->dateNaissance}}" type="date" max="<?= date("Y") - 10 ?>-<?= date("m") ?>-<?= date("d") ?>"  id="age" name="dateNaissance" /></td>
                    </tr>
                    <tr>
                        <th><label for="tel" class="form-label">Tel</label></th>
                        <td class="text-secondary"><input value="{{ $utilisateur->tel}}" type="text" id="tel" name="tel" /></td>
                    </tr>
                    <tr>
                        <th><label for="adresse" class="form-label">Adresse</label></th>
                        <td class="text-secondary"><input value="{{ $utilisateur->adresse}}" type="text" id="adresse" name="adresse" /></td>
                    </tr>
                    <tr>
                        <th><label for="codePostal" class="form-label">Code postal</label></th>
                        <td class="text-secondary"><input value="{{ $utilisateur->codePostal}}" type="text" id="codePostal" name="codePostal" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button class="btn btn-primary" type="submit">Modifier</button></td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <!--End second column-->
@endsection
