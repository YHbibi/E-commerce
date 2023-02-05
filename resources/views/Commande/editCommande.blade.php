@extends('index')

@section('titre')
    Editer commande
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
    <div class="col-12 col-md-9">
    <div class="row">
        <div class="col-12 m-2">
            <div class="col-12 col-md-8 ">
                <form method="post" action="{{route('Commande.update',$commande->referenceCommande)}}">
                    @csrf
                    @method('PUT')

                    <table class=" table table-hover">
                        <tbody>
                            <tr>
                                @php
                                    $etats = array("en cours de traitement", "Livrée", "Remborsée", "Reportée");
                                @endphp
                                <div class=" m-3 ">
                                    <label class="form-label" for="etat">Etat commande</label>
                                    <select class="form-select" name="etat" id="etat">
                                        @foreach ($etats as $etat)  
                                            <option value="<?= $etat; ?>" <?php if ($etat == $commande->etat ) echo 'selected'; ?>>
                                                <?= $etat ?>
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </tr>
                            <tr>
                                <input type="hidden" name="referenceCommande" value=" {{$commande->referenceCommande}}" />
                            </tr>
                            <td></td>
                            <td><button class="btn btn-primary" type="submit">Modifier</button></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

        </section>
    </div>
    
@endsection