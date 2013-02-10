<?php

//This code demonstrates how to interact with the cloud database on XEround

    $database = new mysqli('instance38663.db.xeround.com', 'inviolable1', '96796123', 'checkmate','5411') ;
        /*  the variables are:
                1) the url of object(External DNS hostname without port), 
                2) username of DB instance, 
                3) pw of DB instance, 
                4) name of database, 
                5) port number
            this is basically connecting to the new database
        */
        
        
    if($database->connect_errno > 0){
        echo 'Database Error' . $database->connect_error;
    }else{
        echo 'Connected!';
    }
    /*  test if the database is actually connected
        what this will do is: when the database is initialising a mysqli instance, it will try and connect to the database specified with the above parameters
        if error number > 0, there will be an error
        otherwise, it will be connected
    */
    
    /*
        var_dump($database); //use this to see what is in the database
    */
    
    $query = 'SELECT * FROM persons';
    $result = $database->query($query);
    
    if(!$result){   //if no result
        echo 'Database query error' . $database->error;
    }else{
        while($row = $result->fetch_assoc()){
            echo 'Name: ' . $row['name'];
        }
    }
    //query the database, try and get the information we input in the database out 
    
    /*  So what we've done with this code is:
            -Connected to the XERound database
            -Used PHPMyAdmin to insert a particular piece of data
            -Connected it from Cloud9
            -Used a query to select everything from persons table
            -Queried the thing
            -Checked if the result had an error
            -No error, so we took the result, used fetch_assoc() function which
             takes all the data inside the table into an associated array and put it into 
             the row variable
            -Then get the row name (we've only got one row here) and displays it
        
        Note: we could also enter data into the database from Cloud9 since it's connected,
        and that's the whole point of connecting to a database
        
        Similar process if we were using MongoHQ or MongoLab
    */
        