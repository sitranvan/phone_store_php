const buttonRegister = document.querySelector(".btn-register");
const checkTerms = document.querySelector(".check-terms");

// Còn lỗi khi đã đăng ký thành công back lại thì checkbox được checked như button lại disable
if (checkTerms) {
  checkTerms.addEventListener("click", () => {
    if (buttonRegister) {
      if (checkTerms.checked == true) {
        buttonRegister.removeAttribute("disabled");
      } else {
        buttonRegister.setAttribute("disabled", "");
      }
    }
  });
}
//
function confirmDelete(event) {
  event.preventDefault();
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      if (result.isConfirmed) {
        // Nếu người dùng xác nhận xóa, giả lập sự kiện nhấn vào thẻ link
        var link = document
          .querySelector(".confirm-delete")
          .getAttribute("href");
        window.location.href = link;
      }
    }
  });
}
