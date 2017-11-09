<nav id="nav" class="container">
    <ul id="main_menu" class="sf-menu">
        <li><a href="{{ route('home') }}"><span>Home</span></a>
        </li>
        <li><a href="{{ route('paginas.quem_somos') }}"><span>Quem Somos</span></a></li>
        <li><a href=""><span>Programação</span></a></li>
        <li class="menu-item-has-children"><a href=""><span>Programas</span></a>
            <ul class="navi first menu-depth-1">
                <li class="menu-item"><a href=""><span><span
                                    class="mob-line">-</span> Portfolio Fullwidth 2 Columns</span></a></li>
            </ul>
        </li>
        <li><a href="services.html"><span>Parceiros</span></a></li>
        <li><a href="{{ route('noticias.index') }}"><span>Notícias</span></a></li>
        <li><a href="contact.html"><span>Contato</span></a></li>
    </ul>
</nav>