<template>
    <div class="full-screan">
        <nav-bar :user="user"></nav-bar>
        <div class="app-body">
            <side-bar></side-bar>
            <!-- Page Content -->
            <main class="main">
                <slot></slot>
            </main>
        </div>
    </div>
</template>

<script>
    import NavBar from "@/Components/NavBar";
    import SideBar from "@/Components/SideBar";

    export default {
        name: "AppBody",
        props: ['user'],

        components: {
            NavBar,
            SideBar
        }
    }
</script>

<style scoped>

</style>
