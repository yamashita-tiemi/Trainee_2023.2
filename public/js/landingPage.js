const wrapper = document.querySelector(".wrapper");
const carousel = document.querySelector(".carousel");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
const arrowBtns = document.querySelectorAll(".wrapper i");

let isDragging = false,
  startX,
  startScrollLeft;

const showHideIcons = () => {
  // showing and hiding prev/next icon according to carousel scroll left value
  let scrollWidth = carousel.scrollWidth - carousel.clientWidth; // getting max scrollable width
  arrowBtns[0].style.display = carousel.scrollLeft <= 10 ? "none" : "block";
  arrowBtns[1].style.display =
    carousel.scrollLeft >= scrollWidth - 10 ? "none" : "block";
};

const scrollToTopBtn = document.getElementById("scrollToTopBtn");

window.onscroll = function () {
  if (
    document.body.scrollTop > 150 ||
    document.documentElement.scrollTop > 150
  ) {
    scrollToTopBtn.style.display = "block";
  } else {
    scrollToTopBtn.style.display = "none";
  }
};

scrollToTopBtn.addEventListener("click", function () {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
});

const dragStart = (e) => {
  isDragging = true;
  carousel.classList.add("dragging");
  startX = e.pageX;
  startScrollLeft = carousel.scrollLeft;
};

const dragging = (e) => {
  if (!isDragging) return;
  const positionDiff = e.pageX - startX;
  carousel.scrollLeft = startScrollLeft - positionDiff;
  showHideIcons();
};

const dragStop = () => {
  isDragging = false;
  carousel.classList.remove("dragging");
  showHideIcons();
};

arrowBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      const direction = btn.id === "left" ? -1 : 1;
      const newPosition =
        direction === -1
          ? carousel.scrollLeft - firstCardWidth
          : carousel.scrollLeft + firstCardWidth;
      carousel.scrollLeft = Math.min(
        Math.max(newPosition, 0),
        carousel.scrollWidth - carousel.clientWidth
      );
      showHideIcons();
    });
  });
  
  carousel.addEventListener("scroll", showHideIcons);

carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);


