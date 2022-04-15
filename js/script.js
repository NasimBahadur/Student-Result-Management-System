function checkgender() {
    let option = document.getElementsByName("gender");
    if (!(option[0].checked || option[1].checked)) {
        document.getElementById("message").style.color = "red";
        document.getElementById("message").innerHTML = "Select Your Gender";
        return false;
    }
    else {
        document.getElementById("message").style.color = "red";
        document.getElementById("message").innerHTML = '';
        return true;
    }
}

function mysubmit() {
    if (checkgender()) return  true;//alert("Submitted");
    else return false;
}