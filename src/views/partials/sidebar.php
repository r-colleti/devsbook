<aside class="mt-10">
    <nav>
        <a href="<?=$base;?>">
            <div class="menu-item <?=($activeMenu=='home')?'active':'';?>">
                <div class="menu-item-icon">
                    <i class="fa fa-home" aria-hidden="true"></i>
                </div>
                <div class="menu-item-text">
                    Home
                </div>
            </div>
        </a>
        <a href="<?=$base;?>/perfil">
            <div class="menu-item <?=($activeMenu=='profile')?'active':'';?>">
                <div class="menu-item-icon">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <div class="menu-item-text">
                    Meu Perfil
                </div>
            </div>
        </a>
        <a href="<?=$base;?>/amigos">
            <div class="menu-item <?=($activeMenu=='friends')?'active':'';?>">
                <div class="menu-item-icon">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <div class="menu-item-text">
                    Amigos
                </div>
            </div>
        </a>
        <a href="<?=$base;?>/fotos">
            <div class="menu-item <?=($activeMenu=='photos')?'active':'';?>">
                <div class="menu-item-icon">
                    <i class="fa fa-camera" aria-hidden="true"></i>
                </div>
                <div class="menu-item-text">
                    Fotos
                </div>
            </div>
        </a>
        <a href="<?=$base;?>/astrofotos">
            <div class="menu-item <?=($activeMenu=='astrofotos')?'active':'';?>">
                <div class="menu-item-icon">
                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                </div>
                <div class="menu-item-text">
                    Astrofotografias
                </div>
            </div>
        </a>
        <div class="menu-splitter"></div>
        <a href="<?=$base;?>/config">
            <div class="menu-item <?=($activeMenu=='config')?'active':'';?>">
                <div class="menu-item-icon">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                </div>
                <div class="menu-item-text">
                    Configurações
                </div>
            </div>
        </a>
        <a href="<?=$base;?>/sair">
            <div class="menu-item">
                <div class="menu-item-icon">
                    <i class="fa fa-power-off" aria-hidden="true"></i>
                </div>
                <div class="menu-item-text">
                    Sair
                </div>
            </div>
        </a>
    </nav>
</aside>