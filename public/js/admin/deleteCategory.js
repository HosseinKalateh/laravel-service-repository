function deleteCategory(event) {
    let itemId = event.dataset.id;

    //csrf token for send on ajax request
    let token  = document.getElementById('csrf').content;

    Swal.fire({
        icon: 'warning',
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            //send ajax request for delete this item
            let url ="category/" + itemId;
            let request = new XMLHttpRequest();
            request.open("DELETE", url);
            request.setRequestHeader('X-CSRF-Token', token);
            request.onreadystatechange = function() {
                if(this.readyState === 4 && this.status === 200) {
                    //if successfully deleted item

                    //refresh page after 3500 mili second
                    setTimeout(function () {
                        window.location.reload(1);
                    },3500);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Item deleted successfully'
                    })
                } else {
                    //if have some error
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        onOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'warning',
                        title: 'Something is wrong!'
                    })
                }
            };
            request.send();
        }
    });
}
