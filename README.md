# PHP test

## 1. Installation

  - create an empty database named "phptest" on your MySQL server
  - import the dbdump.sql in the "phptest" database
  - put your MySQL server credentials in the constructor of DB class
  - you can test the demo script in your shell: "php index.php"

## 2. Expectations

This simple application works, but with very old-style monolithic codebase, so do anything you want with it, to make it:

  - easier to work with
  - more maintainable


## 3. Found Bad Practices

  - the News and Comment class has repetitive code
    - created an abstract class to for repetitive codes and moved the repetive codes for both class
    - more scaleable if any more content class to be added in the future
  - Implemented Interface for Comment and News  
    - created a contract for both contracts for their unique properties
    - if future classes share unique properties as those 2 class, those interfaces can be used
  - Repetitive getInstance for Comment and News Manager
    - created a singleton class for better modularity and fix the repetitive code
  - Manual Creation of Query for each manager
    - created a Query builder for reusability
  - Not using Namespacing
    - Updated code to use namespacing for proper class imports

  