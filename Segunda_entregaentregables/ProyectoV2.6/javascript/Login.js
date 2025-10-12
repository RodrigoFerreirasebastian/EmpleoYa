document.getElementById("formLogin").addEventListener("submit", (e) => {
e.preventDefault();
const email = e.target.email.value;
const password_hash = e.target.password_hash.value;

fetch("./php/Login.php", { // URL del script PHP login
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({ email, password_hash })
})
.then(res => res.text())
.then(data => {
        if (data.trim() === "OK") {
alert("Login correcto. Bienvenido!");
window.location.href = "index.html"; 
        } else {
alert("Login incorrecto. Verifica tus datos.");
        }
})
.catch(err => alert("Error al conectar: " + err));
});