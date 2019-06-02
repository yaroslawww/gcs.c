<template>
    <section class="container w-full p-6 flex flex-col justify-center items-center">

        <span class="text-white uppercase font-bold">Register Form Component</span>
        <router-link tag="div" to="/login">
            <a class="inline-block mt-4 lg:mt-0 btn ml-4 font-bold">Login</a>
        </router-link>
    </section>

</template>

<script>
    export default {
        mounted() {
            console.log('Register Form Component mounted.')
        }
    }
</script>
