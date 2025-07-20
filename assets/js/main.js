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
                error: function () { }
            });
        } else {
            $('#result').html('');
            $('#translateinput').html('');
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
});
