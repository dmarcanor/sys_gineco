<template>
    <!-- Inicio del modal Eliminar -->
    <div class="modal fade" :id="name+'Modal'" tabindex="-1" role="dialog" :aria-labelledby="name+'ModalLabel'"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-info" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Opciones</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-outline-primary btn-block ver-btn" :data-id=" row ? row.id : ''">Ver Registro</button>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ModalOpciones",

    props: ['name'],

    data() {
        return {
            row: null,
        }
    },

    methods: {
        hide() {
            let modal = $('#' + this.name + 'Modal');
            modal.modal('hide');
        },
        async show(row = null) {
            this.row = row;
            let modal = $('#' + this.name + 'Modal');
            await modal.modal('show');
        },

    }
}
</script>

<style scoped>

</style>
