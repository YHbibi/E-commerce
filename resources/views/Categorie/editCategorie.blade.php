@extends('index')

@section('titre')
    Editer categorie
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
    <div class="col-12 col-md-9">
    <div class="row">
        <div class="col-12  ">
            <div class="col-12  ">
                <form method="post" action="{{route('Categorie.update',$categorie->idC)}}">
                    @csrf
                    @method('PUT')
                    <table class=" table table-hover">
                        <tbody>
                            <tr>
                                <th><label for="nomCategorie" class="form-label">Nom du categorie</label></th>
                                <td class="text-secondary"><input value="{{ $categorie->nomCategorie}}" type="text" id="nomCategorie" name="nomCategorie" /></td>
                            </tr>
                            <tr>
                                <input type="hidden" name="idC" value="{{ $categorie->idC}}" />
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