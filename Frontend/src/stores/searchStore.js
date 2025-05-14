import { defineStore } from "pinia";

export const searchStore = defineStore("search", {
  //Ezek a változók
  state: () => ({
    searchWord: null,
  })
  
});
