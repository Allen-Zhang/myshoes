
Database Schema is in the "db" folder

--------------------------------------------------

$conn = mysql_connect("127.0.0.1", "root", "root")

mysql_select_db("myshoes", $conn)

Login:
    email: allenzhang@gmail.com
    password: allenzhang


Functions have been implemented: 
    1.Login and logout
    2.Sign up
    3.Edit account information
    4.Subscribe
    5.Navigate/Display all the products and product details in db according to user's choose.
      (Data has been added: 
	   Brand-Nike; 
	   Style-Athletic,Sneakers,Boots; 
	   Discount Product-Nike Sale)