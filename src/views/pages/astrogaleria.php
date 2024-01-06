<?=$render('header', ['loggedUser'=>$loggedUser]);?>

    <div class="modal_addAstrofotografia" id="modal_addAstrofotografia">
    	<form class="form_addAstrofotografia" method="POST" action="<?=$base;?>/astrogaleria" enctype="multipart/form-data">
	        <div class="modal_addAstrofotografia_content">
	            <div class="addAstrofotografia_left">
	                <h3>PUBLIQUE SUA IMAGEM:</h3>
	                <div class="addAstrofotografia_left_area_input">
	                    <input class="addAstrofotografia_input_tittle" placeholder="Título" type="text" name="titulo" required="">
	                    <div class="addAstrofotografia_input_img_div">
	                        <label class="addAstrofotografia_input_img">
	                        <input id="feed-new-astrofotografia" type="file" name="imagem" required="">
	                    </label>
	                    </div>
	                    <textarea class="addAstrofotografia_input_descricao" placeholder="Descrição" name="descricao" required=""></textarea>
	                </div>
	            </div>
	            <div class="addAstrofotografia_right">
	                <div class="addAstrofotografia_right_1 show_Step" id="addAstrofotografia_right_1">
	                    <h3>Dados da Imagem:</h3>
	                    <div class="addAstrofotografia_input_area1">
	                        <select onchange="getObjetos()" id="name" name="categoria" class="addAstrofotografia_input1_style">
                                <option value="Galaxy">Categoria</option>
	                            <option value="Galaxy">Galáxia</option>
                                <option value="Open Cluster">Aglomerado Estelar Aberto</option>
                                <option value="Star">Estrela</option>
                                <option value="Double star">Estrela Dupla</option>
                                <option value="Galaxy Pair">Par de Galáxias</option>
                                <option value="Globular Cluster">Aglomerado Globular</option>
                                <option value="Planetary Nebula">Nebulosa Planetária</option>
                                <option value="Nebula">Nebulosa</option>
                                <option value="HII Ionized region">HII Região Ionizada</option>
                                <option value="Star cluster %2B Nebula">Aglomerado Estelar + Nebulosa</option>
                                <option value="Association of stars">Associação de Estrelas</option>
                                <option value="Reflection Nebula">Nebulosa de Reflexão</option>
                                <option value="Galaxy Triplet">Trio de Galáxias</option>
                                <option value="Nonexistent object">Non-existent Objetct</option>
                                <option value="Emission Nebula">Nebulosa de Emissão</option>
                                <option value="Nova star">Nova</option>
                                <option value="Sistema Solar">Sistema Solar</option>
                                <option value="Paisagem">Paisagem</option>
                                <option value="Outro">Outro</option>
	                        </select>

	                        <select name="objeto" id="objetoSelect" class="addAstrofotografia_input1_style">
	                            <option>Objeto</option>
                                
	                        </select>

                            <input name="objeto" id="objetoInput" class="addAstrofotografia_input1_style hide-Field">

	                        <select name="fonte_dados" class="addAstrofotografia_input1_style">
	                            <option>Fonte de Dados</option>
                                <option>Observatório Próprio</option>
                                <option>Observatório Comercial</option>
                                <option>Banco de Dados</option>
                                <option>Quintal</option>
                                <option>Viagem</option>
	                        </select>
	                        <input class="addAstrofotografia_input1_style" placeholder="Data da Captura" type="date" name="data_captura">
	                        <input class="addAstrofotografia_input1_style" placeholder="Quantidade de Frâmes" type="number" name="quantidade_frames">
	                        <input class="addAstrofotografia_input1_style" placeholder="Tempo de Exposição" type="number" name="exposicao_frames">
                            <select class="addAstrofotografia_input1_style" id="selectPais" onchange="buscarEstado()" name="pais">
                                
                            </select>
                            <select class="addAstrofotografia_input1_style" id="selectEstado" onchange="buscarCidade()" name="estado">
                                <option value="">Estado</option>
                            </select>
                            <select class="addAstrofotografia_input1_style" id="selectCidade" name="cidade">
                                <option value="">Cidade</option>
                            </select>
	                    </div>
	                    <button class="btn_next_send_astrofotografia_form" type="button" onclick="changeStep()">PRÓXIMO</button>
	                </div>
	                <div class="addAstrofotografia_right_2" id="addAstrofotografia_right_2">
	                    <h3>Equipamentos:</h3>
	                    <div class="addAstrofotografia_input_area2">
	                        <input class="addAstrofotografia_input2_style" name="telescopio" placeholder="Telescópio" type="text" name="">
	                        <input class="addAstrofotografia_input2_style" name="camera" placeholder="Câmera" type="text" name="">
	                        <input class="addAstrofotografia_input2_style" name="montagem" placeholder="Montagem" type="text" name="">
	                        <input class="addAstrofotografia_input2_style" name="telescopio_guia" placeholder="Telescópio Guia" type="text" name="">
	                        <input class="addAstrofotografia_input2_style" name="camera_guia" placeholder="Câmera Guia" type="text" name="">
	                        <input class="addAstrofotografia_input2_style" name="redutor_focal" placeholder="Redutor Focal" type="text" name="">
	                        <input class="addAstrofotografia_input2_style" name="software" placeholder="Software" type="text" name="">
	                        <input class="addAstrofotografia_input2_style" name="filtros" placeholder="Filtros" type="text" name="">
	                        <input class="addAstrofotografia_input2_style" name="oculares" placeholder="Oculares" type="text" name="">
	                        <input class="addAstrofotografia_input2_style" name="barlows" placeholder="Barlows" type="text" name="">
	                    </div>
                        <div class="addAstrofotografia_right_2_btn">
	                       <button class="btn_back_astrofotografia_form" type="button" onclick="changeStep()"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>
	                       <button class="btn_next_send_astrofotografia_form">ENVIAR</button>
                        </div>
	                </div>
	            </div>
	        </div>
	    </form>
	    <button class="btn_close_astrofotografia_form" onclick="popupAstrofotografia()" type="button"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>

    <div class="model_astrofotografia">
        <div class="astrofotografia-div">
            <a class="linkAstrofotografia" href="">
                <div class="astrofotografia-div-img">
                    <img class="imgAstrofotografiaFeed" src="">
                </div>
            </a>
            <div class="astrofotografia-div-tittle">
                <p class="titleAstrofotografiaFeed"></p>
            </div>
        </div>
    </div>

    <section class="galeria-biblioteca-loja-background">

        <section class="container galeria-biblioteca-loja-container">

            <h1 class="page-tittle">Astro<b>Galeria</b></h1>

            <section class="galeria-biblioteca-loja-section">
                
                <section class="g-b-l-section-left">
                    
                    <div class="g-b-l-div-upload">
                        <h3>COMPARTILHE SUA ASTROFOTOGRAFIA:</h3>
                        <P>Adicionar Imagem.</P>
                        <button onclick="popupAstrofotografia()">ADICIONAR IMAGEM</button>
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
                        <input class="input-search-name" id="inputConteudo" placeholder="Buscar Objeto" type="text" name="" onkeyup ="filtrarFeed()">
                        <select class="input-search-categoria" id="selectCategoria" placeholder="Categoria" onchange="filtrarFeed()">
                                <option value="">Todos</option>
                                <option value="Galaxy">Galáxia</option>
                                <option value="Open Cluster">Aglomerado Estelar Aberto</option>
                                <option value="Star">Estrela</option>
                                <option value="Double star">Estrela Duplar</option>
                                <option value="Galaxy Pair">Par de Galáxias</option>
                                <option value="Globular Cluster">Aglomerado Globular</option>
                                <option value="Planetary Nebula">Nebulosa Planetária</option>
                                <option value="Nebula">Nebulosa</option>
                                <option value="HII Ionized region">HII Região Ionizada</option>
                                <option value="Star cluster %2B Nebula">Aglomerado Estelar + Nebulosa</option>
                                <option value="Association of stars">Associação de Estrelas</option>
                                <option value="Reflection Nebula">Nebulosa de Reflexão</option>
                                <option value="Galaxy Triplet">Trio de Galáxias</option>
                                <option value="Nonexistent object">Non-existent Objetct</option>
                                <option value="Emission Nebula">Nebulosa de Emissão</option>
                                <option value="Nova star">Nova</option>
                                <option value="Sistema Solar">Sistema Solar</option>
                                <option value="Paisagem">Paisagem</option>
                                <option value="Outro">Outro</option>
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

