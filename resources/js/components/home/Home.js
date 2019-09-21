import React from "react";
import { connect } from "react-redux";
import { logout } from "../store/actions/auth.actions";
import { Button } from "antd";

function Home({ logout, isAuthenticated }) {
    return (
        <div>
            {isAuthenticated && (
                <Button type='danger' onClick={logout}>
                    Logout
                </Button>
            )}
        </div>
    );
}

export default connect(
    state => ({ isAuthenticated: state.auth.isAuthenticated }),
    { logout }
)(Home);
