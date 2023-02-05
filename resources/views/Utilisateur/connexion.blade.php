 @extends('index')

@section('titre')
    Connexion
@endsection

@section('contenu')
    <div class="my-5 d-flex my-3 justify-content-center">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title h2 text-center">Connexion</h1>
            </div>
            <div class="card-body d-flex flex-column">
                <div>
                    <form method="post" action="{{route('Utilisateur.Auth')}}">
                        @csrf
                        <fieldset>
                            <div class=" my-3 form-group">
                                <label for="email" class="d-none d-md-block">Votre adresse email</label>
                                <input type="mail" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Votre adresse e-mail" value="{{ old('email') }}" />
                                <small class="form-text text-muted">Nous ne partagerons pas votre adresse mail avec des tiers.</small>
                                <div>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="my-3 form-group">
                                <label for="mdp" class="d-none d-md-block">Votre mot de passe</label>
                                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Votre mot de passe" />
                            </div>
                        </fieldset>

                        <div class="mt-3 d-flex justify-content-center">
                            <button class="btn btn-primary" type="submit">Se connecter</button>
                        </div>
                        <hr>
                        <div class="mt-3 d-flex justify-content-center">
                            <a href="{{route('Utilisateur.create')}}" class="btn btn-success mt-auto">Créer nouveau compte</a>
                        </div>
                    </form>
                </div>
            </div>
            <!--end .card-body-->
        </div>
        <!--End .card-->
    </div>
@endsection
