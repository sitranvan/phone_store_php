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
function confirmDelete(event, id) {
  event.preventDefault();
  Swal.fire({
    title: "Bạn có chắc?",
    text: "Có, tôi chắc chắn muốn xóa!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Có, xóa ngay!",
    cancelButtonText: "Không",
  }).then((result) => {
    if (result.isConfirmed) {
      // Sử dụng id để xây dựng URL xóa sản phẩm cụ thể
      var link = document.querySelector(".confirm-delete-" + id + "");
      window.location.href = link;
    }
  });
}

document.addEventListener("DOMContentLoaded", function () {
  const fileInput = document.getElementById("fileInput");
  const fileInputLabel = document.getElementById("fileInputLabel");
  const fileSelectedText = document.getElementById("fileSelectedText");
  const reviewEdit = document.getElementById("review-edit");
  const selectedImage = document.getElementById("selectedImage");
  if (fileInput) {
    fileInput.addEventListener("change", function () {
      // Xóa đường dẫn của hình ảnh sửa bỏ
      if (reviewEdit) {
        reviewEdit.remove();
      }
      const file = this.files[0];

      if (file) {
        fileSelectedText.innerText = file.name;

        const reader = new FileReader();
        reader.onload = function (e) {
          selectedImage.src = e.target.result;
          selectedImage.style.display = "block";
        };

        reader.readAsDataURL(file);
      } else {
        fileSelectedText.innerText = "Choose a file";
        selectedImage.src = "#";
        selectedImage.style.display = "none";
      }
    });
  }
});
