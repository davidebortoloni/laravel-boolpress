<template>
    <div class="container">
        <header class="my-4">
            <h1 class="text-center">Benvenuti su Boolpress</h1>
        </header>
        <main>
            <h2>My Posts</h2>
            <div class="loader" v-if="isLoading">
                <div class="spinner-border text-light" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            <div v-else>
                <nav>
                    <ul class="pagination justify-content-end">
                        <li class="page-item" v-if="currentPage > 1">
                            <a class="page-link" @click="getPosts(currentPage - 1)">
                                <span>&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item" :class="{active: currentPage == n}" v-for="n in lastPage" :key="n">
                            <a class="page-link" @click="getPosts(n)">{{ n }}</a>
                        </li>
                        <li class="page-item" v-if="currentPage < lastPage">
                            <a class="page-link" @click="getPosts(currentPage + 1)">
                                <span>&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <div id="posts">
                    <div class="card my-3" v-for="post in posts" :key="post.id">
                        <div class="card-header">
                            <h5 class="card-title">{{ post.title }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ post.content }}</p>
                        </div>
                        <div class="card-footer text-right">
                            <time>Written on {{ getFormattedDate(post.created_at) }}</time>
                        </div>
                    </div>
                </div>
                <nav>
                    <ul class="pagination justify-content-end">
                        <li class="page-item" v-if="currentPage > 1">
                            <a class="page-link" @click="getPosts(currentPage - 1)">
                                <span>&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item" :class="{active: currentPage == n}" v-for="n in lastPage" :key="n">
                            <a class="page-link" @click="getPosts(n)">{{ n }}</a>
                        </li>
                        <li class="page-item" v-if="currentPage < lastPage">
                            <a class="page-link" @click="getPosts(currentPage + 1)">
                                <span>&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </main>
    </div>
</template>

<script>
    export default {
        name: 'App',
        data(){
            return {
                posts: [],
                currentPage: "",
                lastPage: "",
                isLoading: false,
            };
        },
        methods:{
            getPosts(page){
                this.isLoading = true;
                axios.get(`http://127.0.0.1:8000/api/posts?page=${page}`)
                .then((res)=>{
                    const {data, current_page, last_page} = res.data;
                    this.posts = data;
                    this.currentPage = current_page;
                    this.lastPage = last_page;
                })
                .catch((err)=>{
                    console.error(err);
                })
                .then((res)=>{
                    this.isLoading = false;
                });
            },
            getFormattedDate(date){
                const postDate = new Date(date);

                let day = postDate.getDate();
                let month = postDate.getMonth() + 1;
                const year = postDate.getFullYear();

                if(day < 10) day = '0' + day;
                if(month < 10) month = '0' + month;

                return `${day}/${month}/${year}`;
            },
        },
        created(){
            this.getPosts();
        },
    };
</script>

<style lang="scss" scoped>
.loader{
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1;
    .spinner-border {
        width: 100px;
        height: 100px;
    }
}
.page-item {
    cursor: pointer;
}
</style>