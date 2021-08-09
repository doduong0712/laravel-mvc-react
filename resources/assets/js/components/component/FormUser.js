import React, { useState, useEffect } from "react";
import AppContainer from "./AppContainer";
import { useHistory } from "react-router-dom";
import useAPI from "../api/userApi";

function FormUser() {
  const history = useHistory();
  const [user, setUser] = useState({});
  const [name, setName] = useState("");
  const [error, setError] = useState("");

  const onEditSubmit = async (e) => {
    e.preventDefault();
    try {
      const users = {
        id: user.id,
        name: name,
        email: user.email,
        level: user.level,
      };

      await useAPI.postEdit(users);
      alert("update success");
      history.push("/home");
    } catch (error) {
      setError(error.response.data.errors.name);

      console.log("Fail", error);
    }
  };

  useEffect(() => {
    useAPI
      .getUser()
      .then((res) => {
        const getuser = res;
        setName(getuser.name);
        setUser(getuser);
      })
      .catch((err) => console.log(err));
  }, []);

  return (
    <AppContainer title="Profile User">
      <div className="col-xs-4 col-md-4 col-xs-offset-4 col-md-offset-4 mx-auto my-auto ">
        <form onSubmit={onEditSubmit}>
          <div className="form-group">
            <p>ID : {user.id}</p>
          </div>
          <div className="form-group">
            <label>Name </label>
            <input
              type="text"
              name="name"
              className="form-control"
              value={name}
              onChange={(e) => setName(e.target.value)}
            />
            {error ? (
              <div className="form-group text-danger">
                <p>{error}</p>
              </div>
            ) : (
              ""
            )}
          </div>
          <div className="form-group">
            <p>Email : {user.email}</p>
          </div>
          <div className="form-group">
            <p>Level : {user.level}</p>
          </div>
          <div className="form-group">
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

export default FormUser;
