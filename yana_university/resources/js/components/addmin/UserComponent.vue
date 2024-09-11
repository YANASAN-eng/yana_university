<template>
    <div class="content">
        <label for="filter">検索対象を絞る</label>
        <input id="filter" type="text" v-model="keywords" @input="fetchUsers()">
        <table class="table-primary"> 
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">名前</th>
                    <th scope="col">メールアドレス</th>
                    <th scope="col">アカウント画像</th>
                    <th scope="col">編集</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in filterUsers" :key = "user.id">
                    <th v-text="user.id" scope="row"></th>
                    <td v-text="user.name"></td>
                    <td v-text="user.email"></td>
                    <td>
                        <img :src="getProfileImageUrl(user.profile_image)" width="100" height="100">
                    </td>
                    <td>
                        <a :href="`/addmin/edit/user/${user.id}`">編集</a>
                    </td>
                    <td>
                        <form :action="`/addmin/delete/user/${user.id}`" method="POST">
                            <input type="hidden" name="_token" :value="csrfToken">
                            <input type="submit" value="削除">
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="button-wrapper">
            <button @click="fetchUsers(users.prev_page_url)" :disabled="!users.prev_page_url">戻る：&laquo</button>
            <span v-text="users.current_page" style="font-weight: bold; color: white;"></span>
            <button @click="fetchUsers(users.next_page_url)" :disabled="!users.next_page_url">次へ：&raquo</button>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                keywords: '',
                users: {
                    data: [],
                    current_page: 1,
                    next_page_url: null,
                    prev_page_url: null
                },
                interval: null,
                csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            };
        },
        computed: {
            filterUsers(){
                return this.users.data.filter(user => {
                    return user.name.includes(this.keywords);
                })
            },
        },
        methods: {
            getProfileImageUrl(image){
                if (image) {
                    return `/storage/profiles/${image}`;
                } else {
                    return '/storage/profiles/default.jpg';
                }
            },
            fetchUsers(url = '/ajax/users') {
                axios.post(url, {
                    params: {
                        keywords: this.keywords
                    }
                }).then((response) => {
                    this.users = response.data;
                }).catch((error) => {
                    console.error('通信に失敗したよ',error.response ? error.response.data : error.message);
                })
            },
        },
        mounted() {
            this.fetchUsers();
        },
        beforeDestroy() {
            if (this.interval) {
                clearInterval(this.interval);
            }
        }
    }
</script>