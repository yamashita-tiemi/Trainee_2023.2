const buttonE2 = document.getElementById("bb");
const sideEl = document.querySelector(".nav1");

const opened = () => {
    

    if (sideEl.classList.contains("grande")) {
        sideEl.classList.remove("grande")
        telaEl.classList.remove("css")
        document.getElementById("overlay1").style.display = "none";


    } else {
        sideEl.classList.add("grande");
        if (telaEl) {
            telaEl.classList.add('css');
        } else {
            console.error('Elemento não encontrado.');
        }
        document.getElementById('overlay1').style.display = 'block';
        console.log("foi");
    }
}

buttonE2.addEventListener("click", opened)