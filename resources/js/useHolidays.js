import { client } from "./service/client";
import useChat from "./useChat";
import {computed, reactive} from "vue";
const { addIcarusMessage } = useChat();

//Global state.
const state = reactive({
    holidays: null
});

export default function useHolidays() {
    //Getter to return state data.
    const getHolidays = computed(() => state.holidays);

    //Manipulate/set state data.
    const setHolidays = (holidays) => {
        state.holidays = holidays;
    }

    const findHolidays = async(climate, category, location) => {
        try {
            //Await API response, posting payload including the relevant data.
            await client.post("holidays", {
                "climate" : climate,
                "category": category,
                "location": location
            }).then((response) => {
                //Holidays have been returned, set state.holidays to response
                setHolidays(response.data.data);
                //Render success message to the user
                addIcarusMessage("Result! I've managed to find some holidays you may be interested in...", 0);
            });
        } catch (e) {
            /*
             * Display error messages - this is triggered as when no holidays can be
             * found as a 404 response is returned, which is picked up by axios and
             * successfully recognised.
            */
            addIcarusMessage("Hmm... it seems I couldn't find any Holidays matching your desires!");
        }
    }

    return {
        getHolidays,
        findHolidays
    };
}
