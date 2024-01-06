<div class="row">
    <div class="box flex-1 border-top-flat">
        <div class="box-body">
            <div class="profile-cover" style="background-image: url('<?=$base;?>/media/covers/<?=$user->cover;?>');"></div>
            <div class="profile-info m-20 row">
                <div class="profile-info-avatar">
                    <a href="<?=$base;?>/perfil/<?=$user->id;?>">    
                        <img src="<?=$base;?>/media/avatars/<?=$user->avatar;?>" />
                    </a>
                </div>
                <div class="profile-info-name">
                    <div class="profile-info-name-text">
                        <a href="<?=$base;?>/perfil/<?=$user->id;?>">
                            <?=$user->name;?>
                        </a>
                    </div>
                    <div class="profile-info-location"><?=$user->city;?></div>
                </div>
                <div class="profile-info-data row">
                    <?php if($user->id != $loggedUser->id): ?>
                    <div class="profile-info-item m-width-20">
                        <a href="<?=$base;?>/perfil/<?=$user->id;?>/follow" class="button"><?=(!$isFollowing)?'Seguir':'Deixar de Seguir';?></a>
                    </div>
                    <?php endif; ?>

                    <div class="profile-info-item">
                        <a href="<?=$base;?>/perfil/<?=$user->id;?>/amigos">
                            <div class="profile-info-item-n"><?=count($user->followers);?></div>
                            <div class="profile-info-item-s">Seguidores</div>
                        </a>
                    </div>
                    <div class="profile-info-item">
                        <a href="<?=$base;?>/perfil/<?=$user->id;?>/amigos">
                            <div class="profile-info-item-n"><?=count($user->following);?></div>
                            <div class="profile-info-item-s">Seguindo</div>
                        </a>
                    </div>
                    <div class="profile-info-item">
                        <a href="<?=$base;?>/perfil/<?=$user->id;?>/astrofotos">
                            <div class="profile-info-item-n"><?=count($user->astrophotos);?></div>
                            <div class="profile-info-item-s">Astrofotografias</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>