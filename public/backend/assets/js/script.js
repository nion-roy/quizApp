$(document).ready(function () {
    (function ($) {
        //  Sweet alert confirmation message with delete use to form
        $(".delete-button").on("click", function (e) {
            e.preventDefault();
            var form = $(this).closest("form");

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this delete!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        swalWithBootstrapButtons.fire(
                            "Deleted!",
                            "Your file has been deleted.",
                            "success"
                        );
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        swalWithBootstrapButtons.fire(
                            "Cancelled",
                            "Your imaginary file is safe!",
                            "error"
                        );
                    }
                });
        });
        // Sweet alert confirmation message with delete use to form

        //  Sweet alert confirmation message with delete without form
        $(".delete").on("click", function (e) {
            e.preventDefault();
            var urlToRedirect = $(this).attr("href");

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger",
                },
                buttonsStyling: false,
            });

            swalWithBootstrapButtons
                .fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this delete!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        swalWithBootstrapButtons.fire(
                            "Deleted!",
                            "Your file has been deleted.",
                            "success"
                        );
                        window.location = urlToRedirect;
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            "Cancelled",
                            "Now! Your imaginary file is safe!",
                            "error"
                        );
                    }
                });
        });
        //  Sweet alert confirmation message with delete without form

        // preview image with out upload
        $("#imageInput").on("change", function (event) {
            var files = event.target.files;
            var previewContainer = $("#imagePreviewContainer");

            // Clear previous previews
            previewContainer.empty();

            if (files.length > 0) {
                var file = files[0];
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = $('<img class="border rounded p-2">')
                        .attr("src", e.target.result)
                        .css({
                            width: "60px",
                            height: "60px",
                            margin: "10px 0",
                        });
                    previewContainer.append(img);
                };

                reader.readAsDataURL(file);
            }
        });
        // preview image with out upload


    })(jQuery);
});
