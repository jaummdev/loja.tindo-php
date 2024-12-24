<section class="container">
    <section class="slider-container">
        <div class="slider">
            <section class="slider-controls">
                <div class="slider-controls-left">
                    <i class="fa-solid fa-chevron-left" onclick="plusSlides(-1)"></i>
                </div>

                <div class="slider-controls-right" onclick="plusSlides(1)">
                    <i class="fa-solid fa-chevron-right"></i>
                </div>
            </section>

            <section class="slider-content slider-home">
                <?php
                $index = 1;
                foreach ($data_config as $key => $value) {
                    if (preg_match('/^slider\d+_imagem$/', $key) && !empty($value)) { ?>
                        <img src="<?php echo $value; ?>" alt="Imagem do slider">
                <?php
                        $index++;
                    }
                } ?>
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
                    <?php if ($item["alerta"] != "") { ?>
                        <div class="card-description-alert">
                            <p><?php echo $item["alerta"]; ?></p>
                        </div>
                    <?php } ?>
                    <div class="card-description-info">
                        <h2 class="card-title" style="color: <?php echo $data_config["corHeader"] ?>;"><?php echo $item['titulo']; ?></h2>
                        <p class="card-subTitle"><?php echo $item['subTitulo']; ?></p>
                        <p class="card-duration">
                            <?php
                            if ($item['duracaoServico'] != "") {
                                echo '<i class="fa-regular fa-clock"></i>';
                                echo $item['duracaoServico'];
                            }
                            ?>
                        </p>
                    </div>

                    <div class="card-description-value">
                        <div>
                            <?php
                            if ($item['exibirValorGaleria'] == "true") {
                                echo '<p>' . $item['labelValorGaleria'] . '</p>';
                            }
                            ?>
                            <h3><?php echo $item['valorFinal']; ?></h3>
                        </div>

                        <a href="visualizar?tipo=<?php echo urlencode(strtolower($item['tipo'])); ?>&id=<?php echo (int) $item['id']; ?>">
                            <button style="background: <?php echo $data_config["corTema"]; ?>;">
                                <?php echo $item['botaoGaleria']; ?>
                            </button>
                        </a>
                    </div>
                </section>
            </div>
        <?php } ?>
    </section>

    <section class="above-footer">
        <?php
        $index = 1;
        foreach ($data_config as $key => $value) {
            if (preg_match('/^selo(\d+)_imagem$/', $key, $matches) && !empty($value)) {
                $index = $matches[1];
                $linkKey = "selo{$index}_link";
                $link = isset($data_config[$linkKey]) ? $data_config[$linkKey] : '#';
        ?>
                <a href="<?php echo $link; ?>">
                    <img src="<?php echo $value; ?>" alt="Selo Imagem">
                </a>
        <?php
            }
        } ?>
    </section>
</section>