<template>
    <app-body :user="user" :breadcrumb="breadcrumb">
        <main>
            <form @submit.prevent="save">
                <generals-details :form="form" :config="config"></generals-details>
                <form-btn-submit :linkRoute="route('consultas.list')" :disabled="form.processing"></form-btn-submit>
            </form>
        </main>
    </app-body>
</template>

<script>

import AppBody from "../../../Components/AppBody";
import GeneralsDetails from "../Form/GeneralsDetails";
import FormBtnSubmit from "../../../Components/FormBtnSubmit";

import form from "@/Pages/Consultas/Data/form"

export default {
    name: "Edit",

    props: ['consulta', 'user', 'breadcrumb'],

    data() {
        return {
            form: form(this, 'PUT'),
            config: {
                view: 'editar'
            }
        }
    },

    mounted() {
        this.form = {...this.form, ...this.consulta};
        console.log(this.form, this.consulta);
    },

    methods: {
        save() {
            this.form.put(route('consultas.update'), {
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
        FormBtnSubmit,
    },
}
</script>

<style scoped>

</style>
