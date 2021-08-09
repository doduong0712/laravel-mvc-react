import React from "react";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import Form from "./component/Form";
import HomeForm from "./component/HomeForm";
import FormUser from "./component/FormUser";
import FormPassword from "./component/FormPassword";
import FormEditLevel from "./component/FormEditLevel";
//import AuthApi from "./component/AuthApi";

function App() {
  return (
    <Router className="App__container">
      <Routes />
    </Router>
  );
}

const Routes = () => {
  return (
    <Switch>
      <Route exact path="/home" component={HomeForm} />
      <Route path="/auth" component={Form} />
      <Route path="/user" component={FormUser} />
      <Route path="/users/:id" component={FormEditLevel} />
      <Route path="/changepassword" component={FormPassword} />
    </Switch>
  );
};

/* const ProtectedRoute = ({ auth, component: Component, ...rest }) => {
  return (
    <Route
      {...rest}
      render={() => (auth ? <Component /> : <Redirect to="auth" />)}
    />
  );
}; */

/* const ProtectedLogin = ({ auth, component: Component, ...rest }) => {
  return (
    <Route
      {...rest}
      render={() => (!auth ? <Component /> : <Redirect to="/" />)}
    />
  );
}; */

export default App;
