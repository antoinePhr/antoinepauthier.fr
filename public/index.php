<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/41b0df0c75.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/png" href="./img/icons/favicon.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;800&display=swap" rel="stylesheet">
    <script src="./js/smoothscroll.js"></script>
    <script defer src="./js/script.js"></script>
    <title>Antoine Pauthier | Portefollio</title>
</head>
<?php 
    include './php/database.php';
    $querie = "SELECT * FROM projects ORDER BY pj_date DESC";
    error_reporting(E_ALL);
    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'"); 
    $result = $conn->query($querie);
    $data = [];
    while($row = $result->fetch_assoc()){
        array_push($data, $row);
    }
    $conn = null;
    $result = null;

    $query = "SELECT * FROM formations ORDER BY fm_dateStart DESC";
    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");
    $result = $conn->query($query);
    $formaInfo = [];
    while($row = $result->fetch_assoc()){
        array_push($formaInfo, $row);
    }

    $query = "SELECT * FROM experience ORDER BY exp_date DESC";
    $conn = OpenCon();
    $conn->query("SET NAMES 'utf8'");
    $result = $conn->query($query);
    $expInfo = [];
    while($row = $result->fetch_assoc()){
        array_push($expInfo, $row);
    }

    $result = $conn->query("SELECT COUNT(*) as nbrFav FROM likes");
    $nbrFav = $result->fetch_object();

    $index = 0
?>

