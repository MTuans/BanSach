function togglePassword(fieldId, icon) {
    const passwordField = document.getElementById(fieldId);
    const isPasswordVisible = passwordField.type === "text";

    passwordField.type = isPasswordVisible ? "password" : "text";

    icon.classList.toggle("fa-eye-slash");
    icon.classList.toggle("fa-eye");
}
function togglerePassword(fieldId, icon) {
    const passwordField = document.getElementById(fieldId);
    const isPasswordVisible = passwordField.type === "text";

    passwordField.type = isPasswordVisible ? "password" : "text";

    icon.classList.toggle("fa-eye-slash");
    icon.classList.toggle("fa-eye");
}