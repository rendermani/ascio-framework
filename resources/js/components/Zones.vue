<template>
  <div>
    <h2>Zones</h2>
    <form @submit.prevent="addZone" class="mb-3">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Zonename" v-model="zone.ZoneName">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" placeholder="User" v-model="zone.User">
      </div>
      <button type="submit" class="btn btn-light btn-block">Save</button>
    </form>
    <button @click="clearForm()" class="btn btn-danger btn-block">Cancel</button>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li v-bind:class="[{disabled: !pagination.prev_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchZones(pagination.prev_page_url)">Previous</a></li>

        <li class="page-item disabled"><a class="page-link text-dark" href="#">Page {{ pagination.current_page }} of {{ pagination.last_page }}</a></li>
    
        <li v-bind:class="[{disabled: !pagination.next_page_url}]" class="page-item"><a class="page-link" href="#" @click="fetchZones(pagination.next_page_url)">Next</a></li>
      </ul>
    </nav>
    <div class="card card-body mb-2" v-for="zone in zones" v-bind:key="zone.id">
      <h3>{{ zone.ZoneName }}</h3>
      <p>{{ zone.User }}</p>
      <hr>
      <button @click="editZone(zone)" class="btn btn-warning mb-2">Edit</button>
      <button @click="deleteZone(zone.id)" class="btn btn-danger">Delete</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      zones: [],
      zone: {
        ZoneName: '',
        User: ''
      },
      zone_id: '',
      pagination: {},
      edit: false
    };
  },

  created() {
    this.fetchZones();
  },

  methods: {
    fetchZones(page_url) {
      let vm = this;
      page_url = page_url || '/api/zones';
      fetch(page_url, {preserveState: true})
        .then(res => res.json())
        .then(res => {
          this.zones = res.data;
          vm.makePagination(res.meta, res.links);
        })
        .catch(err => console.log(err));
    },
    makePagination(meta, links) {
      let pagination = {
        current_page: meta.current_page,
        last_page: meta.last_page,
        next_page_url: links.next,
        prev_page_url: links.prev
      };

      this.pagination = pagination;
    },
    deleteZone(id) {
      if (confirm('Are You Sure?')) {
        fetch(`api/zones/${id}`, {
          method: 'delete'
        })
          .then(res => res.json())
          .then(data => {
            alert('Zone Removed');
            this.fetchZones();
          })
          .catch(err => console.log(err));
      }
    },
    addZone() {
      if (this.edit === false) {
        // Add
        fetch('api/zones', {
          method: 'post',
          body: JSON.stringify(this.zone),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('Zone Added');
            this.fetchZones();
          })
          .catch(err => console.log(err));
      } else {
        // Update
        fetch('api/zones', {
          method: 'put',
          body: JSON.stringify(this.zone),
          headers: {
            'content-type': 'application/json'
          }
        })
          .then(res => res.json())
          .then(data => {
            this.clearForm();
            alert('Zone Updated');
            this.fetchZones();
          })
          .catch(err => console.log(err));
      }
    },
    editZone(zone) {
      this.edit = true;
      this.zone.id = zone.id;
      this.zone.zone_id = zone.id;
      this.zone.ZoneName = zone.ZoneName;
      this.zone.User = zone.User;
    },
    clearForm() {
      this.edit = false;
      this.zone.id = null;
      this.zone.zone_id = null;
      this.zone.ZoneName = '';
      this.zone.User = '';
    }
  }
};
</script>
