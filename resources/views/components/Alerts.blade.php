
@if(session()->has("success"))
    <div class='alert-success  p-2 m-4 rounded  d-flex justify-content-center'  role='alert' > 
        <h1 class='card-title h4 text-center'>{{ session()->pull("success") }}</h1>
    </div>

@endif

@if(session()->has("warning"))
    
    <div class='alert-warning  p-2 m-4 rounded  d-flex justify-content-center'  role='alert' > 
        <h1 class='card-title h4 text-center'>{{ session()->pull("warning") }}</h1>
    </div>

@endif
@if(session()->has("danger"))
    <div class='alert-danger  p-2 m-4 rounded  d-flex justify-content-center'  role='alert' > 
        <h1 class='card-title h4 text-center'>{{ session()->pull("danger") }}</h1>
    </div>

@endif

@if(session()->has("info"))
   <div class='alert-info  p-2 m-4 rounded  d-flex justify-content-center'  role='alert' > 
       <h1 class='card-title h4 text-center'>{{ session()->pull("info") }}</h1>
    </div>       
@endif