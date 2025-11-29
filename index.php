<!-- Array -->
<?php

$voteFilter= isset($_GET["vote"])? $_GET["vote"] : null;
$parkFilter= isset($_GET["parking"]); 

   $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
        
    ];

    function filterByVote($hotel){
        global $voteFilter;
        return $hotel["vote"] >= $voteFilter;
    }

    function filterByPark($hotel){
        global $parkFilter;
        return $hotel["parking"] == $parkFilter;
    }
   $votedHotels = array_filter($hotels, "filterByVote");
   $filteredHotels = array_filter($votedHotels, "filterByPark");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>
<body>

    <!-- Header -->
    <header>
        <div class="bg-dark">
            <nav class="navbar container">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1 text-white">First PHP Exercise</span>
                </div>
            </nav>
        </div>    
    </header>
    <!-- Main -->
    <main> 
        <div class="container">
            <h1>Welcome to Our Hotel</h1>
            <p>Here is our hotels</p>

            <div class="container my-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Filtri</h5>
                    </div>
                    <div class="card-body">

                        <form action = "index.php" method = "GET">
                            <div class="mb-3 ">
                                <label class="form-check-label" for="parking">Parcheggio</label>
                                <input type="checkbox" class="form-check-input" name="parking" <?php echo $parkFilter?'checked':'' ?>>
                            </div>
                            <div class="mb-3">
                                <label for="vote" class="form-label">Voto</label>
                                <input type="number" class="form-control" name="vote" width ="20px" value=<?php echo $voteFilter?>>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Filtra</button>
                        </form>
                    </div>
                </div>
            </div>


            <table class = "table table-striped table-bordered">
                <tr>
                    <th>Nome</th>
                    <th>Descrizione</th>
                    <th>Parcheggio</th>
                    <th>Voto</th>
                    <th>Distanza dal centro</th>
                </tr>
                <?php
                    foreach($filteredHotels as $hotel){
                        echo "<tr>";
                        foreach($hotel as $key => $value){
                            echo ($key != "name" && $key != "description")? "<td class= \"text-center\">": "<td>";
                            if($key == "parking"){
                                echo $value? "<i class=\"bi bi-check2-square text-success\"></i>" : "<i class=\"bi bi-x-square text-danger\"></i>";
                            }else if($key == "vote"){
                                echo "$value/5";
                            }else if($key == "distance_to_center"){
                                echo "$value km";
                            }else{
                                echo $value;
                            }
                            echo "</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="bg-dark-subtle">
            <div class="container text-white">
                <p>Esercizio di Mirko Bechini</p>
            </div>
        </div>
    </footer>
   
</body>
</html>