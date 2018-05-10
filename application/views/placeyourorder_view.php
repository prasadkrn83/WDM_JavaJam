<?php


$data_name = array(
    'name' => 'name',
    'id' => 'name',
    //'required'=>'required',
    'placeholder' => 'Enter Name',
    'value'=>set_value('name', '',TRUE)

);

$data_email = array(
    'name' => 'email',
    'id' => 'email',
    //'type'=>'email',
    //'required'=>'required',
    'placeholder' => 'Enter Email Id',
    'value'=>set_value('email', '',TRUE)

);

$data_address = array(
    'name' => 'address',
    'id' => 'address',
    //'required'=>'required',
    'placeholder' => 'Enter Address',
    'value'=>set_value('address', '',TRUE)

);

$data_city = array(
    'name' => 'city',
    'id' => 'city',
    //'required'=>'required',
    'placeholder' => 'Enter City',
    'value'=>set_value('city', '',TRUE)
);

$data_state = array(
    'name' => 'state',
    'id' => 'state',
    //'required'=>'required',
    'placeholder' => 'Enter State',
    'value'=>set_value('state', '',TRUE)
);
$data_zip = array(
    'name' => 'zip',
    'id' => 'zip',
    //'required'=>'required',
    'placeholder' => 'Enter Zipcode',
    'value'=>set_value('zip', '',TRUE)
);
$data_creditcard = array(
    'name' => 'creditcard',
    'id' => 'creditcard',
    //'required'=>'required',
    'placeholder' => 'Enter Credit Card',
    'value'=>set_value('creditcard', '',TRUE)
);
$data_expyear = array(
    'name' => 'expyear',
    'id' => 'expyear',
    //'required'=>'required',
    'placeholder' => 'Enter Expiry Year',
    'value'=>set_value('expyear', '',TRUE)
);

$hidden = array(
    'type'=>'hidden',
    'name' => 'orderItems',
    'id' => 'orderItems'
);

$months=array("0"=>"--Select Month--","1"=>"January","2"=>"February","3"=>"March","4"=>"April","5"=>"May","6"=>"June","7"=>"July","8"=>"August","9"=>"September","10"=>"October","11"=>"November","12"=>"December");

?>
        <div class="right">
            <header id="header">
                <h1>JavaJam Coffee House</h1>
            </header>
            
            <div id="musiccontent">
                 <div id="rightContent">
                <div id="shoppingCartHeader">
                    <h3>Shopping Cart</h3>                    
                </div>
               <div id="cartTableDiv"></div>
            </div>
            <?php
                    if(isset($isInsert)){
                ?>
                       <script>
                        sessionStorage.clear();
                        document.getElementById("cartTableDiv").innerHTML = '';
                        sessionStorage.setItem("isInsert", JSON.stringify('true'));
                 </script>
                        <span id="successMessageInsert" class="successMessageInsert" > Order Created Successfully!!</span>
                <?php
                    }
                ?>
              <div id="orderformdiv" >
               <span id="errorMessageSpan" class="errorMessage" > All the fields are mandatory to place an order!!</span>
                <?php
                    echo form_open('placeyourorder/order');
                    echo form_fieldset("Fill Details:");
                    echo"<table id='ordertable'>";
                    echo"<tr>";
                    echo"<td>";
                    echo form_label('Name *', 'name','class=labelBold');
                    echo"</td>";
                    echo"<td>";
                    echo form_input($data_name);
                    echo form_error('name');                           
                    echo"</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<td>";
                    echo form_label('Email *', 'email','class=labelBold');
                    echo"</td>";
                    echo"<td>";
                    echo form_input($data_email);
                    echo form_error('email');
                    echo"<span id='emailErrorSpan' class='errorMessage'>Invalid Email-Id</span>";
                    echo"</td>"; 
                    echo"</tr>";
                    echo"<tr>";
                    echo"<td>";
                    echo form_label('Address *', 'address','class=labelBold');
                    echo"</td>";
                    echo"<td>";
                    echo form_input($data_address);
                    echo form_error('address');
                    echo"</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<td>";
                    echo form_label('City *', 'city','class=labelBold');
                    echo"</td>";
                    echo"<td>";
                    echo form_input($data_city);
                    echo form_error('city');
                    echo"</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<td>";
                    echo form_label('State *', 'state','class=labelBold');
                    echo"</td>";
                    echo"<td>";
                    echo form_input($data_state);
                    echo form_error('state');
                    echo"</td>";
                    echo"<td>";
                    echo form_label('Zip *', 'zip','class=labelBold');
                    echo"</td>";
                    echo"<td>";
                    echo form_input($data_zip);
                    echo form_error('zip');
                    echo"<span id='zipErrorSpan' class='errorMessage'>Invalid Zipcode</span>";
                    echo"</td>";    
                    echo"</tr>";
                    echo"<tr>";
                    echo"<td>";
                    echo form_label('Credit Card *', 'creditcard','class=labelBold');
                    echo"</td>";
                    echo"<td colspan='3'>";
                    echo form_input($data_creditcard);
                    echo "<br>";
                    echo form_error('creditcard');
                    echo"<span id='creditErrorSpan' class='errorMessage'>Invalid Credit Card Number</span>";
                    echo"</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<td>";
                    echo form_label('Expiry Month *', 'expirymonth','class=labelBold');
                    echo"</td>";
                    echo"<td>";
                    echo form_dropdown('expirymonth',$months,set_value('expirymonth', '0',TRUE),'id="expirymonth"');
                    echo form_error('expirymonth');
                    echo"<span id='creditMonthErrorSpan' class='errorMessage'>Invalid Credit Card Expiry Month</span>";
                    echo"</td>";
                    echo"<td>";
                    echo form_label('Year` *', 'year','class=labelBold');
                    echo"</td>";
                    echo"<td>";
                    echo form_input($data_expyear);
                    echo form_error('expyear');
                    /*echo"<span id='creditYearErrorSpan' class='errorMessage'>Invalid Credit Card Expiry Year</span>";*/
                    echo"</td>";
                    echo"</tr>";
                    echo"<tr>";
                    echo"<td></td>";
                    echo"<td class='alignCenter'>";
                    echo form_submit('submit', 'Order Now','onclick="return validateOrdersForm();"');
                    echo"</td>";
                    echo"</tr>";
                    echo"</table>";
                    echo form_input($hidden);
                    echo form_fieldset_close();
                    echo form_close();
                    ?>
               </div>
            </div>
        </div>
        <script type="text/javascript">
            populateCart('order');
        </script>