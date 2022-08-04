<template>
    <div v-for="message in messages">
        <chat-message :sender="message.sender" :message="message.message" />
    </div>

    <div v-if="holidays">
        <holiday-message v-for="holiday in holidays" :holiday="holiday" />
    </div>
</template>

<script setup>
import useChat from "../useChat";
import ChatMessage from "./ChatMessage";
import useHolidays from "../useHolidays";
import HolidayMessage from "./HolidayMessage";

const { getMessages: messages, addIcarusMessage } = useChat();
const { getHolidays: holidays } = useHolidays();

//Add default messages to display to the user. Timeout is incremented over time
//to display messages one by one to the user.
addIcarusMessage("Hey there, I'm Icarus - your friendly Holiday Chatbot!"); //Uses default timeout = 1500
addIcarusMessage("Start chatting to find some holidays I think you'd be interested in!", 3000);
addIcarusMessage("Okay... you're looking for a holiday - do you want to be somewhere MILD, HOT, or COLD?", 4500);
</script>
