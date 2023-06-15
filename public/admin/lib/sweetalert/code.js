
$(document).on("click", "#delete", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure to delete?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;
        } else {
            swal("Your file is safe!");
        }

    });
});

$(document).on("click", "#confirm", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure to confirm?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;
        } else {
            swal("Thanks for not confirm");
        }

    });
});
$(document).on("click", "#cancel", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure to cancel?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;
        } else {
            swal("Thanks for not cancel");
        }

    });
});
$(document).on("click", "#processing", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure to processing?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;
        } else {
            swal("Thanks for not processing");
        }

    });
});
$(document).on("click", "#picked", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure to picked?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;
        } else {
            swal("Thanks for not picked");
        }

    });
});
$(document).on("click", "#shipped", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure to shipped?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;
        } else {
            swal("Thanks for not shipped");
        }

    });
});
$(document).on("click", "#deliver", function(e){
    e.preventDefault();
    var link = $(this).attr("href");

    swal({
        title: "Are you sure to deliver?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            window.location.href = link;
        } else {
            swal("Thanks for not deliver");
        }

    });
});