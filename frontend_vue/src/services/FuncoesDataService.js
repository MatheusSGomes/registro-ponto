import http from "@/http-common";

class FuncoesDataService {
  getAll() {
    return http.get("/funcoes");
  }
}

export default new FuncoesDataService();