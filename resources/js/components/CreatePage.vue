<template>
    <div>
        <h3 class="text-center">Create Page</h3>
        <div class="row">
            <div class="col-md-6">
                <validation-errors :errors="errors" v-if="errors"></validation-errors>
                <form @submit.prevent="addPage">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" v-model="page.title">
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" class="form-control" v-model="page.slug">
                    </div>
                    <div class="form-group">
                        <label>Parent Page</label>
                        <select class="form-control" v-model="page.parent_id">
                            <option selected>Select Page</option>
                            <option v-for="page in pages" :value="page.id" >{{page.slug}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea type="text" class="form-control" v-model="page.content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import ValidationErrors from './ValidationErrors.vue';
export default {
    components:{
        ValidationErrors
    },
    data() {
        return {
            page: {},
            pages:[],
            errors:null,
        }
    },
    created() {
      this.allPages();
    },
    methods: {
        addPage() {
            this.axios
                .post('http://cms-app.test/api/pages/', this.page)
                .then(response => (
                    this.$router.push({ name: 'home' })
                ))
                .catch(err => {
                    if (err.response.status === 422){
                        this.errors = err.response.data.errors;
                    }
                })
                .finally(() => this.loading = false)
        },
        allPages() {
            this.axios
                .get('http://cms-app.test/api/pages/')
                .then(response => {
                    this.pages = response.data.pages;
                });
        }

    },
}
</script>
