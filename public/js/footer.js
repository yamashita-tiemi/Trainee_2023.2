document.querySelectorAll(".mvvContainer").forEach(el => {
    let id = el.id;
    el.addEventListener("click", () => {
        
        switch(id) {
            case "mvvMissao":
               document.getElementById("missaoImg").classList.toggle("pressed")
               document.getElementById("missaoTxt").classList.toggle("selected")
               document.getElementById("missaoTxt").style.display = 'block'
               document.getElementById("visaoTxt").style.display = 'none'
               document.getElementById("valoresTxt").style.display = 'none'
               document.getElementById("visaoImg").classList.remove("pressed")
               document.getElementById("visaoTxt").classList.remove("selected")
               document.getElementById("valoresImg").classList.remove("pressed")
               document.getElementById("valoresTxt").classList.remove("selected")


            break
            case "mvvVisao":
               document.getElementById("visaoImg").classList.toggle("pressed")
               document.getElementById("visaoTxt").classList.toggle("selected")
               document.getElementById("missaoTxt").style.display = 'none'
               document.getElementById("visaoTxt").style.display = 'block'
               document.getElementById("valoresTxt").style.display = 'none'
               document.getElementById("missaoImg").classList.remove("pressed")
               document.getElementById("missaoTxt").classList.remove("selected")
               document.getElementById("valoresImg").classList.remove("pressed")
               document.getElementById("valoresTxt").classList.remove("selected")

            break
            case "mvvValores":
               document.getElementById("valoresImg").classList.toggle("pressed")
               document.getElementById("valoresTxt").classList.toggle("selected")
               document.getElementById("missaoTxt").style.display = 'none'
               document.getElementById("visaoTxt").style.display = 'none'
               document.getElementById("valoresTxt").style.display = 'block'
               document.getElementById("visaoImg").classList.remove("pressed")
               document.getElementById("visaoTxt").classList.remove("selected")
               document.getElementById("missaoImg").classList.remove("pressed")
               document.getElementById("missaoTxt").classList.remove("selected")

            break
        }
    })
});