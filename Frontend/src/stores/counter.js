import { defineStore } from "pinia";

export const useCounterStore = defineStore("counter", {
  //Ezek a változók
  state: () => ({
    counter: 0,
    desiredLength: 3,
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
    doubleCount() {
      this.counter * 2;
    },
    increment() {
      this.counter++;
    },
    //setter
    setCounter(counter){
      this.counter = this.counter;
    }
  },
});
