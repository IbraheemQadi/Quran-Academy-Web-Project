// === AOS === //
AOS.init();
// === Up button === //
let span = document.querySelector(".up");

window.onscroll = () => {
  this.scrollY >= 851.2
    ? span.classList.add("show")
    : span.classList.remove("show");
};

span.onclick = () => {
  window.scrollTo(0, 0);
};
