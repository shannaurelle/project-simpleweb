function clearImageOutput(){
    console.log("Clear Image!");
    var image = document.getElementById('output');
    image.src = "assets/img/no-image.png";
}

var modals = document.getElementsByClassName('modal');

// Get the button that opens the modal
var btn = document.getElementsByClassName("link");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
for(let i = 0; i < btn.length; i++){
    btn[i].onclick = function(event) {
    let modal_id = btn[i].getAttribute('data-id');
    let target_modal = document.getElementById(modal_id);
    target_modal.style.display = "block";
    }
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    for(let i = 0; i < modals.length; i++){
        modals[i].style.display = "none";
        clearImageOutput();
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