<template>
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <textarea class="form-control form-input-custom global-chat" id="private-chat" rows="10" readonly="">{{messages.join('\n')}}</textarea>
                <hr>
                <div>
                    <input type="text" class="form-control form-input-custom chat-text-input" v-model="textMessage"
                           @keyup.enter="sendMessage(getCurrentUser())"
                           placeholder="Write some text here...">
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
    created () {
        this.showChatHistory(this.room.id)
    },
    mounted () {
        window.Echo.private('room.' + this.room['id'])
            .listen('PrivateChat', ({ data }) => {
                this.messages.push(data['body'])
            })

        setTimeout(this.updateScroll, 400)
    },
    methods: {

        sendMessage (userName) {
            if (this.textMessage.length) {
                console.log(this.room['id'])
                axios.post('/messages', { body: (this.textMessage), room_id: this.room['id'] })
                this.messages.push(userName + ': ' + this.textMessage)
            }
            this.textMessage = ''
            this.updateScroll()
        },
        getCurrentUser () {
            return document.getElementById('navbarDropdown').innerText
        },
        showChatHistory () {
            axios.post('/allMessages', { room_id: this.room['id'] }
            ).then(data => {
                for (let i = 0; i < data.data.length; i++) {
                    this.messages.push(data.data[i]['user_name'] + ': ' + data.data[i]['messages'])
                }
            })
        },
        updateScroll (id = 'private-chat') {
            var div = document.getElementById(id)
            $('#' + id).animate({
                scrollTop: div.scrollHeight - div.clientHeight + 100
            }, 500)
        }
    }
}
</script>
