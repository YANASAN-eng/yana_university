<template>
<div class="content">
        <div class="search-wrapper">
            <label for="keywords">検索対象</label>
            <input id="keywords" type="text" v-model="keywords" @input="fetchLectures()" placeholder="講義名を入力してね！">
        </div>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>講義名</th>
                        <th>url</th>
                        <th>画像</th>
                        <th>編集</th>
                        <th>削除</th>
                        <th>章管理画面</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="lecture in filterLectures" :key="lecture.id">
                        <td v-text="lecture.id"></td>
                        <td v-text="lecture.name"></td>
                        <td v-text="lecture.url"></td>
                        <td>
                            <img :src="getLectureImageUrl(lecture.lecture_image)" weidth="100" height="100">
                        </td>
                        <td>
                            <a :href="`/addmin/edit/lecture/${lecture.id}`">編集</a>
                        </td>
                        <td>
                            <form :action="`/addmin/delete/lecture/${lecture.id}`" method="POST">
                                <input type="hidden" name="_token" :value="csrfToken">
                                <input onclick="return confirm('本当にこの講義を削除しますか？')" type="submit" value="削除">
                            </form>
                        </td>
                        <td>
                            <a :href="'/addmin/field'">分野一覧</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="button-wrapper">
            <button @click="fetchLectures(lectures.prev_page_url)" :disabled="!lectures.prev_page_url">戻る：&laquo</button>
            <span v-text="lectures.current_page" style="font-weight: bold; color: white;"></span>
            <button @click="fetchLectures(lectures.next_page_url)" :disabled="!lectures.next_page_url">次へ：&raquo</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: '',
            lectures: {
                data: [],
                current_page: 1,
                next_page_url: null,
                prev_page_url: null
            },
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            addmin: 1,
        };
    },
    computed: {
        filterLectures() {
            return this.lectures.data.filter(lecture => {
                return lecture.name.includes(this.keywords);
            })
        },
    },
    methods: {
        getLectureImageUrl(image){
            if (image) {
                return `/storage/lectures/${image}`;
            } else {
                return '/storage/lectures/default.JPG';
            }
        },
        fetchLectures(url = '/ajax/lecture') {
            axios.post(url, {    
                keywords: this.keywords, 
                addmin: this.addmin
            }, 
            {
                header: {
                    'X-CSRF-TOKEN': this.csrfToken
                },
            }).then((response) => {
                this.lectures = response.data;
            }).catch((error) => {
                console.error('通信に失敗したよ',error.response ? error.response.data : error.message);
            })
        },
    },
    mounted() {
        this.fetchLectures();
    },
    beforeDestroy() {
        if (this.interval) {
            clearInterval(this.interval);
        }
    }
}
</script>