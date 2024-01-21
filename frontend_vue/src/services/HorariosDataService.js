import http from "@/http-common";

class HorariosDataService {
  getByColaboradorId(id) {
    return http.get(`/horarios-colaborador/${id}`);
  }

}

export default new HorariosDataService();