<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Consultas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-4 bg-white overflow-hidden shadow-xl sm:rounded-lg py-2 px-2">
                        Consultas
                    </div>
                    <div class="col-span-12 sm:col-span-12 md:col-span-8 lg:col-span-8 xl:col-span-8 bg-white overflow-hidden shadow-xl sm:rounded-lg py-2 px-2">
                        Lista
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

export default {
    name: "List",

    components: {
        AppLayout,
    },
}
</script>

<style scoped>

</style>
