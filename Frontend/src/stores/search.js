import { defineStore } from "pinia";

export const useCounterStore = defineStore("search", {
  //Ezek a változók
  state: () => ({
    searchWord: null,
  }),
  //valamilyen formában visszaadja
  getters: {
    //vezető nullás formátumban adja vissza
    paddedCount: (state) => {
      return state.counter.toString().padStart(state.desiredLength, "0");
    },
  },
  //A state-ben tárolt értékek manipulálása
  actions: {
    
    //setter
    setSearchWord(searchWord){
      this.searchWord = searchWord;
    }
  },
});
