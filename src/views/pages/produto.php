<?=$render('header', ['loggedUser'=>$loggedUser]);?>

<section class="modal_backgroud_contatoProduto" id="modal_backgroud_contatoProduto">
	<section class="section-contato-background">
		<section class="section-ficha-produto">
			<div class="modal-contatoProduto-title">
				<p>CONTATOS</p>
			</div>
			<section class="sec-contatos-produto">
				<p class="contato-produto"><?= $infoProduto->contatos ?></p>
			</section>
		</section>
	</section>
	<button class="btn_close_produto_form" onclick="popupContato()" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
</section>

<section class="sec-principal-produto">
	<section class="principal-produto">
		<section class="div-imagem-produto">
			<section id="img-show" class="img-show">
				<img class="imagem-principal-produto" src="<?= $base; ?>/media/uploads/<?= $infoProduto->img1 ?>">
			</section>
			<section class="img-carrossel">

				<?php if ($infoProduto->img1 !== ''): ?>

					<img onclick="imgProdutoShow(this)" value="<?= $infoProduto->img1 ?>" class="imagem-carrossel-produto" src="<?= $base; ?>/media/uploads/<?= $infoProduto->img1 ?>">

				<?php endif; ?>

				<?php if ($infoProduto->img2 !== ''): ?>

					<img onclick="imgProdutoShow(this)" value="<?= $infoProduto->img2 ?>" class="imagem-carrossel-produto" src="<?= $base; ?>/media/uploads/<?= $infoProduto->img2 ?>">

				<?php endif; ?>

				<?php if ($infoProduto->img3 !== ''): ?>

					<img onclick="imgProdutoShow(this)" value="<?= $infoProduto->img3 ?>" class="imagem-carrossel-produto" src="<?= $base; ?>/media/uploads/<?= $infoProduto->img3 ?>">

				<?php endif; ?>

				<?php if ($infoProduto->img4 !== ''): ?>

					<img onclick="imgProdutoShow(this)" value="<?= $infoProduto->img4 ?>" class="imagem-carrossel-produto" src="<?= $base; ?>/media/uploads/<?= $infoProduto->img4 ?>">

				<?php endif; ?>

			</section>
		</section>
		<section class="div-info-produto">
			<div class="div-categoria-produto">
				<?= $infoProduto->categoria; ?>
			</div>
			<h1 class="produto-titulo-single"> <?= $infoProduto->titulo; ?> </h1>
			<div class="cidade-produto">
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				<p><?= $infoProduto->cidade; ?></p>
			</div>
			<div class="produto-contato">
				<div class="div-produto-contato-valor">
					<i class="fa fa-tag" aria-hidden="true"></i>
					<p class="valor-produto">R$ <?= $infoProduto->valor; ?></p>
				</div>
				<button onclick="popupContato()" class="btn-contato-produto">CONTATO</button>
			</div>
			<section class="autor-produto">
				<img class="autor-produto-avatar" src="<?=$base;?>/media/avatars/<?=$infoProduto->user->avatar;?>" />
					<a href="<?=$base;?>/perfil/<?=$infoProduto->user->id;?>"><span class="fidi-name"><?=$infoProduto->user->name;?></span></a>
					<?php if($infoProduto->mine): ?>
					<div class="linkExcluir-Produto">
		            <a href="<?=$base?>/produto/<?=$infoProduto->id?>/delete">Excluir</a>
		            </div>
		            <?php endif; ?>
			</section>
		</section>
	</section>
	<section class="section-ficha-background">
		<section class="section-ficha">
			<div class="ficha-tecnica-title">
				<h1>DESCRIÇÃO</h1>
			</div>
			<section class="sec-infos-tecnicas-produto">
				<?php
					if ($infoProduto->descricao) {
						echo '<p class="descricao-fichaTec">' . $infoProduto->descricao . "</p>";
					}
				?>
			</section>
		</section>
	</section>
</section>
<script type="text/javascript">
	
	function imgProdutoShow(el) {
		var imgNumber = el.getAttribute("value");
		var displayImg = document.getElementById('img-show');

		displayImg.innerHTML = '<img class="imagem-principal-produto" src="<?= $base; ?>/media/uploads/' + imgNumber + '">';
	}

	function popupContato() {
		var popup = document.getElementById('modal_backgroud_contatoProduto');

		if (!popup.classList.contains('show_modal_contatoProduto')) {
        	popup.classList.add('show_modal_contatoProduto');
        } else {
        	popup.classList.remove('show_modal_contatoProduto');
        }
	}

</script>

<?=$render('footer');?>