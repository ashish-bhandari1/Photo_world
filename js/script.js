var result = document.getElementById("changepw_click");

function login_popUP(){
    if(result.style.display == "none"){
    result.style.display = "block";
    }else{
        result.style.display = "none";
    }


}

window.addEventListener("dblclick", function(event) {
    if (event.target == result) {
        result.style.display = "none"; 
       }
});
