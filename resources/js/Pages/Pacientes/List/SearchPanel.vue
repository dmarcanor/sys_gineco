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
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="Nombre" v-model="params.nombre"/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Apellido</label>
                        <input type="text" name="apellido" class="form-control" id="apellido" v-model="params.apellido"/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Estado civil</label>

                        <select2 :id="'estado_civil'" name="estado_civil" v-model="params.estado_civil"
                                 @change="myChangeEvent($event)" @select="mySelectEvent($event)"
                                 :settings="settingsSelect" :options="myOptions">
                        </select2>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Estado civil</label>

                        <select2 :id="'estado_civil2'" name="estado_civil2" :settings="settingsSelectAjax">
                        </select2>
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
            estado_civil: '',

            myOptions: [{id: 'soltera', text: 'Soltera'}, {id: 'casada', text: 'Casada'}, {id: 'viuda', text: 'Viuda'}],
            settingsSelect: {
                width: '100%'
            },
            settingsSelectAjax: {
                width: '100%',
                placeholder: '',
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
        myChangeEvent(val){
            console.log(val, 'myChangeEvent');
        },
        mySelectEvent({id, text}){
            console.log({id, text}, 'mySelectEvent')
        }
    },

}
</script>

<style scoped>

</style>
