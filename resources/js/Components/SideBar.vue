<template>
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link"  href="#"><i class="icon-speedometer"></i> Escritorio</a>
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
                    <a class="nav-link"  href="#"><i class="icon-info"></i> Pacientes</a>
                    <a class="nav-link"  href="#"><i class="icon-info"></i> Consultas</a>
                    <a class="nav-link"  href="#"><i class="icon-info"></i> Gestion de cistas</a>
                    <a class="nav-link"  href="#"><i class="icon-info"></i> Historial medicos</a>
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
    }
}
</script>

<style scoped>

</style>
