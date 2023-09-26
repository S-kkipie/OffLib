const enlaces_li_menu = document.querySelectorAll(".bar-links ul li");
const enlaces_menu = document.querySelectorAll(".bar-links ul li a");
const toggle = document.querySelector(".arrow");
const sidebar = document.querySelector(".sidebar");
const main = document.querySelector("main");
toggle.addEventListener("click", () =>{
    sidebar.classList.toggle("close");
    main.classList.toggle("close");
})
for(let i = 0; i < enlaces_li_menu.length; i++){
    enlaces_li_menu[i].addEventListener("click", () =>{
        enlaces_menu[i].click();
    })

}


