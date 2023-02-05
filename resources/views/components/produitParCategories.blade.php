@php 
    use App\Models\Categorie;
    $produitParCategories = Categorie::ProduitsParCategories();
@endphp

<div class="container-fluid mb-4 ">
     <section class="row my-4">
         <!-- <div class="row "> -->
         <div class="col-12 col-md-3">
             <section class="card  ">
                 <div class="card-header bg-primary text-white">
                     <h1 class="h5">Categories</h1>
                 </div>
                 <!--end .card-header-->
                 <ul class="list-group">
                     @foreach ($produitParCategories as $produitParCategorie)
                         <li class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                             <a href="{{route('Produit.detailsCategories',$produitParCategorie->nomCategorie)}}" class="text-decoration-none">{{ $produitParCategorie->nomCategorie;}}</a>
                             <span class="badge rounded-circle bg-info">{{$produitParCategorie->nbProduitsParCategorie}} </span>
                         </li>
                     @endforeach 
                 </ul>
             </section>
             <!--end Category section-->
         </div>
         <!--End first column-->
         <!-- </div> -->