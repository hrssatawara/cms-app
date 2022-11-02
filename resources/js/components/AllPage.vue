<template>
    <div>
        <h2 class="text-center">Pages List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>Sr. No.</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(page, index) in pages" :key="page.id">
                <td>{{ index+1 }}</td>
                <td>{{ page.title }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: page.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deletePage(page.id)">Delete</button>
                        <router-link :to="{name: 'show', params: { id: page.id }}" class="btn btn-primary">View</router-link>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import _ from "lodash";

export default {
    data() {
        return {
            pages: []
        }
    },
    created() {
        this.axios
            .get('http://cms-app.test/api/pages/')
            .then(response => {
                this.pages = response.data.pages;
            });
    },
    methods: {
        deletePage(id) {
            this.$swal({
                title: '<h1 style="font-weight: 300">Are you sure you want to delete this page?</h1>',
                html: `<div></div>`,
                width: 750,
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: true,
                confirmButtonText: 'Yes, delete it.'
            }).then(result => {
                if (result.value) {
                    this.axios
                        .delete(`http://cms-app.test/api/pages/${id}`)
                        .then(response => {
                            let i = this.pages.map(data => data.id).indexOf(id);
                            this.pages.splice(i, 1)
                        });
                }
            });


        }
    }
}
</script>
