<template>
    <div>
        <h3 class="text-center">Edit Page</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updatePage">
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
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            page: {},
            pages:[],
        }
    },
    created() {
        this.axios
            .get(`http://cms-app.test/api/pages/${this.$route.params.id}`)
            .then((res) => {
                this.page = res.data;
            });
        this.allPages();
    },
    methods: {
        updatePage() {
            this.axios
                .patch(`http://cms-app.test/api/pages/${this.$route.params.id}`, this.page)
                .then((res) => {
                    this.$router.push({ name: 'home' });
                });
        },
        allPages() {
            this.axios
                .get('http://cms-app.test/api/pages/')
                .then(response => {
                    this.pages = response.data.pages;
                });
        }
    }
}
</script>
