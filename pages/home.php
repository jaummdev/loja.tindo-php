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

    <section class="cards-container">
        <?php foreach ($data_galeria as $item) { ?>
            <div class="card-wrapper">
                <section class="card-image">
                    <img src="<?php echo $item['imagemCapa']; ?>" alt="Imagem da galeria">
                </section>

                <section class="card-description">
                    <?php if($item["alerta"] != ""){?>
                        <div class="card-description-alert">
                            <p><?php echo $item["alerta"]; ?></p>
                        </div>
                    <?php } ?>
                    <div class="card-description-info">
                        <h2 class="card-title" style="color: <?php echo $data_config["corHeader"]?>;"><?php echo $item['titulo']; ?></h2>
                        <p class="card-subTitle"><?php echo $item['subTitulo']; ?></p>
                        <p class="card-duration"> 
                            <?php 
                                if ($item['duracaoServico'] != ""){
                                    echo '<i class="fa-regular fa-clock"></i>';
                                    echo $item['duracaoServico'];
                                }
                            ?>
                        </p>
                    </div>

                    <div class="card-description-value">
                        <div>
                            <?php 
                                if ($item['exibirValorGaleria'] == "true"){
                                    echo '<p>'. $item['labelValorGaleria'] . '</p>';
                                }
                            ?>
                            <h3><?php echo $item['valorFinal']; ?></h3>
                        </div>

                        <button style="background: <?php echo $data_config["corTema"]?>;"><?php echo $item['botaoGaleria']; ?></button>
                    </div>
                </section>
            </div>
        <?php } ?>
    </section>
</body>
</html>