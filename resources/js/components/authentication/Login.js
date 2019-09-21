import React from "react";
import { connect } from "react-redux";
import { Form, Icon, Input, Button, Checkbox, Card } from "antd";
import { Link } from "react-router-dom";
import { login } from "../store/actions/auth.actions";
import styled from "styled-components";
import { withRouter } from "react-router-dom";

const LoginPage = styled.div`
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f5f5f5;
`;

const LoginCard = styled(Card)`
    width: 450px;
    height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: ${props => props.bg};
`;

const LoginForm = styled(Form)`
    max-width: 300px;
`;

const LoginButton = styled(Button)`
    width: 100%;
    min-width: 150px;
`;

function Login({
    form: { getFieldDecorator, validateFields } = {},
    login,
    history,
    isAuthenticated
}) {
    const onSubmit = e => {
        e.preventDefault();
        validateFields((err, values) => {
            if (!err) {
                login(values);
            }
        });
    };
    React.useEffect(() => {
        console.log(isAuthenticated);
        if (isAuthenticated) {
            history.push("/");
        }
    }, [isAuthenticated]);
    return (
        <LoginPage>
            <LoginCard bg='#1890ff' />
            <LoginCard>
                <LoginForm onSubmit={onSubmit}>
                    <Form.Item>
                        {getFieldDecorator("email", {
                            rules: [
                                {
                                    required: true,
                                    message: "Please input your email!"
                                }
                            ]
                        })(
                            <Input
                                prefix={
                                    <Icon
                                        type='user'
                                        style={{ color: "rgba(0,0,0,.25)" }}
                                    />
                                }
                                type='email'
                                placeholder='Email'
                            />
                        )}
                    </Form.Item>
                    <Form.Item>
                        {getFieldDecorator("password", {
                            rules: [
                                {
                                    required: true,
                                    message: "Please input your Password!"
                                }
                            ]
                        })(
                            <Input
                                prefix={
                                    <Icon
                                        type='lock'
                                        style={{ color: "rgba(0,0,0,.25)" }}
                                    />
                                }
                                type='password'
                                placeholder='Password'
                            />
                        )}
                    </Form.Item>
                    <Form.Item>
                        <LoginButton
                            type='primary'
                            size='large'
                            htmlType='submit'>
                            Log in
                        </LoginButton>
                        <Link to='/register'>Recover lost password.</Link>
                    </Form.Item>
                </LoginForm>
            </LoginCard>
        </LoginPage>
    );
}

export default withRouter(
    Form.create({ name: "login" })(
        connect(
            state => ({ isAuthenticated: state.auth.isAuthenticated }),
            { login }
        )(Login)
    )
);
