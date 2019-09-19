import React from "react";
import { connect } from "react-redux";
import { Form, Icon, Input, Button, Checkbox, Card } from "antd";
import { Link } from "react-router-dom";
import { login } from "../store/actions/auth.actions";
import styled from "styled-components";

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
`;

const LoginForm = styled(Form)`
    max-width: 300px;
`;

const Forgot = styled.a`
    float: right;
`;

const LoginButton = styled(Button)`
    width: 100%;
`;

function Login({ form: { getFieldDecorator, validateFields } = {}, login }) {
    const onSubmit = e => {
        e.preventDefault();
        validateFields((err, values) => {
            if (!err) {
                login(values);
            }
        });
    };
    return (
        <LoginPage>
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
                        {getFieldDecorator("remember", {
                            valuePropName: "checked",
                            initialValue: true
                        })(<Checkbox>Remember me</Checkbox>)}
                        <Forgot href=''>Forgot password</Forgot>
                        <LoginButton type='primary' htmlType='submit'>
                            Log in
                        </LoginButton>
                        Or <Link to='/register'>register now!</Link>
                    </Form.Item>
                </LoginForm>
            </LoginCard>
        </LoginPage>
    );
}

export default Form.create({ name: "login" })(
    connect(
        null,
        { login }
    )(Login)
);
