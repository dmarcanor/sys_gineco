<template>
    <app-body :user="user" :breadcrumb="breadcrumb">
        <main>
            <search-panel
                :params="params"
                @buscar="buscar"
                @limpiar="limpiar"></search-panel>
            <main-table :rows="rows" :paginacion="paginacion" :params="params"  @buscar="buscar"></main-table>
        </main>
    </app-body>
</template>

<script>
import params from "@/Pages/Pacientes/Data/params";
import configTable from "@/Pages/Pacientes/Data/configTable";

import AppBody from "@/Components/AppBody";
import MainTable from "@/Pages/Pacientes/List/MainTable";
import SearchPanel from "@/Pages/Pacientes/List/SearchPanel";

import {nextTick} from 'vue'

export default {
    name: "List",

    props: ['rows', 'paginacion', 'user', 'breadcrumb'],

    data() {
        return {
            params: params(),
            table: configTable(this)
        }
    },

    components: {
        AppBody,
        MainTable,
        SearchPanel,
    },

    methods: {
        buscar() {
            this.$inertia.replace(this.route('pacientes.listar', this.params))
        },
        limpiar() {
            this.params = params();
        },
    }
}
</script>

<style>

</style>
