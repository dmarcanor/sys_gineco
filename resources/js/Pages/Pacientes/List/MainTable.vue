<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Tabla Principal
                <button type="button" class="btn btn-secondary" @click.prevent="IrFormularioCrear">
                    <i class="icon-plus"></i>Nuevo
                </button>
            </div>
            <div class="card-body">

                <table class="table table-bordered table-striped table-sm">
                    <thead>
                    <tr>
                        <th width="10%" class="text-center">Nombre</th>
                        <th width="10%" class="text-center">Apellido</th>
                        <th width="10%" class="text-center">Edad</th>
                        <th width="10%" class="text-center">Estado civil</th>
                        <th width="5%" class="text-center">Opciones</th>
                    </tr>
                    </thead>
                    <tbody v-if="rows.length >= 1">
                    <tr v-for="row in rows">
                        <td>{{row.nombre}}</td>
                        <td>{{row.apellido}}</td>
                        <td>{{row.edad}}</td>
                        <td>{{row.estado_civil}}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm btn-block" @click.prevent="opciones(row)">Opciones</button>
                        </td>
                    </tr>
                    </tbody>
                    <tbody v-else>
                    <tr>
                        <td colspan="8">
                            <div class="alert alert-warning text-center" role="alert">
                                No se encontraron resultados
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <modal-opciones name="ModalOpciones" ref="ModalOpciones"></modal-opciones>
    </div>
</template>

<script>
import ModalOpciones from "../Modals/ModalOpciones";

export default {
    name: "MainTable",

    props: ['rows'],

    mounted () {
        this.initJquery();
    },

    methods: {
        IrFormularioCrear() {
            this.$inertia.get(this.route('pacientes.crear'));
        },
        opciones(row) {
            this.$refs.ModalOpciones.show(row);
        },
        initJquery() {
            let context = this;
            let body = $('body');

            body.off('click', '.ver-btn').on("click", '.ver-btn', function (e) {
                let id = $(this).attr("data-id");
                let id2 = $(e.target).attr("data-id");
                let id3 = $(e.target).data('id');
                context.$refs.ModalOpciones.hide();
                context.$inertia.get(context.route('pacientes.ver', id));
            });
        }
    },

    components: {
        ModalOpciones
    }
}
</script>

<style scoped>

</style>
