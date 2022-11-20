const header = document.querySelector('.site-header')
const zone = document.querySelector('#zoneScroll')
const nav = document.querySelector('.header__menu')
// let ul = document.querySelector('.menu').querySelectorAll('li')
// console.log(ul)
window.addEventListener('scroll',e=>{
    let color = ""
    const pos = zone.offsetTop-200
    if(pos-nav.offsetHeight<window.scrollY) color = "black"
    
    nav.style.backgroundColor  = color
    // nav.style.backgroundColor = "black"
})



/***************** apparition block *****************/
let ratio = .5
let options = {
    root: null,
    rootMargin: '0px',
    threshold: ratio
}


let callback = (entries, observer) => {
    entries.forEach((entry) => {
        if (entry.intersectionRatio > ratio) {
            entry.target.classList.add('reveal-visible')
            observer.unobserve(entry.target)
        }
    });
};

let observer = new IntersectionObserver(callback, options);
document.querySelectorAll('.reveal').forEach((r)=>{
    observer.observe(r)
})