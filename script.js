function signup(){
    document.getElementById("signup").style.display = "block";
    document.getElementById("signin").style.display = "none";
}
function signin(){
    document.getElementById("signin").style.display = "block";
    document.getElementById("signup").style.display = "none";
}

function togglePasswordVisibility() {
    var passwordInput = document.getElementById("pas");
    var showIcon = document.getElementById("show");
    var hideIcon = document.getElementById("hide");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showIcon.style.display = "block";
        hideIcon.style.display = "none";
        
    } else {
        passwordInput.type = "password";
        showIcon.style.display = "none";
        hideIcon.style.display = "block";
    }
}
function toggleConPasswordVisibility() {
    var passwordInput = document.getElementById("con-pas");
    var showIcon = document.getElementById("show1");
    var hideIcon = document.getElementById("hide1");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showIcon.style.display = "block";
        hideIcon.style.display = "none";
        
    } else {
        passwordInput.type = "password";
        showIcon.style.display = "none";
        hideIcon.style.display = "block";
    }
}
function passwordVisibility() {
    var passwordInput = document.getElementById("si-pas");
    var showIcon = document.getElementById("show");
    var hideIcon = document.getElementById("hide");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        showIcon.style.display = "block";
        hideIcon.style.display = "none";
        
    } else {
        passwordInput.type = "password";
        showIcon.style.display = "none";
        hideIcon.style.display = "block";
    }
}
function si_validate() {
    var fields = [
        { id: "si-name", err_id: "err_name" },
        { id: "si-email", err_id: "err_email" },
        { id: "si-pas", err_id: "err_pass" }
    ];

    var isValid = true;

    fields.forEach(function (field) {
        var inputElement = document.getElementById(field.id);
        var errorElement = document.getElementById(field.err_id);

        if (inputElement.value.length === 0) {
            inputElement.style.border = "1px solid red";
            errorElement.style.display = "block";
            isValid = false;
        } else {
            inputElement.style.border = "none";
            errorElement.style.display = "none";
        }
    });

    return isValid;
}


function validate() {
    var fields = [
        { id: "name", err_id: "er_name" },
        { id: "email", err_id: "er_email" },
        { id: "pas", err_id: "er_pas" },
        { id: "org", err_id: "er_org" },
        { id: "summary", err_id: "er_summary" },
        { id: "con-pas", err_id: "er_con-pas" }
    ];

    var isValid = true;

    fields.forEach(function (field) {
        var inputElement = document.getElementById(field.id);
        var errorElement = document.getElementById(field.err_id);

        if (inputElement.value.length === 0) {
            inputElement.style.border = "1px solid red";
            errorElement.style.display = "block";
            isValid = false;
        } else {
            inputElement.style.border = "none";
            errorElement.style.display = "none";
        }
    });
    var pasInput = document.getElementById('pas');
    var conPasInput = document.getElementById('con-pas');
    
    if (pasInput.value !== conPasInput.value) {
        pasInput.style.border = "1px solid red";
        conPasInput.style.border = "1px solid red";
        document.getElementById("pas-match").style.display = "block";
        isValid = false;
    } else {
        pasInput.style.border = "none";
        conPasInput.style.border = "none";
        document.getElementById("pas-match").style.display = "none";
    }
    

    return isValid;
}