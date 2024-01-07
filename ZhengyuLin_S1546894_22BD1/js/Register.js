if (xhr.responseText == "success") {
    window.location.href = "login.html";
} else {
    errorMessage.textContent = "Invalid username or password.";
}
<script>
    function validateRegisterForm() {
        var regUsername = document.getElementById("regUsername").value;
        var regPassword = document.getElementById("regPassword").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var regErrorMessage = document.getElementById("reg-error-message");

        if (regUsername === "" || regPassword === "" || confirmPassword === "") {
            regErrorMessage.textContent = "请填写所有字段。";
        } else if (regPassword !== confirmPassword) {
            regErrorMessage.textContent = "密码不匹配。";
        } else {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "register.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if (xhr.responseText == "success") {
                        window.location.href = "login.html";
                    } else {
                        regErrorMessage.textContent = "Failed,Please try again.";
                    }
                }
            };
            xhr.send("regUsername=" + regUsername + "&regPassword=" + regPassword);
        }
    }
    console.log("XHR response:", xhr.responseText);

if (xhr.responseText == "success") {
    console.log("Redirecting to login.html");
    window.location.href = "login.html";
} else {
    console.log("Registration failed. Please try again.");
    regErrorMessage.textContent = "Failed,Please try again.";
}


</script>
