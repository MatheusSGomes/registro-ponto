import http from "@/http-common";

class UsuariosDataService {
  getAll() {
    return http.get(`/usuarios`)
  }

  create(data) {
    return http.post('/usuarios', data);
  }

  get(id) {
    return http.get(`/usuarios/${id}`);
  }

  update(id, data) {
    return http.put(`/usuarios/${id}`, data);
  }

  delete(id) {
    console.log(id)
  }
}

export default new UsuariosDataService();