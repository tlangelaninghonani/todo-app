var googleIcons = document.createElement("link");
googleIcons.rel = "stylesheet";
googleIcons.href = "https://fonts.googleapis.com/icon?family=Material+Icons+Round";

document.getElementsByTagName("head")[0].appendChild(googleIcons);

function showElement(id, display){
    let element = document.querySelector("#"+id);
    element.style.display = display;
}

function formSubmit(id){
    let form = document.querySelector("#"+id);
    form.submit();
}

function search(keyword){
    if(keyword !== ""){
        let codeTodoDiv = document.querySelector("#codetododiv");
        let codeTodo = document.querySelectorAll(".codetodo");
        for (let i = 0; i < codeTodo.length; i++) {
            const element = codeTodo[i];
            if(element.id.toLowerCase().includes(keyword.toLowerCase())){
                codeTodoDiv.prepend(element);
            }
        }
    }
}