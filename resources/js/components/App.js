import React from "react";
import ReactDOM from "react-dom";
import { Provider } from "react-redux";

import store from "./store";
import Routes from "./Routes";
import IsAuthenticated from "./authentication/IsAuthenticated";

export default function App() {
    return (
        <Provider store={store}>
            <IsAuthenticated>
                <Routes />
            </IsAuthenticated>
        </Provider>
    );
}

if (document.getElementById("root")) {
    ReactDOM.render(<App />, document.getElementById("root"));
}
