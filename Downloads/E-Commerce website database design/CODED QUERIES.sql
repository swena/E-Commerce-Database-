set SEARCH_PATH to e_comm_project;

--list the uids ordered in a particular user session
select * from (select order_no from (select invoice_no from invoice where session_no='397')as r1 natural join order_detail) as r2 natural join order_item

--list all the items, their price and date purchased Kunal Kapoor till date?
select inv_name as Item_purchased,price,creation_date as date_purcahsed from (select uid,creation_date from (select invoice_no,creation_date from address natural join invoice where name='Kunal Kapoor') as r1 natural join order_detail natural join order_item ) as r3 natural join uid_details natural join inventory_item

--NO of orders placed by a particular person 
 select name as Person_name, count(invoice_no) as no_of_orders_placed from address natural join invoice where name='Kunal Kapoor' group by name

 
--list name and addresses of all customers who have ordered a particular item X.
 select name,address from order_detail natural join invoice natural join address natural join order_item natural join uid_details natural join inventory_item where inv_item_no='201';


--Calculate the total amount to be paid for each order
select order_no, sum(price)  from order_item natural join uid_details natural join inventory_item  group by order_no order by order_no;


--list the details of the invoice for particular order item
select * from invoice where invoice_no=(select invoice_no from order_item natural join order_detail where orderitem_no='817'); 

--list all the orders whose payment is pending
select order_no from order_detail natural join shipping where delv_status='Ndel';

--list the most frequent visitor
select acc_no, visits_no from user_account order by visits_no desc limit 1;

--list the items bought using a particular credit card no
select orderitem_no from ((select * from credit_card join payment on credit_card.cc_no = payment.credit_card_no)as r1 join order_detail on r1.payment_no = order_detail.payment_no)as r2 join order_item on r2.order_no = order_item.order_no where cc_no = '3342452345353335';