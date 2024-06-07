function edit(mode) {
    if (mode == "update") {
        document.getElementById("mode").value = "update";
        document.getElementById("form").submit();
    } else {
        Swal.fire({
            icon: "warning",
            title: "Delete",
            text: "Are you sure?",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            reverseButtons: true,
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("mode").value = "delete";
                document.getElementById("form").submit();
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                return false;
            }
        })
    }
}

function increaseValue() {
    var value = parseInt(document.getElementById('newstock').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('newstock').value = value;
}

function decreaseValue() {
    var value = parseInt(document.getElementById('newstock').value, 10);
    value = isNaN(value) ? 0 : value;
    if (value > 1) {
        value--;
        document.getElementById('newstock').value = value;
    }
}