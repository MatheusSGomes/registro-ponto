import http from "@/http-common";

class ControlePontoDataService {
  getByColaboradorId(id) {
    return http.get(`/ponto/${id}`);
  }

}

export default new ControlePontoDataService();