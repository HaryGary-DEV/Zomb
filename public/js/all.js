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

function saveEdit (id) {
    const name = document.getElementById('name').value
    const phone = document.getElementById('phone').value
    const address = document.getElementById('address').value
    const email = document.getElementById('email').value
    const date = document.getElementById('date').value
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
    }).fail( function () {
        alert('internet error');
    })
}
