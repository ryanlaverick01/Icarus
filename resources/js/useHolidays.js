import { client } from "./service/client";
import useChat from "./useChat";
import {computed, reactive} from "vue";
const { addIcarusMessage } = useChat();

export default function useHolidays() {
    const state = reactive({
        holidays: []
    });

    const getHolidays = computed(() => state.holidays);

    const setHolidays = (holidays) => {
        state.holidays = holidays;
    }

    const findHolidays = async(climate, category, location) => {
        try {
            await client.post("holidays", {
                "climate" : climate,
                "category": category,
                "location": location
            }).then((response) => {
                setHolidays(response.data.data);
                addIcarusMessage("Result! I've managed to find some holidays you may be interested in...");
            });
        } catch (e) {
            addIcarusMessage("Hmm... it seems I couldn't find any Holidays matching your desires!");
        }
    }

    return {
        getHolidays,
        findHolidays
    };
}
