<template>
    <app-body :user="user" :breadcrumb="breadcrumb">
        <main>
            <search-panel></search-panel>
            <main-table></main-table>
        </main>
    </app-body>
</template>

<script>
import params from "@/Pages/Pacientes/Data/params";
import configTable from "@/Pages/Pacientes/Data/configTable";

import {nextTick} from 'vue'

import AppBody from "@/Components/AppBody";
import MainTable from "@/Pages/Pacientes/List/MainTable";
import SearchPanel from "@/Pages/Pacientes/List/SearchPanel";

export default {
    name: "List",

    props: ['pacientes', 'user', 'breadcrumb'],

    data() {
        return {
            params: params(),
            table: configTable(this)
        }
    },

    mounted () {
        this.initJquery();
    },

    watch: {
    },

    methods: {
        initJquery() {
            let context = this;
            let body = $('body');

            body.off('click', '.ver-btn').on("click", '.ver-btn', function (e) {
                let id = $(this).attr("data-id");
                let id2 = $(e.target).attr("data-id");
                let id3 = $(e.target).data('id');
                context.$inertia.get(context.route('pacientes.ver', id));
            });

            body.off('click', '.btn-options').on("click", '.btn-options', function (e) {
                let id = $(this).attr("data-id");
                let drop  = document.querySelector("#dropdown-options"+id);
                drop.style.display = drop.style.display === 'none' ? 'block' : 'none';
            });
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
