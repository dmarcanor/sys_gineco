<template>

    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pacientes/Crear
            </h2>
        </template>

        <div class="py-12">
            <form @submit.prevent="save" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="md:grid md:grid-cols-6 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-6">
                        <div class="flex items-center justify-start px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                            <h2>Datos generales</h2>
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6 shadow">
                            <div class="md:grid md:grid-cols-8 md:gap-4">
                                <div class="col-span-2">
                                    <jet-label for="nombre" value="Nombre"/>
                                    <jet-input id="nombre" type="text" class="mt-1 block w-full" v-model="form.nombre" autocomplete="nombre"/>
                                </div>

                                <div class="col-span-2">
                                    <jet-label for="apellido" value="Apellido"/>
                                    <jet-input id="apellido" type="text" class="mt-1 block w-full" v-model="form.apellido" autocomplete="apellido"/>
                                </div>

                                <div class="col-span-2">
                                    <jet-label for="lugar_nacimiento" value="Lugar de nacimiento"/>
                                    <DatePicker v-model="form.lugar_nacimiento"/>
                                    <jet-input id="lugar_nacimiento" type="text" class="mt-1 block w-full" v-model="form.lugar_nacimiento" autocomplete="lugar_nacimiento"/>
                                </div>

                                <div class="col-span-2">
                                    <jet-label for="grado_instruccion" value="Grado de intruccion"/>
                                    <jet-input id="grado_instruccion" type="text" class="mt-1 block w-full" v-model="form.grado_instruccion" autocomplete="grado_instruccion"/>
                                </div>

                                <div class="col-span-1">
                                    <jet-label for="edad" value="Edad"/>
                                    <jet-input id="edad" type="number" class="mt-1 block w-full" v-model="form.edad" autocomplete="edad"/>
                                </div>

                                <div class="col-span-2">
                                    <jet-label for="fecha_nacimiento" value="Fecha de nacimiento"/>
                                    <jet-input id="fecha_nacimiento" type="text" class="mt-1 block w-full" v-model="form.fecha_nacimiento" autocomplete="fecha_nacimiento"/>
                                </div>

                                <div class="col-span-2">
                                    <jet-label for="estado_civil" value="Estado civil"/>
                                    <jet-input id="estado_civil" type="text" class="mt-1 block w-full" v-model="form.estado_civil" autocomplete="estado_civil"/>
                                </div>

                                <div class="col-span-3">
                                    <jet-label for="observacion" value="Observacion"/>
                                    <jet-input id="observacion" type="text" class="mt-1 block w-full" v-model="form.observacion" autocomplete="observacion"/>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                            <jet-button-href :href="route('pacientes.listar')">Cancelar</jet-button-href>
                            <jet-button :type="'submit'" :disabled="form.processing">Guardar</jet-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetLabel from '@/Jetstream/Label'
import JetInput from '@/Jetstream/Input'
import JetButton from '@/Jetstream/Button'
import JetButtonHref from '@/Jetstream/ButtonHref'
import JetSectionBorder from '@/Jetstream/SectionBorder'
import JetFormSection from '@/Jetstream/FormSection'

import form from "@/Pages/Pacientes/Data/form"

export default {
    name: "Create",
    data() {
        return {
            form: form(this, 'POST'),
        }
    },
    methods: {
        save() {
            this.form.post(route('pacientes.create'), {
                onSuccess: () => {
                    this.$toast.success("Solicitud realizada con exito",{duration: 5000, position: "top-right"});
                },
                onError: (e) => {
                    this.$toast.error(e,{duration: 5000, position: "top-right"});
                }
            });


            // axios.post(route('pacientes.create'), this.form).then((res) => {
            //     console.log(res.data)
            // }).catch((error) => {
            //     console.log(error.response.data)
            // })
        },
    },
    components: {
        AppLayout,
        JetSectionBorder,
        JetButton,
        JetButtonHref,
        JetFormSection,
        JetInput,
        JetLabel,
    },
}
</script>

<style scoped>

</style>
