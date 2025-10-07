const togglePassword = document.querySelector("#eye-pass");
const passwordField = document.querySelector("#password");

togglePassword.addEventListener("click", function () {
    const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
    passwordField.setAttribute("type", type);

    if (type === "text") {
        this.classList.remove("fa-eye");
        this.classList.add("fa-eye-slash");
    } else {
        this.classList.remove("fa-eye-slash");
        this.classList.add("fa-eye");
    }
});