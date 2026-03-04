import './bootstrap';
import '../css/app.css';


AOS.init({duration:1000,once:true});

/* NAVBAR SCROLL */
window.addEventListener("scroll",function(){
const navbar=document.getElementById("navbar");
if(window.scrollY>50){
navbar.classList.add("nav-scrolled");
}else{
navbar.classList.remove("nav-scrolled");
}
});

/* COUNTER */
const counters=document.querySelectorAll('.counter');
counters.forEach(counter=>{
counter.innerText='0';
const updateCounter=()=>{
const target=+counter.getAttribute('data-target');
const c=+counter.innerText;
const increment=target/100;
if(c<target){
counter.innerText=`${Math.ceil(c+increment)}`;
setTimeout(updateCounter,20);
}else{
counter.innerText=target;
}
};
updateCounter();
});
