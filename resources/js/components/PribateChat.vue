<template>
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <textarea class="form-control form-input-custom global-chat" rows="10" readonly="">{{messages.join('\n')}}</textarea>
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
    data () {
        return {
            messages: [],
            textMessage: '',
        }
    },
    mounted () {

        window.Echo.private('room.2')
            .listen('PrivateChat', ({ data }) => {
                this.messages.push(data['body'])
            })

    },
    methods: {

        sendMessage (userName) {
            axios.post('/messages', { body: (userName + ': ' + this.textMessage), room_id: 2 })
            this.textMessage = ''
        },
        getCurrentUser () {
            return document.getElementById('navbarDropdown').innerText
        }
    }
}
</script>
