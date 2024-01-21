import http from "@/http-common";

class ColaboradoresDataService {
  getAll() {
    return http.get("/colaboradores");
  }

  create(data) {
    return http.post("/colaboradores", data);
  }

  get(id) {
    return http.get(`/colaboradores/${id}`);
  }

  update(id, data) {
    return http.put(`/colaboradores/${id}`, data);
  }

  delete(id) {
    return http.delete(`/colaboradores/${id}`);
  }
}

export default new ColaboradoresDataService();