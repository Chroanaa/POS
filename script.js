let textDate = document.querySelector(".timeAndDate");
textDate.innerHTML = "Loading...";

const products = {};
const productContainer = document.querySelector(".row");
const getDate = setInterval(() => {
  let date = new Date();
  let time = date.toLocaleTimeString();
  let monthYearDay = date.toLocaleDateString("default", {
    month: "long",
    year: "numeric",
    day: "numeric",
  });
  let FullDate = `${monthYearDay} ${time}`;
  textDate.innerHTML = FullDate;
}, 1000);
productContainer.addEventListener("click", (e) => {
  const targetEl = e.target;
  const targetElClasslist = targetEl.classList;
  const orderClasses = ["productImage", "productName", "productPrice"];
  if (
    targetElClasslist.contains("productImage") ||
    targetElClasslist.contains("productName") ||
    targetElClasslist.contains("productPrice")
  ) {
    const productInfo = targetEl.closest("div.productColContainer");
    const pid = productInfo.dataset.pid;
    console.log(pid);
  }
});
