<template>
    <div class="container">
        <div v-for="product in products">
            <div class="product-wrapper">
                <div class="product-img">
                    <img :src="product.product_image">
                </div>
                <div class="product-explain">
                    <span v-text="product.name" ></span>:<span v-text="product.price"></span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            keywords: '',
        }
    }
}
</script>