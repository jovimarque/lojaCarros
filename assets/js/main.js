function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

const toast1 = (title = "", subTitle = "", body = "", identify = "") => {
 let str = `
 <div class="toast-container position-absolute top-0 end-0 p-3">
 <div class="toast toast_${identify}" role="alert" aria-live="assertive" aria-atomic="true">
 <div class="toast-header">
 <strong class="me-auto">${title}</strong>
 <small class="text-muted">${subTitle}</small>
 <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
 </div>
 <div class="toast-body">${body}</div>
 </div>
 </div>
 `;
 let element = document.createElement("div");
 element.classList.add("position-relative");
 element.setAttribute("id", "toastTemp_" + identify);
 element.setAttribute("aria-live", "polite");
 element.setAttribute("aria-atomic", "true");
 element.style.zIndex = "9999";
 element.innerHTML = str;
 document.body.insertBefore(element, document.body.firstChild);
}

const initToast = () => {
    const message = decodeURIComponent(getCookie("systemMessage"));
    if (message != null && message != "undefined" && message != undefined) {
        const randomString = (Math.random() + 1).toString(36).substring(7);
        const messageObj = JSON.parse(message);
        toast1(messageObj.title, messageObj.subTitle, messageObj.body, randomString);
        const toastEl = document.querySelector('.toast_' + randomString);
        const option = {
            animation: true,
            autohide: true,
            delay: 4500
        };
        toastEl.addEventListener('hidden.bs.toast', function () {
            if (document.querySelector("#toastTemp_" + randomString)) {
                document.querySelector("#toastTemp_" + randomString).remove();
            }
        });
        const toast = new bootstrap.Toast(toastEl, option)
        toast.show();
        document.cookie = `systemMessage=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=${window.location.pathname};`;
    }
}