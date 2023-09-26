const enlaces_li_menu = document.querySelectorAll(".bar-links ul li");
const enlaces_menu = document.querySelectorAll(".bar-links ul li a");
const toggle = document.querySelector(".arrow");
const sidebar = document.querySelector(".sidebar");
const main = document.querySelector("main");
const button_foto_portada = document.querySelector(".button-portada");
const button_foto_perfil = document.querySelector(".button-perfil");
const input_portada = document.getElementById("select-portada");
const input_perfil = document.getElementById("select-perfil");
const enviar_form_fotos = document.getElementById("enviar-form-fotos")
toggle.addEventListener("click", () =>{
    sidebar.classList.toggle("close");
    main.classList.toggle("close");
})
button_foto_portada.addEventListener("click", () =>{
    input_portada.click();
    input_portada.addEventListener("change", () =>{
        enviar_form_fotos.click();
    })
    

})
button_foto_perfil.addEventListener("click", () =>{
    input_perfil.click();
    input_perfil.addEventListener("change", () =>{
        enviar_form_fotos.click();
    })
})
for(let i = 0; i < enlaces_li_menu.length; i++){
    enlaces_li_menu[i].addEventListener("click", () =>{
        enlaces_menu[i].click();
    })

}


