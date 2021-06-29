<template>
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-sm-12">

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
