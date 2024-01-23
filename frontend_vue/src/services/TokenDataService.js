class TokenDataService {
  isAuthenticated() {
    return localStorage.getItem('access_token');
  }

  isAdmin() {
    return localStorage.getItem('tipo_usuario') == 1;
  }

  isColaborador() {
    return localStorage.getItem('tipo_usuario') == 2;
  }
}

export default new TokenDataService();