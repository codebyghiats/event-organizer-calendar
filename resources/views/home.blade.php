<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Planner</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/heroicons@2.0.18/outline/heroicons.js"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <link rel="icon" type="image/png" href="{{ asset('images/schoolplanner.png') }}">
</head>

<body class="font-sans antialiased text-gray-800 bg-white overflow-x-hidden">

<x-navbar></x-navbar>

<x-hero></x-hero>

<x-today></x-today>

<x-features></x-features>

<x-cta></x-cta>

<x-footer></x-footer>




<script>
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
</script>
</body>
</html>