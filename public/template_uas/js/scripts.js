let btn = document.querySelector(".fa-bars");
let sidebar = document.querySelector(".sidebar");

btn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
});

let arrows = document.querySelectorAll(".arrow");
    for(var i = 0; i < arrows.length ; i++){
        arrows[i].addEventListener("click",(e)=>{
            let arrowParent = e.target.parentElement.parentElement;
           arrowParent.classList.toggle("show"); 
        })
    };

const body =document.querySelector("body"),
        modeSwitch =body.querySelector(".toogle-switch"),
        modeText =body.querySelector(".mode-text");
    
        modeSwitch.addEventListener("click",()=>{
            body.classList.toggle("dark-mode-variables");
        });
const arrow = document.querySelector(".raul");
     const  user = document.querySelector(".rawr");

    arrow.addEventListener("click",()=>{
            user.classList.toggle("rawrz");
  });

  arrow.addEventListener("click",()=>{
    arrow.classList.toggle("rawrs");
});

const active = document.querySelector(".baka");

active.addEventListener("click",()=>{
    active.classList.toggle("active");
});
const left = document.querySelector(".toggle");

left.addEventListener("click",()=>{
    sidebar.classList.toggle("left");
});