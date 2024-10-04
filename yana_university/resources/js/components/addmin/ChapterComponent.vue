<template>
    <div class="content">
        <div class="search-wrapper">
            <table>
                <tbody>
                    <tr>
                        <td><label for="keywords">検索対象</label></td>
                        <td><input id="keywords" type="text" v-model="keywords" @input="fetchChapters()" placeholder="分野名を入力してね！"></td>
                    </tr>
                    <tr>
                        <td><label for="filed-id">分野を選択するのだ</label></td>
                        <td>
                            <select name="field_id" v-model="field_id">
                                <option value=""></option>
                                <option v-for="field in fields" :key="field.id" :value="field.id" v-text="field.name"></option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>分野分類</th>
                        <th>章名</th>
                        <th>url</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="chapter in filterChapters" :key="chapter.id">
                        <td v-text="chapter.id"></td>
                        <td v-text="chapter.field_id"></td>
                        <td v-text="chapter.name"></td>
                        <td v-text="chapter.url"></td>
                        <td>
                            <form :action="`/addmin/edit/chapter/${chapter.id}`" method="GET">
                                <input type="submit" value="編集">
                            </form>
                        </td>
                        <td>
                            <form :action="`/addmin/delete/chapter/${chapter.id}`" method="POST">
                                <input type="hidden" name="_token" :value="csrfToken">
                                <input onclick="return confirm('本当にこの分野を削除しますか？')" type="submit" value="削除">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="button-wrapper">
            <button @click="fetchChapters(chapters.prev_page_url)" :disabled="!chapters.prev_page_url">戻る：&laquo</button>
            <span v-text="chapters.current_page" style="font-weight: bold; color: white;"></span>
            <button @click="fetchChapters(chapters.next_page_url)" :disabled="!chapters.next_page_url">次へ：&raquo</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: '',
            chapters: {
                data: [],
                current_page: 1,
                next_page_url: null,
                prev_page_url: null
            },
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            addmin: 1,
            field_id: '',
            fields:'',
        };
    },
    computed: {
        filterChapters() {
            if(this.field_id) {
                return this.chapters.data.filter(chapter => {
                    return chapter.name.includes(this.keywords) && chapter.field_id == this.field_id;
                })
            } else {
                return this.chapters.data.filter(chapter => {
                    return chapter.name.includes(this.keywords);
                })
            }
        },
    },
    methods: {
        fetchChapters(url = 'http://localhost:8888/ajax/chapter') {
            axios.post(url, 
            {
                keywords: this.keywords,
                addmin: this.addmin
            }
            ).then((response) => {
                console.log(response.data);
                this.chapters = response.data;
            }).catch((error) => {
                console.error('通信に失敗したよ',error.response ? error.response.data : error.message);
            })
        },
        getFields() {
            const temp = JSON.parse(document.getElementById('fields').value);
            this.fields = temp.map(item => ({id: item.id, name: item.name}));
            console.log(this.fields)
        },
    },
    mounted() {
        this.fetchChapters();
        this.getFields();
    },
    beforeDestroy() {
        if (this.interval) {
            clearInterval(this.interval);
        }
    }
}
</script>