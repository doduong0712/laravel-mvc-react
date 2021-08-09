import React, { useState, useEffect } from "react";
import AppContainer from "./AppContainer";
import { useParams, useHistory } from "react-router-dom";
import useAPI from "../api/userApi";

function FormEditLevel() {
  const { id } = useParams();
  const history = useHistory();
  const [error, setError] = useState("");
  const [level, setLevel] = useState(null);
  const [user, setUser] = useState({});

  const onEditsubmit = async (e) => {
    e.preventDefault();
    try {
      const users = {
        id: user.id,
        name: user.name,
        email: user.email,
        level: level,
      };

      await useAPI.postEdit(users);
      alert("update level success");
      history.push("/home");
    } catch (error) {
      setError(error.response.data.errors.level);
      console.log("Fail", error);
    }
  };

  useEffect(() => {
    useAPI
      .getUsers(id)
      .then((res) => {
        const getuser = res;
        setLevel(getuser.level);
        setUser(getuser);
      })
      .catch((err) => console.log(err));
  }, []);

  return (
    <AppContainer title="Edit Level Users">
      <div className="col-xs-4 col-md-4 col-xs-offset-4 col-md-offset-4 mx-auto my-auto ">
        <form onSubmit={onEditsubmit}>
          <div className="form-group">
            <label>Leve</label>
            <input
              type="number"
              name="level"
              className="form-control"
              value={level}
              onChange={(e) => setLevel(e.target.value)}
            />
          </div>
          {error ? (
            <div className="form-group text-danger">
              <p>{error}</p>
            </div>
          ) : (
            ""
          )}
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

export default FormEditLevel;
