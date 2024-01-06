<?=$render('header', ['loggedUser'=>$loggedUser]);?>

<section class="container main">
    <?=$render('sidebar', ['activeMenu'=>'astrofotos']);?>

    <section class="feed">

        <?=$render('perfil-header', ['user'=>$user, 'loggedUser'=>$loggedUser, 'isFollowing'=>$isFollowing]);?>
        
        <div class="row">

            <div class="column">
                        
                <div class="box">
                    <div class="box-body-astro">

                        <div class="full-user-photos">

                            <?php if(count($user->astrophotos) === 0): ?>
                                Este usuário não possui fotos.
                            <?php endif; ?>

                            <?php foreach($user->astrophotos as $astrophoto): ?>
                                <div class="user-photo-item">
                                    <a href="<?= $base; ?>/astrofotografia/?id=<?= $astrophoto->id; ?>">
                                        <img src="<?=$base;?>/media/uploads/<?=$astrophoto->imagem;?>" />
                                    </a>
                                </div>
                            <?php endforeach; ?>

                        </div>
                        

                    </div>
                </div>

            </div>
            
        </div>

    </section>

</section>
<?=$render('footer');?>