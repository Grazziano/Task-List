$(document).ready(function () {
    $('#create-task').submit(function (event) {
        event.preventDefault();

        var form = $(this);
        var formData = form.serialize();

        // var name = $('#name').val();
        // var description = $('#description').val();
        // console.log(name + " " + description);

        $.ajax({
            url: 'create.php',
            method: 'POST',
            data: formData,
            success: function (data) {
                $('#ajax_msg').css("display", "block").delay(3000).slideUp(300).html(data);
                document.getElementById("create-task").reset();
            }
        });
    });
});