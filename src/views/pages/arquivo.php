<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<section class="sec-principal-arquivo" id="sec-principal-arquivo" data-id="<?=$infoArquivo->id;?>">
	<section class="principal-arquivo">
		<div class="div-obj-categoria">
			<h1><?=$infoArquivo->categoria;?></h1>
		</div>
		<section class="div-info-arquivo">
			<section class="sec-infos-arquivo">
				<div class="div-titulo-descricao-arquivo">
					<h1 class="titulo-arquivo"><?= $infoArquivo->titulo; ?></h1>
					<p><?= $infoArquivo->descricao; ?></p>
				</div>
				<div>
					<div class="cidade-fotografia">
						<div>
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<span><?= $infoArquivo->created_at; ?></span>
						</div>
						<div class="visu_download_arquivo">
							<div>
								<i class="fa fa-eye" aria-hidden="true"></i>
								<span id="visuSpan"><?= $infoArquivo->visualizacao;?></span>
							</div>
							<div>
								<i class="fa fa-download" aria-hidden="true"></i>
								<span id="downloadSpan"><?= $infoArquivo->download;?></span>
							</div>
						</div>
					</div>
				</div>
				<div class="autor-arquivo">
					<img class="autor-fotografia-avatar" src="<?=$base;?>/media/avatars/<?=$infoArquivo->user->avatar;?>" />
					<a href="<?=$base;?>/perfil/<?=$infoArquivo->user->id;?>"><span class="fidi-name"><?=$infoArquivo->user->name;?></span></a>
					<?php if($infoArquivo->mine): ?>
					<div class="linkExcluir-Astrofotografia">
		            <a href="<?=$base?>/arquivo/<?=$infoArquivo->id?>/delete">Excluir</a>
		            </div>
		            <?php endif; ?>
				</div>
			</section>
			<div class="arquivoDiv">
				<img class="tumb-arquivo" src="<?= $base; ?>/media/uploads/capa_8_35.jpg">
				<a class="linkDownload_arquivo" href="<?= $base; ?>/media/uploads/<?= $infoArquivo->arquivo; ?>" download>
					<button onclick="addDownload()" class="btnDownload-arquivo">DOWLOAD</button>
				</a>
			</div>
		</section>
	</section>
</section>

</body>

<?=$render('footer');?>

<script type="text/javascript">

	window.addEventListener("load", () => {
		
		var id = document.getElementById('sec-principal-arquivo').getAttribute('data-id');
		var visualizacao = parseInt(document.getElementById('visuSpan').innerText);

	 	fetch(BASE+'/ajax/addVisuArquivo/'+id+'/'+visualizacao);

	});

	function addDownload() {

		var id = document.getElementById('sec-principal-arquivo').getAttribute('data-id');
		var downloadNumber = document.getElementById('downloadSpan');
		var count = parseInt(downloadNumber.innerText);

		downloadNumber.innerText = ++count;

		fetch(BASE+'/ajax/addqtDownload/'+id+'/'+count);
	}

</script>