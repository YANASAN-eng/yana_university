<template>
<div v-for="(wrapper, index) in wrappedLectures" :key="index" class="lecture-wrapper">
    <div class="lecture-item" v-for="(lecture, lectureIndex) in wrapper" :key="lecture.id">
        <div class="lecture" v-if="!lecture.isEmpty">
            <div class="lecture-image">
                <a href="">
                    <img :src="'storage/lectures/' + lecture.lecture_image">
                </a>
            </div>
            <div class="lecture-title">
                <span>
                    <a :href="'http://localhost:8888/lecture/' + lecture.url" v-text="lecture.name"></a>
                </span>
            </div>
        </div>
        <div class="lecture" v-else></div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            lectures: [], 
            itemsPerRow: 3,
        }
    },
    computed: {
        wrappedLectures() {
            this.displayLectures();
            const result = [];
            for (let i = 0; i < this.lectures.length; i += this.itemsPerRow) {
                result.push(this.lectures.slice(i, i + this.itemsPerRow));
            }
            return result;
        }
    },
    methods: {
        lecturesGet: function() {
            axios.post("http://localhost:8888/ajax/lecture",
            {
                'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            })
            .then((response) => {
                this.lectures = response.data;
            })
            .catch((err) => {
                console.log(err);
            });
        },
        updateItemsPerRow() {
        if (window.innerWidth >= 1280) {
                this.itemsPerRow = 5; // 1280px以上なら5個
            } else {
                this.itemsPerRow = 3; // それ以外は3個
            }
        },
        displayLectures() {
            const lecturesCopy = [...this.lectures];
            const reminder = lecturesCopy.length % this.itemsPerRow;
            if (reminder !== 0) {
                const emptyItems = this.itemsPerRow - reminder;
                for (let i = 0; i < emptyItems; i++) {
                    lecturesCopy.push({ isEmpty: true })
                }
            }
            this.lectures = lecturesCopy;
        }
    },
    mounted() {
        this.lecturesGet();
        this.updateItemsPerRow();
        window.addEventListener('resize', this.updateItemsPerRow);
    },
    beforeDestroy() {
        window.removeEventListener('resize', this.updateItemsPerRow);
    },
}
</script>