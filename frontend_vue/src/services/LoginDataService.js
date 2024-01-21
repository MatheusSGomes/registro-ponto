import http from "@/http-common";

class LoginDataService {
  login(data) {
    return http.post("/login", data);
  }
}

export default new LoginDataService();