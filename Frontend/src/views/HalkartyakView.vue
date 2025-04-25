<template>
  <div>
    <h1>Halkártyák</h1>
    <!-- Halkártyák -->
    <div
      class="row row-cols-1 row-cols-md-3, row-cols-lg-3, row-cols-xxl-4 g-4"
    >
      <div class="col" v-for="row in rows" :key="row.id">
        <div class="card">
          <img
            class="rounded"
            :src="`images/${row.KepFile}`"
            :alt="row.FejezetCim"
            v-if="row.KepFile"
          />
          <div class="card-body">
            <h5 class="card-title">{{ row.FejezetCim }}</h5>
            <ul>
              <li>Tilalmi időszak: {{ info(row.TilalmiIdoszak) }}</li>
              <li>Méretkorlát: {{ info(row.MeretKorlat) }} cm</li>
              <li>Darabkorlátos: {{ info(row.DarabKorlatos) }} db</li>
              <li>Foghatóság: {{ row.Foghatosag }}</li>
            </ul>
            <button
              type="button"
              class="btn btn-primary"
              data-bs-toggle="modal"
              data-bs-target="#exampleModal"
              @click="onClickDetailsButton(row.id)"
            >
              Részletek
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ row.FejezetCim }}</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <!-- Foghatósági infók -->
            <ul>
              <li>Tilalmi időszak: {{ info(row.TilalmiIdoszak) }}</li>
              <li>Méretkorlát: {{ info(row.MeretKorlat) }} cm</li>
              <li>Darabkorlátos: {{ info(row.DarabKorlatos) }} db</li>
              <li>Foghatóság: {{ row.Foghatosag }}</li>
            </ul>

            <!-- Kép -->
            <img
              class="rounded float-start col-12 col-sm-6 me-sm-3 mb-3 mb-sm-0"
              :src="`images/${row.KepFile}`"
              :alt="row.FejezetCim"
              v-if="row.KepFile"
            />

            <!-- Tartalom -->
            <div v-html="row.SzovegHtml"></div>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
class Row {
  constructor(
    id = null,
    FejezetCim = null,
    KepFile = null,
    TilalmiIdoszak = null,
    MeretKorlat = null,
    DarabKorlatos = null,
    FoghatosagId = null,
    SzovegHtml = null,
    Foghatosa = null
  ) {
    this.id = id;
    this.FejezetCim = FejezetCim;
    this.KepFile = KepFile;
    this.TilalmiIdoszak = TilalmiIdoszak;
    this.MeretKorlat = MeretKorlat;
    this.DarabKorlatos = DarabKorlatos;
    this.FoghatosagId = FoghatosagId;
    this.SzovegHtml = SzovegHtml;
    this.Foghatosa = Foghatosa;
  }
}

import { BASE_URL } from "@/helpers/baseUrl";
import axios from "axios";
export default {
  data() {
    return {
      rows: [],
      row: new Row(),
      selectedRowId: null
    };
  },
  mounted() {
    this.getRows();
  },
  methods: {
    async getRows() {
      try {
        const url = `${BASE_URL}/halkartyak`;
        const response = await axios.get(url);
        this.rows = response.data.data;
        //console.log(this.rows);
      } catch (error) {
        console.log(error);
      }
    },
    async getRowById() {
      try {
        const url = `${BASE_URL}/halkartyaById/${this.selectedRowId}`;
        const response = await axios.get(url);
        this.row = response.data.data[0];
        //console.log(this.rows);
      } catch (error) {
        console.log(error);
      }
    },
    onClickDetailsButton(id){
        this.selectedRowId = id;
        this.getRowById();
    },
    info(data) {
      return data ? data : "-";
    },
  },
};
</script>

<style>
</style>