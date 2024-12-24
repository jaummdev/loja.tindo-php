<?php
$menuItems = $data_config["menu"];
$categoriasSite = $data_config["categoriasSite"];
?>

<header style="background: <?php echo $data_config["corHeader"]; ?>">
    <section>
        <a href="">
            <img width="200" src="<?php echo $data_config["logoCabecalho"]; ?>" alt="Logo">
        </a>
    </section>

    <hr>

    <section class="menu-routes">
        <ul>
            <?php foreach ($menuItems as $item) { ?>
                <li style="--menuHover-color: <?php echo $data_config['corMenuHover']; ?>">
                    <?php
                    if ($item["tipo"] === "LINK" && isset($item["url"])) {
                        echo '<a href="' . $item["url"] . '">' . $item["nome"] . '</a>';
                    } elseif (in_array($item["nome"], $categoriasSite)) {
                        $categoriaSite = urlencode($item["nome"]);
                        echo '<a href="?categoriaSite=' . $categoriaSite . '">' . $item["nome"] . '</a>';
                    } else {
                        echo $item["nome"];
                    }
                    ?>
                </li>
            <?php } ?>

        </ul>

        <section class="to-cart" style="--menuHover-color: <?php echo $data_config['corMenuHover']; ?>">
            <a href="carrinho">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>
        </section>
    </section>
</header>