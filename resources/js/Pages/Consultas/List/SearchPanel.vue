<template>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Buscar
            </div>
            <div class="card-body">

                <div class="form-group row">

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Codigo</label>
                        <input type="text" name="codigo" class="form-control" id="codigo" v-model="params.codigo"/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Paciente</label>
                        <select2 :id="'paciente_id'"
                                 name="paciente_id"
                                 v-model="params.paciente_id"
                                 :settings="settingsSelectAjax"
                                 required>
                        </select2>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Fecha desde</label>
                        <input type="datetime-local" name="fecha_desde" class="form-control" id="fecha_desde" v-model="params.fecha_desde"/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Fecha hasta</label>
                        <input type="datetime-local" name="fecha_hasta" class="form-control" id="fecha_hasta" v-model="params.fecha_hasta"/>
                    </div>

                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-md-2 d-flex justify-content-center">
                        <button class="btn btn-info btn-block" @click.prevent="limpiar"><i
                            class="fa fa-clean"></i> Limpiar
                        </button>
                    </div>
                    <div class="col-md-2 d-flex justify-content-center">
                        <button class="btn btn-primary btn-block" @click.prevent="buscar"><i
                            class="fa fa-search"></i> Buscar
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SearchPanel",

    props: ['params'],

    data() {
        return {
            codigo: '',
            fecha_desde: '',
            fecha_hasta: '',
            paciente_id: '',
            settingsSelectAjax: {
                width: '100%',
                placeholder: 'Seleccione',
                ajax: {
                    url: '/pacientes/ajax_get_paciente',
                    data: function (params) {
                        return {search: params.term}
                    }
                }
            },
        }
    },

    methods: {
        async limpiar() {
            await this.$emit('limpiar')
            await this.$emit('buscar')
        },
        async buscar() {
            await this.$emit('buscar')
        }
    },

}
</script>

<style scoped>

</style>
