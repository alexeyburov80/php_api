# PHP API SQLITE
### Test project, implementation of the API for getting customer contact data, with the ability to:
 - Adding data to the database as an array.
 ```json
//  e.g.
 {
   "source_id": 1,
   "items": [
     {
       "name": "Анна",
       "phone": 9001234453,
       "email": "mail1@gmail.com"
     },
     {
       "name": "Иван",
       "phone": "+79001234123",
       "email": "mail2@gmail.com"
     }
   ]
 }  
``` 
 - In the response-the number of contacts added.
 - The 'phone' field in the database is saved in the format without +7 (10 digits).
 - Implemented data search by phone number:
```
//  e.g.
Get / search.php? phone=9001234123
```
 - Optimized the speed of adding and searching.
 - Implemented an interface on bootstrap.