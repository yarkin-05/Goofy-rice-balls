# Galery ReadMe

# PDO Documentation
  - https://www.php.net/manual/en/intro.pdo.php
  - Stands for PHP Data Object (PDO)
  - lightweight interface for accessing databases
  - to perform any database functions, you must use a ~database-specific PDO driver 
    {
      function pdo_connect_mysql(){
      //MYSQL credentials
      $DATABASE_HOST = 'localhost';
      $DATABASE_USER = 'root';
      $DATABASE_PASS = 'root';
      $DATABASE_NAME = 'phogallery';  
      try{
        //connect to my SQL
        return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
        } 
      }
    }
  - does not provide database abstraction (Data Abstraction is a process of hiding unwanted or irrelevant details from the end user)
  
  # Connection Management
    -https://www.php.net/manual/en/pdo.connections.php
    {
      catch (PDOException $exception) {
        //this is the PDO driver
        $error = ''. $exception->getMessage() .'';
        exit($error);
      }
    }

  # Transactions 
    - Transactions offer Atomicity, Consistency, Isolation and Durability (ACID)
    """
      any work carried out in a transaction, even if it is carried out in stages, is guaranteed to be applied to the database safely, and without interference from other connections, when it is committed
    """
    - typically implemented by saving up your batch of changes to be applied all at once (faster and bigger scripts)
    - If you need a transaction, you must use the PDO::beginTransaction() method to initiate one
    - https://www.php.net/manual/en/pdo.begintransaction.php

  # Auto Commit
    - every query that you run has its own implicit transaction, if the database supports it, or no transaction if the database doesn't support transactions
    
  # Prepared statements
    - "kind of compiled template for the SQL that an application wants to run, that can be customized using variable parameters"
    - Benefits
      - Query only needs to be parsed (analyzed), but can be executed multiple times (faster)
      - Prepared statements don't need to be quoted
           ->prepare()
           ->bindParam()
           ->execute
          {
            $stmt = $pdo->prepare('INSERT INTO upload(title, description, filepath, date) VALUES (?,?,?, CURRENT_TIMESTAMP)');
            $stmt->execute([$_POST['title'], $_POST['description'], $image_path]);
          }

  # Database Drivers
    - https://www.php.net/manual/en/pdo.drivers.php

  # Error handling
    - https://www.php.net/manual/en/pdo.error-handling.php