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
            return {
                ...state,
                token,
                user,
                isAuthenticated: true
            };
        default:
            return state;
    }
}
