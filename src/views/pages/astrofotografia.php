<?=$render('header', ['loggedUser'=>$loggedUser]);?>
<section class="sec-principal-fotografia" id="sec-principal-fotografia" data-id="<?=$infoAstrofotografia->id;?>">
	<section class="principal-fotografia">
		<div class="div-obj-categoria">
			<h1><?= $infoAstrofotografia->objeto.' | '.$infoAstrofotografia->categoria; ?></h1>
		</div>
		<section class="div-info-img">
			<section class="sec-infos-fotografia">
				<div class="div-titulo-descricao-fotografia">
					<h1 class="titulo-fotografia"><?= $infoAstrofotografia->titulo; ?></h1>
					<p class="descricao-fotografia"><?= $infoAstrofotografia->descricao; ?></p>
				</div>
				<section class="sec-visu-like-btnLike-fotografia">
					<div class="div-visu-like-fotografia">
						<div class="visu-fotografia">
							<i class="fa fa-eye" aria-hidden="true"></i>
							<span id="visuSpan"><?= $infoAstrofotografia->visualizacao; ?></span>
						</div>
						<div class="like-fotografia">
							<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
							<span id="likeQuantidade"><?= $infoAstrofotografia->likeCount; ?></span>
						</div>
					</div>
					<button class="btnCurtirComentar-fotografia <?=($infoAstrofotografia->liked ? 'on':'');?>" id="btnCurtirFotografia"><?=($infoAstrofotografia->liked ? 'Descurtir':'Curtir');?></button>
				</section>
				<div>
					<div class="cidade-fotografia">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
						<span><?= $infoAstrofotografia->cidade; ?>/<?= $infoAstrofotografia->estado; ?> | <?= $infoAstrofotografia->pais; ?></span>
					</div>
					<span><?= $infoAstrofotografia->data; ?></span>
				</div>
				<div class="autor-fotografia">
					<img class="autor-fotografia-avatar" src="<?=$base;?>/media/avatars/<?=$infoAstrofotografia->user->avatar;?>" />
					<a href="<?=$base;?>/perfil/<?=$infoAstrofotografia->user->id;?>"><span class="fidi-name"><?=$infoAstrofotografia->user->name;?></span></a>
					<?php if($infoAstrofotografia->mine): ?>
					<div class="linkExcluir-Astrofotografia">
		            <a href="<?=$base?>/astrofotografia/<?=$infoAstrofotografia->id?>/delete">Excluir</a>
		            </div>
		            <?php endif; ?>
				</div>
			</section>
			<img class="imagem-principal" src="<?= $base; ?>/media/uploads/<?= $infoAstrofotografia->imagem; ?>">
		</section>
	</section>
	<section class="section-ficha-background">
		<section class="section-ficha">
			<div class="ficha-tecnica-title">
				<h1>FICHA TÉCNICA</h1>
			</div>
			<section class="sec-infos-tecnicas-fotografia">
				<?php
					if ($infoAstrofotografia->descricao) {
						echo '<p class="descricao-fichaTec">' . $infoAstrofotografia->descricao . "</p>";
					}
				?>
				<?php
					if ($infoAstrofotografia->categoria) {
						echo '<div class="div-info-tecnica">
    						<h3>Categoria:</h3>
    						<p>' . $infoAstrofotografia->categoria . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->objeto) {
						echo '<div class="div-info-tecnica">
    						<h3>Objeto:</h3>
    						<p>' . $infoAstrofotografia->objeto . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->telescopio) {
						echo '<div class="div-info-tecnica">
    						<h3>Telescópio:</h3>
    						<p>' . $infoAstrofotografia->telescopio . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->telescopio_guia) {
						echo '<div class="div-info-tecnica">
    						<h3>Telescópio Guia:</h3>
    						<p>' . $infoAstrofotografia->telescopio_guia . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->montagem) {
						echo '<div class="div-info-tecnica">
    						<h3>Montagem:</h3>
    						<p>' . $infoAstrofotografia->montagem . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->camera) {
						echo '<div class="div-info-tecnica">
    						<h3>Câmera:</h3>
    						<p>' . $infoAstrofotografia->camera . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->camera_guia) {
						echo '<div class="div-info-tecnica">
    						<h3>Câmera Guia:</h3>
    						<p>' . $infoAstrofotografia->camera_guia . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->oculares) {
						echo '<div class="div-info-tecnica">
    						<h3>Oculares:</h3>
    						<p>' . $infoAstrofotografia->oculares . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->barlows) {
						echo '<div class="div-info-tecnica">
    						<h3>Barlows:</h3>
    						<p>' . $infoAstrofotografia->barlows . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->filtros) {
						echo '<div class="div-info-tecnica">
    						<h3>Filtros:</h3>
    						<p>' . $infoAstrofotografia->filtros . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->redutor_focal) {
						echo '<div class="div-info-tecnica">
    						<h3>Redutor Focal:</h3>
    						<p>' . $infoAstrofotografia->redutor_focal . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->fonte_de_dados) {
						echo '<div class="div-info-tecnica">
    						<h3>Fonte de Dados:</h3>
    						<p>' . $infoAstrofotografia->fonte_de_dados . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->software) {
						echo '<div class="div-info-tecnica">
    						<h3>Software:</h3>
    						<p>' . $infoAstrofotografia->software . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->quantidade_de_frames) {
						echo '<div class="div-info-tecnica">
    						<h3>Quantidade de Frâmes:</h3>
    						<p>' . $infoAstrofotografia->quantidade_de_frames . '</p>
						</div>';
					}
				?>
				<?php
					if ($infoAstrofotografia->tempo_de_exposicao) {
						echo '<div class="div-info-tecnica">
    						<h3>Tempo de Exposição:</h3>
    						<p>' . $infoAstrofotografia->tempo_de_exposicao . ' Segundos</p>
						</div>';
					}
				?>
			</section>
		</section>
	</section>
	<section class="section-comentarios-background">
		<section class="section-comentarios">
			<div class="comentarios-title">
				<h1>COMENTÁRIOS</h1>
			</div>
			<div id="commentArea" class="commentArea">
				<?php foreach($infoAstrofotografia->comments as $item): ?>
                    <div class="comentarioSingle">
                        <div>
                            <a href="<?=$base;?>/perfil/<?=$item['user']['id'];?>"><img src="<?=$base;?>/media/avatars/<?=$item['user']['avatar'];?>" /></a>
                        </div>
                        <div class="comentarioContent">
                            <a href="<?=$base;?>/perfil/<?=$item['user']['id'];?>"><?=$item['user']['name'];?></a>
                            <p class="comentarioBody"><?=$item['body'];?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
			</div>
			<section class="section-comentarios-fotografia">
				<section class="section-comentar-fotografia">
					<p>Deixe seu comentário:</p>
						<div class="comentario-form">
							<textarea id="comentarioArea" placeholder="Escreva aqui seu comentário."></textarea>
							<button id="btnComentarFotografia" class="btnCurtirComentar-fotografia">COMENTAR</button>
						</div>
					</div>
				</section>
			</section>
		</section>
	</section>
