function updateParams(paramName, paramValue) {
  var currentUrl = window.location.href;
  var urlObject = new URL(currentUrl);

  // Xóa tham số hiện tại của paramName
  urlObject.searchParams.delete(paramName);

  // Thêm tham số mới vào URL
  urlObject.searchParams.append(paramName, paramValue);

  // Chuyển đến URL mới mà không làm tải lại trang
  history.pushState({}, "", urlObject.href);

  // Nếu bạn muốn tải lại trang sau khi cập nhật URL, bạn có thể sử dụng:
  window.location.href = urlObject.href;
}

// Hàm lấy số trang hiện tại từ URL
function getCurrentPage() {
  var currentUrl = window.location.href;
  var urlObject = new URL(currentUrl);
  var pageParam = urlObject.searchParams.get("page");
  return pageParam ? parseInt(pageParam) : 1;
}

function updateSortBy(value) {
  // Sử dụng hàm updateParams đã có
  updateParams("priceSort", value);
}

const btnClear = document.querySelector(".btn-clear");
if (btnClear) {
  btnClear.addEventListener("click", () => {
    // Lấy đối tượng URL từ địa chỉ hiện tại
    var url = new URL(window.location.href);

    // Xóa tham số 'brand' và 'category'
    url.searchParams.delete("brand");
    url.searchParams.delete("category");

    history.replaceState({}, "", url.href);
    window.location.reload();
  });
}

const avatarFile = document.querySelector("#upload-avatar");
if (avatarFile) {
  avatarFile.addEventListener("change", (e) => {
    const file = e.target.files[0];
    const avatar = document.querySelector(".avatar");
    const url = URL.createObjectURL(file);
    avatar.setAttribute("src", url);
  });
}
