<template>

    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ver pacientes
            </h2>
        </template>

        <div class="py-12">
            <form @submit.prevent="save" class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <generals-details :form.sync="form"></generals-details>
                <br>
                <form-btn-submit :link-route="route('pacientes.listar')" :disabled="form.processing"></form-btn-submit>
            </form>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import FormBtnSubmit from "@/Components/FormBtnSubmit";
import GeneralsDetails from "@/Pages/Pacientes/Form/GeneralsDetails";
import form from "@/Pages/Pacientes/Data/form"

export default {
    name: "Edit",

    props: ['paciente'],

    data() {
        return {
            form: form(this, 'PUT'),
        }
    },

    mounted() {
        this.form = {...this.form, ...this.paciente}
    },

    methods: {
        save() {
            this.form.put(route('pacientes.update'), {
                onSuccess: () => {
                    this.$toast.success("Solicitud realizada con exito", {duration: 5000, position: "top-right"});
                },
                onError: (e) => {
                    this.$toast.error(e, {duration: 5000, position: "top-right"});
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
        FormBtnSubmit,
        GeneralsDetails,
    },
}
</script>

<style scoped>

</style>
