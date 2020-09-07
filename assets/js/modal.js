function clearImageOutput(){
    console.log("Clear Image!");
    let image = document.getElementById('output');
    image.src = "assets/img/no-image.png";
    document.getElementById('file').value = "";
}

var modals = document.getElementsByClassName('modal');

// Get the button that opens the modal
var btn = document.getElementsByClassName("link");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close");

// When the user clicks on the button, open the modal
for(let i = 0; i < btn.length; i++){
    btn[i].onclick = function(event) {
    let modal_id = btn[i].getAttribute('data-id');
    let target_modal = document.getElementById(modal_id);
    target_modal.style.display = "block";
    }
}

for(let i = 0; i < span.length; i++){
// When the user clicks on <span> (x), close the modal
    span[i].onclick = function() {
        for(let i = 0; i < modals.length; i++){
            modals[i].style.display = "none";
            clearImageOutput();
        }
    }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    for(let i = 0; i < modals.length; i++){
        if (event.target == modals[i]) { 
            modals[i].style.display = "none"; 
            clearImageOutput();
        }
    }
}