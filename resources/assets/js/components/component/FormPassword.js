import React, { useState } from "react";
import AppContainer from "./AppContainer";
import useAPI from "../api/userApi";
import { useHistory } from "react-router-dom";

function FormPassword() {
  const history = useHistory();
  const [oldPassord, setOldPassword] = useState("");
  const [newPassword, setNewPassword] = useState("");
  const [comfirmPassword, setComfirmPassword] = useState("");

  const [errOldPassord, setErrOldPassword] = useState("");
  const [errNewPassword, setErrNewPassword] = useState("");
  const [errComfirmPassword, setErrComfirmPassword] = useState("");

  const onchangePassword = async (e) => {
    e.preventDefault();
    try {
      const password = {
        old_password: oldPassord,
        new_password: newPassword,
        confirm_password: comfirmPassword,
      };
      await useAPI.postChangePassword(password);
      alert("Change Password Success");
      history.push("/home");
    } catch (error) {
      setErrOldPassword(error.response.data.errors.old_password);
      setErrNewPassword(error.response.data.errors.new_password);
      setErrComfirmPassword(error.response.data.errors.confirm_password);
      console.log("Fail", error);
    }
  };

  return (
    <AppContainer title="Change Password user">
      <div className="col-xs-4 col-md-4 col-xs-offset-4 col-md-offset-4 mx-auto my-auto ">
        <form onSubmit={onchangePassword}>
          <div className="form-group">
            <div className="form-group">
              <label>Mật khẩu cũ</label>
              <input
                type="password"
                name="old_password"
                placeholder="***********"
                className="form-control"
                value={oldPassord}
                onChange={(e) => setOldPassword(e.target.value)}
              />
            </div>
            {errOldPassord ? (
              <div className="form-group text-danger">
                <p>{errOldPassord}</p>
              </div>
            ) : (
              ""
            )}
            <div className="form-group">
              <label>Nhập lại mật khẩu mới</label>
              <input
                type="password"
                name="new_password"
                placeholder="**********"
                className="form-control"
                value={newPassword}
                onChange={(e) => setNewPassword(e.target.value)}
              />
            </div>
            {errNewPassword ? (
              <div className="form-group text-danger">
                <p>{errNewPassword}</p>
              </div>
            ) : (
              ""
            )}
            <div className="form-group">
              <label>Xác nhận mật khẩu</label>
              <input
                type="password"
                name="confirm_password"
                placeholder="**********"
                className="form-control"
                value={comfirmPassword}
                onChange={(e) => setComfirmPassword(e.target.value)}
              />
            </div>
            {errComfirmPassword ? (
              <div className="form-group text-danger">
                <p>{errComfirmPassword}</p>
              </div>
            ) : (
              ""
            )}
            <input
              type="submit"
              name="submit"
              className="form-control btn btn-primary"
              value="Submit"
            />
          </div>
        </form>
      </div>
    </AppContainer>
  );
}

export default FormPassword;
