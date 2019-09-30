<template>
  <div class="masonry-item col-md-12">
    <div class="bd bgc-white">
      <div class="layers">
        <div class="layer w-100">
          <div class="bgc-light-blue-500 c-white p-20">
            <div class="peers ai-c jc-sb gap-40">
              <div class="peer peer-greed">
                <h3>My Links</h3>
              </div>
              <div class="peer">
                <button
                  type="button"
                  class="btn cur-p btn-light"
                  data-toggle="modal"
                  data-target="#NewModel"
                >New</button>
                <div
                  class="modal fade"
                  id="NewModel"
                  tabindex="-1"
                  role="dialog"
                  aria-labelledby="NewModelLabel"
                  aria-hidden="true"
                  style="display: none;"
                >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="NewModelLabel">New URL</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <form @submit.prevent="submitNewForm">
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12 mb-12">
                              <label>URL</label>
                              <input
                                v-model="newUrl.url"
                                type="text"
                                class="form-control"
                                placeholder="http://www.example.com"
                                required
                              />
                            </div>
                          </div>
                          <br />
                          <div class="row">
                            <div class="col-md-12 mb-12">
                              <label>Link Group</label>
                              <select class="form-control" v-model="newUrl.linkgroup">
                                <option disabled selected value>-- Link Group --</option>
                                <option :value="lg.id" v-for="(lg, index) in linkGroups" :key="index">{{lg.name}}</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn" :class="{'btn-primary' : validateUrl}" :disabled="!validateUrl">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive p-20">
            <table class="table">
              <thead>
                <tr>
                  <th class="bdwT-0">#</th>
                  <th class="bdwT-0">URL</th>
                  <th class="bdwT-0"># of Linked Group</th>
                  <th class="bdwT-0">
                    <span @click="humanTime = ! humanTime">Created</span>
                  </th>
                  <th class="bdwT-0">
                    <span @click="humanTime = ! humanTime">Updated</span>
                  </th>
                  <th class="bdwT-0">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(link, index) in links" :key="index">
                  <td>{{ index + 1 }}</td>
                  <td class="fw-600">
                    <a :href="linkUrl(link.id)" :title="link.url">{{ shortenUrl(link.url) }}</a>
                  </td>
                  <td>
                    <span
                      class="badge bgc-red-50 c-red-700 p-10 lh-0 tt-c badge-pill"
                    >{{ link.link_groups.length }}</span>
                  </td>
                  <td>{{ link.created_at | humanDate(humanTime) }}</td>
                  <td>
                    <span class="text-success">{{ link.updated_at | humanDate(humanTime) }}</span>
                  </td>
                  <td>
                    <button type="button" class="btn btn-sm btn-outline-info" @click.prevent="goToUrl(link.url)">
                      <i class="mC-10 ti-eye"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-info">
                      <i class="mC-10 ti-pencil"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-danger">
                      <i class="mC-10 ti-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="ta-c bdT w-100 p-20">
        <a
          href="#"
          @click.prevent="fetchData()"
          v-if="synchTime"
        >Updated at {{ synchTime | humanDate(true) }}</a>
        <a href="#" @click.prevent="fetchData()" v-else>Updated Failed. Click to update!</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      linkGroups: [],
      links: [],
      humanTime: true,
      synchTime: "",
      newUrl: {
        url:'',
        linkgroup: ''
      }
    };
  },

  methods: {
    fetchData() {
      axios.post("/api/links")
        .then(response => {
          this.synchTime = Date.now();
          this.links = response.data;
        });

      axios.post('/api/linkgroups')
        .then(response => {
          this.synchTime = Date.now();
          this.linkGroups = response.data;
        });
    },

    shortenUrl(url) {
      if (url.length > 30) {
        return url.substring(0, 27) + "...";
      } else {
        return url;
      }
    },

    linkUrl(id) {
      return window.location.href + "/" + id;
    },

    goToUrl(url) {
      window.open(url,'_blank');
      return;
    },

    submitNewForm () {
      axios.post('/api/links/new', this.newUrl)
        .then(response => {
          console.log('success!');
          console.log(response.data);
        });
    }
  },

  computed: {
    validateUrl () {
      const isUrl = /(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/gi;
      
      return isUrl.exec(this.newUrl.url);
    }
  },

  created() {
    this.fetchData();
  }
};
</script>

<style>
.modal-body,
.modal-title {
  color: black;
}
</style>