<body>
    <div class="loader">
        <div class="head">
            <video src="./img/load/loader.mov" playsinline muted autoplay loop></video>
            <div class="progressBar">
                <div class="percentage"></div>
                <h3>chargement ...</h3>
            </div>
        </div>
    </div>
    <section class="home">
        <div class="contentContainer">
            <div class="leftSide">
                <i class="fas fa-times fa-3x"></i>
                <img class="profil" src="./img/profilTemp.png" alt="Antoine Pauthier Développeur web">
                <h1 class="name">antoine <span>pauthier</span></h1>
                <div class="metierContainer">
                    <h3 class="metier">développeur web</h3> 
                </div>
                <div class="networkLinks">
                    <ul class="listNetwork">
                        <li>
                            <a href="https://github.com/antoinePhr" target="_blank" rel="noopener noreferrer">
                                <i class="fab fa-github fa-2x"></i>
                            </a> 
                        </li>
                        <li>
                         <a href="https://www.linkedin.com/in/antoine-pauthier-0ba118196/" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-linkedin fa-2x"></i>
                         </a> 
                        </li>
                        <li>
                            <a href="https://www.instagram.com/antoine_phr/" target="_blank " rel="noopener noreferrer">
                                <i class="fab fa-instagram fa-2x"></i>
                            </a> 
                        </li>
                    </ul>
                </div>
                <div class="flag">
                    <img src="./img/flag.png" alt="Dévéloppeur web français">
                </div>
                <div class="info">
                    <ul>
                        <li> <img class="logoInfo" src="./img/birth.png" alt="date de naissance"> 12 décembre</li>
                        <li> <img class="logoInfo" src="./img/position.png" alt="localition"> paris</li>
                        <li> <img class="logoInfo" src="./img/car.png" alt="voiture image"> permis b</li>
                    </ul>
                </div>
                <div class="contactContainer">
                    <button class="contact">
                        <a href="mailto:antoinepauthierusd@gmail.com" target="_blank" rel="noopener noreferrer">
                            <i class="fas fa-envelope fa-1x"></i>
                        </a>      
                    </button>
                    <div class="heart">
                        <?php if(isset($_COOKIE['liked']) && $_COOKIE['liked'] == "true"): ?>
                            <i class="far fa-heart fa-1x liked"></i>
                            <i class="fas fa-heart fa-1x active "><p class="nbrFav"><?=(int)$nbrFav->nbrFav + 1?></p></i>   
                        <?php else:?>
                        <i class="far fa-heart fa-1x liked active"></i>
                        <i class="fas fa-heart fa-1x "><p class="nbrFav"><?=(int)$nbrFav->nbrFav + 1?></p></i>  
                        <?php endif; ?>         
                    </div>
                </div>  
            </div>
            <div class="navWrapper">
                <nav class="navContainer">
                        <div class="navContent">
                            <div class="home">
                                <a href="#" value="home">
                                       <img src="./img/icons/home.png" alt="antoine pauthier accueil">
                                    <p>accueil</p>
                                </a>
                            </div>
                            <div class="cv">
                                <a href="#" value="cv">
                                    <img src="./img/icons/cv.png" alt="antoine pauthier CV">
                                    <p>mon cv</p>
                                </a>
                            </div>
                            <div class="projet">
                                <a href="#" value="project">
                                    <img src="./img/icons/project.png" alt="projet antoine pauthier">
                                    <p>mes projets</p>
                                </a>
                            </div>
                        </div>
                        <div class="navLabel">menu</div>
                    </nav>
                <div class="overflowContainer">
                    <div class="containerPageArrow">
                         <div class="arrowNav">
                            <i direction="left" class="fas fa-chevron-left fa-2x"></i>
                            <i direction="right" class="fas fa-chevron-left fa-2x"></i>
                        </div> 
                    </div>
                    <div class="rightSide" value="home">
                        <div class="homeTitle">
                            <h1 class="sectionName">à propos</h1>
                        </div>
                        <div class="para">
                            <p>Depuis très jeune passionné d'informatique et par les nouvelles technologies, j’ai découvert par hasard le monde du développement et plus particulièrement le monde du dévéloppement web.
                            </p>
                            <p>Par la suite, j’ai commencé à me former plus sérieusement en autodidacte aux languages web de base à savoir le HTML, CSS, JAVASCRIPT, PHP.
                            </p>
                        </div>
                        <div class="jaime">
                            <h2>j'aime</h2>
                            <div class="cardJaimeContainer">
                                <div class="cardJaime">
                                    <h3 class="cardTitle">Développer tout type de site</h3>
                                    <div class="cardContent">
                                        <i class="fas fa-code fa-3x"></i>
                                        <p>J’aime créer tous type de site web, du simple site  vitrine au site plus complexe.</p>
                                    </div>
                                </div>
                                <div class="cardJaime">
                                    <h3 class="cardTitle">créer</h3>
                                    <div class="cardContent">
                                        <i class="far fa-lightbulb fa-3x"></i>
                                        <p>J’aime créer et rechercher des solutions afin de mener à bien des projets.</p>
                                    </div>
                                </div>
                            <div class="cardJaime">
                                    <h3 class="cardTitle">photographier</h3>
                                    <div class="cardContent">
                                        <i class="fas fa-camera fa-3x"></i>
                                        <p>J’aime faire des photos de nature ou de sport.</p>
                                    </div>
                                </div>
                                <div class="cardJaime">
                                    <h3 class="cardTitle">apprendre</h3>
                                    <div class="cardContent">
                                        <i class="fas fa-smile fa-3x"></i>
                                        <p>Je suis quelqu'un de naturellement curieux qui n'hésite pas à questionner, remettre en cause et persévérer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rightSide" value="project">
                        <div class="homeTitle">
                            <h1 class="sectionName">mes projets</h1>
                        </div>   
                        <div class="projectContainer">
                            <?php foreach ($data as $projet): ?>
                                <div class="projectCard" style="background-image: url('../img/projets/<?= $projet['pj_image'] ?>');">
                                    <div class="blackFilter"></div>
                                    <div class="viewProject">
                                        <h1><a href="#">voir le projet</a> </h1>
                                        <div class="pjInfoContainer">
                                            <div class="pjInfo">
                                                <a href="<?= $projet['pj_link_git'] ?>" target="_blank" rel="noopener noreferrer">
                                                    <i class="fab fa-github fa-3x"></i>
                                                    <p>github</p>     
                                                </a>
                                                <a href="<?= $projet['pj_link_real'] ?>" target="_blank" rel="noopener noreferrer">
                                                    <i class="fas fa-globe fa-3x"></i>
                                                    <p>site</p>
                                                </a>
                                            </div>
                                            <p>langages : <span><?= $projet['pj_tags'] ?></span></p>
                                            <p>status : <span><?= (int)$projet['pj_status'] ? "terminé" : "en cours" ?></span></p>
                                            <p>type : <span><?= $projet['pj_type'] ?></span></p>
                                        </div>
                                       
                                    </div>
                                    <div class="pjName">
                                        <h3><?= $projet['pj_nom'] ?></h3>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div> 
                        <div class="update">
                            <p>Dernière mise à jour le : <?= $data[0]['pj_date']?></p>
                        </div>
                    </div>
                    <div class="rightSide" value="cv">
                        <div class="homeTitle">
                            <h1 class="sectionName">mon cv</h1>
                        </div>    
                        <div class="cvContainer">
                                <div class="topPart">
                                    <div class="formation">
                                        <div class="titleForma">
                                            <i class="fas fa-graduation-cap fa-3x"></i>
                                            <h1>formation</h1>
                                        </div>
                                        <div class="formaContainer">
                                            <i class="fas fa-chevron-left"></i>
                                            <div class="formaContent">
                                                <?php foreach ($formaInfo as $info): ?>
                                                    <div id="f<?= $index++ ?>" class="titleHead">
                                                    <h3><?= $info['fm_nom'] ?></h3>
                                                    <p class="loc">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            <?=$info['fm_loc']?>
                                                        </p> 
                                                    </div>                                                   
                                                    <p>ecole : <span><?= $info['fm_nomEtablissement'] ?> </span></p>
                                                    <p class="description"> <?= $info['fm_description']?></p>

                                                    <p class="matiere">matières principales : <span><?= $info['fm_matiere'] ?></span></p>
                                                    <hr>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="experience">
                                        <div class="titleExp">
                                            <i class="fas fa-briefcase fa-3x"></i>
                                            <h1>expérience</h1>
                                        </div>
                                        <div class="expContainer">
                                            <i class="fas fa-chevron-left"></i>
                                            <div class="formaContent">    
                                                <?php foreach ($expInfo as $exp): ?>
                                                    <div id="f<?= $index++ ?>" class="titleHead">
                                                        <h3><?= $exp['exp_intitule'] ?></h3>
                                                    <p class="loc">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            <?=$exp['exp_loc']?>
                                                        </p> 
                                                    </div>
                                                    <p>Entreprise : <span><?= $exp['exp_entreprise'] ?> </span></p>
                                                    <p class="periode"><?= $exp['exp_periode']?></p>
                                                    <p class="description"> <?= $exp['exp_description']?></p>
                                                    <?php if($exp['exp_language'] != null): ?>
                                                        <p class="matiere">Langages : <span><?= $exp['exp_language'] ?></span></p>
                                                    <?php endif ?>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                                <div class="bottomPart">
                                    <h1>compétences</h1>
                                    <div class="flyover">
                                        <h4>over skills</h4>
                                        <h2>intermédiaire</h2>
                                    </div>

                                    <div class="skills">
                                        <div class="skill" value="html"><h1>html</h1></div>
                                        <div class="skill" value="css"><h1>css</h1></div>
                                        <div class="skill" value="js"><h1>javascript</h1></div>
                                        <div class="skill" value="wp"><h1>wordpress</h1></div>
                                        <div class="skill" value="php"><h1>php</h1></div>
                                        <div class="skill" value="mysql"><h1>mysql</h1></div>
                                    </div>
                                </div>
                        </div>
                    </div>    
                </div>
            </div>
            <div class="menuMobile">
                <ul>
                    <li><button value="home"><img src="../img/icons/home.png" alt="accueil"><div class="currentPage"></div></button></li>
                    <li><button value="cv"><img src="../img/icons/cv.png" alt="mon cv"><div class="currentPage"></div></button></li>
                    <li><button value="project"><img src="../img/icons/project.png" alt="mes projets"><div class="currentPage"></div></button></li>
                    <li><button value="sidebar"><img src="../img/icons/menu.png" alt="menu navigation"><div class="currentPage"></div></button></li>
                </ul>
            </div>
        </div>

    </section>
</body>
</html>