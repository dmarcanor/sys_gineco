<template>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Informacion de contacto
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Telefono</label>
                        <input type="text" name="telefono" class="form-control" id="telefono"
                               v-model="telefono"/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Dirrecion</label>
                        <input type="text" name="direccion" class="form-control" id="direccion"
                               v-model="direccion"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import {nextTick} from "vue";

export default {
    name: "ContactInformation",

    props: ['form'],

    data() {
        return {
            telefono: '',
            direccion: '',
        }
    },

    mounted: async function () {
        nextTick(() => {
            this.telefono = this.form.telefono;
            this.direccion = this.form.direccion;
        })
    },

    watch: {
        telefono(val) {
            this.form['telefono'] = val;
        },
        direccion(val) {
            this.form['direccion'] = val;
        },
    },
}
</script>

<style scoped>

</style>
