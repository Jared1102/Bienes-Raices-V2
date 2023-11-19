<header class="header inicio header inicio" style="background-image: url({{Vite::asset('resources/img/header.jpg')}})"">
    <div class="contenedor contenido-header">
        <div class="barra">
            <a href="{{route('main')}}">
                <img src="{{Vite::asset('resources/img/logo.svg')}}" alt="Logotipo de Bienes Raices">
            </a>

            <div class="mobile-menu">
                <img src="{{Vite::asset('resources/img/barras.svg')}}" alt="icono menu responsive">
            </div>

            <div class="derecha">
                <img class="dark-mode-boton" src="{{Vite::asset('resources/img/dark-mode.svg')}}">
                <nav class="navegacion">
                    <a href="{{route('nosotros')}}">Nosotros</a>
                    <a href="{{route('AnunciosIndex')}}">Anuncios</a>
                    <a href="blog.html">Blog</a>
                    <a href="{{route('contacto')}}">Contacto</a>
                </nav>
            </div>

            
        </div> <!--.barra-->

        <h1>Venta de Casas y Departamentos  Exclusivos de Lujo</h1>
    </div>
</header><!--Fin del Header-->