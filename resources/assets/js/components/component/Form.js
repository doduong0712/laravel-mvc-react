import React, { useState } from "react";
import AppContainer from "./AppContainer";
import { useHistory } from "react-router-dom";
import useAPI from "../api/userApi";
import HomeForm from "./HomeForm";

function Form() {
  const history = useHistory();
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [errEmail, setErrEmail] = useState(" ");
  const [errPass, setErrPass] = useState("");
  const [err, setErr] = useState("");

  const onSubmit = async (e) => {
    e.preventDefault();
    try {
      const user = {
        email: email,
        password: password,
      };

      await useAPI.authUser(user);
      history.push("/home");
    } catch (error) {
      console.log(error.response.data.errors);
      if (error.response.data.errors != undefined) {
        setErrEmail(error.response.data.errors.email);
        setErrPass(error.response.data.errors.password);
      } else {
        setErrEmail("");
        setErrPass("");
      }
      if (error.response.data.error != undefined) {
        setErr(error.response.data.error);
        console.log("Fail", error.response.data.error);
      }
    }
  };

  return (
    <AppContainer title="Laravel Login">
      <div className="row mt-5">
        <div className="col-sm-6 mx-auto">
          <form>
            <div className="form-group">
              <label>Emai</label>
              <input
                onChange=""
                name="email"
                type="text"
                className="form-control"
                value={email}
                onChange={(e) => setEmail(e.target.value)}
              />
              {errEmail ? (
                <div className="form-group text-danger">
                  <p>{errEmail}</p>
                </div>
              ) : (
                ""
              )}
              <div className="form-group">
                <label>Password</label>
                <input
                  onChange=""
                  name="password"
                  type="password"
                  className="form-control"
                  value={password}
                  onChange={(e) => setPassword(e.target.value)}
                />
              </div>
              {errPass ? (
                <div className="form-group text-danger">
                  <p>{errPass}</p>
                </div>
              ) : (
                ""
              )}
              {err ? (
                <div className="form-group text-danger">
                  <p>{err}</p>
                </div>
              ) : (
                ""
              )}
              <button
                type="submit"
                className="btn btn-success"
                onClick={onSubmit}
              >
                Đăng nhập
              </button>
            </div>
          </form>
        </div>
      </div>
    </AppContainer>
  );
}

export default Form;
