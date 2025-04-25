<template>
  <div>
    <h1>Halismeret gyakorló</h1>
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
            @click="onClickPicture(row)"
          />
          <div class="card-body" v-if="row.imageTitle">
            <h5 class="card-title">{{ row.FejezetCim }}</h5>
          </div>
          <div class="card-body" v-if="!row.imageTitle">
            <h5 class="card-title">?</h5>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
import { BASE_URL } from "@/helpers/baseUrl";
import axios from "axios";
export default {
  data() {
    return {
      rows: [],
    };
  },
  mounted() {
    this.getRows();
  },
  methods: {
    async getRows() {
      try {
        const url = `${BASE_URL}/halkartyakGyakorlo`;
        const response = await axios.get(url);
        this.rows = response.data.data;
        this.rows = this.rows.map(a => {
          a.imageTitle = false;
          return a;
        })

        console.log(this.rows);
      } catch (error) {
        console.log(error);
      }
    },
    onClickPicture(row){
      row.imageTitle = !row.imageTitle;
    }
  }
}
</script>

<style>

</style>