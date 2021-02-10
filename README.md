# Foodics Assessment 
## Matrices Multiplication Applicaiton

### APIs

- POST /api/matrix/multiply params [ matrix 1 array , matrix2 array] // must be authenticated
- POST /api/register params [name : string , email : string , password : string] 
- POST /api/login params [email : string , password : string]

### Required Headers 
- `Accept :  application/json` **in each request**
- `Authorization : Bearer <token returned by login Api>` to be able to multiply matrices the first endpoint 


### To Run Tests 
`php artisan test` 
- Unit tests and Feature Test applied




