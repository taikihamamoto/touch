$(function () {
    $('.js-modal-open').each(function () {
        $(this).on('click', function () {
            var target = $(this).data('target');
            var modal = document.getElementById(target);
            $(modal).fadeIn();
            return false;
        });
    });
    $('.js-product-change').on('click', function () {
        var id = $(this).val();
        $('.modal_change_post').append('<h4>変更後の名前</h4><form id="change_form"><input type="hidden" value="' + id + '"><input type="text" value=""><input type="submit" value="送信"></form>');
        return false;
    });
    $('#change_form').on('click', function () {
        var id = $(this).val();
        $('.modal_change_post').append('<h4>変更後の名前</h4><form id="change_form"><input type="hidden" value="' + id + '"><input type="text" value=""><input type="submit" value="送信"></form>');
        return false;
    });
    $('.js-product-delete').on('click', function () {
        var flag = confirm("OKを押すとこの後注文ができなくなってしまいます。注文を確定しますか？");
        if (flag) {
            var id = $(this).val();
            var url = 'Ajax/Kind_delete';
            $.ajax({
                url: [url],
                type: 'POST',
                data: {
                    id: [id]
                },
                timeout: 3000,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            }).done(function (data) {
                $('.js-modal').fadeOut();
                setTimeout(function () {
                    location.reload();
                }, 500);
            }).fail(function (XMLHttpRequest, textStatus, errorThrown) {
                alert("error");
                console.log("XMLHttpRequest : " + XMLHttpRequest.status);
                console.log("textStatus     : " + textStatus);
                console.log("errorThrown    : " + errorThrown.message);
            })
        }
        return false;
    });
    $('.js-modal-close').on('click', function () {
        $('.js-modal').fadeOut();
        return false;
    });
});
