<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Pacientes
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-12 gap-4">
                    <div
                        class="col-span-12 sm:col-span-12 md:col-span-4 lg:col-span-4 xl:col-span-4 bg-white overflow-hidden shadow-xl sm:rounded-lg py-2 px-2"
                        style="height: 200px">
                        <div class="col-span-6 col-span-4">

                        </div>

                        <div class="col-span-6 col-span-4 flex justify-between items-center px-3">
                            <jet-label for="name" value="Buscar paciente"/>
                            <div class="inline-flex">
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-l font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:bg-blue-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                    @click.prevent="buscar">Buscar
                                </button>
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-r font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:bg-blue-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                                    @click.prevent="limpiar">Limpiar
                                </button>
                            </div>
                        </div>
                        <jet-section-border/>

                        <div class="col-span-6 col-span-4 flex flex-wrap mb-5">
                            <div class=" w-full sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 h-12 my-3 sm:my-2 p-1">
                                <jet-label for="name" value="Nombre"/>
                                <jet-input id="name" type="text" class="mt-1 w-full" v-model="params.nombre"/>
                            </div>
                            <div class=" w-full sm:w-full md:w-1/2 lg:w-1/2 xl:w-1/2 h-12 my-3 sm:my-2 p-1">
                                <jet-label for="apellido" value="Apellido"/>
                                <jet-input id="apellido" type="text" class="mt-1 w-full" v-model="params.apellido"/>
                            </div>
                        </div>
                    </div>

                    <div
                        class="col-span-12 sm:col-span-12 md:col-span-8 lg:col-span-8 xl:col-span-8 bg-white overflow-hidden shadow-xl sm:rounded-lg py-2 px-2">
                        <div class="col-span-6 col-span-4 flex justify-between items-center px-3">
                            <jet-label for="name" value="Listar paciente"/>
                            <jet-button-href :href="route('pacientes.crear')"> Crear</jet-button-href>
                        </div>
                        <jet-section-border/>
                        <table-lite
                            :has-checkbox="false"
                            :is-loading="table.isLoading"
                            :is-re-search="table.isReSearch"
                            :columns="table.columns"
                            :rows="table.rows"
                            :total="table.totalRecordCount"
                            :sortable="table.sortable"
                            :messages="table.messages"
                            @do-search="doSearch"
                            @return-checked-rows="updateCheckedRows"
                        ></table-lite>
                    </div>
                </div>
            </div>
            <pre>{{ pacientes }}</pre>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetInput from '@/Jetstream/Input'
import JetLabel from '@/Jetstream/Label'
import JetButton from '@/Jetstream/Button'
import JetButtonHref from '@/Jetstream/ButtonHref'
import JetSectionBorder from '@/Jetstream/SectionBorder'
import params from "@/Pages/Pacientes/Data/params";

import TableLite from "vue3-table-lite";
import configTable from "@/Pages/Pacientes/Data/configTable";

import $ from 'jquery';
import {nextTick} from 'vue'

export default {
    name: "List",

    props: ['pacientes'],

    data() {
        return {
            params: params(),
            table: configTable(this)
        }
    },

    mounted: async function () {
        nextTick(() => {
            this.table.isLoading = true;
            this.table.rows = this.pacientes;
            this.table.isLoading = false;
        })
        this.initJquery();
    },

    watch: {
        pacientes(val) {
            nextTick(() => {
                this.table.rows = val;
                this.table.isLoading = false;
            })
        }
    },

    methods: {
        buscar() {
            this.table.isLoading = true;
            this.$inertia.replace(this.route('pacientes.listar', this.params))
        },
        limpiar() {
            this.params = params();
            this.buscar();
        },

        updateCheckedRows(rowsKey) {
            // do your checkbox click event
            console.log(rowsKey, 'updateCheckedRows');
        },

        doSearch(offset, limit, order, sort) {
            console.log('doSearch', offset, limit, order, sort)
            this.table.isLoading = true;
            this.table.isReSearch = offset == undefined ? true : false;
            // do your search event to get newRows and new Total
            this.table.rows = this.table.rows;
            this.table.totalRecordCount = this.table.totalRecordCount;
            this.table.sortable.order = order;
            this.table.sortable.sort = sort;
            this.table.isLoading = false;
        },
        initJquery() {
            let context = this;
            let body = $('body');

            body.off('click', '.ver-btn').on("click", '.ver-btn', function (e) {
                let id = $(this).attr("data-id");
                let id2 = $(e.target).attr("data-id");
                let id3 = $(e.target).data('id');
                console.log('there', id, id2, id3);
                // this.router.get(this.route('pacientes.ver'), id);
            });
        }
    },

    components: {
        AppLayout,
        JetInput,
        JetLabel,
        JetButton,
        JetSectionBorder,
        JetButtonHref,
        TableLite,
    },
}
</script>

<style>
.dropdown:hover .dropdown-menu {
    display: block;
}
</style>
