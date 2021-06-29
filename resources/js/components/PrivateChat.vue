<template>
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <textarea class="form-control form-input-custom global-chat" id = "global-chat" rows="10" readonly="">{{messages.join('\n')}}</textarea>
                <hr>
                <div>
                    <input type="text" class="form-control form-input-custom chat-text-input" v-model="textMessage"
                           @keyup.enter="sendMessage(getCurrentUser())"
                           placeholder="Write some text here...">
                    <button class="btn btn-color button-send">Send</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['room'],
    data () {
        return {
            messages: [],
            textMessage: '',
        }
    },
    mounted () {
        console.log(this.room)
        window.Echo.private('room.' + this.room['id'])
            .listen('PrivateChat', ({ data }) => {
                this.messages.push(data['body'])
            })
    },
    methods: {

        sendMessage (userName) {
            if (this.textMessage.length >= 1)
                axios.post('/messages', {  body: (userName + ': ' + this.textMessage), room_id: this.room['id']})

            this.textMessage = ''
        },
        getCurrentUser () {
            return document.getElementById('navbarDropdown').innerText
        }
    }
}
</script>
