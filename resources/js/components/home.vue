<template>
  <div class="container">
    <div class="row justify-content-center row-cols-2 row-cols-lg-5 g-2 g-lg-3">
      <div class="col-12" v-for="item in jewelry" :key="item.id">
        <form action="baskets" method="POST">
          <input type="hidden" name="_token" :value="csrf" />
          <input type="hidden" name="product_id" :value="item.id" />
          <div class="card-group">
            <div class="card">
              <img
                :src="item.image"
                class="card-img-top"
                style="height: 200px"
              />

              <div class="card-body">
                <h5 class="card-title text-truncate">{{ item.name }}</h5>
                <p class="card-text text-truncate">
                  {{ item.description }}
                </p>
                <p class="card-text">
                  <small class="text-muted">{{ item.price }} $</small>
                </p>
                <button class="btn btn-outline-secondary" :value="csrf">
                  Buy
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post-route"],
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      jewelry: [],
      Id: "",
      Name: "",
      Img: "",
      price: "",
      description: "",
    };
  },
  mounted() {
    axios
      .get(`/api/product`)
      .then((data) => {
        this.jewelry = data.data;
        console.log(data);
      })
      .catch((err) => console.log(err));
  },
  methods: {
    buyGame(id) {
      axios.get(`/api/product/show/${id}`).then((data) => {
        this.Id = data.data.id;
        this.Name = data.data.name;
        this.Img = data.data.image;
        this.price = data.data.price;
        this.description = data.data.description;
        console.log(data);
      });
    },
  },
};
</script>

<style>
</style>