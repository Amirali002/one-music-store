document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault();

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "php/action_login.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText.trim();

            if (response === "success") {
                window.location.href = "index.html";
            } else {
                var loginError = document.getElementById("loginError");
                loginError.innerText = response;
                loginError.style.display = "block";
                setTimeout(() => { loginError.style.display = "none"; }, 3000);
            }
        }
    };

    var username = document.getElementById("username").value.trim();
    var password = document.getElementById("password").value.trim();

    if (username === "" || password === "") {
        document.getElementById("loginError").innerText = "لطفاً نام کاربری و رمز عبور را وارد کنید.";
        document.getElementById("loginError").style.display = "block";
        return;
    }

    var data = "username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password);
    xhr.send(data);
});