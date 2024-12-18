<?php
include("./services/api.php");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data_config["tituloSite"] . " | " . $data_config['descricaoSite'];?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles/global.css">
</head>
<body>
    <?php 
        include("components/floatButton.php");
        include("components/header.php");
    ?>

    <section class="slider-container">
        <div class="slider">
            <section class="slider-controls">
                <div class="slider-controls-left">
                    <i class="fa-solid fa-chevron-left"></i>
                </div>
                
                <div class="slider-controls-right">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
            </section>
            
            <section class="slider-content">
                <img src="<?php echo $data_config['slider1_imagem']; ?>" alt="Imagem do slider">
            </section>
        </div>
    </section>  
</body>
</html>