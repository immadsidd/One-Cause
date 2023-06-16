

//SCROLL REVEAL ANIMATION
const sr = ScrollReveal({
    origin: "top",
    distance: "60px",
    duration: 2500,
    delay: 400,
    reset: true,
  });
  
  sr.reveal('.text-overlay h1, .button-container', {
    delay: 100,
    origin: "top",
    scale: 0.9,
    distance: "30px",
  });
  
  sr.reveal('.service-text, .bc, .t1', {
    delay: 100,
    origin: "left",
    scale: 0.9,
    distance: "30px",
  });
  
  sr.reveal(' .p1, .text-overlay p, .t2', {
    delay: 100,
    scale: 0.9,
    origin: "right",
    distance: "30px",
  });
  
  sr.reveal('.pp', {
    delay: 100,
    scale: 0.9,
    origin: "left",
    distance: "40px",
  });
  
  sr.reveal('.circle-container, .carousel, .service-icon, .view-all-btn, .d_B', {
    delay: 100,
    scale: 0.9,
    origin: "top",
    distance: "30px",
  });
  
