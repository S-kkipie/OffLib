const toggle = document.querySelector(".arrow");
const sidebar = document.querySelector(".sidebar");
const main = document.querySelector("main");
toggle.addEventListener("click", () =>{
    sidebar.classList.toggle("close");
    main.classList.toggle("close");

})