<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!-- Sidebar Brand -->
    <div class="sidebar-brand">
        <a href="{{ route('principal') }}" class="brand-link">
            <img src="{{ asset('admin/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                class="brand-image opacity-75 shadow" />
            <span class="brand-text fw-light">AdminLTE 4</span>
        </a>
    </div>

    <!-- Sidebar Menu -->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                aria-label="Main navigation" data-accordion="false" id="navigation">

                <li class="nav-header">ADMINISTRACIÓN</li>

                <!-- Usuarios -->
                <li class="nav-item">
                    <a href="{{ route('admin.user.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-person"></i>
                        <p>Usuarios</p>
                    </a>
                </li>

                <!-- Géneros -->
                <li class="nav-item">
                    <a href="{{ route('admin.genero.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-collection-play"></i>
                        <p>Géneros</p>
                    </a>
                </li>

                <!-- Películas -->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-film"></i>
                        <p>
                            Películas
                            <i class="bi bi-chevron-down right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ms-3">
                        <li class="nav-item">
                            <a href="{{ route('admin.pelicula.index') }}" class="nav-link">
                                <i class="bi bi-list nav-icon"></i>
                                <p>Listado</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pelicula.create') }}" class="nav-link">
                                <i class="bi bi-plus-circle nav-icon"></i>
                                <p>Nueva película</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Imágenes -->
                <li class="nav-item">
                    <a href="{{ route('admin.imagenes.todas') }}" class="nav-link">
                        <i class="nav-icon bi bi-images"></i>
                        <p>Imagenes por Película</p>
                    </a>
                </li>

                <!-- Directores -->
                <li class="nav-item">
                    <a href="{{ route('admin.director.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-person-video2"></i>
                        <p>Directores</p>
                    </a>
                </li>

                <!-- Relaciones Película - Director -->
                <li class="nav-item">
                    <a href="{{ route('admin.pelicula_director.index') }}" class="nav-link">
                        <i class="nav-icon bi bi-link-45deg"></i>
                        <p>Pelicula/Director</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
