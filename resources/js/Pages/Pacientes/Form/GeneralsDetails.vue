<template>
    <div class="md:grid md:grid-cols-6 md:gap-6">
        <div class="mt-5 md:mt-0 md:col-span-6">
            <div
                class="flex items-center justify-start px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <h2>Datos generales</h2>
            </div>

            <div class="px-4 py-5 bg-white sm:p-6 shadow">
                <div class="md:grid md:grid-cols-8 md:gap-4">
                    <div class="col-span-2">
                        <jet-label for="nombre" value="Nombre"/>
                        <jet-input id="nombre" type="text" class="mt-1 block w-full" v-model="form.nombre"
                                   :required="true" name="nombre"
                                   autocomplete="nombre"/>
                    </div>

                    <div class="col-span-2">
                        <jet-label for="apellido" value="Apellido"/>
                        <jet-input id="apellido" type="text" class="mt-1 block w-full"
                                   v-model="form.apellido" autocomplete="apellido"/>
                    </div>

                    <div class="col-span-2">
                        <jet-label for="lugar_nacimiento" value="Lugar de nacimiento"/>
                        <jet-input id="lugar_nacimiento" type="text" class="mt-1 block w-full"
                                   v-model="form.lugar_nacimiento" autocomplete="lugar_nacimiento"/>
                    </div>

                    <div class="col-span-2">
                        <jet-label for="grado_instruccion" value="Grado de intruccion"/>
                        <jet-input id="grado_instruccion" type="text" class="mt-1 block w-full"
                                   v-model="form.grado_instruccion" autocomplete="grado_instruccion"/>
                    </div>

                    <div class="col-span-1">
                        <jet-label for="edad" value="Edad"/>
                        <jet-input id="edad" type="number" class="mt-1 block w-full" v-model="form.edad"
                                   autocomplete="edad"/>
                    </div>

                    <div class="col-span-2">
                        <jet-label for="fecha_nacimiento" value="Fecha de nacimiento"/>
                        <jet-input id="fecha_nacimiento" type="date" class="mt-1 block w-full"
                                   v-model="form.fecha_nacimiento" autocomplete="fecha_nacimiento"/>
                    </div>

                    <div class="col-span-2">
                        <jet-label for="estado_civil" value="Estado civil"/>
                        <select2 :id="'estado_civil'" name="estado_civil" v-model="form.estado_civil"
                                 :options="myOptions">
                        </select2>
                    </div>

                    <div class="col-span-3">
                        <jet-label for="observacion" value="Observacion"/>
                        <jet-input id="observacion" type="text" class="mt-1 block w-full"
                                   v-model="form.observacion" autocomplete="observacion"/>
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
            myOptions: [{id: 'soltera', text: 'Soltera'}, {id: 'casada', text: 'Casada'}, {id: 'viuda', text: 'Viuda'}]
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
