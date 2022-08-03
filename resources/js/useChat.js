import { computed, reactive } from "vue";
import useHolidays from "./useHolidays";

const state = reactive({
    messages: [],
    stage: 0,
    query: {
        climate: "",
        category: "",
        location: "",
    },
});

const { findHolidays, getHolidays: holidays } = useHolidays();

export default function useChat() {
    const getMessages = computed(() => state.messages);
    const getStage = computed(() => state.stage);

    const progress = () => {
        state.stage++;
    }

    const setClimate = (climate) => {
        state.query.climate = climate;
    }

    const setCategory = (category) => {
        state.query.category = category;
    }

    const setLocation = (location) => {
        state.query.location = location;
    }

    const addMessage = (sender, message, timeout = 1500) => {
        setTimeout(() => {
            state.messages.push({
                sender: sender,
                message: message,
            });
        }, timeout);
    }

    const addIcarusMessage = (message, timeout) => {
        addMessage("Icarus", message, timeout);
    }

    const addUserMessage = async (message, timeout) => {
        addMessage("User", message, timeout);
        const msg = message.toLowerCase();

        if(state.stage === 0) {
            if(!msg.includes("mild") && !msg.includes("hot") && !msg.includes("cold")) {
                addIcarusMessage("Hmm... I don't think I understood that. Did you mean MILD, HOT, or COLD?");
                return;
            }

            setClimate(msg);
            progress();
            addIcarusMessage("Alright! So you want to go somewhere " + msg.toUpperCase() + ", so.. do you want a lazy or an active holiday?");
            return;
        }

        if(state.stage === 1) {
            if(!msg.includes("lazy") && !msg.includes("active")) {
                addIcarusMessage("I don't think I understood that. Did you mean ACTIVE or LAZY?");
                return;
            }

            setCategory(msg);
            progress();
            addIcarusMessage("Okay, so you're wanting a " + msg.toUpperCase() + " holiday! Do you want to be by the SEA, in the CITY, or in the MOUNTAINS?");
            return;
        }

        if(state.stage === 2) {
            if(!msg.includes("sea") && !msg.includes("city") && !msg.includes("mountain")) {
                addIcarusMessage("I don't think I understood that. Do you want a holiday by the SEA, in the CITY, or in the MOUNTAINS?");
                return;
            }

            setLocation(msg);
            progress();
            addIcarusMessage("Good choice! So you want a " + msg.toUpperCase() + " holiday!");

            await findHolidays(state.query.climate, state.query.category, state.query.location);

            for(const holiday in holidays.value) {
                addIcarusMessage(holidays.value[holiday]);
            }
        }
    }

    return {
        getMessages,
        getStage,
        addIcarusMessage,
        addUserMessage,
    };
}
