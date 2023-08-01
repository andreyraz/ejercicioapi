<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo '
            <script>
                alert("Por favor debes iniciar sesion"); 
                window.location = "index.php";
            </script>
        ';
        session_destroy();
        die();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <section class="hero">
        <a class="boton" href="php/cerrar_sesion.php">cerrar sesión</a>
        <h1 class="">Bienvenido lista de pokemons</h1>
        
    </section>
    
    <div class="contenedor__principal">
    
        <div id="pokemon-list">
        <?php
                // PHP code to fetch and display Pokémon names
                $limit = 20;
                $apiUrl = "https://pokeapi.co/api/v2/pokemon?limit=$limit";
                $response = file_get_contents($apiUrl);
                $data = json_decode($response, true);

                foreach ($data['results'] as $pokemon) {
                    $pokemonName = $pokemon['name'];
                    echo "<a href='habilidades.php?name=$pokemonName'>$pokemonName</a><br>";
                }
            ?>

        </div>
    </div>

    

</body>
</html>
</body>
</html>