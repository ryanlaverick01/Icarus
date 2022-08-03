<template>
    <div v-for="message in messages">
        <chat-message :sender="message.sender" :message="message.message" />
    </div>
</template>

<script setup>
import useChat from "../useChat";
import ChatMessage from "./ChatMessage";
const { getMessages: messages } = useChat();
</script>
