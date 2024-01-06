<?=$render('header', ['loggedUser'=>$loggedUser]);?>
    
    <section>
        
    <section class="home-welcome-banner">

        <section class="container main home-welcome-banner-container">

            <section class="home-welcome-banner-left">

                <section class="home-welcome-banner-left-top">

                    <img class="home-welcome-banner-logo" src="<?=$base;?>/assets/images/astroworld_logo.png">

                    <p><b>Astro</b>World é uma plataforma destinada a astronomia e astrofotografia, reunindo em um só lugar funções para quem busca conhecimento, comprar e vender produtos, armazenar e compartilhar astrofotografias e conteúdo.</p>

                    <?php if($loggedUser->id !== 'null'): ?>
                    <div class="home-welcome-banner-mensage">
                        <p class="home_mensage"><b>Obrigado por fazer parte disso!</b></p>
                    </div>
                    <?php endif; ?>

                    <?php if($loggedUser->id == 'null'): ?>
                    <div class="home-welcome-banner-mensage">
                        <p><b>Faça parte:</b></p>
                        <a href="<?=$base;?>/cadastro"><button>INSCREVA-SE</button></a>
                    </div>
                    <?php endif; ?>
                    
                </section>

                <section class="home-welcome-banner-left-bottom">
                    
                    <div class="home-resource-div">
                        <div class="home-resource-div-icon">
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                        </div>
                        <div class="home-resource-div-desc">
                            <h3>Astro<b>Loja</b></h3>
                            <p>Compre e Venda Produtos</p>
                        </div>
                    </div>

                    <div class="home-resource-div">
                        <div class="home-resource-div-icon">
                            <i class="fa fa-picture-o" aria-hidden="true"></i>
                        </div>
                        <div class="home-resource-div-desc">
                            <h3>Astro<b>Galeria</b></h3>
                            <p>Compartilhe Astrofotografias</p>
                        </div>
                    </div>

                    <div class="home-resource-div">
                        <div class="home-resource-div-icon">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </div>
                        <div class="home-resource-div-desc">
                            <h3>Astro<b>Blog</b></h3>
                            <p>Encontre e Escreva Artigos</p>
                        </div>
                    </div>

                    <div class="home-resource-div">
                        <div class="home-resource-div-icon">
                            <i class="fa fa-folder-o" aria-hidden="true"></i>
                        </div>
                        <div class="home-resource-div-desc">
                            <h3><b>Biblioteca</b></h3>
                            <p>Leia e Compartilhe Arquivos</p>
                        </div>
                    </div>

                </section>

            </section>

            <div class="home-welcome-banner-right">
                <img src="http://localhost/devsbook/public/assets/images/co_home.png">
            </div>

        </section>

    </section>

    <!--<section class="home-astroblog">
        
        <section class="container home-astroblog-container">
            
            <h2>Astro<b>Blog</b></h2>

            <section class="home-astroblog-section">

                <div class="home-astroblog-div-1">
                    <div class="div-categoria-astroblog">TUTORIAL</div>
                    <h3 class="home-astroblog-div-title">MEU PRIMEIRO TELESCÓPIO</h3>
                </div>

                <div class="home-astroblog-div-2">
                    <div class="div-categoria-astroblog">TUTORIAL</div>
                    <h3 class="home-astroblog-div-title">MEU PRIMEIRO TELESCÓPIO</h3>
                </div>

                <div class="home-astroblog-div-3">
                    <div class="div-categoria-astroblog">TUTORIAL</div>
                    <h3 class="home-astroblog-div-title">MEU PRIMEIRO TELESCÓPIO</h3>
                </div>

                <div class="home-astroblog-div-4">
                    <div class="div-categoria-astroblog">TUTORIAL</div>
                    <h3 class="home-astroblog-div-title">MEU PRIMEIRO TELESCÓPIO</h3>
                </div>

                <div class="home-astroblog-ads">
                    
                </div>

            </section>

        </section>

    </section>-->

    <section class="home-numeros">
        
        <div class="numero-div">
            <span>+<?= $numeroUsers; ?></span>
            <p>Usuários</p>
        </div>

        <div class="numero-div">
            <span>+<?= $numeroAstrofotografias; ?></span>
            <p>Fotografias</p>
        </div>

        <div class="numero-div">
            <span>+<?= $numeroArquivos; ?></span>
            <p>Arquivos</p>
        </div>

        <div class="numero-div">
            <span>+<?= $numeroProdutos; ?></span>
            <p>Produtos</p>
        </div>

    </section>

    <section class="home-mensagem">
            
            <P>"A ciência é muito mais que um corpo de conhecimentos. É uma maneira de pensar." <b>Carl Sagan</b></P>

    </section>

    <section class="home-astroloja">
        
        <section class="container home-astroloja-container">
                
                <h2>Astro<b>Loja</b></h2>

                <section class="home-astroloja-section">

                    <button id="prevBtn" onclick="prevProduct()" class="btnPrevNext-Product"><</button>

                    <section class="home-astroloja-carrossel-section">

                        <section id="prod-carrossel" class="home-astroloja-carrossel">

                        <a class="link-card-produtoHome" href="<?= $base; ?>/produto/?id=<?=$produtos['produtos'][0]->id;?>">

                            <div class="home-astroloja-div" id="home-astroloja-div">

                                <div class="home-astroloja-div-img">

                                    <div class="home-astroloja-div-img-categoria"><?= $produtos['produtos'][0]->categoria; ?></div>

                                    <img class="home-astroloja-div-imagem-item" src="<?= $base; ?>/media/uploads/<?= $produtos['produtos'][0]->imagem; ?>">

                                </div>

                                <div class="home-astroloja-div-infos">

                                    <div class="home-produto-titulo">
                                        <h3><?= $produtos['produtos'][0]->titulo; ?></h3>
                                    </div>
                                    <div class="home-produto-localizacao">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p><?= $produtos['produtos'][0]->cidade; ?>/<?= $produtos['produtos'][0]->estado; ?> - <?= $produtos['produtos'][0]->pais; ?></p>
                                    </div>
                                    <p class="home-produto-preco">R$ <?= $produtos['produtos'][0]->valor; ?></p>

                                </div>

                            </div>

                        </a>

                        <a class="link-card-produtoHome" href="<?= $base; ?>/produto/?id=<?=$produtos['produtos'][1]->id;?>">

                            <div class="home-astroloja-div">

                                <div class="home-astroloja-div-img">

                                    <div class="home-astroloja-div-img-categoria"><?= $produtos['produtos'][1]->categoria; ?></div>

                                    <img class="home-astroloja-div-imagem-item" src="<?= $base; ?>/media/uploads/<?= $produtos['produtos'][1]->imagem; ?>">

                                </div>

                                <div class="home-astroloja-div-infos">

                                    <div class="home-produto-titulo">
                                        <h3><?= $produtos['produtos'][1]->titulo; ?></h3>
                                    </div>
                                    <div class="home-produto-localizacao">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p><?= $produtos['produtos'][1]->cidade; ?>/<?= $produtos['produtos'][1]->estado; ?> - <?= $produtos['produtos'][1]->pais; ?></p>
                                    </div>
                                    <p class="home-produto-preco">R$ <?= $produtos['produtos'][1]->valor; ?></p>

                                </div>

                            </div>

                        </a>

                        <a class="link-card-produtoHome" href="<?= $base; ?>/produto/?id=<?=$produtos['produtos'][2]->id;?>">

                            <div class="home-astroloja-div">

                                <div class="home-astroloja-div-img">

                                    <div class="home-astroloja-div-img-categoria"><?= $produtos['produtos'][2]->categoria; ?></div>

                                    <img class="home-astroloja-div-imagem-item" src="<?= $base; ?>/media/uploads/<?= $produtos['produtos'][2]->imagem; ?>">

                                </div>

                                <div class="home-astroloja-div-infos">

                                    <div class="home-produto-titulo">
                                        <h3><?= $produtos['produtos'][2]->titulo; ?></h3>
                                    </div>
                                    <div class="home-produto-localizacao">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p><?= $produtos['produtos'][2]->cidade; ?>/<?= $produtos['produtos'][2]->estado; ?> - <?= $produtos['produtos'][2]->pais; ?></p>
                                    </div>
                                    <p class="home-produto-preco">R$ <?= $produtos['produtos'][2]->valor; ?></p>

                                </div>

                            </div>

                        </a>

                        <a class="link-card-produtoHome" href="<?= $base; ?>/produto/?id=<?=$produtos['produtos'][3]->id;?>">

                            <div class="home-astroloja-div">

                                <div class="home-astroloja-div-img">

                                    <div class="home-astroloja-div-img-categoria"><?= $produtos['produtos'][3]->categoria; ?></div>

                                    <img class="home-astroloja-div-imagem-item" src="<?= $base; ?>/media/uploads/<?= $produtos['produtos'][3]->imagem; ?>">

                                </div>

                                <div class="home-astroloja-div-infos">

                                    <div class="home-produto-titulo">
                                        <h3><?= $produtos['produtos'][3]->titulo; ?></h3>
                                    </div>
                                    <div class="home-produto-localizacao">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p><?= $produtos['produtos'][3]->cidade; ?>/<?= $produtos['produtos'][3]->estado; ?> - <?= $produtos['produtos'][3]->pais; ?></p>
                                    </div>
                                    <p class="home-produto-preco">R$ <?= $produtos['produtos'][3]->valor; ?></p>

                                </div>

                            </div>

                        </a>

                        <a class="link-card-produtoHome" href="<?= $base; ?>/produto/?id=<?=$produtos['produtos'][4]->id;?>">

                            <div class="home-astroloja-div">

                                <div class="home-astroloja-div-img">

                                    <div class="home-astroloja-div-img-categoria"><?= $produtos['produtos'][4]->categoria; ?></div>

                                    <img class="home-astroloja-div-imagem-item" src="<?= $base; ?>/media/uploads/<?= $produtos['produtos'][4]->imagem; ?>">

                                </div>

                                <div class="home-astroloja-div-infos">

                                    <div class="home-produto-titulo">
                                        <h3><?= $produtos['produtos'][4]->titulo; ?></h3>
                                    </div>
                                    <div class="home-produto-localizacao">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p><?= $produtos['produtos'][4]->cidade; ?>/<?= $produtos['produtos'][4]->estado; ?> - <?= $produtos['produtos'][4]->pais; ?></p>
                                    </div>
                                    <p class="home-produto-preco">R$ <?= $produtos['produtos'][4]->valor; ?></p>

                                </div>

                            </div>

                        </a>

                        <a class="link-card-produtoHome" href="<?= $base; ?>/produto/?id=<?=$produtos['produtos'][0]->id;?>">

                            <div class="home-astroloja-div">

                                <div class="home-astroloja-div-img">

                                    <div class="home-astroloja-div-img-categoria"><?= $produtos['produtos'][0]->categoria; ?></div>

                                    <img class="home-astroloja-div-imagem-item" src="<?= $base; ?>/media/uploads/<?= $produtos['produtos'][0]->imagem; ?>">

                                </div>

                                <div class="home-astroloja-div-infos">

                                    <div class="home-produto-titulo">
                                        <h3><?= $produtos['produtos'][0]->titulo; ?></h3>
                                    </div>
                                    <div class="home-produto-localizacao">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p><?= $produtos['produtos'][0]->cidade; ?>/<?= $produtos['produtos'][0]->estado; ?> - <?= $produtos['produtos'][0]->pais; ?></p>
                                    </div>
                                    <p class="home-produto-preco">R$ <?= $produtos['produtos'][0]->valor; ?></p>

                                </div>

                            </div>

                        </a>

                        <a class="link-card-produtoHome" href="<?= $base; ?>/produto/?id=<?=$produtos['produtos'][1]->id;?>">

                            <div class="home-astroloja-div">

                                <div class="home-astroloja-div-img">

                                    <div class="home-astroloja-div-img-categoria"><?= $produtos['produtos'][1]->categoria; ?></div>

                                    <img class="home-astroloja-div-imagem-item" src="<?= $base; ?>/media/uploads/<?= $produtos['produtos'][1]->imagem; ?>">

                                </div>

                                <div class="home-astroloja-div-infos">

                                    <div class="home-produto-titulo">
                                        <h3><?= $produtos['produtos'][1]->titulo; ?></h3>
                                    </div>
                                    <div class="home-produto-localizacao">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p><?= $produtos['produtos'][1]->cidade; ?>/<?= $produtos['produtos'][1]->estado; ?> - <?= $produtos['produtos'][1]->pais; ?></p>
                                    </div>
                                    <p class="home-produto-preco">R$ <?= $produtos['produtos'][1]->valor; ?></p>

                                </div>

                            </div>

                        </a>

                        <a class="link-card-produtoHome" href="<?= $base; ?>/produto/?id=<?=$produtos['produtos'][2]->id;?>">

                            <div class="home-astroloja-div">

                                <div class="home-astroloja-div-img">

                                    <div class="home-astroloja-div-img-categoria"><?= $produtos['produtos'][2]->categoria; ?></div>

                                    <img class="home-astroloja-div-imagem-item" src="<?= $base; ?>/media/uploads/<?= $produtos['produtos'][2]->imagem; ?>">

                                </div>

                                <div class="home-astroloja-div-infos">

                                    <div class="home-produto-titulo">
                                        <h3><?= $produtos['produtos'][2]->titulo; ?></h3>
                                    </div>
                                    <div class="home-produto-localizacao">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p><?= $produtos['produtos'][2]->cidade; ?>/<?= $produtos['produtos'][2]->estado; ?> - <?= $produtos['produtos'][2]->pais; ?></p>
                                    </div>
                                    <p class="home-produto-preco">R$ <?= $produtos['produtos'][2]->valor; ?></p>

                                </div>

                            </div>

                        </a>

                        <a class="link-card-produtoHome" href="<?= $base; ?>/produto/?id=<?=$produtos['produtos'][3]->id;?>">

                            <div class="home-astroloja-div">

                                <div class="home-astroloja-div-img">

                                    <div class="home-astroloja-div-img-categoria"><?= $produtos['produtos'][3]->categoria; ?></div>

                                    <img class="home-astroloja-div-imagem-item" src="<?= $base; ?>/media/uploads/<?= $produtos['produtos'][3]->imagem; ?>">

                                </div>

                                <div class="home-astroloja-div-infos">

                                    <div class="home-produto-titulo">
                                        <h3><?= $produtos['produtos'][3]->titulo; ?></h3>
                                    </div>
                                    <div class="home-produto-localizacao">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p><?= $produtos['produtos'][3]->cidade; ?>/<?= $produtos['produtos'][3]->estado; ?> - <?= $produtos['produtos'][3]->pais; ?></p>
                                    </div>
                                    <p class="home-produto-preco">R$ <?= $produtos['produtos'][3]->valor; ?></p>

                                </div>

                            </div>

                        </a>

                    </section>
                        
                    </section>

                    <button id="nextBtn" onclick="nextProduct()" class="btnPrevNext-Product">></button>

                </section>

        </section>

        <section class="btnMobile-area">
            
            <button id="prevBtnMobile" onclick="prevProduct()" class="btnPrevNext-Product-mobile"><</button>

            <a href="<?=$base;?>/astroloja"><button class="btnAstrolojaHome">MAIS PRODUTOS</button></a>

            <button id="nextBtnMobile" onclick="nextProduct()" class="btnPrevNext-Product-mobile">></button>

        </section>

    </section>

    <section class="home-astrogaleria">
        
        <section class="container home-astrogaleria-container">

            <h2>Astro<b>Galeria</b></h2>

            <section class="home-astrogaleria-section-center">

                <section class="home-astrogaleria-section">
                
                    <a class="home-astrogaleria-div-1" href="<?= $base; ?>/astrofotografia/?id=<?=$astrofotografias['astrofotografias'][0]->id;?>">
                        <img class="home-astrogaleria-img" src="<?= $base; ?>/media/uploads/<?= $astrofotografias['astrofotografias'][0]->imagem; ?>">
                        <div class="astrogaleria-div-hover-1">
                            <p><?= $astrofotografias['astrofotografias'][0]->titulo; ?></p>
                        </div>
                    </a>

                    <a class="home-astrogaleria-div-2" href="<?= $base; ?>/astrofotografia/?id=<?=$astrofotografias['astrofotografias'][1]->id;?>">
                        <img class="home-astrogaleria-img" src="<?= $base; ?>/media/uploads/<?= $astrofotografias['astrofotografias'][1]->imagem; ?>">
                        <div class="astrogaleria-div-hover-1">
                            <p><?= $astrofotografias['astrofotografias'][1]->titulo; ?></p>
                        </div>
                    </a>

                    <a class="home-astrogaleria-div-3" href="<?= $base; ?>/astrofotografia/?id=<?=$astrofotografias['astrofotografias'][2]->id;?>">
                        <img class="home-astrogaleria-img" src="<?= $base; ?>/media/uploads/<?= $astrofotografias['astrofotografias'][2]->imagem; ?>">
                        <div class="astrogaleria-div-hover-1">
                            <p><?= $astrofotografias['astrofotografias'][2]->titulo; ?></p>
                        </div>
                    </a>

                    <a class="home-astrogaleria-div-4" href="<?= $base; ?>/astrofotografia/?id=<?=$astrofotografias['astrofotografias'][3]->id;?>">
                        <img class="home-astrogaleria-img" src="<?= $base; ?>/media/uploads/<?= $astrofotografias['astrofotografias'][3]->imagem; ?>">
                        <div class="astrogaleria-div-hover-1">
                            <p><?= $astrofotografias['astrofotografias'][3]->titulo; ?></p>
                        </div>
                    </a>

                    <a class="home-astrogaleria-div-5" href="<?= $base; ?>/astrofotografia/?id=<?=$astrofotografias['astrofotografias'][4]->id;?>">
                        <img class="home-astrogaleria-img" src="<?= $base; ?>/media/uploads/<?= $astrofotografias['astrofotografias'][4]->imagem; ?>">
                        <div class="astrogaleria-div-hover-1">
                            <p><?= $astrofotografias['astrofotografias'][4]->titulo; ?></p>
                        </div>
                    </a>

                    <a class="home-astrogaleria-div-6" href="<?= $base; ?>/astrofotografia/?id=<?=$astrofotografias['astrofotografias'][5]->id;?>">
                        <img class="home-astrogaleria-img" src="<?= $base; ?>/media/uploads/<?= $astrofotografias['astrofotografias'][5]->imagem; ?>">
                        <div class="astrogaleria-div-hover-1">
                            <p><?= $astrofotografias['astrofotografias'][5]->titulo; ?></p>
                        </div>
                    </a>
                    
                </section>

            </section>
            
        </section>

        <a href="<?=$base;?>/astrogaleria"><button>MAIS IMAGENS</button></a>

    </section>

    <section class="home-astrobiblioteca">

        <section class="container home-astrobiblioteca-container">

            <h2>Astro<b>Biblioteca</b></h2>

            <section class="home-astrobiblioteca-section-center">
                
                <section class="home-astrobiblioteca-section">

                    <a class="home-astrobiblioteca-div" href="<?= $base; ?>/arquivo/?id=<?=$arquivos['arquivos'][0]->id;?>">
                        
                        <img src="<?=$base;?>/assets/images/livro.jpg">
                        
                        <div class="home-astrobiblioteca-div-tittle">
                            <h3><?= $arquivos['arquivos'][0]->titulo; ?></h3>
                        </div>
                        
                    </a>

                    <a class="home-astrobiblioteca-div" href="<?= $base; ?>/arquivo/?id=<?=$arquivos['arquivos'][1]->id;?>">
                        
                        <img src="<?=$base;?>/assets/images/livro.jpg">
                        
                        <div class="home-astrobiblioteca-div-tittle">
                            <h3><?= $arquivos['arquivos'][1]->titulo; ?></h3>
                        </div>
                        
                    </a>

                    <a class="home-astrobiblioteca-div" href="<?= $base; ?>/arquivo/?id=<?=$arquivos['arquivos'][2]->id;?>">
                        
                        <img src="<?=$base;?>/assets/images/livro.jpg">
                        
                        <div class="home-astrobiblioteca-div-tittle">
                            <h3><?= $arquivos['arquivos'][2]->titulo; ?></h3>
                        </div>
                        
                    </a>

                    <a class="home-astrobiblioteca-div" href="<?= $base; ?>/arquivo/?id=<?=$arquivos['arquivos'][3]->id;?>">
                        
                        <img src="<?=$base;?>/assets/images/livro.jpg">
                        
                        <div class="home-astrobiblioteca-div-tittle">
                            <h3><?= $arquivos['arquivos'][3]->titulo; ?></h3>
                        </div>
                        
                    </a>
                    
                </section>
            
            </section>
            
        </section>

        <a href="<?=$base;?>/biblioteca"><button>VISITAR BIBLIOTECA</button></a>
        
    </section>

    </section>

    <div class="modal">
        <div class="modal-inner">
            <a rel="modal:close">&times;</a>
            <div class="modal-content"></div>
        </div>
    </div>
    <script type="text/javascript">
    const BASE = '<?=$base;?>';
    </script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/script.js"></script>
    <script type="text/javascript" src="<?=$base;?>/assets/js/vanillaModal.js"></script>
    <script type="text/javascript">
        
        /*function nextProduct() {

            var carrossel = document.getElementById('prod-carrossel');
            var estiloCarrossel = window.getComputedStyle(carrossel);
            var valorTransform = estiloCarrossel.getPropertyValue('transform');
            var valorDx = parseFloat(valorTransform.split(', ')[4]);
            var novoValorDx = valorDx + 205;

            console.log(valorDx);

            carrossel.style.transform = "translateX("+novoValorDx+"px)"
        }

        function prevProduct() {

            var carrossel = document.getElementById('prod-carrossel');
            var estiloCarrossel = window.getComputedStyle(carrossel);
            var valorTransform = estiloCarrossel.getPropertyValue('transform');
            var valorDx = parseFloat(valorTransform.split(', ')[4]);
            var novoValorDx = valorDx - 205;

            console.log(valorDx);

            carrossel.style.transform = "translateX("+novoValorDx+"px)"
        }*/

        function nextProduct() {

            var carrossel = document.getElementById('prod-carrossel');
            var estiloCarrossel = window.getComputedStyle(carrossel);
            var valorLeft = parseFloat(estiloCarrossel.getPropertyValue('left'));

            var cardCarrossel = document.getElementById('home-astroloja-div');
            var estiloCardCarrossel = window.getComputedStyle(cardCarrossel);
            var valorSlide = parseFloat(estiloCardCarrossel.getPropertyValue('width'));

            var novoValorleft = valorLeft - 15 - valorSlide;
            var nextBtn = document.getElementById('nextBtn');
            var nextBtnMobile = document.getElementById('nextBtnMobile');
            var maxLeft = -1025;

            if (valorLeft > maxLeft) {
                nextBtn.classList.add('btnTransicao');
                nextBtnMobile.classList.add('btnTransicao');

                console.log(valorLeft);
                console.log(novoValorleft);

                carrossel.style.left = novoValorleft + "px";

                carrossel.addEventListener('transitionend', function() {
                    nextBtn.classList.remove('btnTransicao');
                    nextBtnMobile.classList.remove('btnTransicao');
                });
            }
        }

        function prevProduct() {

            var carrossel = document.getElementById('prod-carrossel');
            var estiloCarrossel = window.getComputedStyle(carrossel);
            var valorLeft = parseFloat(estiloCarrossel.getPropertyValue('left'));

            var cardCarrossel = document.getElementById('home-astroloja-div');
            var estiloCardCarrossel = window.getComputedStyle(cardCarrossel);
            var valorSlide = parseFloat(estiloCardCarrossel.getPropertyValue('width'));

            var novoValorleft = valorLeft + 15 + valorSlide;
            var prevBtn = document.getElementById('prevBtn');
            var prevBtnMobile = document.getElementById('prevBtnMobile');

            if (valorLeft < 0) {
                prevBtn.classList.add('btnTransicao');
                prevBtnMobile.classList.add('btnTransicao');

                console.log(valorLeft);
                console.log(novoValorleft);

                carrossel.style.left = novoValorleft + "px";

                carrossel.addEventListener('transitionend', function() {
                    prevBtn.classList.remove('btnTransicao');
                    prevBtnMobile.classList.remove('btnTransicao');
                });
            }
        }

    </script>
</body>

<?=$render('footer');?>