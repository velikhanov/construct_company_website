// const links=document.querySelectorAll(".nav-link"),sections=[...document.querySelectorAll(".forJS")],callback=e=>{links.forEach(e=>e.classList.remove("active"));const s=e.find(e=>e.isIntersecting);if(s){const e=sections.findIndex(e=>e===s.target);links[e].classList.add("active")}};let observer=new IntersectionObserver(callback,{rootMargin:"0px",threshold:.25});sections.forEach(e=>observer.observe(e));
const links = document.querySelectorAll('.nav-link');
const sectionsShort = [...document.querySelectorAll('.forJS:not(.long)')];
const sectionsLong = [...document.querySelectorAll('.forJS.long')];
const sections = [...document.querySelectorAll('.forJS')];

const callback = entries => {
    links.forEach((link) => link.classList.remove('active'));
    const elem = entries.find((entry) => entry.isIntersecting);
    if (elem) {
        const index = sections.findIndex((section) => section === elem.target);
        links[index].classList.add('active');
    }
}

const observerShort = new IntersectionObserver(callback, {
    rootMargin: '0px',
    threshold: .5,
});
const observerLong = new IntersectionObserver(callback, {
    rootMargin: '0px',
    threshold: .3,
});
sectionsShort.forEach((section) => {
    observerShort.observe(section)
});
sectionsLong.forEach((section) => {
    observerLong.observe(section)
});
// const links = document.querySelectorAll('.nav-link');
// const sections = [... document.querySelectorAll('.forJS')];
//
// const callback = (entries) => {
//   links.forEach((link) => link.classList.remove('active'));
//   const elem = entries.find((entry) => entry.isIntersecting);
//   if (elem) {
//     const index = sections.findIndex((section) => section === elem.target);
//     links[index].classList.add('active');
//   }
// }
//
// let observer = new IntersectionObserver(callback, {
//   rootMargin: '0px',
//   threshold: .5
// });
//
// sections.forEach((section) => observer.observe(section));
////////////////////////////////////////////////////////////////////////////
document.querySelectorAll('.nav-item').forEach(function(l) {
    l.addEventListener('click', function() { document.getElementById('navbarNav').classList.toggle('show'); document.querySelector('.animated-icon2').classList.toggle('open'); })
});
