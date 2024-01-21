import http from "@/http-common";

class FeriadosDataService {
  getAll() {
    return http.get("/feriados");
  }

  create(data) {
    return http.post("/feriados", data);
  }

  get(id) {
    return http.get(`/feriados/${id}`);
  }

  update(id, data) {
    return http.put(`/feriados/${id}`, data);
  }

  delete(id) {
    return http.delete(`/feriados/${id}`);
  }
}

export default new FeriadosDataService();
