How To Set up Server Filter API Project

1. copy the .env.example to .env file

2. Run the following in root of the project directory

   `docker-compose up -d --build`

3. Run following command to run migration and import data

   `bash setup.sh`

4. Postman Documentation for the API is available at the following URL

   https://documenter.getpostman.com/view/8020564/2s93RXsW5E

5. To run the test cases, run the following command

   `bash test.sh`