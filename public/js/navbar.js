var focused = false;
document.getElementById("lupa").addEventListener("click", () => {
    let bar = document.getElementsByClassName("searchBar")[0]
    let input = document.getElementsByClassName("searchInput")[0]

    bar.classList.toggle("selected")
    input.classList.toggle("selected")
    if(!focused){
        input.focus()
        focused = true
    } else {
        input.blur()
        focused = false
    }
})

document.getElementById('contato').addEventListener("click", function () {
    const tam = document.body.scrollHeight || document.documentElement.scrollHeight;
    console.log(tam);
    window.scroll({
        top: tam,
        behavior: 'smooth'  // Isso cria uma rolagem suave, mas é opcional
    });
});