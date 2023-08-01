<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>habilidades</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <main class="contenedor sombra">
        
        <a href="home.php">ver todos los pokemons</a>
        <div id="pokemon-details">
            <?php
                    if (isset($_GET['name'])) {
                        $pokemonName = $_GET['name'];
                        $apiUrl = "https://pokeapi.co/api/v2/pokemon/$pokemonName";
                        $response = file_get_contents($apiUrl);
                        $data = json_decode($response, true);

                        echo "<h1>" . ucfirst($pokemonName) . "</h1>";
                        echo "<img src='" . $data['sprites']['front_default'] . "' alt='Pokemon Image'><br>";
                        echo "<h2>Habilidades:</h2>";
                        echo "<ul>";
                        foreach ($data['abilities'] as $ability) {
                            echo "<li>" . $ability['ability']['name'] . "</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<p>No Pokémon selected.</p>";
                    }
                ?>
        </div>
    </main>
    
</body>
</html>