@extends('index')

@section('titre')
    Inscription
@endsection

@section('contenu')
    <div class="my-5 d-flex justify-content-center">
        <div class="card ">
            <div class="card-header">
                <h1 class="card-title h2 text-center">Inscription</h1>
            </div>
            <div class="card-body d-flex flex-column">
                <div>
                    <script language="JavaScript">
                        // validation de 
                        function validation(f) {
                            if (f.mdp.value != f.mdp2.value) {
                                alert('Ce ne sont pas les mêmes mots de passe!');
                                f.mdp.focus();
                                return false;
                            } else if (f.mdp.value == f.mdp2.value) {
                                return true;
                            } else {
                                f.mdp.focus();
                                return false;
                            }
                        }
                    </script>

                    <form method="post" action="{{route('Utilisateur.store')}}" class="was-validated row g-3" onSubmit="return validation(this)">
                        @csrf
                        @method('POST')
                        <fieldset>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="validationName" class="form-label">Nom</label>
                                    <input type="text" class="form-control is-valid" value="<?php if (isset($param["nom"])) echo $param["nom"]; ?>" name="nom" id="validationName" placeholder="Nom" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="validationLastName" class="form-label">Prenom</label>
                                    <input type="text" class="form-control is-valid" value="<?php if (isset($param["prenom"])) echo $param["prenom"]; ?>" name="prenom" id="validationLastName" placeholder="Prenom" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="validationDate" class="form-label">Date de naissance</label>
                                    <input type="date" class="form-control is-valid" max="<?= date("Y") - 10 ?>-<?= date("m") ?>-<?= date("d") ?>" value="<?php if (isset($param["dateNaissance"])) echo $param["dateNaissance"]; ?>" name="dateNaissance" id="validationDate" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="validationMail" class="form-label">E-mail</label>
                                    <input type="email" class="form-control is-valid" name="email" id="validationMail" placeholder="Adresse e-mail" required>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="validationAdresse" class="form-label">Adresse</label>
                                    <input type="text" class="form-control is-valid" value="<?php if (isset($param["adresse"])) echo $param["adresse"]; ?>" name="adresse" id="validationAdresse" placeholder="Adresse" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="validationTel" class="form-label">tel</label>
                                    <input type="text" class="form-control is-valid" value="<?php if (isset($param["tel"])) echo $param["tel"]; ?>" name="tel" id="validationTel" placeholder="tel" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="validationCodePostal" class="form-label">Code postal</label>
                                    <input type="text" class="form-control is-valid" value="<?php if (isset($param["codePostal"])) echo $param["codePostal"]; ?>" name="codePostal" id="validationCodePostal" placeholder="code Postal" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="validationPassword" class="form-label">Mot de passe : <sub>(6 characters minimum)</sub></label>
                                    <input type="password" class="form-control is-valid" minlength="6" name="mdp" id="validationPassword" placeholder="Nouveau mot de passe" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="validationPassword2" class="form-label">Valider votre mot de passe : <sub>(6 characters minimum)</sub></label>
                                    <input type="password" class="form-control is-valid" minlength="6" name="mdp2" id="validationPassword2" placeholder="Valider le mot de passe" required>
                                </div>
                            </div>

                            <div class="mb-3 ">
                                Genre:
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" value="Homme" id="flexRadioDefault1" checked>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Homme
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="sex" value="Femme" id="flexRadioDefault2" <?php if (isset($param["sex"]) && $param["sex"] === 'Femme') echo 'checked'; ?>>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Femme
                                    </label>
                                </div>

                            </div>


                            <div class="mb-3">
                                <label for="validationInscri" class="form-label">Je suis pas un robot</label>
                                <input class="form-check-input mt-1 mx-2 " type="checkbox" name="verif" id="validationInscri" required>
                            </div>
                        </fieldset>
                        <hr>
                        <div class="mt-1 d-flex justify-content-center">
                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                        </div>
                        <hr>
                        <div class="mt-1 d-flex justify-content-center">
                            <a href="{{route('Utilisateur.logIn')}}" class="btn btn-success mt-auto">Se connecter</a>
                        </div>
                    </form>


                </div>
            </div>
            <!--end .card-body-->
        </div>
        <!--End .card-->
    </div>
@endsection
