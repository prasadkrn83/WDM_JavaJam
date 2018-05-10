var cartItems;

class Product {

    constructor(id, price, number, name) {
        this.id = id;
        this.price = price;
        this.number = number;
        this.name = name;

    }
    toJSON() {
        return {
            id: this.id,
            price: this.price,
            number: this.number,
            name: this.name
        };
    }
}

function addProductToCart(productId, productPrice, productName) {

    //cartItems=sessionStorage.getItem("cart");
    if (!sessionStorage['cart']) {
        cartItems = new Array();
    } else {
        cartItems = JSON.parse(sessionStorage.getItem("cart"));
    }

    var index = cartItems.findIndex(product => product.id === productId);
    if (index >= 0) {
        cartItems[index].number = cartItems[index].number + 1;
    } else {
        var product = new Product(productId, productPrice, 1, productName);
        cartItems.push(product);
    }
    sessionStorage.setItem("cart", JSON.stringify(cartItems));
    alert("Product Added to the cart successfully.");

}

function populateCart(page) {
    if (!sessionStorage['cart'] ) {
        if(!sessionStorage['isInsert']){
            document.getElementById("cartTableDiv").innerHTML = '<h4>The cart is empty.Start adding items to your card from the Gear!!</h4>';
       } 
    }else {
        cartItems = JSON.parse(sessionStorage.getItem("cart"));
        createTable(cartItems, page);
        if (page === 'order') {
            document.getElementById('orderformdiv').style.display = 'block';
        }
    }
    if(sessionStorage['isInsert']){
           sessionStorage.removeItem('isInsert');

    }
}

function createTable(tableData, page) {
    var table = document.createElement('table');
    table.className = "cartTable";
    var total = 0;

    var row = document.createElement('tr');

    var cell = document.createElement('th');
    cell.appendChild(document.createTextNode('Description'));
    row.appendChild(cell);

    var cell = document.createElement('th');
    cell.appendChild(document.createTextNode('Quantity'));
    row.appendChild(cell);

    var cell = document.createElement('th');
    cell.appendChild(document.createTextNode('Price'));
    row.appendChild(cell);

    table.appendChild(row);

    tableData.forEach(function(product) {
        var row = document.createElement('tr');

        var cell = document.createElement('td');
        cell.appendChild(document.createTextNode(product.name));
        row.appendChild(cell);

        var cell = document.createElement('td');
        var btninc = document.createElement("BUTTON");
        btninc.style.setProperty("margin-right", "5px");
        var t = document.createTextNode("+");
        btninc.appendChild(t);
        btninc.className="btninc";
        btninc.onclick = function() { updateCart(product.id, 'inc'); };


        var btndec = document.createElement("BUTTON");
        btndec.style.setProperty("margin-right", "5px");
        var t = document.createTextNode("-");
        btndec.appendChild(t);
        btndec.className="btndec";
        btndec.onclick = function() { updateCart(product.id, 'dec'); };

        var btndelete = document.createElement("BUTTON");
        var t = document.createTextNode("Delete");
        btndelete.appendChild(t);       
        btndelete.className="btndelete";
        btndelete.onclick = function() { updateCart(product.id, 'delete'); };


        cell.appendChild(document.createTextNode(product.number));
        cell.appendChild(document.createElement("br"));

        if (page === 'cart') {
            cell.appendChild(btninc);
            cell.appendChild(btndec);
            cell.appendChild(btndelete);
        }

        row.appendChild(cell);

        var cell = document.createElement('td');
        cell.appendChild(document.createTextNode('$' + product.price));
        row.appendChild(cell);
        total += (+product.price) * product.number;
        table.appendChild(row);

    });


    var row = document.createElement('tr');

    var cell = document.createElement('td');
    cell.appendChild(document.createTextNode(''));
    row.appendChild(cell);

    var cell = document.createElement('td');
    cell.appendChild(document.createTextNode('Total'));
    row.appendChild(cell);

    var cell = document.createElement('td');
    cell.appendChild(document.createTextNode('$' + total.toFixed(2)));
    row.appendChild(cell);
    table.appendChild(row);

    document.getElementById("cartTableDiv").appendChild(table);

    if (page === 'cart') {

        var orderbtn = document.createElement("BUTTON")
        orderbtn.className="orderBtn";
        var t = document.createTextNode("Place Order");
        orderbtn.appendChild(t);
        orderbtn.onclick = function() { window.open("placeyourorder", "_self"); };
        document.getElementById("cartTableDiv").appendChild(orderbtn);

        var continuebtn = document.createElement("BUTTON");
        var t = document.createTextNode("Continue Shopping");
        continuebtn.className="continuebtn";
        continuebtn.appendChild(t);
        continuebtn.onclick = function() { window.open("gear", "_self"); };
        document.getElementById("cartTableDiv").appendChild(continuebtn);
    }
}

