<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 text-end">
        <a href="/create" class="btn btn-success">Add</a>
      </div>
      <div class="col-12">
        <!-- Card body  -->
        <div class="table table-hover">
          <table class="table">
            <!-- Table head -->
            <thead class="table">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Delete</th>
                <th scope="col">Update</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in jewelry" :key="item.id">
                <td>{{ item.id }}</td>
                <td width="150px">
                  <img :src="item.image" width="100%" />
                </td>
                <td>{{ item.name }}</td>
                <td>{{ item.price }} $</td>
                <td width="500px">{{ item.description }}</td>
                <td>
                  <button class="btn btn-danger mt-2" @click="destroy(item.id)">
                    Delete
                  </button>
                </td>
                <td>
                  <button
                    type="button"
                    @click="updateModal(item.id)"
                    class="btn btn-primary mt-2"
                    data-bs-toggle="modal"
                    data-bs-target="#updateModal"
                  >
                    Update
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div
      class="modal fade"
      id="updateModal"
      tabindex="-1"
      aria-labelledby="modal-header"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modal-header">Update Item</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <!-- update item -->
          <div class="modal-body">
            <form @submit.stop.prevent="updateProduct()">
              <label for="id">id</label>
              <input
                type="text"
                id="id"
                v-model="id"
                class="form-control"
                readonly
              />
              <label for="name">jewelry Name</label>
              <input
                type="text"
                id="name"
                v-model="name"
                class="form-control"
                required
              />
              <label for="image">Image</label>
              <input
                type="text"
                id="image"
                v-model="image"
                class="form-control"
                required
              />
              <label for="price">price</label>
              <input
                type="number"
                id="price"
                v-model="price"
                class="form-control"
                required
              />
              <label for="description">description</label>
              <textarea
                id="description"
                v-model="description"
                rows="3"
                class="form-control"
                required
              />
              <div class="mt-3 text-end">
                <button type="reset" class="btn btn-danger mr-2">Cancel</button>
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      jewelry: [],
      id: "",
      name: "",
      image: "",
      price: "",
      description: "",
    };
  },

  mounted() {
    axios
      .get("/api/product")
      .then((data) => {
        this.jewelry = data.data;
      })
      .catch((err) => console.log(err));
  },
  methods: {
    updateModal(id) {
      axios.get(`/api/product/show/${id}`).then((data) => {
        this.id = data.data.id, 
        this.name = data.data.name;
        this.image = data.data.image;
        this.price = data.data.price;
        this.description = data.data.description;
      });
    },
    updateProduct() {
      axios
        .post(`/api/product/update/${this.id}`, {
          name: this.name,
          image: this.image,
          price: this.price,
          description: this.description,
        })
        .then(() => {
          alert("Update item success.");
          window.location.reload();
        })
        .catch((err) => alert(err));
    },

    destroy(id) {
      const isComfirm = confirm("Are you sure to delete this item?");
      if (isComfirm == true) {
        axios
          .delete(`/api/product/del/${id}`)
          .then(() => {
            alert("Delete item success.");
            window.location.reload();
          })
          .catch((err) => alert(err));
      }
    },
  },
};
</script>