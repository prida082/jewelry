<template>
  <div>
    <div class="container">
      <h3>Create Product</h3>
      <form @submit.stop.prevent="createProduct()">
        <div class="row">
          <div class="col-12 mt-3">
            <label>Name of product</label>
            <input
              type="text"
              v-model="name"
              class="form-control"
              placeholder="Name"
              required
            />
          </div>
          <div class="col-12 mt-3">
            <label>Image of product</label>
            <input
              type="text"
              v-model="image"
              class="form-control"
              placeholder="Image"
              required
            />
          </div>
          <div class="col-12 mt-3">
            <label>Price of product</label>
            <input
              type="number"
              v-model="price"
              class="form-control"
              placeholder="Price"
              required
            />
          </div>
          <div class="col-12 mt-3">
            <label>Description of product</label>
            <textarea
              type="text"
              v-model="description"
              class="form-control"
              placeholder="Description"
              required
            />
          </div>
          <div class="col-12 mt-3 text-end">
            <a href="/admin">Back to admin page</a>
          </div>
          <div class="col-12 my-5 d-grid gap-2">
            <input type="submit" class="btn btn-success" value="Save" />
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: null,
      image: null,
      price: null,
      description: null,
    };
  },
  methods: {
    createProduct() {
        axios
          .post("/api/product/store",{
            image: this.image,
            name: this.name,
            description: this.description,
            price: this.price,
          })
          .then(() => {
            alert("Add product success.");
          })
          .catch((err) => {
            console.log(err);
          });
    },
  },
};
</script>

<style>
</style>