    <div class="container-fluid mb-4 ">
     <section class="row my-4">
         <!-- <div class="row "> -->
         <div class="col-12 col-md-3">
             <section class="card  ">
                 <div class="card-header bg-primary text-white">

                     <h1 class="h5 d-flex justify-content-center">
                         Administrer
                     </h1>
                 </div>
                 <!--end .card-header-->
                 <ul class="list-group pagination">
                     <li class="list-group-item list-group-item-action d-flex align-items-center  ">
                         <a href="{{route('Admin.Statistiques')}}" class="h5 text-dark text-decoration-none ">Statistiques</a>
                     </li>
                     <li class="list-group-item list-group-item-action d-flex align-items-center  ">
                         <a href="{{route('Admin.AllProduit')}}" class="h5 text-dark text-decoration-none ">Afficher produits</a>
                     </li>
                     <li class="list-group-item list-group-item-action d-flex align-items-center  ">
                         <a href="{{route('Admin.AllCouleur')}}" class="h5 text-dark text-decoration-none ">Afficher couleurs</a>
                     </li>
                     <li class="list-group-item list-group-item-action d-flex align-items-center  ">
                         <a href="{{route('Admin.AllCategorie')}}" class="h5 text-dark text-decoration-none ">Afficher categories</a>
                     </li>
                     <li class="list-group-item list-group-item-action d-flex align-items-center  ">
                         <a href="{{route('Admin.AllCommande')}}" class="h5 text-dark text-decoration-none ">Afficher commandes</a>
                     </li>
                     <li class="list-group-item list-group-item-action d-flex align-items-center  ">
                         <a href="{{route('Admin.AllFournisseur')}}" class="h5 text-dark text-decoration-none ">Afficher Fournisseurs</a>
                     </li>
                 </ul>
             </section>
             <!--end Category section-->
         </div>