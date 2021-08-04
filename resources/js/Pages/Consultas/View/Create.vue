<template>
    <app-body :user="user" :breadcrumb="breadcrumb">
        <main>
            <form @submit.prevent="save">
                <generals-details :form="form" :config="config" :code="code"></generals-details>
                <documents :form="form" :config="config"></documents>
                <form-btn-submit :linkRoute="route('consultas.list')" :disabled="form.processing"></form-btn-submit>
            </form>
        </main>
    </app-body>
</template>

<script>

import form from "@/Pages/Consultas/Data/form"
import AppBody from "@/Components/AppBody";
import GeneralsDetails from "../Form/GeneralsDetails";
import Documents from "../Form/Documents";
import FormBtnSubmit from "../../../Components/FormBtnSubmit";
export default {
    name: "Create",

    props: ['user', 'breadcrumb', 'code'],

    data() {
        return {
            form: form(this, 'POST'),
            config: {
                view: 'crear'
            }
        }
    },
    methods: {
        save() {
            this.form.post(route('consultas.create'), {
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
        Documents,
        AppBody,
    },
}
</script>

<style scoped>

</style>
