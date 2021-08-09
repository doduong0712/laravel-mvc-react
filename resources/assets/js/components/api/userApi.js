import axiosClient from "./axiosClient";

const useAPI = {
  getUser: (params) => {
    const url = "/userLogin";
    return axiosClient.get(url, { params }); // truyền vao params se tự động params trên url
  },
  getListUsers: (params) => {
    const url = "/getListUser";
    return axiosClient.get(url, { params });
  },
  getUsers: (id, params) => {
    const url = `/user/${id}`;
    return axiosClient.get(url, { params });
  },
  getLogOutUser: (params) => {
    const url = "/auth/logout";
    return axiosClient.get(url, { params });
  },
  postEdit: (user, params) => {
    const url = "/edituser";
    return axiosClient.post(url, user, { params });
  },
  postChangePassword: (password, params) => {
    const url = "/saveUpdatePass";
    return axiosClient.post(url, password, { params });
  },
  authUser: (user, params) => {
    const url = "/auth/authLogin";
    return axiosClient.post(url, user, { params });
  },
};

export default useAPI;
