<template>
  <div>
    <h1 class="my-3">Horgászvizsga tananyag</h1>

    <div class="accordion accordion-flush p-3" id="accordionFlushExample">
      <div class="accordion-item" v-for="(row, index) in rows" :key="row.id">
        <h2 class="accordion-header">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            :data-bs-target="`#flush-collapse${index}`"
            aria-expanded="false"
            :aria-controls="`flush-collapse${index}`"
          >
          <h2>{{ row.FejezetCim }}</h2>
            
          </button>
        </h2>
        <div
          :id="`flush-collapse${index}`"
          class="accordion-collapse collapse"
          data-bs-parent="#accordionFlushExample"
        >
          <div class="accordion-body clearfix">
            <!-- Foghatósági infók -->
            <ul v-if="row.KepFile">
                <li>Tilalmi időszak: {{ info(row.TilalmiIdoszak) }}</li>
                <li>Méretkorlát: {{ info(row.MeretKorlat) }} cm</li>
                <li>Darabkorlátos: {{ info(row.DarabKorlatos) }} db</li>
                <li>Foghatóság: {{ row.Foghatosag }}</li>
            </ul>

            <!-- Kép -->
            <img class="rounded float-start col-12 col-sm-6 me-sm-3 mb-3 mb-sm-0" 
            :src="`images/${row.KepFile}`" 
            :alt="row.FejezetCim"
            v-if="row.KepFile">

            <!-- Tartalom -->
            <div v-html="row.SzovegHtml" ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { BASE_URL } from "../helpers/baseUrl";
import axios from "axios";
export default {
  data() {
    return {
      rows: [],
    };
  },
  mounted() {
    this.getHorgaszvizsgaTananyag();
  },
  methods: {
    async getHorgaszvizsgaTananyag() {
      try {
        const url = `${BASE_URL}/horgaszvizsgaTananyag`;
        const response = await axios.get(url);
        this.rows = response.data.data;
        console.log(this.rows);
      } catch (error) {
        console.log(error);
      }
    },
    info(data){
        return data ? data : "-";
    }
  },
};
</script>

<style>
</style>