<template>
    <div class="full-screan">
        <nav-bar :user="user"></nav-bar>
        <div class="app-body">
            <side-bar></side-bar>
            <!-- Page Content -->
            <main class="main">
                <breadcrumb :breadcrumb="breadcrumb"></breadcrumb>
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
    import NavBar from "@/Components/NavBar";
    import SideBar from "@/Components/SideBar";
    import Breadcrumb from "@/Components/Breadcrumb";

    export default {
        name: "AppBody",
        props: ['user', 'breadcrumb'],

        components: {
            NavBar,
            SideBar,
            Breadcrumb,
        }
    }
</script>

<style>
    .select2-container--default .select2-selection--single {
        background-color: #fff !important;
        border: 1px solid #aaaaaa8f !important;
        border-radius: 0px !important;
        height: 35px !important;
    }

    .select2-selection__arrow .select2-selection__rendered{
        height: 30px !important;
        margin-top: 2px !important;
    }
</style>
