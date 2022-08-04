import axios from "axios";

export const client = axios.create({
    baseURL: "http://icarus.test/api"
});
