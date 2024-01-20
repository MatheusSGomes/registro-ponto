import http from "@/http-common";

class FeriadosDataService {

  getAll() {
    return http.get("/feriados");
  }

  create(data) {
    console.log(data)
  }

  get(id) {
    return http.get(`/feriados/${id}`);
  }

  update(id, data) {
    console.log(id, data)
  }

  delete(id) {
    console.log(id)
  }

}

export default new FeriadosDataService();
