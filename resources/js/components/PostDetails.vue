<template>
    <div class="container">
        <div class="title">
            <img
                :src="`../storage/images/${post.user.image !== null ? post.user.image.image_src : 'user.png'}`"
                alt="profile-pic"
            />
            <h1>{{ post.title }}</h1>
        </div>
        <p class="post-body">
            {{ post.description }}
        </p>
        <p class="post-footer">
            Written by <span>{{ post.user.name }}</span>
        </p>
    </div>
</template>

<script>
export default {
    name: "PostDetails",
    data() {
        return {
            post: {}
        };
    },

    created() {
        this.getPost();
    },

    methods: {
        async getPost() {
            const response = await fetch(
                `http://localhost:8000/api/posts/${this.$route.params.id}`
            );
            const result = await response.json();
            this.post = result.post;
        }
    }
};
</script>

<style scoped>
.container {
    width: 100%;
    display: flex;
    flex-flow: column;
    color: #ccc
}

p {
    word-break: break-all;
    white-space: normal;
}

.title {
    display: flex;
}

.title > img {
    margin-right: 15px;
}

.title > h1 {
    text-transform: capitalize;
}

.post-body {
    margin-top: 30px;
    padding: 10px;
}

.post-footer {
    align-self: flex-end;
    margin-top: 50px;
}

.post-footer span {
    text-transform: capitalize;
    color: #fff;
    font-size: 1.1em;
}
</style>
