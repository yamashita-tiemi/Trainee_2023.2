document.querySelectorAll(".mvvContainer").forEach(el => {
    let id = el.id;
    el.addEventListener("click", () => {
        switch(id) {
            case "mvvMissao":
               document.getElementById("missaoImg").classList.toggle("pressed")
               document.getElementById("missaoTxt").classList.toggle("selected")

            break
            case "mvvVisao":
               document.getElementById("visaoImg").classList.toggle("pressed")
               document.getElementById("visaoTxt").classList.toggle("selected")
            break
            case "mvvValores":
               document.getElementById("valoresImg").classList.toggle("pressed")
               document.getElementById("valoresTxt").classList.toggle("selected")
            break
        }
    })
});