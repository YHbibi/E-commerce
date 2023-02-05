@extends('index')

@section('titre')
    Statistiques
@endsection

@section('contenu') 

    {{--  side bar de l'admin --}}
    @include('components.sidebarAdmin')
    <?php

     $enCours = $rembource = $reporte = 0;
        // listes restants
        foreach ($commandes as $commande) {
            if ($commande->etat == 'en cours de traitement') {
                $enCours++;
            } else if ($commande->etat == 'Reportée') {
                $rembource++;
            } else if ($commande->etat== 'Remboursée') {
                $reporte++;
            }
        }

        $new = false;
        if (($enCours + $rembource + $reporte) != 0) {
            $dataPoints = array(
                array("label" => "En cours de traitement", "y" => ($enCours * 100) / ($enCours + $rembource + $reporte)),
                array("label" => "Reportée", "y" => ($rembource * 100) / ($enCours + $rembource + $reporte)),
                array("label" => "Remboursée", "y" => ($reporte * 100) / ($enCours + $rembource + $reporte)),

            );
?>
    <script>
                window.onload = function() {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        animationEnabled: true,
                        title: {
                            text: "Commandes passeés"
                        },
                        subtitles: [{
                            text: "<?= date("Y-m-d") ?>"
                        }],
                        data: [{
                            type: "pie",
                            yValueFormatString: "#,##0.00\"%\"",
                            indexLabel: "{label} ({y})",
                            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                        }]
                    });
                    chart.render();
                }
        </script>
 

<?php
        } else {
            $new = true;
        }
        ?>
        <div class="col-12 col-md-9">
            <?php
            if ($new == true) {
            ?>
                <div class=" p-2 mt-3 rounded-pill  d-flex justify-content-center  fs-5 fw-bold bg-warning"><a class="text-decoration-none" href="{{route('Admin.AllCommande')}}">Pas de commandes</a></div>
            <?php
            }
            ?>
            <div>
                <div id="chartContainer" style="height: 400px; width: 100%;"></div>
            </div>

</div>
    
    
@endsection