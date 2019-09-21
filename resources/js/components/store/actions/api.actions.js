import axios from "axios";
import { notification } from "antd";

axios.defaults.headers.common["Accept"] = "application/json";
axios.defaults.headers.common["Content-Type"] = "application/json";

function handleError(response) {
    const { data } = response;
    const { errors = {}, message } = data;

    const errKey = Object.keys(errors);

    console.log(response);

    errKey.forEach(key => {
        notification.error({
            message,
            description: errors[key],
            duration: 5
        });
    });
}

function handleSuccess(response, callback) {
    console.log(response);
    callback(response.data);
}

export function callWithErrorHandling({ url, method, params = {}, callback }) {
    const callAPI = method => {
        axios[method](url, params)
            .then(res => handleSuccess(res, callback))
            .catch(err => handleError(err.response));
    };

    callAPI(method);
}
