<template>
    <div class="content">
        <div class="search-wrapper">
            <table>
                <tbody>
                    <tr>
                        <td><label for="keywords">検索対象</label></td>
                        <td><input id="keywords" type="text" v-model="keywords" @input="fetchSections()" placeholder="分野名を入力してね！"></td>
                    </tr>
                    <tr>
                        <td><label for="chapter-id">講義を選択してね</label></td>
                        <td>
                            <select id="chapter-id" name="chapter_id" v-model="chapter_id">
                                <option value="" selected></option>
                                <option v-for="chapter in chapters" :key="chapter.id" :value="chapter.id" v-text="chapter.name"></option>
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
                    <tr v-for="section in filterSections" :key="section.id">
                        <td v-text="section.id"></td>
                        <td v-text="section.chapter_id"></td>
                        <td v-text="section.name"></td>
                        <td v-text="section.url"></td>
                        <td>
                            <form :action="`/addmin/edit/section/${section.id}`" method="GET">
                                <input type="submit" value="編集">
                            </form>
                        </td>
                        <td>
                            <form :action="`/addmin/delete/section/${section.id}`" method="POST">
                                <input type="hidden" name="_token" :value="csrfToken">
                                <input onclick="return confirm('本当にこの分野を削除しますか？')" type="submit" value="削除">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="button-wrapper">
            <button @click="fetchSections(sections.prev_page_url)" :disabled="!sections.prev_page_url">戻る：&laquo</button>
            <span v-text="sections.current_page" style="font-weight: bold; color: white;"></span>
            <button @click="fetchSections(sections.next_page_url)" :disabled="!sections.next_page_url">次へ：&raquo</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: '',
            chapter_id: '',
            chapters:'',
            sections: {
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
        filterSections() {
            if (this.chapter_id) {
                return this.sections.data.filter(section => {
                    return section.name.includes(this.keywords) && section.chapter_id == this.chapter_id;
                })
            } else {
                return this.sections.data.filter(section => {
                    return section.name.includes(this.keywords);
                })
            }

        },
    },
    methods: {
        fetchsections(url = 'http://localhost:8888/ajax/section') {
            axios.post(url, {    
                keywords: this.keywords, 
                addmin: this.addmin
            }
            ).then((response) => {
                this.sections = response.data;
            }).catch((error) => {
                console.error('通信に失敗したよ',error.response ? error.response.data : error.message);
            })
        },
        getchapters() {
            let temp = JSON.parse(document.getElementById('chapters').value);
            this.chapters = temp.map(item => ({id: item.id, name: item.name}));
        }
    },
    mounted() {
        this.fetchsections();
        this.getchapters();
    },
    beforeDestroy() {
        if (this.interval) {
            clearInterval(this.interval);
        }
    }
}
</script>