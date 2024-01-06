<?=$render('header', ['loggedUser'=>$loggedUser]);?>

    <div class="modal_addProduto" id="modal_addProduto">
        <form class="form_addProduto" method="POST" action="<?=$base;?>/astroloja" enctype="multipart/form-data">
            <div class="modal_addProduto_content">
                <div class="addProduto_left">
                    <h3>PUBLIQUE SEU PRODUTO:</h3>
                    <div class="addProduto_left_area_input">
                        <input class="addProduto_input_tittle" placeholder="Título" type="text" name="titulo" required="">
                        <input class="addProduto_input_valor" placeholder="Valor" type="text" id="valor" name="valor" required="">
                        <div class="addProduto_inputs_img">
                            <div class="addProduto_input_img_div">
                                <label class="addProduto_input_img">
                                <input id="feed-new-produto" type="file" name="imagem1" required>
                            </label>
                            </div>
                            <div class="addProduto_input_img_div">
                                <label class="addProduto_input_img">
                                <input id="feed-new-produto" type="file" name="imagem2">
                            </label>
                            </div>
                            <div class="addProduto_input_img_div">
                                <label class="addProduto_input_img">
                                <input id="feed-new-produto" type="file" name="imagem3">
                            </label>
                            </div>
                            <div class="addProduto_input_img_div">
                                <label class="addProduto_input_img">
                                <input id="feed-new-produto" type="file" name="imagem4">
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="addProduto_right">
                    <div class="addProduto_right_1 show_Step" id="addProduto_right_1">
                        <h3>Dados do Produto:</h3>
                        <div class="addProduto_input_area1">
                            <div class="addProduto_input_area1_top">
                                <select name="categoria" class="addProduto_input1_style">
                                    <option value="telescopio">Telescópio</option>
                                    <option value="ocular">Ocular</option>
                                    <option value="montagem">Montagem</option>
                                    <option value="filtro">Filtro</option>
                                    <option value="camera">Câmera</option>
                                </select>
                            </div>
                            <textarea class="addProduto_input_descricao" placeholder="Descrição" name="descricao" required=""></textarea>
                        </div>
                        <button class="btn_next_send_produto_form" type="button" onclick="changeStep()">PRÓXIMO</button>
                    </div>
                    <div class="addProduto_right_2" id="addProduto_right_2">
                        <h3>Dados do Produto:</h3>
                        <div class="addProduto_input_area2">
                            <select class="addAstrofotografia_input1_style" id="selectPais" onchange="buscarEstado()" name="pais">
                                    
                            </select>
                            <select class="addAstrofotografia_input1_style" id="selectEstado" onchange="buscarCidade()" name="estado">
                                <option value="">Estado</option>
                            </select>
                            <select class="addAstrofotografia_input1_style" id="selectCidade" name="cidade">
                                <option value="">Cidade</option>
                            </select>
                                <input class="addAstrofotografia_input2_style" placeholder="Contatos" type="text" name="contatos">
                        </div>
                        <div class="addAstrofotografia_right_2_btn">
                           <button class="btn_back_produto_form" type="button" onclick="changeStep()"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
                           <button class="btn_next_send_produto_form">ENVIAR</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <button class="btn_close_produto_form" onclick="popupAstroloja()" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>

    <div class="model_produtosItem">
        <a class="astroloja-div-link" href="">
            <div class="astroloja-div">
                <div class="astroloja-div-img">
                    <div class="astroloja-div-img-categoria"></div>
                    <img class="astroloja-div-imagem-item" src=""/>
                </div>
                <div class="astroloja-div-infos">
                    <div class="produto-titulo">
                        <h3 class="tituloProduto"></h3>
                    </div>
                    <div class="produto-localizacao">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <p class="cidadeProduto"></p>
                    </div>
                    <p class="produto-preco"></p>
                </div>
            </div>
        </a>
    </div>

    <section class="galeria-biblioteca-loja-background">

        <section class="container galeria-biblioteca-loja-container">

            <h1 class="page-tittle">Astro<b>Loja</b></h1>

            <section class="galeria-biblioteca-loja-section">
                
                <section class="g-b-l-section-left">
                    
                    <div class="g-b-l-div-upload">
                        <h3>VENDA SEU PRODUTO:</h3>
                        <P>Adicionar Produto.</P>
                        <button onclick="popupAstroloja()">ADICIONAR PRODUTO</button>
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
                        <input class="input-search-name" id="inputConteudo" placeholder="Buscar Produto" type="text" name="" onkeyup ="filtrarFeed()">
                        <select class="input-search-categoria" id="selectCategoria" placeholder="Categoria" onchange="filtrarFeed()">
                            <option value="">Todos</option>
                            <option value="telescopio">Telescópio</option>
                            <option value="ocular">Ocular</option>
                            <option value="montagem">Montagem</option>
                            <option value="filtro">Filtro</option>
                            <option value="camera">Câmera</option>
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

        const data = await fetchProdutos(categoria, conteudo);

        document.querySelector('.g-b-l-vitrine').innerHTML = "";

        await data['produtos'].map((item, index) => {

            let itemProduto = document.querySelector('.astroloja-div-link').cloneNode(true);
            //let itemProdutoDiv = document.querySelector('.astroloja-div');

            itemProduto.setAttribute('href', `./produto/?id=${item.id}`);
            //itemProdutoDiv.setAttribute('data-key', index);
            itemProduto.querySelector('.astroloja-div-img-categoria').innerHTML = item.categoria;
            itemProduto.querySelector('.astroloja-div-imagem-item').src = './media/uploads/'+item.imagem;
            itemProduto.querySelector('.tituloProduto').innerHTML = item.titulo;
            itemProduto.querySelector('.cidadeProduto').innerHTML = item.cidade;
            itemProduto.querySelector('.produto-preco').innerHTML =  item.valor;

            document.querySelector('.g-b-l-vitrine').append(itemProduto);
        })

        console.log(data);
    }

    window.onload = async function () {
        var categoria = document.getElementById('selectCategoria').value;
        var conteudo = document.getElementById('inputConteudo').value;

        const data = await fetchProdutos(categoria, conteudo);

        await data['produtos'].map((item, index) => {

            let itemProduto = document.querySelector('.astroloja-div-link').cloneNode(true);
            //let itemProdutoDiv = document.querySelector('.astroloja-div');

            itemProduto.setAttribute('href', `./produto/?id=${item.id}`);
            //itemProdutoDiv.setAttribute('data-key', index);
            itemProduto.querySelector('.astroloja-div-img-categoria').innerHTML = item.categoria;
            itemProduto.querySelector('.astroloja-div-imagem-item').src = './media/uploads/'+item.imagem;
            itemProduto.querySelector('.tituloProduto').innerHTML = item.titulo;
            itemProduto.querySelector('.cidadeProduto').innerHTML = item.cidade;
            itemProduto.querySelector('.produto-preco').innerHTML =  'R$ '+item.valor;

            document.querySelector('.g-b-l-vitrine').append(itemProduto);
        })

        console.log(data);

        const paises = await fetchPaises();

        if(paises) {
            var paisSelect = document.getElementById('selectPais');

            console.log(paises);
            console.log(paisSelect);

            paisSelect.innerHTML = '';

            for (var i = paises.length - 1; i >= 0; i--) {
                //console.log(data.records[i].fields.name);
                paisSelect.insertAdjacentHTML('beforeend', `<option value="${paises[i].iso2}">${paises[i].name}</option>`);
            }
        }
    }

    //buscar paises
    const fetchPaises = async () => {
        var headers = new Headers();
        headers.append("X-CSCAPI-KEY", "bnhtczI0TmFDVzlpWGpYaG5lWHZEcTIwS2piT09aZ2pXeGkxOGZYeA==");

        var requestOptions = {
           method: 'GET',
           headers: headers,
           redirect: 'follow'
        };

        const apiResponse = await fetch("https://api.countrystatecity.in/v1/countries", requestOptions);

        if (apiResponse.status == 200) {
            const data = await apiResponse.json();
            return data;
        }
    }

    async function buscarEstado() {
        const pais = document.getElementById('selectPais').value;

        const estados = await fetchEstados(pais);

        console.log(estados);

        if (estados) {
            var estadoSelect = document.getElementById('selectEstado');
            estadoSelect.innerHTML = '';

            for (var i = estados.length - 1; i >= 0; i--) {
                estadoSelect.insertAdjacentHTML('beforeend', `<option value="${estados[i].iso2}">${estados[i].name}</option>`)
            }
        }
    }

    const fetchEstados = async (pais) => {
        var headers = new Headers();
        headers.append("X-CSCAPI-KEY", "bnhtczI0TmFDVzlpWGpYaG5lWHZEcTIwS2piT09aZ2pXeGkxOGZYeA==");

        var requestOptions = {
           method: 'GET',
           headers: headers,
           redirect: 'follow'
        };

        const apiResponse = await fetch(`https://api.countrystatecity.in/v1/countries/${pais}/states`, requestOptions);

        if (apiResponse.status == 200) {
            const data = await apiResponse.json();
            return data;
        }
    }

    async function buscarCidade() {
        const pais = document.getElementById('selectPais').value;
        const estado = document.getElementById('selectEstado').value;

        const cidades = await fetchCidades(pais, estado);

        console.log(cidades);

        if (cidades) {
            var cidadeSelect = document.getElementById('selectCidade');
            cidadeSelect.innerHTML = '';

            for (var i = cidades.length - 1; i >= 0; i--) {
                cidadeSelect.insertAdjacentHTML('beforeend', `<option value="${cidades[i].name}">${cidades[i].name}</option>`);
            }
        }
    }

    const fetchCidades = async (pais, estado) => {
        var headers = new Headers();
        headers.append("X-CSCAPI-KEY", "bnhtczI0TmFDVzlpWGpYaG5lWHZEcTIwS2piT09aZ2pXeGkxOGZYeA==");

        var requestOptions = {
           method: 'GET',
           headers: headers,
           redirect: 'follow'
        };

        const apiResponse = await fetch(`https://api.countrystatecity.in/v1/countries/${pais}/states/${estado}/cities`, requestOptions);

        if (apiResponse.status == 200) {
            const data = await apiResponse.json();
            return data;
        }
    }

    //buscaProdutos
    const fetchProdutos = async (categoria, conteudo) => {
        const apiResponse = await fetch(`<?=$base;?>/astroloja/produtos/?categoria=${categoria}&conteudo=${conteudo}`);

        if (apiResponse.status == 200) {
            const data = await apiResponse.json();
            return data;
        }
    }

    $(document).ready(function(){
        $("#valor").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    });
    
    function popupAstroloja() {
        var popup = document.getElementById('modal_addProduto');

        if (<?php echo json_encode($loggedUser->id); ?> !== 'null') {
            if (!popup.classList.contains('show_modal_addProduto')) {
                popup.classList.add('show_modal_addProduto');
            } else {
                popup.classList.remove('show_modal_addProduto');
            }
        } else {
            window.location.href = BASE+'/login';
        }
    }

    function changeStep() {
        var step1 = document.getElementById('addProduto_right_1');
        var step2 = document.getElementById('addProduto_right_2');

        if (step1.classList.contains('show_Step')) {
            step1.classList.remove('show_Step');
            step2.classList.add('show_Step');
        } else {
            step1.classList.add('show_Step');
            step2.classList.remove('show_Step');
        }
    }

</script>
