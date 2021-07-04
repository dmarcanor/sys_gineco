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

import form from "@/Pages/Pacientes/Data/form"
import AppBody from "@/Components/AppBody";
import GeneralsDetails from "../Form/GeneralsDetails";
import ContactInformation from "../Form/ContactInformation";
import FormBtnSubmit from "../../../Components/FormBtnSubmit";
export default {
    name: "Create",

    props: ['user', 'breadcrumb'],

    data() {
        return {
            form: form(this, 'POST'),
        }
    },
    methods: {
        save() {
            this.form.post(route('pacientes.create'), {
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
        FormBtnSubmit,
        GeneralsDetails,
        ContactInformation,
        AppBody,
    },
}
</script>

<style scoped>

</style>
