xss-board
=========

This is an example of a simple XSS challenge using Zombie.js (http://zombie.labnotes.org/). The bot will visit the website every three minutes (depending on the crontab settings below) and executes all the Javascript code it finds.

### Configure It

Adjust the cookie ('mag1c_c00k1e') and the flag ('put_flag_here') values. The comments directory needs to be writable for the www user.

### Run It

Just add this to your crontab:

```
*/3 * * * * node bot.js >> /tmp/xss-bot.log
```
