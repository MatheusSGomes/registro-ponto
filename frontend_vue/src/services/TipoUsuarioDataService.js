import http from "@/http-common";

class TipoUsuariosDataService {
  getAll() {
    return http.get("/tipousuario");
  }
}

export default new TipoUsuariosDataService();