
document.addEventListener('DOMContentLoaded',()  =>{
        document.getElementById("formRegister").style.display='none';
})
function mostrarRegistro(){
        document.getElementById("formRegister").style.display='block';
        document.getElementById("formLogin").style.display='none';
}
function mostrarLogin(){
        document.getElementById("formRegister").style.display='none';
        document.getElementById("formLogin").style.display='block';        
}