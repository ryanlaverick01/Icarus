<template>
    <div class="flex bg-gray-100 w-screen h-screen">
        <div class="flex flex-col w-screen h-screen">
            <icarus-header />
            <main class="mb-auto h-full w-full overflow-y-auto p-4">
                <slot />
            </main>
            <icarus-footer />
        </div>
    </div>
</template>

<script setup>
import IcarusFooter from "./IcarusFooter";
import IcarusHeader from "./IcarusHeader";
</script>
