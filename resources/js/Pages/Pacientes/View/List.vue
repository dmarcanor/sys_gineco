<template>
    <app-body :user="user" :breadcrumb="breadcrumb">
        <main>
            <search-panel :params="params"></search-panel>
            <main-table :rows="rows"></main-table>
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

    props: ['rows', 'user', 'breadcrumb'],

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
}
</script>

<style>

</style>
