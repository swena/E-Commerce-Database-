set SEARCH_PATH to e_comm_project;
ALTER table "Inventory_Item" rename to inventory_item;
ALTER table "Uid_Details" rename to uid_details;
ALTER table "Order" rename to order_detail;
ALTER table "Order_Item" rename to order_item;
ALTER table "Shipping" rename to shipping;
ALTER table "Address" rename to address;
ALTER table "Payment" rename to payment;
ALTER table "Credit_Card" rename to credit_card;
ALTER table "Invoice" rename to invoice;
ALTER table "Invoice_History" rename to invoice_history;
ALTER table "User_Account" rename to user_account;
ALTER table "User_session" rename to user_session;
ALTER table "Shopping_cart" rename to shopping_cart;
ALTER table "Cart_Detail" rename to cart_detail;

ALTER table inventory_item 
rename column inv_item to inv_item_no;
ALTER table inventory_item 
rename column "Price"  to price;
ALTER table inventory_item 
rename column "inv_name"  to inv_name;
ALTER table inventory_item 
rename column "Timestamp" to stock_date;



ALTER table order_item 
rename column "OrderItem#" to orderitem_no;
ALTER table order_item 
rename column "Order#"  to order_no;
ALTER table order_item 
rename column "Uid"  to uid;
ALTER table order_item 
rename column "qty" to qty;

ALTER table address 
rename column "Address#" to address_no;
ALTER table address 
rename column "Name" to name;
ALTER table address
rename column "Addr"  to addr;
ALTER table address 
rename column "City" to city;
ALTER table address
rename column "State" to state;
ALTER table address
rename column "Pin_code"  to pin_code;



ALTER table credit_card
rename column "CC#"  to cc_no;
ALTER table credit_card 
rename column "Acc#" to acc_no;
ALTER table credit_card
rename column "Holder_name"  to holder_name;
ALTER table credit_card
rename column "Expiry_date" to expiry_date;
ALTER table credit_card
rename column "Billing_addr#"  to billing_addr_no;


ALTER table invoice_history
rename column "Invoice#"  to invoice_no;
ALTER table invoice_history 
rename column "Timestamp" to timestamp;



ALTER table order_detail
rename column "Order#"  to order_no;
ALTER table order_detail
rename column "Account#" to account_no;
ALTER table order_detail
rename column "Payment#"  to payment_no;
ALTER table order_detail
rename column "Invoice#" to invoice_no;
ALTER table order_detail
rename column "Shipping#"  to shipping_no;
ALTER table order_detail
rename column "OrderDate" to orderdate;
ALTER table order_detail
rename column "TotalAmount"  to totalamount;



ALTER table shopping_cart
rename column "Cart#"  to cart_no;
ALTER table shopping_cart 
rename column "Session#" to session_no;
ALTER table shopping_cart
rename column "active?"  to active;
ALTER table shopping_cart
rename column "expire_on" to expire_on;

ALTER table user_account
rename column "Acc#"  to acc_no;
ALTER table user_account
rename column "Username" to username;
ALTER table user_account
rename column "Pw"  to pw;
ALTER table user_account 
rename column "Timestamp" to timestamp;
ALTER table user_account
rename column "#visits" to visits_no;
ALTER table user_account 
rename column "#trans" to trans_no;
ALTER table user_account
rename column "ttl_tr_amt" to ttl_tr_amt;





