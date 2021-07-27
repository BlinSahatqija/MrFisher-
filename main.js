const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
  navbarLinks.classList.toggle('active')
})


var bubbleSound = new Audio();
bubbleSound.src = "media/bubbles-effect.mp3";

//SLIDER

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





//LOGIN /

const loginModal= document.querySelector('.login-modal');
const loginBtn= document.querySelector('.login-btn');
const closeLogin= document.querySelector('.login-close');

loginBtn.addEventListener('click', openLoginModal);
function openLoginModal(){
    loginModal.style.display = 'block';
}


closeLogin.addEventListener('click', closeLoginModal);
function closeLoginModal(){
    loginModal.style.display = 'none';
}



//SIGNUP /

const signupModal= document.querySelector('.signup-modal');
const signupBtn= document.querySelector('.signup-btn');
const closeSignup= document.querySelector('.signup-close');

signupBtn.addEventListener('click', openSignupModal);
function openSignupModal(){
    signupModal.style.display = 'block';
    loginModal.style.display = 'none';
}


closeSignup.addEventListener('click', closeSignupModal);
function closeSignupModal(){
    signupModal.style.display = 'none';
    loginModal.style.display = 'none';
}



//CONTACT /

const contactModal= document.querySelector('.contact-modal');
const contactBtn= document.querySelectorAll('.contact-btn').forEach(item => {item.addEventListener('click', event => {contactModal.style.display= 'block';})});
const closeContact= document.querySelector('.contact-close');


closeContact.addEventListener('click', closeContactModal);
function closeContactModal(){
    contactModal.style.display = 'none';
}


// BOOKING

const bookingModal= document.querySelector('.booking-modal');
const bookingBtn= document.querySelectorAll('.booking-btn').forEach(item => {item.addEventListener('click', event => {bookingModal.style.display= 'block';})});
const closeBooking= document.querySelector('.booking-close');

closeBooking.addEventListener('click', closeBookingModal);
function closeBookingModal(){
    bookingModal.style.display = 'none';
}


//OUTSIDE CLICK /

window.addEventListener('click', outsideClick);
function outsideClick(e){
    if(e.target == loginModal){
        loginModal.style.display = 'none';
    }else if(e.target == signupModal){
        signupModal.style.display = 'none';
        loginModal.style.display = 'none';
    }else if(e.target == contactModal){
        contactModal.style.display = 'none';
    }else if(e.target == bookingModal){
        bookingModal.style.display = 'none';
    }
}


//LOGIN VALIDATION /
function validateLogin(loginForm){
    var email = document.getElementById("login-email").value;
    var password = document.getElementById("login-password").value;
    var emailRegx = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
   
    if(email == null || email==""){
        document.getElementById('login-email-val').innerHTML= 'Write your email!';
        document.getElementById('login-email-val').style.color="red";
        email.focus;
        return false;
    }else if(!(emailRegx.test(email))){
        document.getElementById('login-email-val').innerHTML= "Your email should look like this: 'example@example.com'!";
        document.getElementById('login-email-val').style.color="red";
        email.focus;
        return false;
    }else if(password == null || password==""){
        document.getElementById('login-password-val').innerHTML = "Write your password!";
        document.getElementById('login-password-val').style.color= "red";
        password.focus;
        return false;
    }else{
        return true;
    }
}


//SIGNUP VALIDATION /
function validateSignup(signupForm){
    var username = document.getElementById("signup-username").value;
    var email = document.getElementById("signup-email").value;
    var password = document.getElementById("signup-password").value;
    var emailRegx = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
   
    if(username == null || username==""){
        document.getElementById('signup-username-val').innerHTML= 'Write your username!';
        document.getElementById('signup-username-val').style.color="red";
        username.focus;
        return false;
    }else if(email == null || email==""){
        document.getElementById('signup-email-val').innerHTML= 'Write your email!';
        document.getElementById('signup-email-val').style.color="red";
        email.focus;
        return false;  
    }else if(!(emailRegx.test(email))){
        document.getElementById('signup-email-val').innerHTML= "Email must be like: 'example@example.com'!";
        document.getElementById('signup-email-val').style.color="red";
        email.focus;
        return false;
    }else if(password == null || password==""){
        document.getElementById('signup-password-val').innerHTML = "Write your password!";
        document.getElementById('signup-password-val').style.color= "red";
        password.focus;
        return false;
    }else{
        return true;
    }
}


//CONTACT VALIDATION /
function validateContact(contactForm){
    var name = document.getElementById("contact-name").value;
    var email = document.getElementById("contact-email").value;
    var message = document.getElementById("contact-message").value;
    var emailRegx = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
   
    if(name == null || name==""){
        document.getElementById('contact-name-val').innerHTML= 'Write your name!';
        document.getElementById('contact-name-val').style.color="red";
        name.focus;
        return false;
    }else if(email == null || email==""){
        document.getElementById('contact-email-val').innerHTML= 'Write your email!';
        document.getElementById('contact-email-val').style.color="red";
        email.focus;
        return false;  
    }else if(!(emailRegx.test(email))){
        document.getElementById('contact-email-val').innerHTML= "Email must be like: 'example@example.com'!";
        document.getElementById('contact-email-val').style.color="red";
        email.focus;
        return false;
    }else if(message == null || message==""){
        document.getElementById('contact-message-val').innerHTML = "Write your message!";
        document.getElementById('contact-message-val').style.color= "red";
        message.focus;
        return false;
    }else{
        return true;
    }
}


//BOOKING VALIDATION

function validateBooking(bookingForm){
    var name = document.getElementById("booking-name").value;
    var email = document.getElementById("booking-email").value;
    var date = document.getElementById("booking-date").value;
    var time = document.getElementById("booking-time").value;
    var emailRegx = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
   
    if(name == null || name==""){
        document.getElementById('booking-name-val').innerHTML = "Write your name!";
        document.getElementById('booking-name-val').style.color= "red";
        name.focus;
        return false;
    }else if(email == null || email==""){
        document.getElementById('booking-email-val').innerHTML= 'Write your email!';
        document.getElementById('booking-email-val').style.color="red";
        email.focus;
        return false;
    }else if(!(emailRegx.test(email))){
        document.getElementById('booking-email-val').innerHTML= "Your email should look like this: 'example@example.com'!";
        document.getElementById('booking-email-val').style.color="red";
        email.focus;
        return false;
    }else if(date == null || date==""){
        document.getElementById('booking-date-val').innerHTML = "You must set a date";
        document.getElementById('booking-date-val').style.color= "red";
        date.focus;
        return false;
    }else if(time == null || time==""){
        document.getElementById('booking-time-val').innerHTML = "You must set the time";
        document.getElementById('booking-time-val').style.color= "red";
        time.focus;
        return false;
    }else{
        return true;
    }
}