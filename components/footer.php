<footer style="background: <?php echo $data_config['rodape1_background_color'];?>;--hover-color: <?php echo $data_config['corMenuHover'] ?>">
    <main>
        <section class="footer-links">
            <h3>Links</h3>
            <div>
                <ul>
                    <?php foreach ($data_config["links"] as $link) {
                        echo '<a href='. $link["url"] .'>';
                            echo '<li>'. $link["titulo"] .'</li>';
                        echo '</a>';
                    } ?>
                </ul>
            </div>
        </section>

        <section class="footer-socialMedia">
            <h3>Redes sociais</h3>
            <div>
                <li>
                    <a href="<?php echo $data_config["instagram"] ?>">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $data_config["facebook"] ?>">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $data_config["twitter"] ?>">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $data_config["youtube"] ?>">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo $data_config["whatsAppApi"] ?>">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </li>
            </div>
        </section>

        <section class="footer-contact">
            <h3>Contato</h3>
            <section>
                <?php foreach ($data_config["telefones"] as $phone) {
                    echo '<section>';
                        echo '<div>';
                            echo '<i class="fa-solid fa-phone"></i>';
                            echo '<span>'. $phone["contato"] . '</span>';
                        echo '</div>';
                        echo '<p>'. $phone["descricao"] . '</p>';
                    echo '</section>';
                } ?>

                <?php foreach ($data_config["emails"] as $email) {
                    echo '<section>';
                        echo '<div>';
                            echo '<i class="fa-solid fa-envelope"></i>';
                            echo '<span>'. $email["contato"] . '</span>';
                        echo '</div>';
                        echo '<p>'. $email["descricao"] . '</p>';
                    echo '</section>';
                } ?>
                
            </section>
        </section>

        <section class="footer-payment">
            <h3>Pagamento</h3>
            <div>
                <img src="<?php echo $data_config["imagemCartaoCredito"]; ?>" alt="Pagamento">
            </div>
        </section>

        <section class="footer-security">
            <h3>Segurança</h3>
            <div>
                <img src="<?php echo $data_config["imagemSegurancaSite"]; ?>" alt="Segurança">
            </div>
        </section>
    </main>

    <section class="footer-address">
        <p><?php echo $data_config["rodape2_conteudo"]; ?></p>
    </section>

    <section>
        <p style="margin-top: 12px;">&copy; <?php echo date("Y"); ?> <?php echo $data_config["tituloSite"]; ?></p>
    </section>
</footer>