set SEARCH_PATH to e_comm_project;
CREATE TRIGGER check_transactions
AFTER INSERT OR UPDATE ON user_account
FOR EACH ROW
EXECUTE PROCEDURE
check_transactions_visits();



CREATE OR REPLACE FUNCTION check_transactions_visits()
RETURNS TRIGGER AS $BODY$
DECLARE 
visits integer;
trans integer;
BEGIN
select into visits visits_no from user_account where visits_no =new.visits_no ;
select into trans trans_no from user_account where trans_no=new.trans_no;
if(trans > visits) then 
	raise exception 'transactions should be less than or equal to visits';
end if;
return new;
END;
$BODY$ language 'plpgsql';


update user_account set trans_no=7 where acc_no=1;