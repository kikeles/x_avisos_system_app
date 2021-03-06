<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li @click="menu=0" class="nav-item">
                <a class="nav-link active" href="#"><i class="icon-speedometer"></i> Escritorio</a>
            </li>
            <li class="nav-title">
                Mantenimiento
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Usuarios</a>
                <ul class="nav-dropdown-items">
                    <li @click="menu=1" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-user"></i>Tabla de Usuarios</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-user-follow"></i>Alumnos</a>
                <ul class="nav-dropdown-items">
                    <li @click="menu=2" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-list"></i>Tabla de Alumnos</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-graduation"></i>Carreras</a>
                <ul class="nav-dropdown-items">
                    <li @click="menu=3" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-list"></i>Tabla de carreras</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-envelope"></i>Avisos</a>
                <ul class="nav-dropdown-items">
                    <li @click="menu=4" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-list"></i>Tabla de avisos</a>
                    </li>
                    <li @click="menu=5" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-note"></i>Crear avisos</a>
                    </li>
                </ul>
            </li>
            


            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-pie-chart"></i> Reportes</a>
                <ul class="nav-dropdown-items">
                    <li @click="menu=6" class="nav-item">
                        <a class="nav-link" href="#"><i class="icon-chart"></i> Reporte de Avisos</a>
                    </li>
                </ul>
            </li>
            <li @click="menu=7" class="nav-item">
                <a class="nav-link" href="#"><i class="icon-book-open"></i> Ayuda <span class="badge badge-danger">PDF</span></a>
            </li>
            <li @click="menu=8" class="nav-item">
                <a class="nav-link" href="#"><i class="icon-info"></i> Acerca de...<span class="badge badge-info">IT</span></a>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>