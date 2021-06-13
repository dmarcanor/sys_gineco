<template>

    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pacientes/Crear
            </h2>
        </template>

        <div class="py-12">
            <pre>{{ form }}</pre>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

export default {
    name: "Edit",

    props: ['form'],

    mounted() {
      console.log(this.form, 'there');
    },

    components: {
        AppLayout
    },
}
</script>

<style scoped>

</style>
