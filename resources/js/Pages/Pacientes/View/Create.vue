<template>
    <app-body :user="user">
        <main>
            <pre>{{form}}</pre>
        </main>
    </app-body>
</template>

<script>

import form from "@/Pages/Pacientes/Data/form"
import AppBody from "@/Components/AppBody";

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
    },
}
</script>

<style scoped>

</style>
