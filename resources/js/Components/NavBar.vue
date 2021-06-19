<template>
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="#" class="navbar-brand"></a>
        <button class="navbar-toggler d-md-down-none sidebar-minimizer brand-minimizer" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a href="#" class="nav-link">Escritorio</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Configuraciones</a>
            </li>
        </ul>

        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item d-md-down-none">
                <a class="nav-link" href="#" data-toggle="dropdown">
                    <i class="icon-bell"></i>
                    <span class="badge badge-pill badge-danger">5</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Notificaciones</strong>
                    </div>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-envelope-o"></i> Ingresos
                        <span class="badge badge-success">3</span>
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fa fa-tasks"></i> Ventas
                        <span class="badge badge-danger">2</span>
                    </a>
                </div>
            </li>
            <li class="nav-item dropdown ml-5">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" style="margin-right: 50px;"
                   aria-haspopup="true" aria-expanded="false">
                    <!--                    <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">-->
                    <span class="d-md-down-none">{{ user.name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" style="margin-right: 50px;">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Perfil</a>
                    <a class="dropdown-item" href="#" @click.prevent="logout"><i class="fa fa-lock"></i> Cerrar sesión</a>
                </div>
            </li>
        </ul>

    </header>
</template>

<script>
export default {
    name: "NavBar",

    props: ['user'],

    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        },
    }
}
</script>

<style>
.app-header{
    top: 0!important;
}
</style>
