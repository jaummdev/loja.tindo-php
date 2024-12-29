<?php
include("api.php");

$page = isset($_GET['page']) ? basename($_GET['page']) : 'home';
$pageFile = 'pages/' . $page . '.php';

// Verifica se o arquivo existe antes de incluí-lo
if (!file_exists($pageFile)) {
    $pageFile = 'pages/home.php';
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data_config["tituloSite"] . " | " . $data_config['descricaoSite']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/global.css">
</head>

<body>
    <?php include('components/floatButton.php') ?>
    <?php include('components/header.php') ?>
    <?php include($pageFile); ?>
    <?php include('components/footer.php') ?>
    
    <script>
        // Passando os dados PHP para o JavaScript
        const itemDetalhes = <?php echo json_encode($itemDetalhes); ?>;
    </script>
    <script src="script/cart.js"></script>
    <script src="script/slides.js"></script>
    <script src="script/script.js"></script>
</body>

</html>