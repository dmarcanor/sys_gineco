<template>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Tabla Principal
                <button type="button" class="btn btn-secondary" @click.prevent="IrFormularioCrear">
                    <i class="icon-plus"></i>Nuevo
                </button>
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "MainTable",
    methods: {
        IrFormularioCrear() {
            this.$inertia.get(this.route('pacientes.crear'));
        }
    }
}
</script>

<style scoped>

</style>
