# How to run
1. Clone repository
2. run `php -S 127.0.0.1:8000 -c php.ini` in the dir to run a php dev server on [127.0.0.1:8000](127.0.0.1:8000)
3. To run text to read, don't forget to add your google api key at t2s.php, line 28. Due to the projects purpose, the language is set on Czech by default. 
# Explanation
The main page (index.php) is for uploading music (goes to `uploads` folder) and has a testing player. The [radio page](127.0.0.1:8000/radio.php) is playing (may need to have autoplay enabled). Gives query every second to refresh.
# Possible features
- Audio syncing on unix time
- Adding a silence button on index
