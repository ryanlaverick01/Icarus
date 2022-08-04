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
    //Grab value from "message" variable.
    let msg = message.value;
    //Check if message is blank.
    if(msg === "") {
        //If message is blank, halt the method and do not submit the message.
        return;
    }

    //Set value of input box to blank.
    message.value = "";
    //Submit message.
    await addUserMessage(msg, 0);
}
</script>
