<template>
    <div>
        <div class="card border-primary mb-3 col-12" >
            <div class="card-header">{{ page.title }}</div>
            <div class="card-body text-primary">
                <h5 class="card-title">{{ page.title }}</h5>
                <p class="card-text">{{ page.content  }}</p>
            </div>
        </div>
        <div class="col-12">
            <router-link v-if="page.parent_id" :to="{name: 'show', params: { id: page.parent_id }}" class="btn btn-primary float-right">View</router-link>
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
