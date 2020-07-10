<template>
    <div id="app">
        <router-view></router-view>
    </div>
</template>

<script>
import Posts from "./Posts";
import PostDetails from "./PostDetails";

export default {
    name: "App",
    components: {
        Posts,
        PostDetails
    }
};
</script>

<style scoped>
#app {
    max-width: 1100px;
    margin: 0 auto;
    margin-top: 40px;
}

@media (max-width: 900px) {
    #app {
        padding: 20px;
    }

}
</style>
