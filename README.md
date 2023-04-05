How To Set up Server Filter API Project

1. copy the .env.example to .env file and enter your local db credentials

   add the credentials on .env.testing as well

2. Run the following in root of the project directory to setup back-end

   `bash be-setup.sh`

3. Run following command in root of the project directory to set up the required data(in a new terminal)

   `bash data-setup.sh`

   wait for this command executed and finished, start the queue by entering the follwoing command

   `php artisan queue:work`

4. Run following command to start the front-end in root of the project directory(in a new terminal)

   `bash fe-setup.sh`

5. Postman Documentation for the API is available at the following URL

   https://documenter.getpostman.com/view/8020564/2s93RXsW5E

6. To run the test cases, run the following command in root of the project directory(in a new terminal)

   `bash test.sh`