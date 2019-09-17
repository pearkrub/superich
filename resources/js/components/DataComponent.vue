<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Grand Superich</div>

          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th>ประเทศ/Country</th>
                  <th>สกุลเงิน/Curency</th>
                  <th>ราคาซื้อ/Buying</th>
                  <th>ราคาขาย/Selling</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(item, index) in superdatas" :key="index">
                  <td>{{ item.name }}</td>
                  <td>{{ item.currency }}</td>
                  <td>{{ item.buy }}</td>
                  <td>{{ item.sale }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import get from "lodash/get";
export default {
  name: "DataComponent",
  data() {
    return {
      superdatas: []
    };
  },
  methods: {
    async getData() {
      try {
        const response = await axios.get("/data");
        this.superdatas = get(response, "data", []);
      } catch (error) {}
    }
  },
  mounted() {
    this.getData();
  }
};
</script>
