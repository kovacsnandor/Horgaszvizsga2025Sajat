<template>
  <div>
    <nav class="navbar navbar-expand-md bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <router-link class="nav-link active" aria-current="page" to="/">Home</router-link>
            </li>

            <li class="nav-item">
              <router-link class="nav-link" to="/about">About</router-link>
            </li>

            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Horgászvizsga
              </a>
              <ul class="dropdown-menu">
                <li><router-link class="dropdown-item" to="/horgaszvizsgaTananyag">Horgászvizsga tananyag</router-link></li>
                <li><a class="dropdown-item" href="#">Halkártyák</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="#">Halismeret gyakorló</a>
                </li>
              </ul>
            </li>
          </ul>
          <div class="d-flex" role="search">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
              v-model="searchWord"
            />
            <button class="btn btn-outline-success" type="button" @click="onClickSearchButton()">
              Search
            </button>
          </div>
        </div>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  data(){
    return {
      searchWord: null
    }
  },
  onClickSearchButton(){
    
  }
};
</script>

<style>
</style>