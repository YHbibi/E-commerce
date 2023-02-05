@extends('index')

@section('titre')
    Editer Fournisseur
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
    <div class="col-12 col-md-9 my-4">
    <div class="row">
        <div class="col-12  ">
            <form method="post" action="{{route('Fournisseur.update',$Fournisseur->idF)}}">
                @csrf
                @method('PUT')
                <table class=" table table-hover">
                    <tbody>
                        <tr>
                            <th><label for="nomFournisseur" class="form-label">Nom du Fournisseur</label></th>
                            <td class="text-secondary"><input value="{{ $Fournisseur->nomFournisseur}}" type="text" id="nomFournisseur" name="nomFournisseur" /></td>
                        </tr>
                        <tr>
                            <th><label for="prenomFournisseur" class="form-label">Nom du Fournisseur</label></th>
                            <td class="text-secondary"><input value="{{ $Fournisseur->prenomFournisseur}}" type="text" id="prenomFournisseur" name="prenomFournisseur" /></td>
                        </tr>
                        <tr>
                            <th><label for="telFournisseur" class="form-label">Tel du Fournisseur</label></th>
                            <td class="text-secondary"><input value="{{ $Fournisseur->telFournisseur}}" type="text" id="telFournisseur" name="telFournisseur" /></td>
                        </tr>
                        <tr>
                            <th><label for="codeFournisseur" class="form-label">Code du Fournisseur</label></th>
                            <td class="text-secondary"><input value="{{ $Fournisseur->codeFournisseur}}" type="text" id="codeFournisseur" name="codeFournisseur" /></td>
                        </tr>
                        <tr>
                            <input type="hidden" name="idF" value="{{ $Fournisseur->idF}}" />
                        </tr>
                        <td></td>

                        <td><button class="btn btn-primary" type="submit">Modifier</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <!--End second column-->
    </div>

    </section>
</div>

@endsection