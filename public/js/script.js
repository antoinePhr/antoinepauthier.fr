const body = document.querySelector('body')
const containerLoader = document.querySelector('.loader')
const videoLoad = document.querySelector('.head>video')
const loaderHead = document.querySelector('.head')
const progressBar = document.querySelector('.progressBar')
const loader = document.querySelector('.percentage')
const navCont = document.querySelector('.navContainer')
const navLabel = document.querySelector('.navLabel')
const navContentElem = document.querySelectorAll('.navContent>div')
const navWrapper = document.querySelector('.navWrapper')
const contactContainer = document.querySelector('.contactContainer')
const rightSides = document.querySelectorAll('.rightSide')
const menuButton = document.querySelectorAll(".navContent>div>a")
const mobileNavButtons = document.querySelectorAll('.menuMobile>ul>li>button')
const mobilePointerNavButtons = document.querySelectorAll('.menuMobile>ul>li>button>.currentPage')
const menuMobile = document.querySelector(".menuMobile")
const crossBTN = document.querySelector('.leftSide>i')
var is800 = false;
const containerPageArrow = document.querySelector('.containerPageArrow')
const containerNavArrow = document.querySelector('.arrowNav')
const navArrows = document.querySelectorAll('.arrowNav>i')
const leftSide = document.querySelector('.leftSide')

const divPjNames = document.querySelectorAll('.pjName')

const hearts = document.querySelectorAll('.heart>i')

const colors = ["#FEAB0F", "#0E8BCD", "#FEBC10", "#FB0A69", "#FE624C", "#F04641"]
const skills = document.querySelectorAll('.skill')

const overflowElem = document.querySelectorAll('.rightSide>*')
var numbSorted = []

