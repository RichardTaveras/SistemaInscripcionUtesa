<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>UTESA - Universidad Tecnológica de Santiago</title>
  <link rel="stylesheet" href="estilos.css">
</head>

<style> 
/* Estilos generales */

body {
	font-family: Arial, sans-serif;
	color: #333;
	background-color: green;
	margin: 0;
	padding: 0;
}

header, main, footer {
	margin: 0 auto;
	max-width: 1200px;
	padding: 20px;
}

header {
	background-color: #000;
	color: #fff;
}

h1, h2 {
	margin: 0;
}

nav ul {
	margin: 0;
	padding: 0;
	list-style: none;
}

nav li {
	display: inline-block;
}

nav a {
	display: block;
	padding: 10px;
	color: #fff;
	text-decoration: none;
}

nav a:hover {
	background-color: #ff0;
	color: #000;
}
.boton-inscripcion {
  background-color: green;
  color: white;
  border: 2px solid black;
  padding: 10px 20px;
  font-size: 18px;
}

.boton-inscripcion:hover {
  background-color: yellow;
  color: black;
}

</style>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="#">Inicio</a></li>
        <li><a href="#">Carreras</a></li>
        <li><a href="#">Sobre nosotros</a></li>
        <li><a href="#">Contacto</a></li>
      </ul>
    </nav>
    <h1>UTESA</h1>
    <p>Universidad Tecnológica de Santiago</p>
  </header>
  <main>
    <section>
      <h2>Bienvenidos a UTESA</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam, urna at maximus consequat, enim lorem bibendum ex, a dictum est lacus eget nisi.</p>
      <a href="#" class="boton-inscripcion">Inscribirse</a>
    </section>
  </main>
  <footer>
    <p>© UTESA - Todos los derechos reservados</p>
  </footer>
</body>
</html>
