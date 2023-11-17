<?php session_start();

/*header("Status: 302 Moved Temporarily", false, 302);
header("Location: http://www/maintenance.html");
exit();*/

$old_session_id=session_id();
$_SESSION['destroyed']=time();


if(isset($_SESSION['destroyed']) AND $_SESSION['destroyed']>time()-300)
{
  session_regenerate_id();
}
require 'texte1.php';

$req24=$bdd1->query('SELECT * FROM societe');
$societe=$req24->fetch();


require 'boutique0.php';

$req41=$bdd->prepare('SELECT * FROM JavaScript WHERE Page =?');
$req41->execute(array($_SERVER['PHP_SELF']));
$donnees41=$req41->fetch();

//require 'compteur.php';

$req3=$bdd->query('SELECT * FROM redirect');
$donnees3=$req3->fetch();
if(isset($donnees3['redirect']) AND $donnees3['redirect']=="oui"){
    header("Location:tarifs.php");
}
        require 'head.php';?>
        <!-- Site Title -->
        <title>Services de vincent-dev-web, requis essentiels à l'intégration web, le design et les applications</title>
        <meta name="description" content="Contactez Vincent Nguyen, développeur: intégration, design et application "/>        
    </head> 
	<body>
        <?php require 'header.php';?>
		<!-- Start Home -->
		<section class="home_third section">
            <div class="home-table">
                <div class="home-table-center">
        			<div class="container">
        				<div class="row align-items-center">
                            <div class="col-lg-12">
                                <div class="home_thi_full_content rounded text-center bg-light">
                                    <div class="sub_sec_third">
                                        <form method="post" action="courrier.php" class="position-relative  mx-auto">
                                            <input type="text" name="email" id="email" placeholder="Adresse Email">
                                            <button type="submit" class="btn btn-custom btn-rounded">Maintenant</button>
                                        </form>
                                    </div>
                                    <div class="home_thi_border"></div>
                                    <div class="home_third_content mx-auto">
                                        <h1>Nous codons tous les produits et pour tous</h1>
                                        <p class="text-muted mx-auto mt-3 mb-0">Nous créons simplement et élémentairement, dans un contexte de Sécurité et de Performances</p>
                                    </div>
                                    <div class="home_third_video_btn mt-4">
                                        <a href="./publicimgs/Infos-PDF.pdf" class="mr-3 text-white video_third_home video_pop"><i class="mdi mdi-play text-center"></i></a>
                                    </div>
                                </div>
                            </div>         
                        </div>
        			</div>
                </div>
            </div>
		</section>
		<!-- Start Home -->

        <!-- Start Features -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title text-center">
                            <h2><span></span>Les meilleurs Page Landing codé en HTML</h2>
                            <p class="text-muted mx-auto mt-4">Nous accordons une importance primordiale à ce Design</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="feat_third_box mt-3 text-center p-3">
                            <h5 class="font-weight-bold">Poursuivez votre expérience</h5>
                            <p class="text-muted mt-3">Les fonctionnalités des plus grands pour vous</p>
                            <div class="feat_read_more_third">
                                <a href="#choix"><i class="mdi mdi-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="feat_third_box mt-3 text-center p-3">
                            <h5 class="font-weight-bold">Trouver le Produit idéal</h5>
                            <p class="text-muted mt-3">vincent-dev-web accorde son Temps et son Expérience pour le meilleur</p>
                            <div class="feat_read_more_third">
                                <a href="#choix"><i class="mdi mdi-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="feat_third_box mt-3 text-center p-3">
                            <h5 class="font-weight-bold">Vous testez les produits que nous nous efforçons d'affiner</h5>
                            <p class="text-muted mt-3">Les échanges se font avec votre expérience et vos requis</p>
                            <div class="feat_read_more_third">
                                <a href="#choix"><i class="mdi mdi-chevron-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Features -->

        <!-- Start Conetent -->
        <section class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="content_fea_third mx-auto mt-3">
                            <p class="content_small_title_third mb-0 text-uppercase"><span class="content_bg_box"></span>Design à vos souhaits</p>
                            <h3 class="content_main_title_third mb-0 mt-4">Ce que vous désirez !</h3>
                            <p class="text-muted mt-4">Créer une Page intéressante et sur mesure convertit vos visteurs en clients potentiels, faites confiance au développeur</p>
                            <div class="mt-4 pt-3">
                                <a href="#" class="btn btn-custom btn-rounded">Rechercher</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="side_img_content mt-3">
                            <img src="./publicimgs/schema.jpg" alt="com" class="img-fluid img-fluidv mx-auto d-block">
                        </div>
                    </div>
                </div>
                <div class="row mt-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="side_img_content mt-3">
                            <img src="./publicimgs/distri2.jpg" alt="com" class="img-fluid img-fluidv mx-auto d-block">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content_fea_third mx-auto mt-3">
                            <p class="content_small_title_third mb-0 text-uppercase"><span class="content_bg_box"></span>Interfaces de paiement</p>
                            <h3 class="content_main_title_third mb-0 mt-4">Sans équivoque, au choix</h3>
                            <p class="text-muted mt-4">Avoir le choix de plusieurs Solutions de Paiement :- Je vous accompagne intelligemment sur la piste de la conversion et améliore votre Buziness Plan</p>
                            <div class="mt-4 pt-3">
                                <a href="#" class="btn btn-custom btn-rounded">Rechercher</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Start Conetent -->

        <!-- Start Logo -->
        <section class="section">
            <div class="container">
                <div class="row">
                     <div class="col-lg-3">
                        <div class="logo_img mt-3"><!-- class natif mx-auto img-fluid d-block-->
                            <i class="fas fa-code mx-auto img-fluid d-block blV"></i>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="logo_img mt-3">
                            <i class="fab fa-css3 mx-auto img-fluid d-block blV"></i>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="logo_img mt-3">
                            <i class="fab fa-php mx-auto img-fluid d-block blV"></i>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="logo_img mt-3">
                            <i class="fab fa-js mx-auto img-fluid d-block blV"></i>
                        </div>
                    </div>
                </div>
                <div class="client_logo_bot_bor"></div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="client_mini_caption text-center">
                            <p class="text-muted mx-auto">Mesurez les connaissances et compétences du développeur, faites confiance à un professionnel surmotivé et testé âprement sur les meilleurs langages du web</p>
                        </div>
                        <div class="text-center mt-4 pt-3">
                            <a href="./publicimgs/certificats-Vincent-developpeur-Web-2022.pdf" class="btn btn-custom btn-rounded">Renseignez-vous</a>
                        </div>
                    </div>
                </div>     
            </div>
        </section>
        <!-- End Logo -->
        <div id="choix"></div>
        <!-- Start Price -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title text-center">
                            <h2><span></span>Des solutions pour tous</h2>
                            <p class="text-muted mx-auto mt-4">Evaluez vous même le rendu des sites vincent-dev-web</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <ul class="nav nav-pills justify-content-center price_plan_third_tab mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"aria-controls="pills-home" aria-selected="true">Vitrine</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Et ++</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="price_plan_third mt-3 py-5 px-4 text-center">
                                            <div class="plan_name">
                                                <h4 class="mb-0">eCommerce simple, code unique</h4>
                                                <div class="plan_icon my-4">
                                                    <i class="mdi mdi-star text-custom"></i>
                                                    <i class="mdi mdi-star text-custom"></i>
                                                    <i class="mdi mdi-star text-custom"></i>
                                                </div>
                                                <p class="text-muted">eCommerce codé en dur par le développeur</p>
                                            </div>
                                            <div class="plan_divider my-5"></div>
                                            <div class="plan_price">
                                                <h1 class="font-weight-bold mb-1">1200,00€</h1>
                                                <p class="text-muted mb-0">1 an</p>
                                            </div>
                                            <div class="price_btn mt-5">
                                                <a href="./achat-108" class="btn btn-custom">Choisir</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="price_plan_third mt-3 py-5 px-4 text-center">
                                            <div class="plan_name">
                                                <h4>eCommerce Prestashop</h4>
                                                <div class="plan_icon my-4">
                                                    <i class="mdi mdi-star text-custom"></i>
                                                    <i class="mdi mdi-star text-custom"></i>
                                                    <i class="mdi mdi-star text-custom"></i>
                                                </div>
                                                <p class="text-muted">Le développeur vous code un eCommerce complet avec Prestashop</p>
                                            </div>
                                            <div class="plan_divider my-5"></div>
                                            <div class="plan_price">
                                                <h1 class="font-weight-bold mb-1">1800,00€</h1>
                                                <p class="text-muted mb-0">1 an</p>
                                            </div>
                                            <div class="price_btn mt-5">
                                                <a href="./achat-116" class="btn btn-custom">Choisir</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="price_plan_third mt-3 py-5 px-4 text-center">
                                            <div class="plan_name">
                                                <h4>Vitrine WordPress</h4>
                                                <div class="plan_icon my-4">
                                                    <i class="mdi mdi-star text-custom"></i>
                                                    <i class="mdi mdi-star text-custom"></i>
                                                    <i class="mdi mdi-star text-custom"></i>
                                                </div>
                                                <p class="text-muted">Un site WordPress jusqu'à 10 pages + Serveur + SEO by vincent-dev-web</p><br>
                                            </div>
                                            <div class="plan_divider my-5"></div>
                                            <div class="plan_price">
                                                <h1 class="font-weight-bold mb-1">1200,00€</h1>
                                                <p class="text-muted mb-0">1 an</p>
                                            </div>
                                            <div class="price_btn mt-5">
                                                <a href="./achat-123" class="btn btn-custom">Choisir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="price_plan_third mt-3 py-5 px-4 text-center">
                                            <div class="plan_name">
                                                <h4 class="mb-0">Vitrine WordPress + Blog</h4>
                                                <div class="plan_icon my-4">
                                                    <i class="mdi mdi-star text-custom"></i>
                                                    <i class="mdi mdi-star text-custom"></i>
                                                    <i class="mdi mdi-star text-custom"></i>
                                                </div>
                                                <p class="text-muted">Un site WordPress jusqu'à 10 pages + Serveur + SEO + Blog by vincent-dev-web</p>
                                            </div>
                                            <div class="plan_divider my-5"></div>
                                            <div class="plan_price">
                                                <h1 class="font-weight-bold mb-1">1440,00€</h1>
                                                <p class="text-muted mb-0">1 an</p>
                                            </div>
                                            <div class="price_btn mt-5">
                                                <a href="./achat-124" class="btn btn-custom">Choisir</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="price_plan_third mt-3 py-5 px-4 text-center">
                                            <div class="plan_name">
                                                <h4>Vitrine WordPress</h4>
                                                <div class="plan_icon my-4">
                                                    <i class="mdi mdi-star text-custom"></i>
                                                    <i class="mdi mdi-star text-custom"></i>
                                                    <i class="mdi mdi-star text-custom"></i>
                                                </div>
                                                <p class="text-muted">Un abonnement mensuel</p><br><br>
                                            </div>
                                            <div class="plan_divider my-5"></div>
                                            <div class="plan_price">
                                                <h1 class="font-weight-bold mb-1">100.00€</h1>
                                                <p class="text-muted mb-0">1 an mini</p>
                                            </div>
                                            <div class="price_btn mt-5">
                                                <a href="./achat-123" class="btn btn-custom">Choisir</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="price_plan_third mt-3 py-5 px-4 text-center">
                                            <div class="plan_name">
                                                <h4>Vitrine WordPress + Blog</h4>
                                                <div class="plan_icon my-4">
                                                    <i class="mdi mdi-star text-custom"></i>
                                                    <i class="mdi mdi-star text-custom"></i>
                                                    <i class="mdi mdi-star text-custom"></i>
                                                </div>
                                                <p class="text-muted">Un abonnement mensuel</p><br>
                                            </div>
                                            <div class="plan_divider my-5"></div>
                                            <div class="plan_price">
                                                <h1 class="font-weight-bold mb-1">120,00€</h1>
                                                <p class="text-muted mb-0">1 an mini</p>
                                            </div>
                                            <div class="price_btn mt-5">
                                                <a href="./achat-124" class="btn btn-custom">Choisir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Price -->

        <!-- Start Contact -->
        <section id="quest" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section_title text-center">
                            <h2><span></span>Prenez contact à propos d'un Site Web</h2>
                            <p class="text-muted mx-auto mt-4">Les impératifs et les insignifiants sont avant tout des questions intérressantes</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-12">
                        <div class="contact_thir_form mx-auto">
                            <form method="post" action="courrier2.php">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mt-2">
                                            <input name="email" id="email" type="email" class="form-control" placeholder="Votre email..."  required="">
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group mt-2">
                                            <textarea name="comments" id="comments" rows="4" class="form-control" placeholder="Votre message..." required=""></textarea>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="row">
                                    <div class="col-lg-12 text-right mt-2">
                                        <input type="submit" class="btn btn-custom w-100" value="Envoyez Votre Message">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="cont_bot_third_bor"></div>
                <div class="row mt-3">
                    <div class="col-lg-4"> 
                        <div class="contact_add_third mt-3 text-center">
                            <div class="contact_icon_shape mx-auto">
                                <img src="assets/images/icon/mail.svg" alt="mail" class="img-fluid">
                            </div>
                            <div class="contact_content mt-3">
                                <h5 class="font-weight-bold">Email</h5>
                                <p class="mb-0 text-muted">contact@vincent-dev-web.fr</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact_add_third mt-3 text-center">
                            <div class="contact_icon_shape mx-auto">
                                <img src="assets/images/icon/active-call.svg" alt="mail" class="img-fluid">
                            </div>
                            <div class="contact_content mt-3">
                                <h5 class="font-weight-bold">Téléphone</h5>
                                <p class="mb-0 text-muted">+(33) 06 66 73 27 37</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact_add_third mt-3 text-center">
                            <div class="contact_icon_shape mx-auto">
                                <img src="assets/images/icon/time-schedule.svg" alt="mail" class="img-fluid">
                            </div>
                            <div class="contact_content mt-3">
                                <h5 class="font-weight-bold">Ouvert</h5>
                                <p class="text-muted mb-1">Lundi au vendredi</p>
                                <p class="mb-0 text-muted">08:00 @ 17:00 (GMT +1)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--modal bootstrap-->
        <div class="modal modal-fullscreen-sm-down" id="myModal"tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Votre Attention</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p>Bonjour, ce Ecommerce transformé en PortFolio n'est pas responsive, vous pouvez demander au développeur de le faire pour vous, n'hésitez pas à <a href="#quest">formuler votre demande</a>. Par la continuité de votre connexion sur ce site vous acceptez les cookies de vincent-dev-web, ce afin de mieux vous servir les ressources demandées ...</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!--end modal bootstrap-->
        <!-- End Contact -->
        <?php $non_aff_compt=false; require 'footer.php';?>
        <script src="https://kit.fontawesome.com/80f9a27b0d.js" crossorigin="anonymous"></script>
        <script src="./js/header-cookies.js"></script>
        <!-- Javascript -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery.easing.min.js"></script>
        <script src="assets/js/scrollspy.min.js"></script>

        <!-- MFP JS -->
        <script src="assets/js/jquery.magnific-popup.min.js"></script>
        
        <!-- Owl Js -->
        <script src="assets/js/owl.carousel.min.js"></script>

        <!-- Custom Js   -->
        <script src="assets/js/custom.js"></script>
        <!--- script modal-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="./js/modalAccueil.js"></script>
	</body>
</html>