const resetScrollTab = [window, document.querySelector('.projectContainer'), document.querySelectorAll('.formaContent')]
window.addEventListener('DOMContentLoaded', function(){
    /* -- LOADER ---*/
        setTimeout(() => {
            alert("Mon site est toujours en développement, il n'est donc pas fini \n il manque encore des fonctionnalités et du contenu \n La version finale sera disponible le 1er avril")
        }, 5000);
        videoLoad.addEventListener('loadeddata', function(){
            loaderHead.classList.add('appearLoader')
            loader.style.width="100%"
            body.style.overflow="hidden"
            setTimeout(() => {
                containerLoader.classList.add('loaded')
                body.style.overflow="unset"

                setTimeout(() => {
                    containerLoader.style.display="none"
                }, 500);
            }, 2800);
        })
    rightSides[0].classList.add('active')
    navContentElem[0].style.backgroundColor="#1797d9"
    mobileNavButtons[0].setAttribute('disabled', 'true')
    mobilePointerNavButtons[0].classList.add('active')

    if(window.matchMedia("(min-width: 800px)").matches){
        leftSide.style.height= getComputedStyle(rightSides[0]).height 
        contactContainer.style.height = parseInt(getComputedStyle(leftSide).height)*0.30 +"px"//=25% de la hauteur de leftside  
    }   
    else{
        // au chargement

        rightSides.forEach(rightSide =>{
            if(rightSide.classList.contains('active')){
                // calcule du padding nécéssaire pour qu'il prenne en compte la nav mobile
                const menuMobileHeight = parseInt(getComputedStyle(menuMobile).height)
                const menuMobileBotton = parseInt(getComputedStyle(menuMobile).bottom)
                rightSide.style.paddingBottom = menuMobileBotton + menuMobileHeight + "px"
            }
            else{
                rightSide.style.paddingBottom = "unset"
        }
    })

        leftSide.removeAttribute('style') 
        is800 = true;
        // ANIMATION DES MA NAV MOBILE transi page
        mobileNavButtons.forEach(button =>{
            if(button.getAttribute('value') != "sidebar"){
                button.addEventListener('click', function(){
                        animOut()
                        setActiveIconNavMobile(button)
                        setTimeout(() => {
                            setActiveRightSide(rightSides, button.getAttribute('value'))
                            rightSides.forEach(rightSide =>{
                                if(rightSide.classList.contains('active')){
                                    // calcule du padding nécéssaire pour qu'il prenne en compte la nav mobile
                                    const menuMobileHeight = parseInt(getComputedStyle(menuMobile).height)
                                    const menuMobileBotton = parseInt(getComputedStyle(menuMobile).bottom)
                                    rightSide.style.paddingBottom = menuMobileBotton + menuMobileHeight + "px"
                                }
                                else{
                                    rightSide.style.paddingBottom = "unset"
                                }
                            })
                            removeAnimOut()
                        }, 400);    
                })
            }
            else{
                button.addEventListener('click', sidebarAppear)
            }
        })
        navWrapper.addEventListener("click", closeSidebar) 
        crossBTN.addEventListener('click', sidebarAppear)   
    }
    if(window.matchMedia('(min-width: 800px) and (max-width: 1250px)').matches){
        var index = 0
        // systeme de NAVIGation avec les arrows
        navArrows.forEach(arrow =>{
            arrow.addEventListener('click', function(){
                containerPageArrow.classList.add('active')
                switch (arrow.getAttribute('direction')) {
                    case 'left':
                        if(index > 0) index--
                        else if (index == 0) index = rightSides.length-1

                        
                        break;
    
                    case 'right':
                        if(index >= 0 && index < rightSides.length-1)
                        {
                             index++
                        }
                        else if(index == rightSides.length-1){ index = 0}
                    break
                    
                    default:
                        break;
                }
                switch (index) {
                    case 0:
                        animOut()
                        setCurrentIconPage(index)
                        setTimeout(() => {
                            removeAnimOut()
                            setActiveRightSide(rightSides, 'home')
                        }, 400);                  
                        break
                    case 1:
                        animOut()
                        setCurrentIconPage(index)
                        setTimeout(() => {
                            removeAnimOut()
                            setActiveRightSide(rightSides, 'cv')
                        }, 400);
                        break;
                    case 2:
                        animOut()
                        setCurrentIconPage(index)
                        setTimeout(() => {
                            removeAnimOut()
                            setActiveRightSide(rightSides, 'project')
                        }, 400);
                        break
                }
                setTimeout(() => {
                   containerPageArrow.classList.remove('active') 
                }, 1000);
                
            })
        })
        // creation dynamique est icon page
        var pages = document.createElement('div')
        pages.setAttribute('class', 'pagesNumber')
        containerNavArrow.insertAdjacentElement('afterend', pages)
        for(var i = 0; i < rightSides.length; i++){
            var page = document.createElement('div')
            page.setAttribute('class', 'iconPage')
            pages.appendChild(page)
        }
        setCurrentIconPage(index) // iconPage[0] mis active pour premiere page lors du premier chargement
    }
    divPjNames.forEach(divPjName =>{
        // centrage sur le bottom des cardProject
        divPjName.style.bottom = -parseInt(getComputedStyle(divPjName).height)/2 + "px"
    })

    //AFFICHAGE DES BACKGROUDNCOLOR des skills ALÉATOIREMENT depuis mon tableau
    const lvl = document.querySelector('.bottomPart>.flyover>h2')
    skills.forEach(skill =>{
        var numb = getRandomInt(colors.length-1)
        skill.style.backgroundColor = colors[numb] 
        colors.splice(numb, 1)  
        skill.addEventListener('mouseenter', function(){
            animLVL(skill, lvl)
        skill.addEventListener('mouseleave', function(){
            lvl.classList.remove('active')
            const overme = document.querySelector('.flyover>h3')
            overme.classList.remove('active')
        })
    })
})
    navLabel.addEventListener('click', function(){
        navLabel.classList.toggle('active')
        navCont.classList.toggle('active')
        setTimeout(() => {
            navContentElem.forEach(elem => {
                elem.classList.toggle('bump')
            })      
        }, 300); 
    })


    //nav pc
    menuButton.forEach(button =>{
        button.addEventListener('click', function(){  
            var target = button.getAttribute('value')
            menuButton.forEach(b =>{
                // couleur arriere plan du button actif
                if(b.getAttribute('value') == target){ 
                   switch (target) {
                       case "home":
                           b.parentElement.style.backgroundColor="#1797d9"
                           break;
                    case "cv":
                        b.parentElement.style.backgroundColor="#fea90e"
                        break;
                    case "project":
                        b.parentElement.style.backgroundColor="#f04641"
                        break;
                   
                       default:
                           break;
                   }
                }
                else{b.parentElement.style.backgroundColor="white"}
               
            })
            var currentRightSide = document.querySelector(".rightSide[value="+target+"]")
            if(currentRightSide.classList.contains('active')) 
                return
            
            
            animOut()
            setTimeout(() => {
                setActiveRightSide(rightSides, button.getAttribute('value'))
                removeAnimOut()
            }, 400);
            
        })
    })

    hearts.forEach(heart =>{
        heart.addEventListener('click', function(){
            animHeart(heart)
        })

    })

})
window.addEventListener('resize', function(){
    // car si continue en dessous de 800px la height interfère avec d'autre propriété 
    if(window.matchMedia("(min-width: 800px)").matches){
        rightSides.forEach(rightSide =>{
           if(rightSide.classList.contains('active')){
            leftSide.style.height= getComputedStyle(rightSide).height       
           }
       })
    }
    else{
        rightSides.forEach(rightSide =>{
            if(rightSide.classList.contains('active')){
             leftSide.removeAttribute('style')      
            }
    })
}

});


