<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Datos Generales
            </div>
            <div class="card-body">

                <div class="form-group row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Codigo <span style="color: red">*</span></label>
                        <input type="text" name="codigo" class="form-control" id="codigo" v-model="codigo" required disabled/>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Paciente <span style="color: red">*</span></label>
                        <select2 :id="'paciente_id'" name="paciente_id" v-model="paciente_id" :settings="settingsSelectAjax" required>
                        </select2>
                    </div>

                    <div class="form-group col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <label>Fecha de la consulta <span style="color: red">*</span></label>
                        <input type="datetime-local" name="fecha" class="form-control" id="fecha" required
                               v-model="fecha"/>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Motivo <span style="color: red">*</span></label>
                        <input type="text" name="motivo" class="form-control" id="motivo" required
                               v-model="motivo"/>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Indicaciones</label>
                        <input type="text" name="indicaciones" class="form-control" id="indicaciones"
                               v-model="indicaciones"/>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Observaciones</label>
                        <input type="text" name="observaciones" class="form-control" id="observaciones"
                               v-model="observaciones"/>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Reposo médico</label>
                        <input type="text" name="reposo" class="form-control" id="reposo"
                               v-model="reposo"/>
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

    props: ['form', 'code'],

    data() {
        return {
            codigo: '',
            fecha: '',
            paciente_id: '',
            observaciones: '',
            indicaciones: '',
            motivo: '',
            reposo: '',
            settingsSelectAjax: {
                width: '100%',
                placeholder: 'Seleccione',
                ajax: {
                    url: '/pacientes/ajax_get_paciente',
                    data: function (params) {
                        console.log(params);
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
            this.codigo = this.code ?? this.form.codigo;
            this.fecha = this.form.fecha;
            this.paciente_id = this.form.paciente_id;
            this.observaciones = this.form.observaciones;
            this.indicaciones = this.form.indicaciones;
            this.motivo = this.form.motivo;
            this.reposo = this.form.reposo;
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
        codigo(val) {
            this.form['codigo'] = val;
        },
        fecha(val) {
            this.form['fecha'] = val;
        },
        paciente_id(val) {
            this.form['paciente_id'] = val;
        },
        observaciones(val) {
            this.form['observaciones'] = val;
        },
        indicaciones(val) {
            this.form['indicaciones'] = val;
        },
        motivo(val) {
            this.form['motivo'] = val;
        },
        reposo(val) {
            this.form['reposo'] = val;
        }
    },

    components: {
        JetLabel,
        JetInput,
    }
}
</script>

<style scoped>

</style>
