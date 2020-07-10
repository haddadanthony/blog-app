<template>
    <div class="wrapper">
        <div class="card" v-for="post in posts" v-bind:key="post.id">
            <div class="header">
                <div class="left">
                    <img
                        :src="`/storage/images/${post.user.image !== null ? post.user.image.image_src : 'user.png'}`"
                        alt="profile-pic"
                    />
                    <h2>{{ post.title }}</h2>
                </div>
                <router-link tag="a" :to="`/details/${post.id}`"
                    >View More</router-link
                >
            </div>
            <p>
                {{
                    post.description.length < 100
                        ? post.description
                        : `${post.description.substring(0, 100)}...`
                }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    name: "Posts",
    data() {
        return {
            posts: []
        };
    },

    created() {
        this.getPosts();
    },

    methods: {
        async getPosts() {
            const response = await fetch("api/posts");
            const result = await response.json();
            this.posts = result.posts;
        }
    }
};
</script>

<style lang="css">
img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
}

.header h2 {
    display: inline-block;
    position: relative;
    bottom: 25%;
    margin-left: 10px;
    color: #fff;
    text-transform: capitalize;
}

.wrapper {
    display: flex;
    flex-flow: column;
}

.header {
    display: flex;
    justify-content: space-between;
    background: #61892f;
    padding: 5px;
}

.header a {
    text-decoration: none;
    color: #fff;
    align-self: center;
    margin-right: 10px;
    font-size: 1.2em;
}

.card {
    margin-bottom: 40px;
    transition: 0.1s all linear;
    box-shadow: 0 6px 6px rgba(0,0,0,0.2);
}

.card:hover {
    transform: scale(1.01);
    transition: 0.1s all linear;
    box-shadow: 0 6px 6px rgba(255,255,255, 0.1);
}

.card > p {
    background: #fff;
    color: #4a4a4a;
    padding: 15px;
    font-size: 1.1em;
}

p {
    word-break: break-all;
    white-space: normal;
}

</style>
