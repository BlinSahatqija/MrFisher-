let slidePosition = 0;
const slides = document.getElementsByClassName('slider-item');
const totalSlides = slides.length;

document.getElementById('next').addEventListener("click", function(){
    nextSlide();
});

document.getElementById('prev').addEventListener("click", function(){
    prevSlide();
});

function updatePosition(){
    for(let slide of slides){
        slide.classList.remove('visible');
        slide.classList.add('hidden');
    }
    slides[slidePosition].classList.add('visible');
}

function nextSlide(){
    if(slidePosition == totalSlides -1){
        slidePosition = 0;
    }else{
        slidePosition ++;
    }
    updatePosition();
}

function prevSlide(){
    if(slidePosition == 0){
        slidePosition = totalSlides -1;
    }else{
        slidePosition --;
    }
    updatePosition();
}