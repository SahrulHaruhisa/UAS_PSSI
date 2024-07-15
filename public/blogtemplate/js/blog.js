
const nextBtn = document.querySelector('.next-button');
  const prevBtn = document.querySelector('.prev-button');
  const slides = document.querySelectorAll('.item');
  const slideicons = document.querySelectorAll('.slide-icon');
  const numberOfSlides = slides.length;
  var slidernumber = 0;

  nextBtn.addEventListener("click", ()=>{
    slides.forEach((slide)=>{
      slide.classList.remove("active");
    });
    slideicons.forEach((slide)=>{
      slide.classList.remove("active");
    });

    slidernumber++;

    if(slidernumber > (numberOfSlides -1)){
      slidernumber = 0;
    }
    slides[slidernumber].classList.add("active");
    slideicons[slidernumber].classList.add("active");
  })

  prevBtn.addEventListener("click", ()=>{
    slides.forEach((slide)=>{
      slide.classList.remove("active");
    });
    slideicons.forEach((slide)=>{
      slide.classList.remove("active");
    });

    slidernumber--;

    if(slidernumber < 0){
      slidernumber = numberOfSlides -1;
    }
    slides[slidernumber].classList.add("active");
    slideicons[slidernumber].classList.add("active");
  });


















const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      modeToggle = document.querySelector(".dark-light"),
      searchToggle = document.querySelector(".searchToggle"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      siderbarClose = document.querySelector(".siderbarClose");

      let getMode = localStorage.getItem("mode");
          if(getMode && getMode === "dark-mode"){
            body.classList.add("dark");
          }

// js code to toggle dark and light mode
      modeToggle.addEventListener("click" , () =>{
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");

        // js code to keep user selected mode even page refresh or file reopen
        if(!body.classList.contains("dark")){
            localStorage.setItem("mode" , "light-mode");
        }else{
            localStorage.setItem("mode" , "dark-mode");
        }
      });

// js code to toggle search box
        searchToggle.addEventListener("click" , () =>{
        searchToggle.classList.toggle("active");
      });
 
      
//   js code to toggle sidebar
sidebarOpen.addEventListener("click" , () =>{
    nav.classList.add("active");
});

body.addEventListener("click" , e =>{
    let clickedElm = e.target;

    if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
        nav.classList.remove("active");
    }
});





const wrapper = document.querySelector(".wrapper-slide");
const carousel = document.querySelector(".carousel");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
const arrowBtns = document.querySelectorAll(".button-action2 i");
const carouselChildrens = [...carousel.children];

let isDragging = false, isAutoPlay = true, startX, startScrollLeft, timeoutId;

// Get the number of cards that can fit in the carousel at once
let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);

// Insert copies of the last few cards to beginning of carousel for infinite scrolling
carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
    carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
});

// Insert copies of the first few cards to end of carousel for infinite scrolling
carouselChildrens.slice(0, cardPerView).forEach(card => {
    carousel.insertAdjacentHTML("beforeend", card.outerHTML);
});

// Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
carousel.classList.add("no-transition");
carousel.scrollLeft = carousel.offsetWidth;
carousel.classList.remove("no-transition");

// Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
    });
});

const dragStart = (e) => {
    isDragging = true;
    carousel.classList.add("dragging");
    // Records the initial cursor and scroll position of the carousel
    startX = e.pageX;
    startScrollLeft = carousel.scrollLeft;
}

const dragging = (e) => {
    if(!isDragging) return; // if isDragging is false return from here
    // Updates the scroll position of the carousel based on the cursor movement
    carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
}

const dragStop = () => {
    isDragging = false;
    carousel.classList.remove("dragging");
}

const infiniteScroll = () => {
    // If the carousel is at the beginning, scroll to the end
    if(carousel.scrollLeft === 0) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
        carousel.classList.remove("no-transition");
    }
    // If the carousel is at the end, scroll to the beginning
    else if(Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");
    }

    // Clear existing timeout & start autoplay if mouse is not hovering over carousel
    clearTimeout(timeoutId);
    if(!wrapper.matches(":hover")) autoPlay();
}

const autoPlay = () => {
    if(window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
    // Autoplay the carousel after every 2500 ms
    timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
}
autoPlay();

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carousel.addEventListener("scroll", infiniteScroll);
wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapper.addEventListener("mouseleave", autoPlay);




const tl =gsap.timeline()

tl.from(".logo img",{
  y:-20,
  duration:2,
  delay:0.1,
  opacity:0,
  stagger:0.2
});
tl.from(".nav-bar p",{
  y:5,
  duration:2,
  delay:1,
  opacity:0.8,
  stagger:0.1
});
tl.from(".darkLight-searchBox .bx-menu, .darkLight-searchBox .bx-moon, .darkLight-searchBox .bx-search",{
  y:1,
  duration:2,
  delay:0.2,
  opacity:1,
  stagger:0.1,
   
});
tl.from(".Sliderhome .item img",{
  x:10,
  duration:2,
  delay:2,
  opacity:1,
  stagger:0.5
});
tl.from(".Sliderhome .content p",{
  x:50,
  duration:2,
  delay:2,
  opacity:1,
  stagger:0.5
});
tl.from(".pssi-section",{
  x:-50,
  duration:3,
  delay:2,
  opacity:1,
  stagger:0.5
});
tl.from(".slider-ticket",{
  x:0,
  duration:10,
  delay:1,
  opacity:1,
  stagger:0.5
});


gsap.registerPlugin(ScrollTrigger);

// gsap.to(".pssi-section",{
//   x:100,
//   duration:3,
//   opacity:1,
//   scrollTrigger:{
//     trigger:".boxberita",
//     start:"top 0%",
//     end:"center 20%",
   
//   }
// })

gsap.to(".boxberita",{
  x:200,
  duration:3,
  scrollTrigger:{
    trigger:".boxberita",
    start:"top 50%",
    end:"center 20%",
   
  }
})

gsap.to(".shintaeyong-section",{
  x:-500,
  duration:3,
  scrollTrigger:{
    trigger:".shintaeyong-section",
    start:"top 20%",
    end:"center 20%",
   
  }
})

gsap.from(".slider-ticket",{
  x:0,
  duration:10,
  delay:1,
  opacity:1,
  scrollTrigger:{
    trigger:".slider-ticket",
    start:"top 30%",
    end:"center 20%",
   
  }
});