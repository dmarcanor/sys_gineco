<template>
    <app-body :user="user" :breadcrumb="breadcrumb">
        <main>
            <form @submit.prevent="save">
                <generals-details :form="form"></generals-details>
                <contact-information :form="form"></contact-information>
                <form-btn-submit :linkRoute="route('pacientes.listar')" :disabled="form.processing"></form-btn-submit>
            </form>
        </main>
    </app-body>
</template>

<script>

import AppBody from "../../../Components/AppBody";
import GeneralsDetails from "../Form/GeneralsDetails";
import ContactInformation from "../Form/ContactInformation";
import FormBtnSubmit from "../../../Components/FormBtnSubmit";

import form from "@/Pages/Pacientes/Data/form"

export default {
    name: "Edit",

    props: ['paciente', 'user', 'breadcrumb'],

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
        AppBody,
        GeneralsDetails,
        ContactInformation,
        FormBtnSubmit,
    },
}
</script>

<style scoped>

</style>
