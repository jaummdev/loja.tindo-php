<?php

$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

if (!$tipo || !$id) {
    echo "Erro: Parâmetros inválidos!";
    exit;
}


try {
    $itemDetalhes = callAPI("https://api.tindo.com.br/ecommerce/{$tipo}/{$id}");
} catch (Exception $e) {
    echo "Erro ao carregar os detalhes: " . $e->getMessage();
    exit;
}


$labels = [
    "labelAdulto" => $itemDetalhes["labelAdulto"],
    "labelCrianca" => $itemDetalhes["labelCrianca"],
    "labelInfantil" => $itemDetalhes["labelInfantil"],
    "labelSenior" => $itemDetalhes["labelSenior"]
];

?>

<section class="container">
    <section class="visualizer-container">
        <section class="visualizer-content-container">

            <section class="slider-container visualizer-slider-container">
                <div class="slider visualizer-slider">
                    <section class="slider-controls">
                        <div class="slider-controls-left" onclick="plusSlides(-1)">
                            <i class="fa-solid fa-chevron-left"></i>
                        </div>

                        <div class="slider-controls-right" onclick="plusSlides(1)">
                            <i class="fa-solid fa-chevron-right"></i>
                        </div>
                    </section>

                    <section class="slider-content">
                        <?php
                        $index = 1;
                        foreach ($itemDetalhes as $key => $value) {
                            if ($key != "imagemCapa" && str_starts_with($key, "imagem") && !empty($value)) { ?>
                                <div class="mySlides blur">
                                    <img src="<?php echo $value; ?>">
                                </div>
                        <?php
                                $index++;
                            }
                        } ?>
                    </section>

                </div>

                <div class="dot-container">
                    <?php
                    $index = 1;
                    foreach ($itemDetalhes as $key => $value) {
                        if ($key != "imagemCapa" && str_starts_with($key, "imagem") && !empty($value)) { ?>
                            <span class="dot" onclick="currentSlide(<?php echo $index; ?>)"></span>
                    <?php
                            $index++;
                        }
                    } ?>
                </div>

                <section class="visualizer-description">
                    <div>
                        <h1 style="color: <?php echo $data_config["corHeader"] ?>"><?php echo $itemDetalhes["nome"] ?></h1>
                        <span><?php echo $itemDetalhes["subTitulo"] ?></span>
                    </div>
                    <p><?php echo $itemDetalhes["descricaoSite"] ?></p>
                </section>
            </section>

            <section class="visualizer-content">
                <div class="visualizer-content-value">
                    <?php if ($itemDetalhes["valorDestaque"] != "") { ?>
                        <span><?php echo $itemDetalhes["labelValorDestaque"] ?></span>
                        <h2 style="color: <?php echo $data_config["corTema"] ?>"><?php echo $itemDetalhes["valorDestaque"] ?></h2>
                    <?php } else { ?>
                        <span>...</span>
                    <?php } ?>
                </div>


                <div class="visualizer-content-info" style="color: <?php echo $data_config["corHeader"] ?>">
                    <?php if ($itemDetalhes["duracaoServico"] != "") { ?>
                        <span>
                            <i class="fa-regular fa-clock"></i>
                            <?php echo $itemDetalhes["duracaoServico"] ?>
                        </span>
                    <?php } ?>

                    <?php if ($itemDetalhes["alerta"] != "") { ?>
                        <span>
                            <i class="fa-regular fa-lightbulb"></i>
                            <?php echo $itemDetalhes["alerta"] ?>
                        </span>
                    <?php } ?>
                </div>

                <?php if ($itemDetalhes["hasDisponibilidade"] != false) { ?>
                    <div class="visualizer-content-details">
                        <section class="details peoples">
                            <label>
                                <i class="fa-solid fa-users"></i>
                                Quantas pessoas irão ?
                            </label>

                            <div class="details quantity">
                                <?php foreach ($labels as $key => $label): ?>
                                    <div>
                                        <label for="quantity"><?php echo $label; ?></label>
                                        <div class="quantity-control">
                                            <li class="decrease">-</li>
                                            <input type="text" disabled value="0" min="0" class="quantity-input" data-key="<?php echo $key; ?>">
                                            <li class="increase">+</li>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </section>

                        <section class="details date">
                            <label>
                                <i class="fa-regular fa-calendar-days"></i>
                                <?php echo $itemDetalhes["labelDataPasseio"] ?>
                            </label>
                            <input type="date" name="chooseDate" id="chooseDate" />
                        </section>

                        <section class="details local-boarding">
                            <section class="details local">
                                <label>
                                    <i class="fa-solid fa-clock"></i>
                                    <?php echo $itemDetalhes["labelHorarioPasseio"] ?>
                                </label>

                                <select name="chooseHour" id="chooseHour">
                                    <option value="" disabled selected>Selecione um horário</option>
                                    <option value="08:00">08:00</option>
                                    <option value="09:00">09:00</option>
                                </select>
                            </section>

                            <section class="details boarding">
                                <label for="chooseLocal">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <?php echo $itemDetalhes["labelLocalEmbarque"] ?>
                                </label>

                                <select name="chooseLocal" id="chooseLocal">
                                    <option value="" disabled selected>Selecione um local</option>
                                    <?php foreach ($itemDetalhes["locaisEmbarque"] as $local) { ?>
                                        <option value="<?php echo $local["nome"] ?>">
                                            <?php echo $local["nome"] ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </section>
                        </section>

                        <hr class="dark">

                        <section class="details total-price">
                            <label>TOTAL: </label>
                            <h2 style="color:<?php echo $data_config["corTema"] ?>"><?php echo $itemDetalhes["valorDestaque"] ?></h2>
                        </section>

                        <hr class="dark">

                        <button id="addToCart" style="background: <?php echo $data_config["corHeader"] ?>">
                            Adicionar ao carrinho
                        </button>
                    </div>
                <?php } else { ?>
                    <section class="visualizer-span">
                        <i class="fa-regular fa-circle-xmark"></i>
                        <span>Sem disponibilidade no momento...</span>
                    </section>
                <?php } ?>

            </section>
        </section>
    </section>