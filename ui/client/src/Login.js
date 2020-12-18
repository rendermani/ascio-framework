import React, { useState } from "react";
import { useHistory } from "react-router-dom";
import { setSessionCookie } from "./Session";
import styles from "./Login.module.css";

import { useForm } from "react-hook-form";
import { Link } from "react-router-dom";
import config from "./config";

const Login = () => {
  const { register, handleSubmit, errors } = useForm();
  const [message, setMessage] = useState();
  const history = useHistory();

  const onSubmit = (data, e) => {
    setMessage({
      data: "Login is in progress...",
      type: "alert-warning",
    });
    fetch(`${config.baseUrl}/users/login`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data),
    })
      .then((res) => res.json())
      .then(({ error, user }) => {
        console.log("user",user)
        setMessage({
          data: error || "Logged in successfully, redirecting...",
          type: error ? "alert-danger" : "alert-success",
        });

        !error &&
          setTimeout(() => {
            setSessionCookie({username: "rendermani"});
            localStorage.setItem('user', user)
            const login = React.useContext("SessionContext")
            history.push("/dns-manager");
          }, 1000);

        !error && e.target.reset();
      });
  };

  return (
    <div
      className={`${styles.container} container-fluid d-flex align-items-center justify-content-center`}
    >
      <div className={styles.loginFormContainer}>
        {message && (
          <div
            className={`alert fade show d-flex ${message.type}`}
            role="alert"
          >
            {message.data}
            <span
              aria-hidden="true"
              className="ml-auto cursor-pointer"
              onClick={() => setMessage(null)}
            >
              &times;
            </span>
          </div>
        )}
        <fieldset className="border p-3 rounded">
          <legend
            className={`${styles.loginFormLegend} border rounded p-1 text-center`}
          >
            Login Form
          </legend>
          <form onSubmit={handleSubmit(onSubmit)} noValidate autoComplete="off">
            <div className="form-group">
              <label htmlFor="inputForUsername">Username address</label>
              <span className="mandatory">*</span>
              <input
                id="inputForUsername"
                name="username"
                type="text"
                className="form-control"
                aria-describedby="Enter username"
                placeholder="Enter username"
                ref={register({
                  required: {
                    value: true,
                    message: "Please enter your username",
                  },
                })}
              />
              {/**
               * we provide validation configuration for email field above
               * error message are displayed with code below
               */}
              {errors.username && (
                <span className={`${styles.errorMessage} mandatory`}>
                  {errors.username.message}
                </span>
              )}
            </div>
            <div className="form-group">
              <label htmlFor="inputForPassword">Password</label>
              <span className="mandatory">*</span>
              <input
                type="password"
                name="password"
                className="form-control"
                id="inputForPassword"
                placeholder="Enter password"
                ref={register({
                  required: {
                    value: true,
                    message: "Please enter password",
                  },
                })}
              />
              {errors.password && (
                <span className={`${styles.errorMessage} mandatory`}>
                  {errors.password.message}
                </span>
              )}
            </div>
            <div className="d-flex align-items-center">
              <button type="submit" className="btn btn-outline-primary">
                Login
              </button>

              <button className="btn btn-link ml-auto">
                <Link to="/register">New User</Link>
              </button>
            </div>
          </form>
        </fieldset>
      </div>
    </div>
  );
};

export default Login;