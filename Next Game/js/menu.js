
document.querySelector(".bar-menu").addEventListener("click", animateBars);
document.querySelector(".back-menu").addEventListener("click", ocultar_menu);

let line1_bar = document.querySelector(".line1-bar-menu");
let line2_bar = document.querySelector(".line2-bar-menu");
let line3_bar = document.querySelector(".line3-bar-menu");
let nav = document.querySelector(".nav-nx");
let background_menu = document.querySelector(".back-menu");
let body_scroll = document.querySelector("body");



function animateBars(){
   /* line1_bar.classList.toggle("Activeline1-bar-menu")
    line2_bar.classList.toggle("Activeline2-bar-menu")
    line3_bar.classList.toggle("Activeline3-bar-menu")*/
    body_scroll.style.overflow = "hidden";
    nav.style.right = "0px";
    background_menu.style.display = "block";
}

function ocultar_menu() {
    
    body_scroll.style.overflow="scroll"
    nav.style.right = "-250px";
    background_menu.style.display = "none";
   /* line1_bar.classList.toggle("Activeline4-bar-menu")
    line2_bar.classList.toggle("Activeline5-bar-menu")
    line3_bar.classList.toggle("Activeline6-bar-menu")*/

}

