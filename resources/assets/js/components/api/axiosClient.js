import axios from "axios";
import queryString from "query-string";

const REACT_APP_API_URL = "http://dovanduong.net/api";
// Set up default config for http requests here
// Please have a look at here `https://github.com/axios/axios#request- config` for the full list of configs
const axiosClient = axios.create({
  baseURL: REACT_APP_API_URL,
  headers: {
    "content-type": "application/json", //set comment header có thể thêm vào ....
  },
  paramsSerializer: (params) => queryString.stringify(params), //sử dụng thư viện querystring để hỗ trợ nhận params mình có thể tự handle  ,do axios defaul không nhân biết được null hoặc undefile
});

axiosClient.interceptors.request.use(async (config) => {
  //sử dụng nếu có handle token sẽ add thêm code
  // Handle token here ...
  return config;
});

axiosClient.interceptors.response.use(
  //
  (response) => {
    if (response && response.data) {
      return response.data;
    }

    return response;
  },
  (error) => {
    // Handle errors
    throw error;
  }
);

export default axiosClient;
