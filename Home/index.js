window.addEventListener("scroll", function () {
    const header = document.querySelector(".header-2");
    if (window.scrollY > 50) { // Nếu cuộn qua 50px
        header.style.top = "0"; // Header di chuyển lên đầu trang
        header.style.transition = "top 0.2s ease-in-out"; // Hiệu ứng mượt
    } else {
        header.style.top = "65px"; // Header quay về vị trí ban đầu
    }
});


document.querySelector('.user-menu').addEventListener('click', function () {
    const menu = document.querySelector('.user-other');
    menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
});

// Đóng menu nếu click ra ngoài
document.addEventListener('click', function (e) {
    const userSection = document.querySelector('.user');
    const menu = document.querySelector('.user-other');
    if (!userSection.contains(e.target)) {
        menu.style.display = 'none';
    }
});


const slider = document.querySelector(".slider-wrapper");
const slides = document.querySelectorAll(".slide");
const prevBtn = document.getElementById("prev");
const nextBtn = document.getElementById("next");

let currentIndex = 0;
let isDragging = false;
let startPos = 0;
let currentTranslate = 0;
let prevTranslate = 0;

function updateSlider() {
  slider.style.transform = `translateX(-${currentIndex * 100}%)`;
}

function showNextSlide() {
  currentIndex = (currentIndex + 1) % slides.length;
  updateSlider();
}

function showPrevSlide() {
  currentIndex = (currentIndex - 1 + slides.length) % slides.length;
  updateSlider();
}

nextBtn.addEventListener("click", showNextSlide);
prevBtn.addEventListener("click", showPrevSlide);

// Tự động trượt slide
setInterval(showNextSlide, 5000);

// Sự kiện vuốt
slider.addEventListener("mousedown", startDrag);
slider.addEventListener("mouseup", endDrag);
slider.addEventListener("mousemove", drag);
slider.addEventListener("mouseleave", endDrag);

// Cho cảm ứng trên màn hình điện thoại
slider.addEventListener("touchstart", startDrag);
slider.addEventListener("touchend", endDrag);
slider.addEventListener("touchmove", drag);

function startDrag(e) {
  isDragging = true;
  startPos = getPositionX(e);
}

function endDrag() {
  if (!isDragging) return;
  isDragging = false;
  const movedBy = currentTranslate - prevTranslate;

  if (movedBy < -50) {
    showNextSlide();
  } else if (movedBy > 50) {
    showPrevSlide();
  } else {
    slider.style.transform = `translateX(-${currentIndex * 100}%)`;
  }
}

function drag(e) {
  if (!isDragging) return;
  const currentPosition = getPositionX(e);
  currentTranslate = prevTranslate + currentPosition - startPos;
  slider.style.transform = `translateX(${currentTranslate}px)`;
}

function getPositionX(e) {
  return e.type.includes("mouse") ? e.pageX : e.touches[0].clientX;
}

