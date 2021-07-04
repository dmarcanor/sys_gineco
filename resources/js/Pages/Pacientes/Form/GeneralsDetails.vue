<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Datos Generales
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="Nombre" v-model="nombre" required=""/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Apellido</label>
                        <input type="text" name="apellido" class="form-control" id="apellido" v-model="apellido" required=""/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Lugar de nacimiento</label>
                        <input type="text" name="lugar_nacimiento" class="form-control" id="lugar_nacimiento"
                               v-model="lugar_nacimiento"/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Grado de intruccion</label>
                        <input type="text" name="grado_instruccion" class="form-control" id="grado_instruccion"
                               v-model="grado_instruccion"/>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Edad</label>
                        <input type="number" name="edad" class="form-control" id="edad" v-model="edad"/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Fecha de nacimiento</label>
                        <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento"
                               v-model="fecha_nacimiento"/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Estado civil</label>
                        <input type="text" name="estado_civil" class="form-control" id="estado_civil"
                               v-model="estado_civil"/>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Observacion</label>
                        <input type="text" name="observacion" class="form-control" id="observacion"
                               v-model="observacion"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import JetLabel from '@/Jetstream/Label'
import JetInput from '@/Jetstream/Input'
import {nextTick} from 'vue'

export default {
    name: "GeneralsDetails",

    props: ['form'],

    data() {
        return {
            nombre: '',
            apellido: '',
            lugar_nacimiento: '',
            grado_instruccion: '',
            edad: 0,
            fecha_nacimiento: '',
            estado_civil: '',
            observacion: '',
            telefono: '',
            direccion: '',

            myOptions: [{id: 'soltera', text: 'Soltera'}, {id: 'casada', text: 'Casada'}, {id: 'viuda', text: 'Viuda'}],
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
            settingsSelect: {
                width: '100%'
            }
        }
    },

    mounted: async function () {
        nextTick(() => {
            this.nombre = this.form.nombre;
            this.apellido = this.form.apellido;
            this.lugar_nacimiento = this.form.lugar_nacimiento;
            this.grado_instruccion = this.form.grado_instruccion;
            this.edad = this.form.edad;
            this.fecha_nacimiento = this.form.fecha_nacimiento;
            this.estado_civil = this.form.estado_civil;
            this.observacion = this.form.observacion;
            this.telefono = this.form.telefono;
            this.direccion = this.form.direccion;
        })
    },

    methods: {
        myChangeEvent(val) {
            console.log(val, 'myChangeEvent');
        },
        mySelectEvent({id, text}) {
            console.log({id, text}, 'mySelectEvent')
        }
    },

    watch: {
        nombre(val) {
            this.form['nombre'] = val;
        },
        apellido(val) {
            this.form['apellido'] = val;
        },
        lugar_nacimiento(val) {
            this.form['lugar_nacimiento'] = val;
        },
        grado_instruccion(val) {
            this.form['grado_instruccion'] = val;
        },
        edad(val) {
            this.form['edad'] = val;
        },
        fecha_nacimiento(val) {
            this.form['fecha_nacimiento'] = val;
        },
        estado_civil(val) {
            this.form['estado_civil'] = val;
        },
        observacion(val) {
            this.form['observacion'] = val;
        },
        telefono(val) {
            this.form['telefono'] = val;
        },
    },

    components: {
        JetLabel,
        JetInput,
    }
}
</script>

<style scoped>

</style>
