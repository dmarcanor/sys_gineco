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

<style scoped>

</style>
