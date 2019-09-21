axios.defaults.headers.common["Authorization"] = `Bearer ${
    localStorage.token ? localStorage.token : null
}`;

const initialState = {
    token: localStorage.token ? localStorage.token : null,
    isAuthenticated: false,
    user: {}
};

export default function(state = initialState, { type, payload }) {
    switch (type) {
        case "LOGIN_SUCCESS":
            const { token, user } = payload;

            localStorage.token = token;
            axios.defaults.headers.common["Authorization"] = `Bearer ${token}`;
            return {
                ...state,
                token,
                user,
                isAuthenticated: true
            };
        case "AUTHENTICATED":
            return {
                ...state,
                user: payload,
                isAuthenticated: true
            };
        case "LOGOUT":
            localStorage.token = "";
            return {
                ...state,
                user: {},
                isAuthenticated: false
            };
        default:
            return state;
    }
}
