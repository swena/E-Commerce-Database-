set search_path to e_comm_project;
-- Function: e_comm_project.tot_amount()

-- DROP FUNCTION e_comm_project.tot_amount();

CREATE OR REPLACE FUNCTION e_comm_project.tot_amount()
  RETURNS integer AS
$BODY$
DECLARE 
o record;
BEGIN
For o in select order_no, sum(price)  from order_item natural join uid_details natural join inventory_item  group by order_no order by order_no
	Loop
	update e_comm_project.order_detail set totalamount =o.sum where e_comm_project.order_detail.order_no=o.order_no;
	end Loop;
return 0;
END $BODY$
  LANGUAGE 'plpgsql' VOLATILE
  COST 100;
ALTER FUNCTION e_comm_project.tot_amount()
  OWNER TO "201001067";

select e_comm_project.tot_amount();




------------------------------------------------------------------------------------------------------------------------------------------------------


CREATE OR REPLACE FUNCTION e_comm_project.amount_tobe_paid()
  RETURNS integer AS
$BODY$
DECLARE 
o record;
BEGIN
For o in select * from order_detail
	Loop
	update e_comm_project.payment set amount =o.totalamount where e_comm_project.payment.payment_no=o.payment_no;
	end Loop;
return 0;
END $BODY$
  LANGUAGE 'plpgsql'

 select e_comm_project.amount_tobe_paid(); 



 ------------------------------------------------------------------------------------------------------------------------------------------------------



 CREATE OR REPLACE FUNCTION e_comm_project.tot_trans_amount()
  RETURNS integer AS
$BODY$
DECLARE 
o record;
BEGIN
For o in select * from user_account
	loop
	update e_comm_project.user_account set ttl_tr_amt =0 where e_comm_project.user_account.acc_no=o.acc_no;
	end Loop;
	
For o in select account_no, sum(totalamount) from order_detail group by account_no order by account_no
	Loop
	update e_comm_project.user_account set ttl_tr_amt =o.sum where e_comm_project.user_account.acc_no=o.account_no;
	end Loop;

return 0;
END $BODY$
  LANGUAGE 'plpgsql'

 select e_comm_project.tot_trans_amount(); 


----------------------------------------------------------------------------------------------------------------------------------------------------


