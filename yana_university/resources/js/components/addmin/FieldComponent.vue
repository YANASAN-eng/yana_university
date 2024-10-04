<template>
    <div class="content">
        <div class="search-wrapper">
            <table>
                <tbody>
                    <tr>
                        <td><label for="keywords">検索対象</label></td>
                        <td><input id="keywords" type="text" v-model="keywords" @input="fetchFields()" placeholder="分野名を入力してね！"></td>
                    </tr>
                    <tr>
                        <td><label for="lecture-id">講義を選択してね</label></td>
                        <td>
                            <select id="lecture-id" name="lecture_id" v-model="lecture_id">
                                <option value="" selected></option>
                                <option v-for="lecture in lectures" :key="lecture.id" :value="lecture.id" v-text="lecture.name"></option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <br>
        </div>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>講義分類</th>
                        <th>分野名</th>
                        <th>url</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="field in filterFields" :key="field.id">
                        <td v-text="field.id"></td>
                        <td v-text="field.lecture_id"></td>
                        <td v-text="field.name"></td>
                        <td v-text="field.url"></td>
                        <td>
                            <form :action="`/addmin/edit/field/${field.id}`" method="GET">
                                <input type="submit" value="編集">
                            </form>
                        </td>
                        <td>
                            <form :action="`/addmin/delete/field/${field.id}`" method="POST">
                                <input type="hidden" name="_token" :value="csrfToken">
                                <input onclick="return confirm('本当にこの分野を削除しますか？')" type="submit" value="削除">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="button-wrapper">
            <button @click="fetchFields(fields.prev_page_url)" :disabled="!fields.prev_page_url">戻る：&laquo</button>
            <span v-text="fields.current_page" style="font-weight: bold; color: white;"></span>
            <button @click="fetchFields(fields.next_page_url)" :disabled="!fields.next_page_url">次へ：&raquo</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: '',
            lecture_id: '',
            lectures:'',
            fields: {
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
        filterFields() {
            if (this.lecture_id) {
                return this.fields.data.filter(field => {
                    return field.name.includes(this.keywords) && field.lecture_id == this.lecture_id;
                })
            } else {
                return this.fields.data.filter(field => {
                    return field.name.includes(this.keywords);
                })
            }

        },
    },
    methods: {
        fetchFields(url = 'http://localhost:8888/ajax/field') {
            axios.post(url, {    
                keywords: this.keywords, 
                addmin: this.addmin
            }
            ).then((response) => {
                this.fields = response.data;
            }).catch((error) => {
                console.error('通信に失敗したよ',error.response ? error.response.data : error.message);
            })
        },
        getLectures() {
            let temp = JSON.parse(document.getElementById('lectures').value);
            this.lectures = temp.map(item => ({id: item.id, name: item.name}));
        }
    },
    mounted() {
        this.fetchFields();
        this.getLectures();
    },
    beforeDestroy() {
        if (this.interval) {
            clearInterval(this.interval);
        }
    }
}
</script>