<template>
    <div class="h-20 w-full bg-slate-800 drop-shadow-md z-30">
        <div class="m-4 flex items-center space-x-4">
            <user-icon class="h-12 w-12 fill-white" />
            <input
                id="message"
                type="text"
                v-model="message"
                @keydown.enter="submitMessage"
                class="bg-white rounded-md w-full h-12 p-2 focus:outline-none placeholder:text-gray-400 placeholder:italic"
                placeholder="Hey! Why don't you say something..."
            />
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import UserIcon from "../components/icons/UserIcon";
import useChat from "../useChat";
const { addUserMessage } = useChat();

let message = ref("");

async function submitMessage() {
    let msg = message.value;
    if(msg === "") {
        return;
    }

    message.value = "";
    addUserMessage(msg, 0);
}
</script>
