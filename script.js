let textDate = document.querySelector(".timeAndDate");
textDate.innerHTML = "Loading...";
const orders = {};
let totalAmount = 0.0;
const products = {
  31: {
    name: "Hershey's",
    price: 30.0,
    stock: 10,
  },
  32: {
    name: "Toblerone",
    price: 46.52,
    stock: 10,
  },
  33: {
    name: "M&M",
    price: 25.0,
    stock: 20,
  },
  34: {
    name: "Cadbury",
    price: 30.0,
    stock: 15,
  },
  35: {
    name: "Dairy Milk",
    price: 40.0,
    stock: 5,
  },
  36: {
    name: "Snickers",
    price: 20.0,
    stock: 25,
  },
  37: {
    name: "Kitkat",
    price: 30.0,
    stock: 10,
  },
  38: {
    name: "Mars",
    price: 25.0,
    stock: 30,
  },
  39: {
    name: "Ferrero Rocher",
    price: 50.0,
    stock: 10,
  },
  40: {
    name: "Milky Way",
    price: 30.0,
    stock: 20,
  },
};

const dialogError = (message) => {
  BootstrapDialog.alert({
    type: BootstrapDialog.TYPE_DANGER,
    title: "<strong>Error</strong>",
    message: message,
  });
};
//Updates the order table if exist just add the quantity and total
//if not exist add the product to the order list
const updateOrderTable = () => {
  totalAmount = 0.0;
  const ordersContainer = document.querySelector(".pos_items");
  let noDataText = "<p class = 'noData'>No items in cart</p>";
  if (Object.keys(orders)) {
    let table = ` <table class = "table" id="pos_items_tbl">
    <thead>
        <tr>
            <th>#</th>
            <th>PRODUCT</th>
            <th>PRICE</th>
            <th>AMOUNT</th>
            <th>TOTAL</th>
        </tr>
    </thead>
    <tbody >
        ___ROWS___
    </tbody>
  </table>`;
    //loop through the orders
    let rows = "";
    let rowNum = 1;
    for (const [pid, orderItem] of Object.entries(orders)) {
      rows += `<tr>
      <td>${rowNum}</td>
      <td>${orderItem["name"]}</td>
      <td>$ ${orderItem["price"]}</td>
      <td>${orderItem["quantity"]}</td>
      <td>${Number(orderItem["amount"]).toFixed(2)}</td>
      <div class = "btn-group">
       <td><button class = "btn btn-danger btn-sm" onclick = "deleteOrder(${pid})"><i class = "fa fa-trash"> </i></button></td>
      <td><button class = "btn btn-success btn-sm" onclick = "editOrder(${pid})"><i class = "fa fa-edit"> </i></button></td>
      </div>
      </tr> 
      `;
      rowNum++;
      noDataText = table.replace("___ROWS___", rows);
      totalAmount += orderItem["amount"];
      document.querySelector(".item_total--value").innerHTML =
        totalAmount.toFixed(2);
    }
  }
  //append to order list table
  ordersContainer.innerHTML = noDataText;

  //update total amount
};

//add to order list
const addToOrder = (productInfo, pid, quantity) => {
  //add to order list table
  //refresh the products variable(updated stock)
  const totalAmount = productInfo["price"] * quantity;
  const curItemIds = Object.keys(orders);
  if (curItemIds.indexOf(pid) > -1) {
    //if exist just update the quantity and total
    console.log(" exist");
    products[pid]["stock"] -= quantity;
    orders[pid]["amount"] += totalAmount;
    orders[pid]["quantity"] += quantity;
    //Update the order Table
    updateOrderTable();
  } else {
    //if not exist add the product to the order list
    orders[pid] = {
      name: productInfo["name"],
      price: productInfo["price"],
      quantity: quantity,
      amount: totalAmount,
    };
    //update the main product info
    products[pid]["stock"] -= quantity;
    console.log("doesnt Exist");
    //Update the order Table
    updateOrderTable();
  }
};
const deleteOrder = (pid) => {
  let productInfo = products[pid];
  //delete the order
  BootstrapDialog.confirm({
    title: "Delete Order",
    message: `Are you sure you want to delete this ${productInfo["name"]} order?`,
    type: BootstrapDialog.TYPE_DANGER,
    callback: (deleteOrder) => {
      if (deleteOrder) {
        //delete the order
        const curOrder = orders[pid];
        const curQuantity = curOrder["quantity"];
        const curStock = products[pid]["stock"];
        products[pid]["stock"] += curQuantity;
        delete orders[pid];
        //update the order table
        updateOrderTable();
      }
    },
  });
};

const editOrder = (pid) => {
  //edit order
  editOrderDialog(pid);
};
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
//listens for clicks in the products
productContainer.addEventListener("click", (e) => {
  const targetEl = e.target;
  const targetElClasslist = targetEl.classList;
  if (
    targetElClasslist.contains("productImage") ||
    targetElClasslist.contains("productName") ||
    targetElClasslist.contains("productPrice")
  ) {
    //gets the id of the product
    const productId = targetEl.closest("div.productColContainer");
    const pid = productId.dataset.pid;
    const productInfo = products[pid];
    const curStock = productInfo["stock"];
    // if currrent stock is 0 throw an error
    if (curStock === 0) {
      dialogError("This product is out of stock");
      return;
    }

    const dialogForm = `<h6 class = "dialogProductName"> ${productInfo["name"]}<span class = "dialogProductPrice">$${productInfo["price"]}</span></h6>
    <input type="number" id="quantity" class ="form-control" placeholder="Enter Quantity" required min="1"/>
    `;
    BootstrapDialog.confirm({
      title: "add to Cart",
      message: dialogForm,
      callback: (addOrder) => {
        if (addOrder) {
          //check if quantity is not NULL
          const quantity = parseInt(document.getElementById("quantity").value);
          if (isNaN(quantity)) {
            dialogError("Please enter a valid number");
            return;
          }
          //check if quantity is more than current stock
          const curStock = productInfo["stock"];
          if (quantity > curStock) {
            dialogError(
              `The quantity was more than the current stock of <strong style = "color:red;font-size:20px;">(${curStock})</strong>`
            );
            return;
          }
          //ALL are CHECKED
          addToOrder(productInfo, pid, quantity);
        }
      },
    });
  }
});
