<template>
    <div class="w-full flex items-center space-x-2 pb-2">
        <div class="align-middle text-center w-12">
            <div class="flex justify-center">
                <icarus-icon class="h-8 w-8 fill-black" />
            </div>

            <p class="text-xs font-bold">ICARUS</p>
        </div>

        <div class="w-full">
            <div class="w-1/3 bg-white rounded-md drop-shadow-md text-slate-800 p-2 w-full">
                <!-- Header -->
                <div class="flex justify-between">
                    <div class="w-2/3">
                        <p>{{ holiday.hotel.name }} - {{ holiday.city.name }}, {{ holiday.country.name }}</p>
                    </div>

                    <div class="w-1/3 flex justify-end items-center space-x-4">
                        <div class="flex items-center">
                            <p>{{ holiday.star_rating}}</p>
                            <star-icon class="h-4 w-4 fill-slate-800" />
                        </div>

                        <p>£{{ holiday.price_per_night }} per per night</p>
                    </div>
                </div>

                <!-- Body -->
                <div class="w-full">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center space-x-2">
                            <p class="font-semibold">Climate</p>
                            <p class="capitalize">{{ holiday.climate.name }}</p>
                        </div>

                        <div class="flex items-center space-x-2">
                            <p class="font-semibold">Category</p>
                            <p class="capitalize">{{ holiday.category.name }}</p>
                        </div>

                        <div class="flex items-center space-x-2">
                            <p class="font-semibold">Location</p>
                            <p class="capitalize">{{ holiday.location.name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import IcarusIcon from "../components/icons/IcarusIcon";
import StarIcon from "./icons/StarIcon";

defineProps({
    holiday: {
        required: true,
    },
});
</script>
