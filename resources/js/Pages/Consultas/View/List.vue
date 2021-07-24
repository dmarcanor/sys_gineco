<template>
    <app-body :user="user" :breadcrumb="breadcrumb">
        <main>
            <search-panel :params="params"></search-panel>
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
