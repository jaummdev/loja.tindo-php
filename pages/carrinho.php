<section class="container">
    <section id="carrinho-container">
        <h1>Seu Carrinho</h1>
        <div id="carrinho-itens"></div>
        <button style="background: <?php echo $data_config["corTema"]; ?>" onclick="limparCarrinho()">
            Esvaziar Carrinho
        </button>
    </section>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    listarCarrinho();
});
</script>