import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

//Create application using "App" as base component.
const app = createApp(App);
//Tell Vue to use imported router, mount the app to the "#app" container located in @/resources/views/welcome.blade.php
app.use(router).mount("#app");
