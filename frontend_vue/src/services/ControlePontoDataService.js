import http from "@/http-common";

class ControlePontoDataService {
  getByColaboradorId(id) {
    return http.get(`/ponto/${id}`);
  }

  registrarPonto(data) {
    return http.post(`/ponto`, data);
  }
}

export default new ControlePontoDataService();