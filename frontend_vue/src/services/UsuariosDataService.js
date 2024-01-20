import http from "@/http-common";

class UsuariosDataService {
  getAll() {
    return http.get(`/usuarios`)
  }

  create(data) {
    console.log( data)
  }

  get(id) {
    return http.get(`/usuarios/${id}`);
  }

  update(id, data) {
    console.log(id, data)
  }

  delete(id) {
    console.log(id)
  }
}

export default new UsuariosDataService();