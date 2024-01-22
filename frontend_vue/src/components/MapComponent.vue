<template>
  <div class="mapa w-96 h-48 overflow-hidden">
    <div id="map"></div>
  </div>
</template>

<script>
import L from 'leaflet';

export default {
  methods: {
    initMap() {
      this.map = L.map('map').setView([0, 0], 13);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
      }).addTo(this.map);
    },
    getLocation() {
      if ('geolocation' in navigator) {
        navigator.geolocation.getCurrentPosition(position => {
          const { latitude, longitude } = position.coords;

          this.$emit('atualiza-localizacao', { latitude, longitude });

          this.map.setView([latitude, longitude], 20);

          L.marker([latitude, longitude]).addTo(this.map)
            .bindPopup('Você está aqui!')
            .openPopup();
        }, error => {
          alert(`Erro ao obter localização: ${error.message}`);
        })
      } else {
        alert('Geolocalização não suportada pelo navegador.');
      }
    }
  },
  mounted() {
    this.initMap();
    this.getLocation();
  }
}
</script>

<style scoped>
.mapa {
  border: 2px solid gray;
}

#map {
  width: 450px;
  height: 150px;
  position: relative;


  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

</style>