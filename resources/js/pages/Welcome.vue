<template>
    <div>
        <div v-if="$route().check('login')" class="absolute" style="top: 18px; right: 10px">
            <inertia-link v-if="$page.user" class="uppercase tracking-widest font-semibold text-gray-600 text-sm px-6" href="/home">Home</inertia-link>
            <template v-else>
                <inertia-link class="uppercase tracking-widest font-semibold text-gray-600 text-sm px-6" href="/login">Login</inertia-link>
            </template>
        </div>

        <div class="h-screen flex flex-col justify-center items-center">
            <div class="text-gray-600 mb-8 font-thin" style="font-size: 5.375rem">{{$page.app}}</div>
        </div>
    </div>
</template>

<script>
    export default {
        //
    }
</script>