<?=$render('footer');?>

<script type="text/javascript">

    async function filtrarFeed() {
        var categoria = document.getElementById('selectCategoria').value;
        var conteudo = document.getElementById('inputConteudo').value;

        const data = await fetchAstrofotografias(categoria, conteudo);

        document.querySelector('.g-b-l-vitrine').innerHTML = "";

        await data['astrofotografias'].map((item, index) => {

            let itemAstrofotografia = document.querySelector('.astrofotografia-div').cloneNode(true);
            //let itemProdutoDiv = document.querySelector('.astroloja-div');

            itemAstrofotografia.querySelector('.linkAstrofotografia').setAttribute('href', `./astrofotografia/?id=${item.id}`);
            //itemProdutoDiv.setAttribute('data-key', index);
            itemAstrofotografia.querySelector('.imgAstrofotografiaFeed').src = './media/uploads/'+item.imagem;
            //itemAstrofotografia.querySelector('.astroloja-div-imagem-item').src = './media/uploads/'+item.imagem;
            itemAstrofotografia.querySelector('.titleAstrofotografiaFeed').innerHTML = item.titulo;

            document.querySelector('.g-b-l-vitrine').append(itemAstrofotografia);
        })

        console.log(data);
    }

    window.onload = async function () {
        var categoria = document.getElementById('selectCategoria').value;
        var conteudo = document.getElementById('inputConteudo').value;

        const data = await fetchAstrofotografias(categoria, conteudo);

        await data['astrofotografias'].map((item, index) => {

            let itemAstrofotografia = document.querySelector('.astrofotografia-div').cloneNode(true);

            itemAstrofotografia.querySelector('.linkAstrofotografia').setAttribute('href', `./astrofotografia/?id=${item.id}`);
            //itemProdutoDiv.setAttribute('data-key', index);
            itemAstrofotografia.querySelector('.imgAstrofotografiaFeed').src = './media/uploads/'+item.imagem;
            //itemAstrofotografia.querySelector('.astroloja-div-imagem-item').src = './media/uploads/'+item.imagem;
            itemAstrofotografia.querySelector('.titleAstrofotografiaFeed').innerHTML = item.titulo;

            document.querySelector('.g-b-l-vitrine').append(itemAstrofotografia);
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

    //buscarAstrofotografias
    const fetchAstrofotografias = async (categoria, conteudo) => {
        const apiResponse = await fetch(`<?=$base;?>/astrogaleria/astrofotografias/?categoria=${categoria}&conteudo=${conteudo}`);

        if (apiResponse.status == 200) {
            const data = await apiResponse.json();
            return data;
        }
    }

    function popupAstrofotografia() {
        var popup = document.getElementById('modal_addAstrofotografia');

        if (<?php echo json_encode($loggedUser->id); ?> !== 'null') {
            if (!popup.classList.contains('show_modal_addAstrofotografia')) {
                popup.classList.add('show_modal_addAstrofotografia');
            } else {
                popup.classList.remove('show_modal_addAstrofotografia');
            }
        } else {
            window.location.href = BASE+'/login';
        }
    }

    function changeStep() {
        var step1 = document.getElementById('addAstrofotografia_right_1');
        var step2 = document.getElementById('addAstrofotografia_right_2');

        if (step1.classList.contains('show_Step')) {
            step1.classList.remove('show_Step');
            step2.classList.add('show_Step');
        } else {
            step1.classList.add('show_Step');
            step2.classList.remove('show_Step');
        }
    }

        const fetchObjetos = async (categoria) => {
            const apiResposta = await fetch(`https://data.opendatasoft.com/api/records/1.0/search/?dataset=ngc-ic-messier-catalog%40datastro&q=&rows=10000&facet=object_definition&refine.object_definition=${categoria}&fields=name`);

            if (apiResposta.status == 200) {
                const data = await apiResposta.json();
                return data;
            }
        }

        async function getObjetos(categoria) {

            var categoria = document.getElementById('name').value;
            var objetoSelect = document.getElementById('objetoSelect');

            var campoSelect = document.getElementById('objetoSelect');
            var campoInput = document.getElementById('objetoInput');

            console.log(categoria);

            var selectArea = document.getElementById('name');

            if (categoria == 'Outro' || categoria == 'Paisagem') {
                campoSelect.classList.add('hide-Field');
                campoInput.classList.remove('hide-Field');

                campoSelect.innerHTML = '';

                campoSelect.setAttribute("name", "");
                campoInput.setAttribute("name", "objeto");

            } else if (categoria == 'Sistema Solar') {
                campoSelect.classList.remove('hide-Field');
                campoInput.classList.add('hide-Field');

                campoSelect.innerHTML = '';

                campoSelect.setAttribute("name", "objeto");
                campoInput.setAttribute("name", "");

                const planetasESistemaSolar = ['Mercúrio', 'Vênus', 'Terra', 'Marte', 'Júpiter', 'Saturno', 'Urano', 'Netuno', 'Plutão', 'Lua', 'Sol', 'Cometas', 'Asteroides'];

                for (let i = 0; i < planetasESistemaSolar.length; i++) {
                  const planeta = planetasESistemaSolar[i];
                  const option = document.createElement('option');
                  option.value = planeta;
                  option.textContent = planeta;
                  campoSelect.appendChild(option);
                }
                
            } else {
                campoSelect.classList.remove('hide-Field');
                campoInput.classList.add('hide-Field');

                objetoSelect.innerHTML = ' ';

                campoSelect.setAttribute("name", "objeto");
                campoInput.setAttribute("name", "");

                const data = await fetchObjetos(categoria)

                if (data) {
                
                    console.log(data.records);
                    console.log(objetoSelect);

                    for (var i = data.records.length - 1; i >= 0; i--) {
                        //console.log(data.records[i].fields.name);
                        objetoSelect.insertAdjacentHTML('beforeend', `<option value="${data.records[i].fields.name}">${data.records[i].fields.name}</option>`);
                    }
                }
            }
        }

</script>
</html>