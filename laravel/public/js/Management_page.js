// 全orderを表示
function viewOrder() {
    $.getJSON('/Ajax/Order', function(Orders) {
        var html = '<tr><th>テーブル</th><th>商品名</th><th>個数</th><th>状況</th><th>次ステップ</th></tr>';
        var order_len = 0;
        $.getJSON('/Ajax/Product', function(Products) {
            Orders.forEach(function(Order) {
                if (Order.status == 1 || Order.status == 2) {
                    order_len++;
                    html += '<tr>';
                    html += '<td>' + Order.table_number + '</td>';
                    Products.forEach(function(Product) {
                        if (Product.id == Order.product_id) {
                            html += '<td>' + Product.name + '</td>';
                        };
                    });
                    html += '<td>' + Order.count + '</td>';
                    html += '<td>';
                    if (Order.status == 1) {
                        html += '<p style = "font-size: 20px;color: red;"> 調理中 </p>';
                    };
                    if (Order.status == 2) {
                        html += '<p style = "font-size: 20px;color: green;"> 配達中 </p>';
                    };
                    if (Order.status == 3) {
                        html += '<p style = "font-size: 20px;color: blue;"> 完了済み </p>';
                    };
                    html += '</td>';
                    html += '<td id="statusForm">';
                    if (Order.status == 1) {
                        html += '<button onclick="change_made(' + Order.id + ')">調理完了</button>';
                    };
                    if (Order.status == 2) {
                        html += '<button onclick="change_send(' + Order.id + ')">配達完了</button>';
                    };
                    html += '</td>';
                    html += '</tr>';
                };
            });
            console.log(html);
            $('#rarara').html(html);
            var outPut = document.getElementById('order_count');
            outPut.value = order_len;
        });
    });
}
window.addEventListener('DOMContentLoaded', function() {
        viewOrder();
});
window.addEventListener('DOMContentLoaded', function() {
    setInterval(function() {
        viewOrder();
    }, 2000);
});

// status変更
function change_made(id) {
    var url = 'Ajax/Change_made';
    $.ajax({
        url: [url],
        type:'POST',
        data : {id : [id]},
        timeout:3000,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).done(function(data) {
        viewOrder();
        }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
            alert("error");
                console.log("XMLHttpRequest : " + XMLHttpRequest.status);
                console.log("textStatus     : " + textStatus);
                console.log("errorThrown    : " + errorThrown.message);
        })
    };
function change_send(id) {
    var url = 'Ajax/Change_send';
    $.ajax({
        url: [url],
        type:'POST',
        data : {id : [id]},
        timeout:3000,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).done(function(data) {
        viewOrder();
        }).fail(function(XMLHttpRequest, textStatus, errorThrown) {
            alert("error");
                console.log("XMLHttpRequest : " + XMLHttpRequest.status);
                console.log("textStatus     : " + textStatus);
                console.log("errorThrown    : " + errorThrown.message);
        })
    };
