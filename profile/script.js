function changebutton() {
    
    document.getElementById("inmodify").style.display = "none";
    document.getElementById("insave").style.display = "block"; 
    alert('yes');
}


function savebutton() {

    document.getElementById("insave").style.display = "none";
    document.getElementById("inmodify").style.display = "inline-block"; 
}