const toggleMenu = document.getElementById('toggle-menu');
const  navbar = document.getElementById('navbar-nav');

toggleMenu.addEventListener("click", () => {
    navbar.classList.toggle("show");
});

function myFunction(x){
    x.classList.toggle("change");
};



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


// const carousel = document.querySelector(".carousel");
// const arrowbtns = document.querySelectorAll(".button-action2 i");
// const card = carousel.querySelector(".card").offsetWidth;
// const carouselChild =[...carousel.child];

// arrowbtns.forEach(btn =>{
//   btn.addEventListener("click",()=>{
//      carousel.scrollLeft += btn.id === "left" ? -card : card;
//   });
// });

// let isDragging = false ,startX ,startscrollLeft;
// let cardPerView = Math.round(carousel.offsetWidth / card);

// carouselChild.slice(-cardPerView).reverse().forEach(cards => {
//   carousel.insertAdjacentHTML("afterbegin",cards.outerHTML);
// });
// carouselChild.slice(0 ,cardPerView).forEach(cards => {
//   carousel.insertAdjacentHTML("before",cards.outerHTML);
// });

// carouselChild.slice()


// const dragstart = ()=> {
//   isDragging = true;
//   carousel.classList.add("dragging");
//   startX = e.pageX;
//   startscrollLeft= carousel.scrollLeft;
// }

// const dragging = (e) => {
//   if(!isDragging) return;
//   carousel.scrollLeft = startscrollLeft - (e.pageX - startX);
// }


// const dragstop = () => {
//   isDragging = false;
//   carousel.classList.remove("dragging");

// }


// carousel.addEventListener("mousedown",dragstart);
// carousel.addEventListener("mousemove",dragging);
// document.addEventListener("mouseup",dragstop);
// carousel.addEventListener("scroll",infiniteScroll);
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