function setCurrentIconPage(index){
    const iconPages = document.querySelectorAll('.iconPage')
    iconPages.forEach(iconPage =>{
        if(iconPage.classList.contains('active')){
            iconPage.classList.remove('active')
        }
    })
    iconPages[index].classList.add('active')
}
// anim out lors des changmenet des pages
function animOut(){
    rightSides.forEach(elem =>{
        if(elem.classList.contains('active')){
            elem.classList.add('animOut')
        }
    })
}
// supprime lanimOut pour laisse passer l'animIn de la classe active
function removeAnimOut(){
    resetScroll(resetScrollTab)
    rightSides.forEach(elem =>{
        if(elem.classList.contains('animOut')){
            elem.classList.remove('animOut')
        }
    })
}


// reset le scroll lors que changement de page pour être toujours en haut des div qui ya overflow
// @param1 = tableau des éléments des quelles on veut reset
function resetScroll(elems = []){
    elems.forEach(elem =>{
        if(elem.length > 1){
            elem.forEach(el =>{
                el.scrollTo(0,0)
            })
        }
        else{
            elem.scrollTo(0,0)  
        }     
    })
}

/*
    @param1 : tableau slides
    @param2 : attribut "value"
*/ 
function setActiveRightSide(rightSides, target){
   rightSides.forEach(rightSide =>{
        if(rightSide.getAttribute('value') != target){
            if(rightSide.classList.contains('active')){
                rightSide.classList.remove('active')
                if(matchMedia("(max-width: 800px)").matches){
                    mobileNavButtons.forEach(buttonMob =>{
                        if(buttonMob.getAttribute('value') != target)
                            buttonMob.removeAttribute('disabled')
                    })
                }
                
            }
        }
        else{
            if(!rightSide.classList.contains('active')){      
                rightSide.classList.add('active')
                if(matchMedia("(max-width: 800px)").matches){
                    mobileNavButtons.forEach(buttonMob =>{
                    if(buttonMob.getAttribute('value') == target)
                        buttonMob.setAttribute('disabled', 'true')  
                    })
                }
                
                if(!is800)
                    leftSide.style.height= getComputedStyle(rightSide).height
            }
        }   
    })
}
/* 
    @param1 : borne + de l'intervalle 
    @return nombre
*/
function getRandomInt(max) {
    return Math.floor(Math.random() * Math.floor(max));
}

function sidebarAppear(){
    leftSide.classList.toggle('active')
    body.style.overflow="hidden"
    navWrapper.classList.toggle('sidebarActive')
    menuMobile.classList.toggle('hide')
}
function closeSidebar(){
    if(leftSide.classList.contains('active')){
        leftSide.classList.remove('active')
        body.style.overflow="unset"
        navWrapper.classList.remove('sidebarActive')
        menuMobile.classList.remove('hide')
    }
}
function setActiveIconNavMobile(current){
    mobileNavButtons.forEach(button =>{
        button.children.item(1).classList.remove('active')
    })
    current.children.item(1).classList.add('active')
    mobileNavButtons.forEach(btn =>{
        if(btn.classList.contains('active')){
            btn.classList.remove('active')
        }
    current.classList.add('active')
    })
}

function animLVL(skill, lvl){

    switch (skill.getAttribute('value')){
        case "html":
            lvl.innerHTML = "confirmé"
        break;

        case "css":
            lvl.innerHTML = "confirmé"
            break;
        
        case "js":
            lvl.innerHTML = "intermédiaire"
            break;

        case "php":
            lvl.innerHTML = "intermédiaire"
            break;
        
        case "wp":
            lvl.innerHTML = "débutant"
            break;
        
        case "mysql":
            lvl.innerHTML = "intermédiaire"
            break;
    
        default:
            break;
    }
    lvl.style.color = getComputedStyle(skill).backgroundColor
    lvl.classList.add('active')
    const overme = document.querySelector('.flyover>h3')
    overme.classList.add('active')
}

function animHeart(heart){
    if(heart.classList.contains('liked')){
        heart.classList.remove('active')
        heart.nextElementSibling.classList.add('active')
        
    }
    else{
        heart.classList.remove('active')
        heart.previousElementSibling.classList.add('active')  
    }

}