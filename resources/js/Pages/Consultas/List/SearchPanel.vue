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
                        <label>Fecha</label>
                        <input type="text" name="fecha" class="form-control" id="fecha" v-model="params.fecha"/>
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
            fecha: ''
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
