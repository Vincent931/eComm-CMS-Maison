<?php
require 'texte1.php';
?>
<!-- Header Start -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light fixed-top horizontal-nav">
                <div class="container">
                    <a class="navbar-brand" href="accueil.html">
                        <img src="publicimgs/logo.png" class="img-fluid" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="ti-menu icon-align-right"></i>
                    </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav horizontal-menu"><!-- 
                            <?php  
                            //bdd 1ère colonne
                            $req255=$bdd1->query('SELECT * FROM menuH1');
                            $donnees255=$req255->fetch();
                            //1ère colonne 
                            if(isset($donnees255['NH11']) AND !empty($donnees255['NH11'])) {?>
                            <li class="scroll"><a href="#"><span>Home</span></a></li> -->
                            <li class="scroll dropdown">
                                <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown"><span><?= $donnees255['NH11'];?></span></a>
                                <ul class="dropdown-menu">
                                    <?php if (isset($donnees255['NH12']) AND !empty($donnees255['NH12'])){?><li><a href="<?= $donnees255['UH12'];?>"><?= $donnees255['NH12'];?></a></li><?php } 
                                    if (isset($donnees255['NH13']) AND !empty($donnees255['NH13'])){?><li><a href="<?= $donnees255['UH13'];?>"><?= $donnees255['NH13'];?></a></li><?php } 
                                    if (isset($donnees255['NH14']) AND !empty($donnees255['NH14'])){?><li><a href="<?= $donnees255['UH14'];?>"><?= $donnees255['NH14'];?></a></li><?php } 
                                    if (isset($donnees255['NH15']) AND !empty($donnees255['NH15'])){?><li><a href="<?= $donnees255['UH15'];?>"><?= $donnees255['NH15'];?></a></li><?php } 
                                    if (isset($donnees255['NH16']) AND !empty($donnees255['NH16'])){?><li><a href="<?= $donnees255['UH16'];?>"><?= $donnees255['NH16'];?></a></li><?php } 
                                    if (isset($donnees255['NH17']) AND !empty($donnees255['NH17'])){?><li><a href="<?= $donnees255['UH17'];?>"><?= $donnees255['NH17'];?></a></li><?php }
                                    if (isset($donnees255['NH18']) AND !empty($donnees255['NH18'])){?><li><a href="<?= $donnees255['UH18'];?>"><?= $donnees255['NH18'];?></a></li><?php } ?>
                                </ul>
                            </li> <?php }
                            //bdd 2ème colonne
                            $req255=$bdd1->query('SELECT * FROM menuH2');
                            $donnees255=$req255->fetch();
                            //2ème colonne
                            if(isset($donnees255['NH21']) AND !empty($donnees255['NH21'])) {?>
                            <li class="scroll dropdown">
                                <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown"><span><?= $donnees255['NH21'];?></span></a>
                                <ul class="dropdown-menu">
                                    <?php if (isset($donnees255['NH22']) AND !empty($donnees255['NH22'])){?><li><a href="<?= $donnees255['UH22'];?>"><?= $donnees255['NH22'];?></a></li><?php } 
                                    if (isset($donnees255['NH23']) AND !empty($donnees255['NH23'])){?><li><a href="<?= $donnees255['UH23'];?>"><?= $donnees255['NH23'];?></a></li><?php } 
                                    if (isset($donnees255['NH24']) AND !empty($donnees255['NH24'])){?><li><a href="<?= $donnees255['UH24'];?>"><?= $donnees255['NH24'];?></a></li><?php } 
                                    if (isset($donnees255['NH25']) AND !empty($donnees255['NH25'])){?><li><a href="<?= $donnees255['UH25'];?>"><?= $donnees255['NH25'];?></a></li><?php } 
                                    if (isset($donnees255['NH26']) AND !empty($donnees255['NH26'])){?><li><a href="<?= $donnees255['UH26'];?>"><?= $donnees255['NH26'];?></a></li><?php } 
                                    if (isset($donnees255['NH27']) AND !empty($donnees255['NH27'])){?><li><a href="<?= $donnees255['UH27'];?>"><?= $donnees255['NH27'];?></a></li><?php }
                                    if (isset($donnees255['NH28']) AND !empty($donnees255['NH28'])){?><li><a href="<?= $donnees255['UH28'];?>"><?= $donnees255['NH28'];?></a></li><?php } ?>
                                </ul>
                            </li> <?php }
                            //bdd 3ème colonne
                            $req255=$bdd1->query('SELECT * FROM menuH3');
                            $donnees255=$req255->fetch();
                            //3ème colonne
                            if(isset($donnees255['NH31']) AND !empty($donnees255['NH31'])) { ?>
                            <li class="scroll dropdown">
                                <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown"><span><?= $donnees255['NH31'];?></span></a>
                                <ul class="dropdown-menu">
                                    <?php if (isset($donnees255['NH32']) AND !empty($donnees255['NH32'])){?><li><a href="<?= $donnees255['UH32'];?>"><?= $donnees255['NH32'];?></a></li><?php } 
                                    if (isset($donnees255['NH33']) AND !empty($donnees255['NH33'])){?><li><a href="<?= $donnees255['UH33'];?>"><?= $donnees255['NH33'];?></a></li><?php } 
                                    if (isset($donnees255['NH34']) AND !empty($donnees255['NH34'])){?><li><a href="<?= $donnees255['UH34'];?>"><?= $donnees255['NH34'];?></a></li><?php } 
                                    if (isset($donnees255['NH35']) AND !empty($donnees255['NH35'])){?><li><a href="<?= $donnees255['UH35'];?>"><?= $donnees255['NH35'];?></a></li><?php } 
                                    if (isset($donnees255['NH36']) AND !empty($donnees255['NH36'])){?><li><a href="<?= $donnees255['UH36'];?>"><?= $donnees255['NH36'];?></a></li><?php } 
                                    if (isset($donnees255['NH37']) AND !empty($donnees255['NH37'])){?><li><a href="<?= $donnees255['UH37'];?>"><?= $donnees255['NH37'];?></a></li><?php }
                                    if (isset($donnees255['NH38']) AND !empty($donnees255['NH38'])){?><li><a href="<?= $donnees255['UH38'];?>"><?= $donnees255['NH38'];?></a></li><?php } ?>
                                </ul>
                            </li> <?php }
                            //bdd 4ème colonne
                            $req255=$bdd1->query('SELECT * FROM menuH4');
                            $donnees255=$req255->fetch();
                            //4ème colonne
                            if(isset($donnees255['NH41']) AND !empty($donnees255['NH41'])) { ?>              
                            <li class="scroll dropdown">
                                <a href="javaScript:void();" class="dropdown-toggle" data-toggle="dropdown"><span><?= $donnees255['NH41'];?></span></a>
                                <ul class="dropdown-menu">
                                    <?php if (isset($donnees255['NH42']) AND !empty($donnees255['NH42'])){?><li><a href="<?= $donnees255['UH42'];?>"><?= $donnees255['NH42'];?></a></li><?php } 
                                    if (isset($donnees255['NH43']) AND !empty($donnees255['NH43'])){?><li><a href="<?= $donnees255['UH43'];?>"><?= $donnees255['NH43'];?></a></li><?php } 
                                    if (isset($donnees255['NH44']) AND !empty($donnees255['NH44'])){?><li><a href="<?= $donnees255['UH44'];?>"><?= $donnees255['NH44'];?></a></li><?php } 
                                    if (isset($donnees255['NH45']) AND !empty($donnees255['NH45'])){?><li><a href="<?= $donnees255['UH45'];?>"><?= $donnees255['NH45'];?></a></li><?php } 
                                    if (isset($donnees255['NH46']) AND !empty($donnees255['NH46'])){?><li><a href="<?= $donnees255['UH46'];?>"><?= $donnees255['NH46'];?></a></li><?php } 
                                    if (isset($donnees255['NH47']) AND !empty($donnees255['NH47'])){?><li><a href="<?= $donnees255['UH47'];?>"><?= $donnees255['NH47'];?></a></li><?php }
                                    if (isset($donnees255['NH48']) AND !empty($donnees255['NH48'])){?><li><a href="<?= $donnees255['UH48'];?>"><?= $donnees255['NH48'];?></a></li><?php } ?>
                                </ul>
                            </li> <?php } ?>
                        <button class="btn btn-sm btn-custom navbar-btn btn-rounded"><a style="text-decoration:none;color:white" href="accueil.html#choix">acheter</a></button>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <!-- Header End -->
