@extends('index')

@section('titre')
    Editer couleur
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
    <div class="col-12 col-md-9 my-4">
    <div class="row">
        <div class="col-12  ">
            <form method="post" action="{{route('Couleur.update',$couleur->idCouleur)}}">
                @csrf
                @method('PUT')
                <table class=" table table-hover">
                    <tbody>
                        <tr>
                            <th><label for="libCouleur" class="form-label">Nom du couleur</label></th>
                            <td class="text-secondary"><input value="{{$couleur->libCouleur}}" type="text" id="libCouleur" name="libCouleur" /></td>
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