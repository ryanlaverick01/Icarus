import { computed, reactive } from "vue";
import useHolidays from "./useHolidays";

/*
 * Global state - this is loaded once when the application is initially loaded and
 * values loaded into it will be persisted until the application instance is destroyed.
 */
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

/*
 * By default, export everything within this method.
 */
export default function useChat() {
    /*
     * Getters - this will return data from the state using Vue's computed directive.
     */
    const getMessages = computed(() => state.messages);
    const getStage = computed(() => state.stage);

    /*
     * Mutations - these are methods which will alter the data contained within the state.
     */
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

    /*
     * Add messages after a delay - this is mainly used for rendering Icarus messages
     * to give the illusion of the chatbot typing.
     */
    const addMessage = (sender, message, timeout = 1500) => {
        setTimeout(() => {
            state.messages.push({
                sender: sender,
                message: message,
            });
        }, timeout);
    }

    /*
     * Different implementations of adding messages dependent on who the "sender" is.
     * Message rendering is done differently based on the set "sender" - so different methods
     * have been created to do this automatically.
     */
    const addIcarusMessage = (message, timeout) => {
        addMessage("Icarus", message, timeout);
    }

    /*
     * Method for submitting a message as a user.
     */
    const addUserMessage = async (message, timeout) => {
        addMessage("User", message, timeout);
        //Locally set a variable called "msg" to the lowercase value of the message passed in.
        const msg = message.toLowerCase();

        //Check if stage == 0.
        if(state.stage === 0) {
            //Check if message does not contain expected values.
            if(!msg.includes("mild") && !msg.includes("hot") && !msg.includes("cold")) {
                //Render error message if message does not contain one of the expected values.
                addIcarusMessage("Hmm... I don't think I understood that. Did you mean MILD, HOT, or COLD?");
                //Exit function.
                return;
            }

            //Use mutation to set climate within the state.
            setClimate(msg);
            //Progress stage.
            progress();
            //Add confirmation message to show input was accepted and recognised.
            addIcarusMessage("Alright! So you want to go somewhere " + msg.toUpperCase() + ", so.. do you want a lazy or an active holiday?");
            //Exit function.
            return;
        }

        //Check if stage == 1.
        if(state.stage === 1) {
            //Check if message does not contain expected values.
            if(!msg.includes("lazy") && !msg.includes("active")) {
                //Render error message if message does not contain one of the expected values.
                addIcarusMessage("I don't think I understood that. Did you mean ACTIVE or LAZY?");
                //Exit function.
                return;
            }

            //Use mutation to set category within the state.
            setCategory(msg);
            //Progress stage.
            progress();
            //Add confirmation message to show input was accepted and recognised.
            addIcarusMessage("Okay, so you're wanting a " + msg.toUpperCase() + " holiday! Do you want to be by the SEA, in the CITY, or in the MOUNTAINS?");
            //Exit function.
            return;
        }

        //Check if stage == 2.
        if(state.stage === 2) {
            //Check if message does not contain expected values.
            if(!msg.includes("sea") && !msg.includes("city") && !msg.includes("mountain")) {
                //Render error message if message does not contain one of the expected values.
                addIcarusMessage("I don't think I understood that. Do you want a holiday by the SEA, in the CITY, or in the MOUNTAINS?");
                //Exit function.
                return;
            }

            //Use mutation to set the location within the state.
            setLocation(msg);
            //Progress stage.
            progress();
            //Add confirmation message to show input was accepted and recognised.
            addIcarusMessage("Good choice! So you want a " + msg.toUpperCase() + " holiday!", 0);

            //Execute query to back-end
            await findHolidays(state.query.climate, state.query.category, state.query.location);
        }
    }

    //Expose for use in other files.
    return {
        getMessages,
        getStage,
        addIcarusMessage,
        addUserMessage,
    };
}
