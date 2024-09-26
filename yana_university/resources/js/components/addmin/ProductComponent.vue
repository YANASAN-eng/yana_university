<template>
    <div class="content">
        <div class="search-wrapper">
            <label for="keywords">検索対象</label>
            <input id="keywords" type="text" v-model="keywords" @input="fetchProducts()" placeholder="商品名を入力してね！">
        </div>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>商品名</th>
                        <th>値段</th>
                        <th>画像</th>
                        <th>編集</th>
                        <th>削除</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in filterProducts" :key="product.id">
                        <td v-text="product.id"></td>
                        <td v-text="product.name"></td>
                        <td v-text="product.price"></td>
                        <td>
                            <img :src="getProductImageUrl(product.product_image)" weidth="100" height="100">
                        </td>
                        <td>
                            <a :href="`/addmin/edit/product/${product.id}`">編集</a>
                        </td>
                        <td>
                            <form :action="`/addmin/delete/product/${product.id}`" method="POST">
                                <input type="hidden" name="_token" :value="csrfToken">
                                <input onclick="return confirm('本当にこの商品を削除しますか？')" type="submit" value="削除">
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="button-wrapper">
            <button @click="fetchProducts(products.prev_page_url)" :disabled="!products.prev_page_url">戻る：&laquo</button>
            <span v-text="products.current_page" style="font-weight: bold; color: white;"></span>
            <button @click="fetchProducts(products.next_page_url)" :disabled="!products.next_page_url">次へ：&raquo</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: '',
            products: {
                data: [],
                current_page: 1,
                next_page_url: null,
                prev_page_url: null
            },
            csrfToken: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        };
    },
    computed: {
        filterProducts() {
            console.log(this.products.data);
            return this.products.data.filter(product => {
                return product.name.includes(this.keywords);
            })
        },
    },
    methods: {
        getProductImageUrl(image){
            if (image) {
                return `/storage/products/${image}`;
            } else {
                return '/storage/products/default.JPG';
            }
        },
        fetchProducts(url = '/ajax/product') {
            axios.post(url, {
                params: {
                    keywords: this.keywords,
                }
            }).then((response) => {
                this.products = response.data;
            }).catch((error) => {
                console.error('通信に失敗したよ',error.response ? error.response.data : error.message);
            })
        },
    },
    mounted() {
        this.fetchProducts();
    },
    beforeDestroy() {
        if (this.interval) {
            clearInterval(this.interval);
        }
    }
}
</script>