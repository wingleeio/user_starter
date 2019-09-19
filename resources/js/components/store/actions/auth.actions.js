import axios from "axios";

export const login = formData => dispatch => {
    axios
        .post("/api/v1/login", formData)
        .then(({ data }) =>
            dispatch({
                type: "LOGIN_SUCCESS",
                payload: data
            })
        )
        .catch(err => console.log(err.response));
};
