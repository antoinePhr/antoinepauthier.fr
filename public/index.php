<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/41b0df0c75.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/widget.css">
    <link rel="icon" type="image/png" href="./img/icons/favicon.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;800&display=swap" rel="stylesheet">


    <title>Antoine Pauthier | Portefollio</title>
    <script src="./js/mobile-detect.js"></script>
</head>
<?php
include './php/database.php';
$querie = "SELECT * FROM projects ORDER BY pj_date DESC";
error_reporting(E_ALL);
$conn = OpenCon();
$conn->query("SET NAMES 'utf8'");
$result = $conn->query($querie);
$data = [];
while ($row = $result->fetch_assoc()) {
    array_push($data, $row);
}
$conn = null;
$result = null;

$query = "SELECT * FROM formations ORDER BY fm_dateStart DESC";
$conn = OpenCon();
$conn->query("SET NAMES 'utf8'");
$result = $conn->query($query);
$formaInfo = [];
while ($row = $result->fetch_assoc()) {
    array_push($formaInfo, $row);
}
$query = "SELECT * FROM experience ORDER BY exp_date DESC";
$conn = OpenCon();
$conn->query("SET NAMES 'utf8'");
$result = $conn->query($query);
$expInfo = [];
while ($row = $result->fetch_assoc()) {
    array_push($expInfo, $row);
}

$result = $conn->query("SELECT COUNT(*) as nbrFav FROM likes");
$nbrFav = $result->fetch_object();

$indexF = 0;
$indexE = 0;

?>

<body>
    <?php
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if (!preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4)))
        require './php/widget.php';
    ?>
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
                <img class="profil" src="./img/icons/menu.png" alt="Antoine Pauthier Développeur web">
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
                        <?php if (isset($_COOKIE['liked']) && $_COOKIE['liked'] == "true") : ?>
                            <i class="far fa-heart fa-1x liked"></i>
                            <i class="fas fa-heart fa-1x active ">
                                <p class="nbrFav"><?= (int)$nbrFav->nbrFav + 1 ?></p>
                            </i>
                        <?php else : ?>
                            <i class="far fa-heart fa-1x liked active"></i>
                            <i class="fas fa-heart fa-1x ">
                                <p class="nbrFav"><?= (int)$nbrFav->nbrFav + 1 ?></p>
                            </i>
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
                        <div class="profilImg">
                            <img src="./img/icons/menu.png" class="profil" alt="">
                        </div>
                        <div class="para">
                            <p>Depuis très jeune passionné d'informatique et par <span>les nouvelles technologies</span> , j’ai découvert par hasard le monde du développement et plus particulièrement le monde du dévéloppement web.
                            </p>
                            <p>Par la suite, j’ai commencé à me former plus sérieusement en autodidacte aux languages web de base à savoir le <span>HTML </span>, <span> CSS </span>, <span> JAVASCRIPT </span>, <span>PHP</span> .
                            </p>
                        </div>
                        <div class="jaime">
                            <h2>j'aime</h2>
                            <div class="cardJaimeContainer">
                                <div class="cardJaime">
                                    <h3 class="cardTitle">Développer</h3>
                                    <div class="cardContent">
                                        <i class="fas fa-code fa-3x"></i>
                                        <p>J’aime créer tous type de site web ou d'application web des plus simples aux plus complexes.</p>
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
                            <?php foreach ($data as $projet) : ?>
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
                            <p>Dernière mise à jour le : <?= $data[0]['pj_date'] ?></p>
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
                                            <?php foreach ($formaInfo as $info) : ?>
                                                <div id="f<?= $indexF-- ?>" class="titleHead">
                                                    <h3><?= $info['fm_nom'] ?></h3>
                                                    <p class="loc">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <?= $info['fm_loc'] ?>
                                                    </p>
                                                </div>
                                                <p>ecole : <span><?= $info['fm_nomEtablissement'] ?> </span></p>
                                                <p class="description"> <?= $info['fm_description'] ?></p>

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
                                            <?php foreach ($expInfo as $exp) : ?>
                                                <div id="f<?= $indexE-- ?>" class="titleHead">
                                                    <h3><?= $exp['exp_intitule'] ?></h3>
                                                    <p class="loc">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <?= $exp['exp_loc'] ?>
                                                    </p>
                                                </div>
                                                <p>Entreprise : <span><?= $exp['exp_entreprise'] ?> </span></p>
                                                <p class="periode"><?= $exp['exp_periode'] ?></p>
                                                <p class="description"> <?= $exp['exp_description'] ?></p>
                                                <?php if ($exp['exp_language'] != null) : ?>
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
                                    <h4>programming skills</h4>
                                    <h2>intermédiaire</h2>
                                </div>

                                <div class="skills">
                                    <div class="skill" value="html" type="prog">
                                        <h1>html</h1>
                                    </div>
                                    <div class="skill" value="css" type="prog">
                                        <h1>css</h1>
                                    </div>
                                    <div class="skill" value="js" type="prog">
                                        <h1>javascript</h1>
                                    </div>
                                    <div class="skill" value="wp" type="prog">
                                        <h1>wordpress</h1>
                                    </div>
                                    <div class="skill" value="php" type="prog">
                                        <h1>php</h1>
                                    </div>
                                    <div class="skill" value="mysql" type="prog">
                                        <h1>mysql</h1>
                                    </div>
                                    <div class="skill" value="reactjs" type="prog">
                                        <h1>reactjs</h1>
                                    </div>
                                    <div class="skill" value="c++" type="prog">
                                        <h1>c++</h1>
                                    </div>
                                </div>
                                <div class="flyover">
                                    <h4>soft skills</h4>
                                    <h2>intermédiaire</h2>
                                </div>

                                <div class="skills">
                                    <div class="skill" value="nginx" type="soft">
                                        <h1>nginx</h1>
                                    </div>
                                    <div class="skill" value="apache" type="soft">
                                        <h1>apache2</h1>
                                    </div>
                                    <div class="skill" value="linux" type="soft">
                                        <h1>linux</h1>
                                    </div>
                                    <div class="skill" value="git" type="soft">
                                        <h1>git</h1>
                                    </div>
                                    <div class="skill" value="figma" type="soft">
                                        <h1>figma</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menuMobile">
                <ul>
                    <li><button value="home"><img src="../img/icons/home.png" alt="accueil">
                            <div class="currentPage"></div>
                        </button></li>
                    <li><button value="cv"><img src="../img/icons/cv.png" alt="mon cv">
                            <div class="currentPage"></div>
                        </button></li>
                    <li><button value="project"><img src="../img/icons/project.png" alt="mes projets">
                            <div class="currentPage"></div>
                        </button></li>
                    <li><button value="sidebar"><img src="../img/icons/menu.png" alt="menu navigation">
                            <div class="currentPage"></div>
                        </button></li>
                </ul>
            </div>
        </div>

    </section>
</body>
<script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
<script src="./js/smooth.js"></script>
<script src="./js/script.js"></script>
<script src="./js/widget.js"></script>

</html>