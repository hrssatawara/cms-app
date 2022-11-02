<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Page List</router-link>
                    <router-link to="/create" class="nav-item nav-link">Create Page</router-link>
                </div>
            </div>
        </nav>
        <router-view> </router-view>
<!--        <editor api-key='o6rf2s61ylwcapuq7bfj3b4ji6wpaj5w6kydb8zyei38954a' :init="{ /* your other settings */ }" />-->
    </div>
</template>

<script>
// import Editor from '@tinymce/tinymce-vue'
export default {
    name: 'app'
}
</script>
