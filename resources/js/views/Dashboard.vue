<template>
    <chat />
</template>

<script setup>
import useChat from "../useChat";
import Chat from "../components/Chat";
const { addIcarusMessage } = useChat();

addIcarusMessage("Hey there, I'm Icarus - your friendly Holiday Chatbot!");
addIcarusMessage("Start chatting to find some holidays I think you'd be interested in!", 3000);
addIcarusMessage("Okay... you're looking for a holiday - do you want to be somewhere MILD, HOT, or COLD?", 4500);
</script>
