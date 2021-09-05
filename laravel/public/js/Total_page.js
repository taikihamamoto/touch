// 全orderを表示
function viewTotal() {
    $.getJSON('/Ajax/Order', function(Orders) {
        var html = '<tr><th>商品名</th><th>個数</th><th>状況</th></tr>';
        var total_amount = 0;
        $.getJSON('/Ajax/Product', function(Products) {
            Orders.forEach(function(Order) {
                if (Order.table_number == 1) {
                    html += '<tr>';
                    Products.forEach(function(Product) {
                        if (Product.id == Order.product_id) {
                            html += '<td>' + Product.name + '</td>';
                            total_amount += Product.amount;
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
                    html += '</tr>';
                };
            });
            console.log(html);
            $('#total_amount').html(total_amount);
            $('#rarara').html(html);
            var outPut = document.getElementById('POST_total_amount');
            outPut.value = total_amount;
        });
    });
}
window.addEventListener('DOMContentLoaded', function() {
        viewTotal();
});
window.addEventListener('DOMContentLoaded', function() {
    setInterval(function() {
        viewTotal();
    }, 2000);
});

function Chk(){
    var flag = confirm("OKを押すとこの後注文ができなくなってしまいます。注文を確定しますか？")
    return flag;
}