<template>
    <app-body :user="user">
        <main>
            <pre>{{user}}</pre>
        </main>
    </app-body>
</template>

<script>
    import AppBody from "@/Components/AppBody";
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        props: ['user'],

        components: {
            AppLayout,
            Welcome,
            AppBody,
        },
    }
</script>
