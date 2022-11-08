const header = document.querySelector('.site-header')
const zone = document.querySelector('#zoneScroll')
let ul = document.querySelector('.menu').querySelectorAll('li')
console.log(ul)
window.addEventListener('scroll',e=>{
    let color = ""
    const pos = zone.offsetTop-200
    if(pos-header.offsetHeight<window.scrollY) color = "white"
    
    header.style.backgroundColor  = color

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

/*Dropdown Menu*/
$('.dropdown').click(function () {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu').slideToggle(300);
});
$('.dropdown').focusout(function () {
    $(this).removeClass('active');
    $(this).find('.dropdown-menu').slideUp(300);
});
$('.dropdown .dropdown-menu li').click(function () {
    $(this).parents('.dropdown').find('span').text($(this).text());
    $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
});
/*End Dropdown Menu*/


$('.dropdown-menu li').click(function () {
var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
  msg = '<span class="msg">Hidden input value: ';
$('.msg').html(msg + input + '</span>');
}); 