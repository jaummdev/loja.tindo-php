<?php
include("../../services/api.php");

$menuItems = $data_config["menu"];
$categoriasSite = $data_config["categoriasSite"];
?>

<header>
    <section>
        <a href="#">
            <img width="200" src="<?php echo $data_config["logoCabecalho"]; ?>" alt="Logo">
        </a>
    </section>

    <section>
        <ul>
            <?php foreach ($menuItems as $item) { ?>
                <li>
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
    </section>
</header>