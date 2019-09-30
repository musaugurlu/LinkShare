<template>
  <div class="masonry-item col-md-12">
    <div class="bd bgc-white">
      <div class="layers">
        <div class="layer w-100">
          <div class="bgc-light-blue-500 c-white p-20">
            <div class="peers ai-c jc-sb gap-40">
              <div class="peer peer-greed">
                <h3>My Link Groups</h3>
              </div>
              <div class="peer">
                <button type="button" class="btn cur-p btn-light">New</button>
              </div>
            </div>
          </div>
          <div class="table-responsive p-20">
            <table class="table">
              <thead>
                <tr>
                  <th class=" bdwT-0">#</th>
                  <th class=" bdwT-0">Name</th>
                  <th class=" bdwT-0"># of Links</th>
                  <th class=" bdwT-0"><span @click="humanTime = ! humanTime">Created</span></th>
                  <th class=" bdwT-0"><span @click="humanTime = ! humanTime">Updated</span></th>
                  <th class=" bdwT-0">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(linkgroup, index) in linkGroups" :key="index">
                  <td>{{ index + 1 }}</td>
                  <td class="fw-600"><a :href="linkgroup.name">{{ linkgroup.name }}</a></td>
                  <td><span class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill">{{ linkgroup.links.length }}</span> </td>
                  <td>{{ linkgroup.created_at | humanDate(humanTime) }}</td>
                  <td><span class="text-success">{{ linkgroup.updated_at | humanDate(humanTime) }}</span></td>
                  <td>
                      <button type="button" class="btn btn-sm btn-outline-info"><i class="mC-10 ti-pencil"></i></button> 
                      <button type="button" class="btn btn-sm btn-outline-danger"><i class="mC-10 ti-trash"></i></button>
                  </td>
                </tr>   
              </tbody>
            </table>
           </div>
        </div>
      </div>
      <div class="ta-c bdT w-100 p-20">
      <a href="#" @click.prevent="fetchData()" v-if="synchTime">Updated at {{ synchTime | humanDate(true) }}</a>
      <a href="#" @click.prevent="fetchData()" v-else>Updated Failed. Click to update!</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
data() {
    return {
      'linkGroups': [],
      'humanTime' : true,
      'synchTime' : ""
    }
  },

  methods : {
    fetchData () {
      axios.post('/api/linkgroups')
            .then(response => {
              this.synchTime = Date.now();
              this.linkGroups = response.data;
            });
    },
  },

  computed: {
    
  },

  created () {
    this.fetchData();
  },
}
</script>

<style>

</style>