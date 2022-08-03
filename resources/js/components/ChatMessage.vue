<template>
    <div v-if="isIcarus" class="flex items-center space-x-2 pb-2">
        <div class="align-middle text-center w-12">
            <div class="flex justify-center">
                <icarus-icon class="h-8 w-8 fill-black" />
            </div>

            <p class="text-xs font-bold">ICARUS</p>
        </div>

        <div>
            <div class="bg-white rounded-md drop-shadow-md text-slate-800 p-2">
                {{ message }}
            </div>
        </div>
    </div>

    <div v-else class="flex justify-end items-center space-x-2 pb-2 align-right">
        <div>
            <div class="bg-blue-600 rounded-md drop-shadow-md text-white p-2">
                {{ message }}
            </div>
        </div>
        <user-icon class="h-12 w-12 fill-blue-600" />
    </div>
</template>

<script setup>
import {computed} from "vue";
import IcarusIcon from "./icons/IcarusIcon";
import UserIcon from "./icons/UserIcon";

const props = defineProps({
    sender: {
        required: true,
    },
    message: {
        required: true,
    },
})

const isIcarus = computed(() => {
    return props.sender === "Icarus";
})
</script>
