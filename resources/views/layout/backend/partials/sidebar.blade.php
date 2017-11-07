<!-- Main sidebar -->
<div class="sidebar sidebar-main sidebar-default sidebar-fixed">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Gerenciamento -->
                    <li class="navigation-header"><span>Gerenciamento</span> <i class="icon-menu"
                                                                                title="Gerenciamento"></i></li>
                    <li class="{{ active('dashboard') }}"><a href="{{ route('admin.home') }}"><i class="icon-home4"></i>
                            <span>Início</span></a></li>
                    <li>
                        <a href="#"><i class="icon-newspaper"></i> Notícias</a>
                        <ul>
                            <li class="{{ active(['admin.categorias_noticias','admin.categorias_noticias.*']) }}">
                                <a href="{{ route('admin.categorias_noticias') }}" id="layout1"><i class="icon-newspaper2"></i> Categoria de Notícias</a>
                            </li>
                            <li class="{{ active(['admin.noticias','admin.noticias.*']) }}">
                                <a href="{{ route('admin.noticias') }}" id="layout1"><i class="icon-newspaper"></i> Notícias</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ active(['']) }}"><a
                                href="{{ route('admin.noticias') }}"><i class="icon-camera"></i> Eventos</a></li>
                    <li class="{{ active(['']) }}"><a
                                href="{{ route('admin.noticias') }}"><i class="icon-books"></i> Programação</a></li>
                    <li class="{{ active(['admin.parceiros','admin.parceiros.*']) }}"><a
                                href="{{ route('admin.parceiros') }}"><i class="icon-address-book"></i> Parceiros</a>
                    </li>
                    <li class="{{ active(['']) }}"><a
                                href="{{ route('admin.noticias') }}"><i class="icon-youtube"></i> Vídeos</a></li>
                    <li class="{{ active(['']) }}"><a
                                href="{{ route('admin.banners') }}"><i class="icon-enlarge"></i> Banners e Anuncios</a>
                    </li>
                    <!-- /gerenciamento -->

                @permission('ver-administracao')
                <!-- Administração -->
                    <li class="navigation-header"><span>Administração</span> <i class="icon-menu"
                                                                                title="Administração"></i></li>
                    <li>
                        <a href="#"><i class="icon-stack"></i> <span>Gerenciamento de Acesso</span></a>
                        <ul>
                            <li class="{{ active(['admin.users','admin.users.*']) }}"><a
                                        href="{{ route('admin.users') }}"><i class="icon-user"></i> Usuários</a></li>
                            <li class="{{ active(['admin.roles','admin.roles.*']) }}"><a
                                        href="{{ route('admin.roles') }}"><i class="icon-users4"></i> Perfil de
                                    Acesso</a></li>
                        </ul>
                    </li>
                    <li><a href=""><i class="icon-cog"></i> Configurações do Site</a></li>
                    <li class="{{ active(['admin.auditor']) }}"><a href="{{ route('admin.auditor') }}"><i
                                    class="icon-stack-star"></i> Auditoria e Logs</a></li>
                    <!-- /administracao -->
                    @endpermission
                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>
<!-- /main sidebar -->