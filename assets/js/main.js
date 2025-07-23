$(document).ready(function () {
    $('#wordinput').keyup(function (e) {
        $word = $(this).val();
        $type = $('#dir').val();
        $typetranslate = $('#dir2').val();
        if ($word.length > 1) {
            $.ajax({
                url: 'handle.php',
                type: 'POST',
                data: {
                    word: $word,
                    type: $type,
                    translateType: $typetranslate
                },
                success: function (response) {
                    $('#result').html(response)
                },
                error: function () {
                }
            });
        } else {
            $('#result').html('');
        }
    });
    $('.swap-btn').click(function () {
        var val1 = $('#dir').val();
        var val2 = $('#dir2').val();
        $('#dir').val(val2);
        $('#dir2').val(val1);
        var val11 = $('#wordinput').val();
        var val22 = $('#translateinput').val();
        $('#wordinput').val(val22);
        $('#translateinput').val(val11);
    });
    $('#login').submit(function (e) {
        e.preventDefault();
        $email = $('#email').val();
        $pass = $('#pass').val();
        $.ajax({
            url: 'handle.php',
            type: 'POST',
            dataType: "json",
            data: {
                emaillog: $email,
                passlog: $pass
            },
            success: function (response) {
                $('#result').html(response);
                setTimeout(function () {
                    window.location.href = 'translate.php';
                }, 3000);
            },
            error: function () {
            }
        });
    });
    $('#register').submit(function (e) {
        e.preventDefault();
        $name = $('#name').val();
        $pass = $('#pass').val();
        $email = $('#email').val();
        $pass2 = $('#pass2').val();
        $.ajax({
            url: 'handle.php',
            type: 'POST',
            dataType: "json",
            data: {
                name: $name,
                email: $email,
                pass: $pass,
                pass2: $pass2
            },
            success: function (response) {
                $('#result').html(response);
                setTimeout(function () {
                    window.location.href = 'translate.php';
                }, 3000);
            },
            error: function () {
            }
        });
    });
});
