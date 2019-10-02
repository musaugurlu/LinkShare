import Swal from 'sweetalert2'

Vue.mixin({
    methods: {
        confirmAction(type, title, text) {
            Swal.fire({
                title: title,
                text: text,
                type: type,
                showCancelButton: true,
                confirmButtonText: 'Yes'
            });
        },

        toast(type = 'success', title = 'Successfull') {
            Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            }).fire({
                type: type,
                title: title
            })
        }
    }
});