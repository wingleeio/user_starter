import { callWithErrorHandling } from "./api.actions";

export const login = params => dispatch => {
    callWithErrorHandling({
        url: "/api/v1/login",
        method: "post",
        params,
        callback: data =>
            dispatch({
                type: "LOGIN_SUCCESS",
                payload: data
            })
    });
};

export const register = params => dispatch => {
    callWithErrorHandling({
        url: "/api/v1/register",
        method: "post",
        params,
        callback: data =>
            dispatch({
                type: "LOGIN_SUCCESS",
                payload: data
            })
    });
};

export const checkAuthentication = () => (dispatch, getState) => {
    callWithErrorHandling({
        url: "/api/v1/user",
        method: "get",
        callback: data =>
            dispatch({
                type: "AUTHENTICATED",
                payload: data
            })
    });
};

export const logout = () => dispatch => {
    callWithErrorHandling({
        url: "/api/v1/logout",
        method: "get",
        callback: () =>
            dispatch({
                type: "LOGOUT"
            })
    });
};
