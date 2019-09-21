import React from "react";
import { BrowserRouter as Router, Route } from "react-router-dom";
import Login from "./authentication/Login";
import Home from "./home/Home";

function Routes() {
    return (
        <Router>
            <Route path='/' exact component={Home} />
            <Route path='/login' exact component={Login} />
            <Route path='/register' exact component={Login} />
        </Router>
    );
}

export default Routes;