function updateCart(id, action) {

    cartItems = JSON.parse(sessionStorage.getItem("cart"));


    var index = cartItems.findIndex(product => product.id === id);
    if (index < 0) {
        return;
    } else {
        switch (action) {
            case "inc":
                cartItems[index].number = cartItems[index].number + 1;
                break;
            case "dec":
                cartItems[index].number = cartItems[index].number + -1;
                if (cartItems[index].number == 0) {
                    cartItems.splice(index, 1);
                }
                break;
            case "delete":
                cartItems.splice(index, 1);
                break;
        }


    }
    if (cartItems.length == 0) {
        sessionStorage.removeItem("cart");
    } else {
        sessionStorage.setItem("cart", JSON.stringify(cartItems));
    }
    document.getElementById("cartTableDiv").innerHTML = "";
    populateCart('cart');
}

function validateJobsForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var experience = document.getElementById('experience').value;
    var emailPattern = /(.+)\@([^\.].*)\.([a-z]{2,})/;
    var isValid=true;
    document.getElementById('errorMessageSpan').style.display = "none";
    document.getElementById('emailErrorSpan').style.display = "none";
    if(document.body.contains(document.getElementById('successMessage'))){
        document.getElementById('successMessage').style.display = "none";

    }

    if (name == null || name === '' || email == null || email === '' || experience == null || experience === '') {
        document.getElementById('errorMessageSpan').style.display = "block";
       isValid=false;
    } else if (!(name === '' && email === '' && experience === '')) {
        document.getElementById('errorMessageSpan').style.display = "none";
    }

    if (!emailPattern.test(email)) {

        document.getElementById('emailErrorSpan').innerHTML = " Invalid Email-Id";
        document.getElementById('emailErrorSpan').style.display = "block";

        isValid=false;
    }
    return isValid;
}


function validateOrdersForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var address = document.getElementById('address').value;
    var city = document.getElementById('city').value;
    var state = document.getElementById('state').value;
    var zip = document.getElementById('zip').value;
    var creditcard = document.getElementById('creditcard').value;
    var expirymonth = document.getElementById('expirymonth').value;
    var year = document.getElementById('expyear').value;
    var currentMonth = (new Date()).getMonth() + 1;
    var currentYear = (new Date()).getFullYear();

    var emailPattern = /(.+)\@([^\.].*)\.([a-z]{2,})/;
    var zipcodePattern = /\d{5}\-\d{4}/;
    var visaCreditCardPattern = /4\d{3}[\s\-]\d{4}[\s\-]\d{4}[\s\-]\d{4}/;
    var masterCardPattern = /5[1-5]d{2}[\s\-]\d{4}[\s\-]\d{4}[\s\-]\d{4}/;
    var expYear = /\d{4}/;

    var isValid = true;

    // document.getElementById('errorMessageSpan').style.display = "none";
    // document.getElementById('emailErrorSpan').style.display = "none";
    // document.getElementById('zipErrorSpan').style.display = "none";
    // document.getElementById('creditErrorSpan').style.display = "none";
    // document.getElementById('creditYearErrorSpan').style.display = "none";
    // document.getElementById('creditMonthErrorSpan').style.display = "none";






    // if (name == null || name === '' || email == null || email === '' || address == null || address === '' ||
    //     city == null || city === '' || state == null || state === '' || zip == null || zip === '' ||
    //     creditcard == null || creditcard === '' || expirymonth == null || expirymonth === '' || year == null || year === '') {
    //     document.getElementById('errorMessageSpan').style.display = "block";
    //     isValid = false;

    // }

    // if (!emailPattern.test(email)) {

    //     document.getElementById('emailErrorSpan').style.display = "block";
    //     isValid = false;
    // }
    // if (!zipcodePattern.test(zip)) {

    //     document.getElementById('zipErrorSpan').style.display = "block";
    //     isValid = false;
    // }

    // if (!(visaCreditCardPattern.test(creditcard) || masterCardPattern.test(creditcard))) {

    //     document.getElementById('creditErrorSpan').style.display = "block";
    //     isValid = false;
    // }

    // if (!expYear.test(year) || year < currentYear) {

    //     document.getElementById('creditYearErrorSpan').style.display = "block";
    //     isValid = false;
    // }
    // if (expirymonth == 0 || expirymonth < currentMonth) {
    //     document.getElementById('creditMonthErrorSpan').style.display = "block";
    //     isValid = false;
    // }
   // if (isValid) {
        document.getElementById('orderItems').value = sessionStorage.getItem("cart");
    //}
    return isValid;
}

function performCreateOrderRequest() {
    $.ajax({
        type: 'POST',
        url: $("form").attr("action"),
        data: $("form").serialize(),
        success: function(response) { 
        	alert('Order Created!!!')
        }, error: function (xhr, ajaxOptions, thrownError) {
        var obj = jQuery.parseJSON(xhr.responseText);
        if(obj[0].isError){
            if(obj[0].isValidationError){
                if(obj[0].isAnyEmpty){
                    document.getElementById('errorMessageSpan').style.display = "block";
                }
                if(obj[0].email){
                    document.getElementById('emailErrorSpan').style.display = "block";
                }
                if(obj[0].zip){
                    document.getElementById('zipErrorSpan').style.display = "block";
                }
                if(obj[0].creditcard){
                    document.getElementById('creditErrorSpan').style.display = "block";

                }
                if(obj[0].year){
                    document.getElementById('creditYearErrorSpan').style.display = "block";

                }
                
            }
        }

      }
    });
}