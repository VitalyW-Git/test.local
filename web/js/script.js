$("body").on("click", "a[href*='book/view']", function(e){
    $.ajax({
        url: this,
        dataType : "json",
        success: function (data) {
            $(".modal-body #name").html(data.name);
        }
    });
});