    var focused = false;
    let bar = document.getElementsByClassName("searchBar")[0]
    let input = document.getElementsByClassName("searchInput")[0]
    let form = document.getElementsByTagName("form")[0]
document.getElementById("lupa").addEventListener("click", () => {
    console.log(focused)
    if(focused){
        if(input.value) {
            form.submit()
        }

        input.blur()
    } else {
        focused = true
        bar.classList.add("selected")
        input.classList.add("selected")
        input.focus()
    }
})

input.addEventListener('blur', () => {
    bar.classList.remove("selected")
    input.classList.remove("selected")
    setTimeout(() => focused = false, 1000)
})