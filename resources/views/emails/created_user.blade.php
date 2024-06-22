



<html>

    <head>
    <h3>Bienvenido (a) {{$name}} </h3>
</head>

<body>
    <div>
        <p>Ahora eres parte de la plataforma que te dará la guía y la información necesaria para recorrer el camino en Protela.</p>
        <p>Con tu usuario y contraseña tendrás acceso a noticias, eventos, capacitaciones, recursos, y herramientas útiles para estar conectado y colaborar eficazmente.</p>

        <p><strong>Usuario:</strong> {{$document_number}}</p>
        <p><strong>Contraseña:</strong> {{$random_password}}</p>
        <a href="{{ $url }}">Ingrese acá para cambiar su contraseña por una nueva</a>

        <p>Disfruta tu experiencia</p>
        <p>Atentamente,</p>
        <p>Dirección Talento Humano</p>
    </div>
</body>

</html>
