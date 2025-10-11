document.getElementById("formLogin").addEventListener("submit", (e) => {
e.preventDefault();
const email = e.target.email.value;
const clave = e.target.clave.value;

fetch("", { // URL del script PHP login
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: new URLSearchParams({ email, clave })
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