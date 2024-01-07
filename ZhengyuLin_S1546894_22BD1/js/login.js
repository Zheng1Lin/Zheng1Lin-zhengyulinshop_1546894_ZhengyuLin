if (xhr.responseText == "success") {
    window.location.href = "index.html";
} else {
    errorMessage.textContent = "Invalid username or password.";
}
if (xhr.responseText == "success") {
    alert("登录成功！");  // 显示成功消息
    window.location.href = "index.html";
} else {
    errorMessage.textContent = "无效的用户名或密码。";
}
