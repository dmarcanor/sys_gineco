<template>
    <app-body :user="user" :breadcrumb="breadcrumb">
        <main>
            <search-panel
                :params="params"
                @buscar="buscar"
                @limpiar="limpiar"></search-panel>
            <main-table :rows="rows"></main-table>
        </main>
    </app-body>
</template>

<script>
import params from "@/Pages/Consultas/Data/params";
import configTable from "@/Pages/Consultas/Data/configTable";

import AppBody from "@/Components/AppBody";
import MainTable from "@/Pages/Consultas/List/MainTable";
import SearchPanel from "@/Pages/Consultas/List/SearchPanel";

export default {
    name: "List",

    props: ['rows', 'user', 'breadcrumb'],

    data() {
        return {
            params: params(),
            table: configTable(this)
        }
    },

    methods: {
        buscar() {
            this.$inertia.replace(this.route('consultas.list', this.params))
        },
        limpiar() {
            this.params = params();
        },
    },

    components: {
        AppBody,
        MainTable,
        SearchPanel,
    },
}
</script>

<style>

</style>
