<section class="container">
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

    <section class="above-footer">
        <a href="<?php echo $data_config["selo1_link"] ?>">
            <img src="<?php echo $data_config["selo1_imagem"] ?>" alt="Selo Imagem">
        </a>
        <a href="<?php echo $data_config["selo2_link"] ?>">
            <img src="<?php echo $data_config["selo2_imagem"] ?>" alt="Selo Imagem">
        </a>
        <a href="<?php echo $data_config["selo3_link"] ?>">
            <img src="<?php echo $data_config["selo3_imagem"] ?>" alt="Selo Imagem">
        </a>
    </section>
</section>