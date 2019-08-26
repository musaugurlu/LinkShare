<template>
<div class="row gap-20 masonry pos-r">
  <div class="masonry-sizer col-md-6"></div>
  <div class="masonry-item col-md-6">
    <div class="bgc-white p-20 bd">
      <h6 class="c-grey-900">Page Settings</h6>
      <div class="mT-30">
        <form>
          <div class="checkbox checkbox-circle checkbox-info peers ai-c mB-15">
            <input type="checkbox" id="S1" name="S1" class="peer" v-model="S1" @click="setSetting"> 
            <label for="S1" class="peers peer-greed js-sb ai-c">
              <span class="peer peer-greed">Sidebar Open</span>
            </label>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> 
</template>

<script>
export default {
    mounted()
    {
        this.getSetting();
    },

    data() 
    {
        return {
            S1:0
        }
    },

    methods: 
    {
        getSetting() {
            axios.get('/api/settings').then(response => {
                this.S1 = response.data.S1;
                // this.msgSuccess("Settings Pulled!")
            });
        },

        setSetting() {
            axios.post('/api/settings').then(response => {
                console.log(response.data);
            });
        }
    }

}
</script>