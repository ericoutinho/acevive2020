<?php get_header() ?>

<div class="container my-5">
    <div class="row mb-5">
        <div class="col">
            <h1><i class="far fa-thumbs-down mr-2"></i>404!</h1>
            <h3>Página nao encontrada</h3>
            <p>A página que você procura não existe, foi removida ou o endereço digitado está incorreto.<br />
                Volte ao início deste website ou navegue utilizando os links e menus disponíveis para encontar o conteúdo desejado.</p>
            <a class="btn btn-warning btn-sm" href="<?= home_url('/') ?>"><i class="fas fa-undo mr-2"></i>Voltar para página inicial</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <p class="mb-2"><i class="far fa-lightbulb mr-2"></i>Você também pode utilizar este <strong>campo de busca</strong> a seguir para tentar enontrar a página desejada.</p>
            <form action=" <?= home_url('/') ?> " method="get">
                <input type="hidden" name="post_type" value="post">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" name="s" id="search" placeholder="Página ou assunto desejado">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary btn-sm" type="button" id="button-addon2"><i class="fas fa-search mr-2"></i>Procurar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php get_footer() ?>