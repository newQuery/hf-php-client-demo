$("#form--User").on('submit', function(e) {
    e.preventDefault();

    var form = $(this);
    var url = form.attr('action');
    var method = form.attr('method');

    $.ajax({
        type: method,
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function(data)
        {
            $("#User--error").empty();
            $("#User--content").html(data);
        },
        error: function(error  )
        {
            let msg = JSON.parse(error.responseText).error;
            $("#User--content").empty();
            $("#User--error").html(msg);
        }
    });
});