<section class="container">
    <section class="carrinho-container">
        <section class="carrinho">
            <div class="carrinho-header">
                <h2>Produtos no seu carrinho</h2>
                <button style="background: <?php echo $data_config["corTema"]; ?>" onclick="limparCarrinho()">
                    Esvaziar Carrinho
                </button>
            </div>

            <div class="carrinho-item-container" id="carrinho-itens"></div>
        </section>

        <?php  ?>
        <section class="carrinho-resumo">
            <div class="carrinho-resumo-header">
                <h3>Resumo</h3>
            </div>
            <section class="carrinho-resumo-content">
                <div style="color: <?php echo $data_config["corHeader"]?>" class="carrinho-resumo-itens">
                    <p>Quantidade de itens: <span id="quantidade-itens">0</span></p>
                    <h2>Total: <span class="carrinho-resumo-total">R$ 0,00</span></h2>

                    <button style="background: green; width: 100%;" onclick="finalizarCompra()">
                        Finalizar Compra
                    </button>
                </div>

            </section>
        </section>
    </section>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        listarCarrinho();
    });
</script>