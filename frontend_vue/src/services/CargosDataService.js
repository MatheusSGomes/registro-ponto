import http from "@/http-common";

class CargosDataService {
  getAll() {
    return http.get("/cargos");
  }

}

export default new CargosDataService();