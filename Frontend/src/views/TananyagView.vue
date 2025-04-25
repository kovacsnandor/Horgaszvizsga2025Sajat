<template>
  <div>
    <h1 class="my-3">Horgászvizsga tananyag</h1>

    <div class="accordion accordion-flush p-3" id="accordionFlushExample">
      <div
        class="accordion-item"
        v-for="(row, index) in rowsSzurt"
        :key="row.id"
      >
        <h2 class="accordion-header">
          <button
            class="accordion-button collapsed"
            type="button"
            data-bs-toggle="collapse"
            :data-bs-target="`#flush-collapse${index}`"
            aria-expanded="false"
            :aria-controls="`flush-collapse${index}`"
          >
            <h2 v-html="keresJelol(row.FejezetCim)"></h2>
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
            <img
              class="rounded float-start col-12 col-sm-6 me-sm-3 mb-3 mb-sm-0"
              :src="`images/${row.KepFile}`"
              :alt="row.FejezetCim"
              v-if="row.KepFile"
            />

            <!-- Tartalom -->
            <div v-html="keresJelol(row.SzovegHtml)"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { BASE_URL } from "@/helpers/baseUrl";
import { searchStore } from "@/stores/searchStore";
import axios from "axios";
export default {
  data() {
    return {
      rows: [],
      searchStore: searchStore(),
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
        //console.log(this.rows);
      } catch (error) {
        console.log(error);
      }
    },
    info(data) {
      return data ? data : "-";
    },

    keresJelol(text) {
      const htmlTags = ['p', 'strong', 'ul', 'li']
      if (this.searchStore.searchWord && !htmlTags.includes(this.searchStore.searchWord)) {
        let what = new RegExp(this.searchStore.searchWord, "gi");
        if (text != null) {
          text = text.replace(what, (match) => {
            return `<span class="my-mark">${match}</span>`;
          });
        }
        return text;
      } else {
        return text;
      }
    },
  },
  computed: {
    rowsSzurt() {
      if (this.searchStore.searchWord) {
        return this.rows.filter(
          (a) =>
            a.FejezetCim.includes(this.searchStore.searchWord) ||
            a.SzovegHtml.includes(this.searchStore.searchWord)
        );
      } else {
        return this.rows;
      }
    },
  },
};
</script>

<style>

</style>