<nav class="navbar navbar-expand-lg navbar-light bg-light  ">
    <a class="navbar-brand" href="{{route('index')}}">E-Commerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('index')}}">Accueil </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('Panier.index')}}">
                    Panier
                    @if (Session::has('panier') && count(session('panier')))
                        ({{count(session('panier'));}})
                    @else
                        (0)
                    @endif
                    
                </a>
                
            </li>
            @if (Session::has('connected') && (session('connected') === true))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Commande.show',session('idU'))}}">
                        Suivi commande
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Facture.index')}}">
                        Mes factures
                    </a>
                </li>
            @endif
            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Compte
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if (Session::has('connected') && (session('connected') === true))
                        <a class="dropdown-item" href="{{route('Utilisateur.edit',session('idU'))}}">{{session("nom")}}</a>
                        @if (Session::has('admin') && (session('admin') == '1') )
                            <a class="dropdown-item" href="{{route('Admin.Statistiques')}}">Dashboard</a>

                        @endif
                        <a class="dropdown-item" href="{{route('Utilisateur.logOut')}}">Déconnexion</a>

                    @else
                        <a class="dropdown-item" href="{{route('Utilisateur.create')}}">Inscription</a>
                        <a class="dropdown-item" href="{{route('Utilisateur.logIn')}}">Connexion</a>
                
                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav>


<!-- Search form -->
<form class="ml-auto " id="searchForm" action="{{route('Produit.SearchProduit')}}">
    <div class="input-group ">
        <input type="search" name="Search" id=" search" class="form-control" placeholder="Search" required>
        <div class="input-group-append">
            <button class="btn " type="submit"><span><img src='{{asset('/Images/search.png')}}' alt=" search-icon"></span></button>
        </div>
    </div>
</form>

<!--end form#searchForm-->