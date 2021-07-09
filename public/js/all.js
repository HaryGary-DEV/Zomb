function settinds (id) {
    document.location.href = '/settings'
}

function goHome (id) {
    document.location.href = '/home'
}

function saveBonusInfo (id) {
    let info = document.getElementById('bonus-info').value
    console.log(info)
    $.ajax({
        url: '/save-bonus-info',
        type: 'get',
        dataType: 'json',
        data: {
            'info': info,
            'id': id,
        },
    })
}
let ip;

function getIP(json){
    ip =  json.ip;
    $.ajax({
        url: '/set-ip',
        type: 'get',
        dataType: 'json',
        data: {
            'ip': ip,
        },
    })
}
function saveEdit (id) {
    const name = document.getElementById('name').value
    const phone = document.getElementById('phone').value
    const address = document.getElementById('address').value
    const email = document.getElementById('email').value
    const date = document.getElementById('date').value
    const steam = document.getElementById('steam').value
    const telegram = document.getElementById('telegram').value
    $.ajax({
        url: '/save-info',
        type: 'get',
        dataType: 'json',
        data: {
            'name': name,
            'id': id,
            'phone': phone,
            'address': address,
            'email': email,
            'date': date,
            'ip': ip,
            'steam': steam,
            'telegram': telegram,
        },
    })
}

function orderUsers() {
    const orderIndex = document.getElementById('order-by');
    const orderSelect = orderIndex.options[orderIndex.selectedIndex].value;
    const typeIndex = document.getElementById('order-type');
    const typeSelect = typeIndex.options[typeIndex.selectedIndex].value;
    document.location.href = '/orderBy/' + orderSelect + '/' + typeSelect;
}

function changeUserStatus(id)
{
    const status = document.getElementById('user-status'+ id).value;
    if (status === 'live') {
        changeStatus(id ,'killed');
    } else {
        changeStatus(id, 'live');
    }
}

function goToChat(roomId)
{
    document.location.href = '/chat-list/' + roomId;
}

function startChat (userId, currentUserId)
{
    $.ajax({
        url: '/start-chat',
        type: 'get',
        dataType: 'json',
        data: {
            'userId': userId,
            'currentUserId': currentUserId,
        },
    }).done( function (users) {
        console.log(users['user1']);
        console.log(users['user2']);
    })
}

function changeStatus(id ,status)
{
    $.ajax({
        url: '/change-user-status',
        type: 'get',
        dataType: 'json',
        data: {
            'id': id,
            'status': status,
        },
    }).done( function (status) {
        if (status.message === 'live') {
            document.getElementById('user-status'+ id).innerHTML = '<i class="fas fa-heart"></i>';
            document.getElementById('user-status'+ id).value = 'live';
        } else {
            document.getElementById('user-status'+ id).innerHTML = '<i class="fas fa-skull"></i>';
            document.getElementById('user-status'+ id).value = 'killed';
        }
    })
}

function startToUserProfile (id) {
    document.location.href = "/user/" + id;
}

