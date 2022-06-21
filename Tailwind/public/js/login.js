function addClass(e, classes){
    e.classList && e.classList.add(...classes.split(" "));
}    
function removeClass(e, classes){
    e.classList && e.classList.remove(...classes.split(" "));
}

const menuLogin = document.getElementById("login");
const menuRegis = document.getElementById("regis");
const formlog = document.getElementById("loginform")
const formreg = document.getElementById("regisform")

menuRegis.onclick = (()=>{
    formlog.style.marginLeft = "-50%";
});
menuLogin.onclick = (()=>{
    formlog.style.marginLeft = "0%";
});

// menuLogin.addEventListener("click", function(){
//     menuRegis.style.display()
// })
