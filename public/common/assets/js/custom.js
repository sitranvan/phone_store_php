const buttonRegister = document.querySelector('.btn-register')
const checkTerms = document.querySelector('.check-terms');


// Còn lỗi khi đã đăng ký thành công back lại thì checkbox được checked như button lại disable
if (checkTerms) {

    checkTerms.addEventListener('click', () => {
        if (buttonRegister) {
            if (checkTerms.checked == true) {
                buttonRegister.removeAttribute('disabled')

            } else {
                buttonRegister.setAttribute('disabled', '')

            }
        }
    })

}
// 

function demo() {
    Swal.fire({
        toast: true,
        icon: 'success',
        title: 'Posted successfully',
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
}

