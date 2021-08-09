import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import AppContainer from "./AppContainer";
import useAPI from "../api/userApi";
import { useHistory } from "react-router-dom";

function HomeForm(props) {
  const history = useHistory();
  const [user, setUser] = useState([]);
  const [listUser, setListUser] = useState({});

  const fetchUser = () => {
    useAPI
      .getUser()
      .then((res) => {
        setUser(res);
      })
      .catch((err) => console.log("fail", err));
  };

  const fetchListUser = () => {
    useAPI
      .getListUsers()
      .then((res) => {
        setListUser(res);
      })
      .catch((err) => console.log("fail", err));
  };

  const logOutUser = async () => {
    try {
      await useAPI.getLogOutUser();
      history.push("/auth");
    } catch (error) {
      console.log("Fail", error);
    }
  };

  useEffect(() => {
    fetchUser();
    fetchListUser();
  }, []);

  const renderlevel = () => {
    let arrUser = [];
    for (let i = 0; i <= 20; i++) {
      if (listUser[i] != undefined) {
        arrUser.push(listUser[i]);
      }
    }

    return arrUser.map((item, idx) => (
      <tr key={idx}>
        <th scope="row">{item.id}</th>
        <th>{item.name}</th>
        <th>{item.email}</th>
        <th>{item.level}</th>
        <th>
          <Link to={`/users/${item.id}`} className="btn btn-primary">
            Edit Level
          </Link>
        </th>
      </tr>
    ));
  };

  return (
    <AppContainer title="List User">
      <div className="dropdown">
        <button
          className="btn btn-primary dropdown-toggle"
          type="button"
          id="dropdownMenuButton"
          data-toggle="dropdown"
          aria-haspopup="true"
          aria-expanded="false"
        >
          Xin Chào : {user.name}
        </button>
        <div
          className="dropdown-menu px-1"
          aria-labelledby="dropdownMenuButton"
        >
          <Link className="dropdown-item " to={`/user`}>
            Thông tin cá nhân
          </Link>
          <br />
          <Link className="dropdown-item" to="/changepassword">
            Thay đổi mật khẩu
          </Link>
          <br />
          <a className="dropdown-item" onClick={logOutUser}>
            Log out
          </a>
        </div>
      </div>
      <div className="table-responsive">
        <table className="table table-striped mt-5">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">level</th>
              <th scope="col">Edit Level</th>
            </tr>
          </thead>
          <tbody>{renderlevel()}</tbody>
        </table>
      </div>
    </AppContainer>
  );
}

export default HomeForm;