</section>

</body>

<?=$render('footer');?>

<script type="text/javascript">
	
	var btnCurtirFotografia = document.getElementById('btnCurtirFotografia');
	var btnComentarFotografia = document.getElementById('btnComentarFotografia');

	btnCurtirFotografia.addEventListener('click', ()=>{

		if (<?php echo json_encode($loggedUser->id); ?> !== 'null') {
			var id = document.getElementById('sec-principal-fotografia').getAttribute('data-id');
			var likeQuantidade = document.getElementById('likeQuantidade');
			var count = parseInt(likeQuantidade.innerText);

			if (btnCurtirFotografia.classList.contains('on') === false) {
				btnCurtirFotografia.classList.add('on');
				likeQuantidade.innerText = ++count;
				btnCurtirFotografia.innerText = 'Descurtir';
			} else {
				btnCurtirFotografia.classList.remove('on');
				likeQuantidade.innerText = --count;
				btnCurtirFotografia.innerText = 'Curtir';
			}

			fetch(BASE+'/ajax/likeAstrofotografia/'+id);
		} else {
			window.location.href = BASE+'/login';
		}

	});

	window.addEventListener("load", () => {
		var id = document.getElementById('sec-principal-fotografia').getAttribute('data-id');
		var visualizacao = parseInt(document.getElementById('visuSpan').innerText);

	 	fetch(BASE+'/ajax/addVisuAstrofotografia/'+id+'/'+visualizacao);

	});

	btnComentarFotografia.addEventListener('click', async ()=>{
		var id = document.getElementById('sec-principal-fotografia').getAttribute('data-id');
		var comentarioConteudo = document.getElementById('comentarioArea').value;
		var commentArea = document.getElementById('commentArea');

		if (<?php echo json_encode($loggedUser->id); ?> !== 'null') {
			if (comentarioConteudo) {
				var data = new FormData();
				data.append('id', id);
				data.append('comentarioConteudo', comentarioConteudo);

				let req = await fetch(BASE+'/ajax/commentAstrofotografia', {
					method: 'POST',
					body: data
				});

				let json = await req.json();

				if (json.error == '') {
					let htmlComment = '<div class="comentarioSingle">';
	                    htmlComment += '<div class="">';
	                    htmlComment += '<a href="'+BASE+json.link+'"><img src="'+BASE+json.avatar+'" /></a>';
	                    htmlComment += '</div>';
	                    htmlComment += '<div class="comentarioContent">';
	                    htmlComment += '<a href="'+BASE+json.link+'">'+json.name+'</a>';
	                    htmlComment += '<p class="comentarioBody">'+json.body+'</p>';
	                    htmlComment += '</div>';
	                    htmlComment += '</div>';

	                    commentArea.innerHTML += htmlComment;
				}
			}
		} else {
			window.location.href = BASE+'/login';
		}
	});



</script>

</html>