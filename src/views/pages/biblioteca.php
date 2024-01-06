<?=$render('header', ['loggedUser'=>$loggedUser]);?>
    <div class="modal_addArquivo" id="modal_addArquivo">
        <form class="form_addArquivo" method="POST" action="<?=$base;?>/astrobiblioteca" enctype="multipart/form-data">
            <div class="modal_addArquivo_content">
                <div class="addArquivo_left">
                    <h3>PUBLIQUE SEU ARQUIVO:</h3>
                    <div class="addArquivo_left_area_input">
                        <input class="addArquivo_input_tittle" placeholder="Título" type="text" name="titulo" required="">
                        <select class="addArquivo_select_categoria" name="categoria">
                            <option>Tutorial</option>
                            <option>Artigo</option>
                        </select>
                        <div class="addArquivo_input_img_div">
                            <label class="addArquivo_input_img">
                                <input id="feed-new-produto" type="file" name="arquivo">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="addArquivo_right">
                    <div class="addArquivo_right_1 show_Step" id="addArquivo_right_1">
                        <h3>Descreva o Arquivo:</h3>
                        <div class="addArquivo_input_area1">
                            <textarea class="addArquivo_input_descricao" placeholder="Descrição" name="descricao" required=""></textarea>
                        </div>
                        <div class="addArquivo_right_2_btn">
                        <button class="btn_send_arquivo_form">ENVIAR</button>
                    </div>
                    </div>
                </div>
            </div>
        </form>
        <button class="btn_close_arquivo_form" onclick="popupAstrobiblioteca()" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>
    <div class="model_bibliotecaItem">
        <div class="astrobiblioteca-div">
            <a class="astrobiblioteca-div-link" href="">
                <img class="astrobiblioteca-div-imagem-item" src="">
            </a>
            <div class="astrobiblioteca-div-tittle">
                <h3 class="tituloArquivo"></h3>
            </div>
        </div>
    </div>

    <section class="galeria-biblioteca-loja-background">

        <section class="container galeria-biblioteca-loja-container">

            <h1 class="page-tittle">Astro<b>Biblioteca</b></h1>

            <section class="galeria-biblioteca-loja-section">
                
                <section class="g-b-l-section-left">
                    
                    <div class="g-b-l-div-upload">
                        <h3>COMPARTILHE CONHECIMENTO:</h3>
                        <P>Adicionar Arquivo.</P>
                        <button onclick="popupAstrobiblioteca()">ADICIONAR ARQUIVO</button>
                    </div>

                    <div class="g-b-l-propaganda-div">
                        <img src="http://localhost/devsbook/public/assets/images/propaganda_g_b_l.jpg">
                    </div>

                    <div class="g-b-l-propaganda-div">
                        <img src="http://localhost/devsbook/public/assets/images/propaganda_g_b_l.jpg">
                    </div>

                </section>

                <section class="g-b-l-section-right">
                    
                    <div class="g-b-l-section-right-search">
                        <input class="input-search-name" placeholder="Buscar Produto" type="text" name="" id="inputConteudo" onkeyup ="filtrarFeed()">
                        <select class="input-search-categoria" placeholder="Categoria" id="selectCategoria" onchange="filtrarFeed()">
                            <option value="">Todos</option>
                            <option>Tutorial</option>
                            <option>Artigo</option>
                        </select>
                    </div>

                    <section class="g-b-l-vitrine">
                        
                    </section>

                </section>

            </section>

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
</body>

<?=$render('footer')?>

<script type="text/javascript">

    async function filtrarFeed() {
        var categoria = document.getElementById('selectCategoria').value;
        var conteudo = document.getElementById('inputConteudo').value;

        const data = await fetchArquivos(categoria, conteudo);

        document.querySelector('.g-b-l-vitrine').innerHTML = "";

        await data['arquivos'].map((item, index) => {

            let itemArquivo = document.querySelector('.astrobiblioteca-div').cloneNode(true);
            //let itemProdutoDiv = document.querySelector('.astroloja-div');

            //itemArquivo.setAttribute('href', `./produto/?id=${item.id}`);
            //itemProdutoDiv.setAttribute('data-key', index);
            itemArquivo.querySelector('.astrobiblioteca-div-link').setAttribute('href', `./arquivo/?id=${item.id}`);
            itemArquivo.querySelector('.astrobiblioteca-div-imagem-item').src = './media/uploads/capa_8_35.jpg';
            itemArquivo.querySelector('.tituloArquivo').innerHTML = item.titulo;
            //itemArquivo.querySelector('.cidadeProduto').innerHTML = item.cidade;
            //itemArquivo.querySelector('.produto-preco').innerHTML =  item.valor;

            document.querySelector('.g-b-l-vitrine').append(itemArquivo);
        })

        console.log(data);
    }
    
    function popupAstrobiblioteca() {
        var popup = document.getElementById('modal_addArquivo');

        if (<?php echo json_encode($loggedUser->id); ?> !== 'null') {
            if (!popup.classList.contains('show_modal_addArquivo')) {
                popup.classList.add('show_modal_addArquivo');
            } else {
                popup.classList.remove('show_modal_addArquivo');
            }
        } else {
            window.location.href = BASE+'/login';
        }
    }

    window.onload = async function () {
        var categoria = document.getElementById('selectCategoria').value;
        var conteudo = document.getElementById('inputConteudo').value;

        const data = await fetchArquivos(categoria, conteudo);

        await data['arquivos'].map((item, index) => {

            let itemArquivo = document.querySelector('.astrobiblioteca-div').cloneNode(true);
            //let itemProdutoDiv = document.querySelector('.astroloja-div');

            //itemArquivo.setAttribute('href', `./produto/?id=${item.id}`);
            //itemProdutoDiv.setAttribute('data-key', index);
            itemArquivo.querySelector('.astrobiblioteca-div-link').setAttribute('href', `./arquivo/?id=${item.id}`);
            itemArquivo.querySelector('.astrobiblioteca-div-imagem-item').src = './media/uploads/capa_8_35.jpg';
            itemArquivo.querySelector('.tituloArquivo').innerHTML = item.titulo;
            //itemArquivo.querySelector('.cidadeProduto').innerHTML = item.cidade;
            //itemArquivo.querySelector('.produto-preco').innerHTML =  item.valor;

            document.querySelector('.g-b-l-vitrine').append(itemArquivo);
        })

        console.log(data);
    }

    //busca arquivos
    const fetchArquivos = async (categoria, conteudo) => {
        const apiResponse = await fetch(`<?=$base;?>/biblioteca/arquivos/?categoria=${categoria}&conteudo=${conteudo}`);

        if (apiResponse.status == 200) {
            const data = await apiResponse.json();
            return data;
        }
    }

</script>