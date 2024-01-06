<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Devsbook</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?=$base;?>/assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="<?=$base;?>"><img src="<?=$base;?>/assets/images/astroworld_logo.png" /></a>
            </div>
            <div class="head-side">
                <div class="head-side-left">
                    <div class="search-area">
                        <form method="GET" action="<?=$base;?>/pesquisa">
                            <input type="search" placeholder="Pesquisar" name="s" />
                        </form>
                    </div>
                </div>
                <div class="div-menu-mobile">
                    <button id="btn-menuMobile" class="button-menu-mobile" onclick="menuMobile()"><i class="fa fa-bars" aria-hidden="true"></i></button>
                    <ul id="menuArea" class="menu-mobile">
                        <li><i class="fa fa-folder-open" aria-hidden="true"></i><a class="menu-mobile-link" href="<?=$base;?>/biblioteca">Biblioteca</a></li>
                        <li><i class="fa fa-picture-o" aria-hidden="true"></i><a class="menu-mobile-link" href="<?=$base;?>/astrogaleria">Astro<b>Galeria</b></a></li>
                        <li><i class="fa fa-shopping-basket" aria-hidden="true"></i><a class="menu-mobile-link" href="<?=$base;?>/astroloja">Astro<b>Loja</b></a></li>
                        <hr>
                        <div class="menu-mobile-userArea">
                            <a href="<?=$base;?>/perfil">
                                <img class="avatar-menu-mobile" src="<?=$base;?>/media/avatars/<?=$loggedUser->avatar;?>" />
                            </a>
                            <a class="sairBtn-link" href="<?=$base;?>/sair">
                                <button class="sairBtn"><i class="fa fa-power-off" aria-hidden="true"></i> SAIR</button>
                            </a>
                        </div>
                    </ul>
                </div>
                <div class="head-side-middle">
                    <a href="<?=$base;?>/biblioteca">Biblioteca</a>
                    <a href="<?=$base;?>/astrogaleria">Astro<b>Galeria</b></a>
                    <a href="<?=$base;?>/astroloja">Astro<b>Loja</b></a>
                </div>
                <div class="head-side-right">

                    <?php if($loggedUser->id !== 'null'): ?>
                    <a href="<?=$base;?>/perfil" class="user-area">
                        <div class="user-area-text"><?=$loggedUser->name;?></div>
                        <div class="user-area-icon">
                            <img src="<?=$base;?>/media/avatars/<?=$loggedUser->avatar;?>" />
                        </div>
                    </a>
                    <a href="<?=$base;?>/sair" class="user-logout">
                        <img src="<?=$base;?>/assets/images/power_white.png" />
                    </a>
                    <?php endif; ?>

                    <?php if($loggedUser->id == 'null'): ?>
                    <a href="<?=$base;?>/login"><button class="entrarBtn">ENTRAR</button></a>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </header>

    <script type="text/javascript">
        function menuMobile() {
            var button = document.getElementById('btn-menuMobile');
            var menu = document.getElementById('menuArea');

            /*if (menuArea.style.display == 'none') {
                menuArea.style.display = 'flex';
            } else {
                menuArea.style.display = 'none';
            }*/

            if (menuArea.style.width == '0px') {
                menuArea.style.display = 'flex';
                menuArea.style.width = '200px';
                menuArea.style.padding = '15px 20px'
            } else {
                menuArea.style.display = 'none';
                menuArea.style.width = '0px';
                menuArea.style.padding = '0'
            }
        }
    </script>