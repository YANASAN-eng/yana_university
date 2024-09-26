<template>
    <div class="chat-wrapper">
        <div class="client-wrapper">
            <div ref="clientLog" class="client-log">
                <div v-for="(request, index) in requests" :key="index" class="client-comment">
                    <img :src="`/storage/profiles/${profile_image}`">
                    <p v-text="request"></p>
                </div>
            </div>
            <div class="button-wrapper">
                <button class="comment-button" @click="chatGpt()">コメントする</button>
                <textarea id="comment" name="comment" v-model="comment"></textarea>
            </div>
        </div>
        <div class="response-log-wrapper">
            <div ref="responseLog" class="response-log">
                <div v-for="(response, index) in responses" :key="index" class="ai-comment">
                    <img src="/storage/aiprofiles/profile.JPG">
                    <p v-text="response"></p>
                </div>
            </div>
        </div>
    </div>
    <!-- キャラクター画像　-->
    <div v-if="isModalOpen" class="modal" @mousedown="startDrag" @mouseup="stopDrag">
        <div class="modal-content" :style="{top: modalTop + 'px', left: modalLeft + 'px'}" @mousedown.stop @mousemove="startDrag">
            <div class="modal-header" @mousedown="initDrag">
                <span class="close" @click="closeModal">&times;</span>
                <h3>豊田　華</h3>
            </div>
            <video src="storage/aiprofiles/はなちゃん.mp4" loop autoplay muted></video>
            <div class="options">
                <textarea v-model="modalComment" id="modalComment" name="modalComment" placeholder="コメントを入力"></textarea>
                <button @click="submitComment">コメントする</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    el: 'app',
    data() {
        return {
            comment: '',
            modalComment: '',
            requests: [],
            responses: [],
            profile_image: '',
            speaker: 46,
            audio_query: '',
            audio_temp_path: '../../audio',
            isModalOpen: true,
            modalTop: 100,
            modalLeft: 100,
            isDragging: false,
            dragOffset: {x: 0, y: 0}
        };
    },
    methods: {
        chatGpt: function() {
            axios.post('/chatgpt', {
                text: this.comment,
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }).then((response) => {
                this.clientLog(this.comment)
                this.chatGptLog(response.data.choices[0].message.content) 
                this.getQueryVoiceVox(response.data.choices[0].message.content)
                this.comment = '';
            }).catch((error) => {
                console.log(error)
            })
        },
        clientLog: function(text) {
            this.requests.push(text)
        },
        chatGptLog: function(text) {
            this.responses.push(text);
        },
        getProfileImage: function() {
            axios.post('/ajax/profile')
            .then((response) => {
                this.profile_image = response.data.profileImageUrl
            }).catch((error) => {
                console.log(error)
            })
        },
        getQueryVoiceVox: function(text) {
            axios.post('http://localhost:8900/convert',
            {
                text: text,
                speaker: this.speaker
            },
            {
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')

                }
            }
            ).then((response) => {
                this.audio_query = response.data.query
                this.playQuery()
            }).catch((error) => {
                console.error(error)
            })
        },
        playQuery: function() {
            axios.post(`http://localhost:50021/synthesis?speaker=${this.speaker}`,
                JSON.stringify(this.audio_query),
                {
                    responseType: 'arraybuffer',
                    headers: {
                        "accept": "audio/wav",
                        "Content-Type": "application/json"
                    },
                }
            ).then((response) => {
                const blob = new Blob([response.data], { type: 'audio/wav' })
                const url = URL.createObjectURL(blob)
                const audio = new Audio(url)
                audio.play()
            }).catch((error) => {
                console.error(error)
            })
        },
        openModal() {
            this.isModalOpen = true;
        },
        closeModal() {
            this.isModalOpen = false;
            this.modalComment = ''; // モーダルを閉じたらコメントをリセット
        },
        submitComment: function() {
            this.comment = this.modalComment
            this.modalComment = ''
            this.chatGpt()
        },
        initDrag: function(event){
            this.isDragging = true;
            this.dragOffset.x = event.clientX - this.modalLeft;
            this.dragOffset.y = event.clientY - this.modalTop;
        },
        startDrag: function(event){
            if (this.isDragging) {
                console.log(this.isDragging)
                this.modalLeft = event.clientX - this.dragOffset.x;
                this.modalTop = event.clientY - this.dragOffset.y;
            }
        },
        stopDrag: function(){
            this.isDragging = false
        }
    },
    mounted() {
        this.getProfileImage()
    },
}
</script>
<style>
.modal {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    height: 100%;
    width:100%;
    pointer-events: none;
    z-index: 1000;
}
.modal-content {
    background-color: white;
    padding: 0;
    border-radius: 5px;
    position: absolute; /* 位置を絶対に設定 */
    pointer-events: auto;
    border-radius: 10px;
    resize: both;
    overflow: auto;
    display: flex;
    flex-direction: column;
}

.modal-header {
    display: flex;
    justify-content: space-around;
    cursor: move; /* ドラッグカーソル */
    align-items: center;
    background-color: rgba(0, 0, 0, 1);
    color: whitesmoke;
}
.close {
    color: white;
    height: 100%;
    font-size: 30px;
    display: inline-block;
}
.modal-content video {
    width: 100%;
    height: auto;
    max-width: 100%;
    max-height: 100%;
    paddig: 0;
    display: block;
}
.options {
    width: 100%;
    display: flex;
    justify-content: space-between;
    padding: 0;
}
.options textarea {
    width:80%;
    resize: none;
}
.options button {
    width: 20%;
    background-color: gray;
    color: whitesmoke;
}
.options button:hover {
    cursor: pointer;
    background-color: black;
}

</style>