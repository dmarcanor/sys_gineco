<template>
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <inertia-link :href="route('dashboard')" class="nav-link">
                        <i class="icon-speedometer"></i> Escritorio
                    </inertia-link>
                </li>
                <li class="nav-title">
                    Gineco Sys
                </li>
<!--                <li class="nav-item nav-dropdown">-->
<!--                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-bag"></i> Inventario</a>-->
<!--                    <ul class="nav-dropdown-items">-->
<!--                        <li  class="nav-item  ml-3">-->
<!--                            <a class="nav-link"  href="#"><i class="icon-bag"></i> Categorías</a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
                <li class="nav-item">
                    <inertia-link :href="route('pacientes.listar')" class="nav-link">
                        <i class="icon-people"></i> Pacientes
                    </inertia-link>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="#"><i class="icon-info"></i> Consultas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="#"><i class="icon-clock"></i> Gestion de cistas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="#"><i class="icon-heart"></i> Historial medicos</a>
                </li>
            </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
    </div>
</template>

<script>
export default {
    name: "SideBar",

    mounted() {
        $.navigation = $('nav > ul.nav');
        $.navigation.on('click', 'a', function(e){
            e.preventDefault();
            if ($(this).hasClass('nav-dropdown-toggle')) {
                $(this).parent().toggleClass('open');
            }
        });

        $('.sidebar-minimizer').click(function(){
            $('body').toggleClass('sidebar-minimized');
        });
        $('.brand-minimizer').click(function(){
            $('body').toggleClass('brand-minimized');
        });
    }
}
</script>

<style scoped>

</style>
