$(document).ready(function () {
    $('#backsign').on('click', function() {
        console.log("aaaa");
        $.ajax({
            url: "http://localhost:8888/signup/delete",
            type: 'POST',
            data: {
                _token: $("meta[name='csrf-token']").attr("content")
            },
            success: function(response) {
                console.log(response)
                history.back();
            },
            error: function(xhr) {
                console.error('ファイル削除に失敗しました。');
                console.log(xhr); 
            }
        })
    })
})