<template>
    <div class="content">
        <label for="filter">検索対象を絞る</label>
        <input id="filter" type="text" v-model="keywords" @input="fetchUsers()">
        <div v-if="isLoading">ローディング中...</div>
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
                <tr v-for="user in filteredUsers" :key = "user.id">
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
                            <input onclick="return confirm('本当にこのユーザーを削除しますか？')" type="submit" value="削除">
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="button-wrapper" v-if="!isLoading">
            <button @click="fetchUsers(users.prev_page_url)" :disabled="!users.prev_page_url">戻る：&laquo</button>
            <span v-text="users.current_page" style="font-weight: bold; color: white;"></span>
            <button @click="fetchUsers(users.next_page_url)" :disabled="!users.next_page_url">次へ：&raquo</button>
        </div>
    </div>
</template>
<script>
import debounce from 'lodash/debounce';
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
                filteredUsers: [],
                interval: null,
                csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                isLoading: false,
                debouncedFetchUsers: null
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
            fetchUsers(url = 'http://localhost:8888/ajax/users') {
                this.isLoading = true;
                axios.post(url, {
                    keywords: this.keywords
                }).then((response) => {
                    this.users = response.data;
                    this.filteredUsers = this.filterUsers;
                }).catch((error) => {
                    console.error('通信に失敗したよ',error.response ? error.response.data : error.message);
                }).finally(() => {
                    this.isLoading = false;
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