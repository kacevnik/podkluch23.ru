  $(document).on("submit", '#frm-recall', function (e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: "/page/recallme/create",
            type: "POST",
            data: form.serialize(),
            success: function (result) {
                console.log(result);
                var modalContainer = $('#popupCallAction');
                var modalBody = modalContainer.find('#popupCallAction > .m-body');
                var insidemodalBody = modalContainer.find('form');

                if (result == 1) {
                insidemodalBody.html(result).hide(); // 
                 //$('#my-modal').modal('hide');
                modalContainer.children('.success').html("<div class='alert alert-success'>");
                modalContainer.children('.success').children('.alert-success').append("<strong>Спасибо! Ваше сообщение отправлено.</strong>");
                modalContainer.children('.success').children('.alert-success').append('</div>');

                setTimeout(function() { // скрываем modal через 4 секунды
                modalContainer.modal('hide');
                }, 4000);
                }
                else {
                    modalBody.html(result).hide().fadeIn();
                }
            }
        });
    });
$(function function_name () {
      $('.features .item').click(function(){
        document.location.href=  $(this).find("a").attr("href");
      });
    });