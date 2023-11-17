
<!-- Start Footer -->
		<?php require 'texte1.php'; 
	    $req254=$bdd1->query('SELECT * FROM menuB');
	    $donnees254=$req254->fetch();?>
        <footer class="footer_third">
            <div class="container">
                <div class="row">
                	<div class="col-lg-6">
                        <div class="footer_sub_third">
                            <h6 class="mt-3 font-weight-bold">Contactez le développeur</h6>
                             <div class="footer_title_border"></div>
                            <form method="post" action="courrier.php" class="position-relative mt-4">
                                <input name="email" id="email" type="text" placeholder="Email">
                                <button type="submit" class="btn btn-custom">Send</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-2 order-2 order-lg-1 resp-vn0">
                        <h6 class="mt-3 font-weight-bold">Social</h6>
                        <div class="footer_title_border"></div>
                        <ul class="list-unstyled footer_menu_list mb-0 mt-4">
                            <!--<li><a href="#">Blog</a></li>-->
                            <li><a href="#"><span id="facebook" ><?php require_once("bouton_partage_personnalise.php"); ?></span></a></li><br style="line-height:0.8">
                            <li><a href="#"><script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script><script type="IN/Share" data-url="https://www.linkedin.com"></script></a></li><br>
                            <li><span id="twitter" ><a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=Je%20tweet%20depuis" data-size="large">Tweet</a></span></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 order-2 order-lg-1 resp-vn0">
                        <h6 class="mt-3 font-weight-bold">Liens 1</h6>
                        <div class="footer_title_border"></div>
                        <ul class="list-unstyled footer_menu_list mb-0 mt-4">
                        	<?php if (isset($donnees254['B11']) AND !empty($donnees254['B11'])){ ?>
                            	<li><a href="<?= $donnees254['B11'];?>"><?=$donnees254['B12'];?></a></li><?php }
                            if (isset($donnees254['B81']) AND !empty($donnees254['B81'])){ ?>
                            	<li><a href="<?= $donnees254['B81'];?>"><?=$donnees254['B82'];?></a></li><?php }
                            if (isset($donnees254['B21']) AND !empty($donnees254['B21'])){ ?>
                            	<li><a href="<?= $donnees254['B21'];?>"><?=$donnees254['B22'];?></a></li><?php }
                            if (isset($donnees254['B91']) AND !empty($donnees254['B91'])){ ?>
                            	<li><a href="<?= $donnees254['B91'];?>"><?=$donnees254['B92'];?></a></li><?php }
                            if (isset($donnees254['B31']) AND !empty($donnees254['B31'])){ ?>
                            	<li><a href="<?= $donnees254['B31'];?>"><?=$donnees254['B32'];?></a></li><?php }
                            if (isset($donnees254['B101']) AND !empty($donnees254['B101'])){ ?>
                            	<li><a href="<?= $donnees254['B101'];?>"><?=$donnees254['B102'];?></a></li><?php }
                            if (isset($donnees254['B41']) AND !empty($donnees254['B41'])){ ?>
                            	<li><a href="<?= $donnees254['B41'];?>"><?=$donnees254['B42'];?></a></li><?php }
                            ?>
                        </ul>
                    </div>
                    <div class="col-lg-2 order-2 order-lg-1 resp-vn0">
                        <h6 class="mt-3 font-weight-bold">Liens 2</h6>
                        <div class="footer_title_border"></div>
                        <ul class="list-unstyled footer_menu_list mb-0 mt-4">
                            <?php if (isset($donnees254['B111']) AND !empty($donnees254['B111'])){ ?>
                            	<li><a href="<?= $donnees254['B111'];?>"><?=$donnees254['B112'];?></a></li><?php }
                            if (isset($donnees254['B51']) AND !empty($donnees254['B51'])){ ?>
                            	<li><a href="<?= $donnees254['B51'];?>"><?=$donnees254['B52'];?></a></li><?php }
                            if (isset($donnees254['B121']) AND !empty($donnees254['B121'])){ ?>
                            	<li><a href="<?= $donnees254['B121'];?>"><?=$donnees254['B122'];?></a></li><?php }
                            if (isset($donnees254['B61']) AND !empty($donnees254['B61'])){ ?>
                            	<li><a href="<?= $donnees254['B61'];?>"><?=$donnees254['B62'];?></a></li><?php }
                            if (isset($donnees254['B131']) AND !empty($donnees254['B131'])){ ?>
                            	<li><a href="<?= $donnees254['B131'];?>"><?=$donnees254['B132'];?></a></li><?php }
                            if (isset($donnees254['B71']) AND !empty($donnees254['B71'])){ ?>
                            	<li><a href="<?= $donnees254['B71'];?>"><?=$donnees254['B72'];?></a></li><?php }
                            if (isset($donnees254['B141']) AND !empty($donnees254['B141'])){ ?>
                            	<li><a href="<?= $donnees254['B141'];?>"><?=$donnees254['B142'];?></a></li><?php }
                            if (isset($donnees254['B151']) AND !empty($donnees254['B151'])){ ?>
                            	<li><a href="<?= $donnees254['B151'];?>"><?=$donnees254['B152'];?></a></li><?php }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="footer_third_copy_border"></div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="copyright_third text-center">
                            <div class="copy_icon_box mx-auto text-center">
                                <img src="publicimgs/icon98.svg" alt="heart" class="img-fluid mx-auto">
                            </div>
                            <p class="mb-0 mt-4 text-muted">&copy; 2022 recoded by Vincent Nguyen <?php if($non_aff_compt==false){require 'compteur.php'; echo 'Nbre Vues : '.$pages_vues;}?></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
        <?php $req254->closeCursor(); ?>