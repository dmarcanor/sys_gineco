<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pacientes
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-12 gap-4">
                    <div
                        class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-4 bg-white overflow-hidden shadow-xl sm:rounded-lg py-2 px-2">
                        <div class="col-span-6 col-span-4">
                            <jet-label for="name" value="Buscar paciente"/>

                        </div>
                        <jet-section-border/>

                        <div class="col-span-6 col-span-4 flex flex-wrap mb-5">
                            <div class=" w-full sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 h-12 my-3 sm:my-2 p-1">
                                <jet-label for="name" value="Nombre"/>
                                <jet-input id="name" type="text" class="mt-1 w-full" v-model="params.nombre"/>
                            </div>
                            <div class=" w-full sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 h-12 my-3 sm:my-2 p-1">
                                <jet-label for="apellido" value="Apellido"/>
                                <jet-input id="apellido" type="text" class="mt-1 w-full" v-model="params.apellido"/>
                            </div>
                        </div>

                        <jet-section-border/>
                        <div class="col-span-6 col-span-4 flex justify-around">
                            <jet-button :type="'button'" @click.prevent="limpiar">
                                Limpiar
                            </jet-button>
                            <jet-button :type="'button'" @click.prevent="buscar">
                                Buscar
                            </jet-button>
                        </div>
                    </div>
                    <div
                        class="col-span-12 sm:col-span-12 md:col-span-8 lg:col-span-8 xl:col-span-8 bg-white overflow-hidden shadow-xl sm:rounded-lg py-2 px-2">
                        <div class="col-span-6 col-span-4 flex justify-between items-center px-3">
                            <jet-label for="name" value="Listar paciente"/>

                            <jet-button-href :href="route('dashboard')"> Crear </jet-button-href>
                        </div>
                        <jet-section-border/>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetInput from '@/Jetstream/Input'
import JetLabel from '@/Jetstream/Label'
import JetButton from '@/Jetstream/Button'
import JetButtonHref from '@/Jetstream/ButtonHref'
import JetSectionBorder from '@/Jetstream/SectionBorder'

export default {
    name: "List",

    data() {
        return {
            params: {
                nombre: '',
                apellido: '',
            }
        }
    },

    methods: {
        buscar() {
            console.log('buscar');
        },
        limpiar() {
            console.log('limpiar');
        }
    },

    components: {
        AppLayout,
        JetInput,
        JetLabel,
        JetButton,
        JetSectionBorder,
        JetButtonHref,
    },
}
</script>

<style scoped>

</style>
