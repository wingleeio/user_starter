import React from "react";
import { connect } from "react-redux";
import { checkAuthentication } from "../store/actions/auth.actions";

function IsAuthenticated({ isAuthenticated, checkAuthentication, children }) {
    React.useEffect(() => {
        checkAuthentication();
    }, [checkAuthentication, isAuthenticated]);

    return children;
}

export default connect(
    state => ({ isAuthenticated: state.auth.isAuthenticated }),
    { checkAuthentication }
)(IsAuthenticated);
