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
</template>

<script>
export default {
    el: 'app',
    data() {
        return {
            comment: '',
            requests: [],
            responses: [],
            profile_image: '',
            speaker: 46,
            audio_query: '',
            audio_temp_path: '../../audio'
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
    },
    mounted() {
        this.getProfileImage()
    },
}
</script>