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
            // this.form.post(route('pacientes.create'), {
            //     onSuccess: () => {
            //         this.$toast.success("Solicitud realizada con exito",{duration: 5000, position: "top-right"});
            //     },
            //     onError: (e) => {
            //         this.$toast.error(e,{duration: 5000, position: "top-right"});
            //     }
            // });

            axios.post(route('pacientes.create'), this.form).then((res) => {
                console.log(res.data)
            }).catch((error) => {
                console.log(error.response.data)
            })
        },
    },
    components: {
        AppLayout,
        JetSectionBorder,
        JetButton,
        JetButtonHref,
        JetFormSection,
    },
}
</script>

<style scoped>

</style>
